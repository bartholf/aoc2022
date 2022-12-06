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
        fclose($this->handle);
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

    public function getUntil(string $stop): array
    {
        $content = [];
        while ($line = $this->readLine()) {
            if ($line === $stop) {
                return $content;
            }
            $content[] = trim($line);
        }
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
