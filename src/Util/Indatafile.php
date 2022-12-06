<?php declare(strict_types=1);

namespace AdventOfCode\Util;

final class Indatafile
{
    private $handle;
    private string $content;
    private string $filename;

    private function __construct(string $filename)
    {
        $this->filename = $filename;
        $this->content = file_get_contents($filename);
    }

    public function __destruct()
    {
        $this->reset();
    }

    public static function load(string $filename): self
    {
        return new self($filename);
    }

    private function getReader()
    {
        return $this->handle
            ? $this->handle
            : $this->handle = fopen($this->filename, 'r');
    }

    public function read(): ?string
    {
        if (($line = fgets($this->getReader())) !== false) {
            return $line;
        }
        return null;
    }

    public function reset(): self
    {
        if ($this->handle) {
            fclose($this->handle);
        }
        $this->handle = null;
        return $this;
    }

    public function goTo(int $rownumber): self
    {
        rewind($this->getReader());
        for ($i = 1; $i < $rownumber; $i++) {
            $this->read();
        }
        return $this;
    }
}
