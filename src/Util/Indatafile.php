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

    public static function load(string $filename): self
    {
        return new self($filename);
    }

    public function readLine(): ?string
    {
        if (!$this->handle) {
            $this->handle = fopen($this->filename, 'r');
        }

        if (($line = fgets($this->handle)) !== false) {
            return $line;
        }

        fclose($this->handle);
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
}
