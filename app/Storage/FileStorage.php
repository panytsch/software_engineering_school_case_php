<?php

namespace App\Storage;

use Generator;

class FileStorage
{
    private const WAIT_TIME_UNTIL_LOCK_RETRY = 1000; // 1ms

    /**
     * @var resource
     */
    private $resource;

    public function __construct(private readonly string $filePath)
    {
        $fullPath = storage_path() . DIRECTORY_SEPARATOR . $this->filePath;
        $this->resource = fopen($fullPath, 'a+');
    }

    public function getContent(): Generator
    {
        $this->lock();

        while (($line = fgets($this->resource)) !== false) {
            yield rtrim($line, PHP_EOL);
        }

        $this->unlock();
    }

    public function put(string $line): void
    {
        $this->lock();

        fwrite($this->resource, $line . PHP_EOL);

        $this->unlock();
    }

    public function __destruct()
    {
        fclose($this->resource);
    }

    private function lock(): void
    {
        while (!flock($this->resource, LOCK_EX)) {
            // try again in some time
            usleep(self::WAIT_TIME_UNTIL_LOCK_RETRY);
        }
    }

    private function unlock(): void
    {
        flock($this->resource, LOCK_UN);
    }
}
