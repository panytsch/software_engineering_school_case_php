<?php

namespace App\Storage;

use Generator;

class EmailStorage implements EmailStorageInterface
{
    private FileStorage $storage;

    public function __construct()
    {
        $this->storage = new FileStorage(env('STORAGE_FILE'));
    }

    public function exists(string $email): bool
    {
        foreach ($this->emails() as $storedEmail) {
            if ($email === $storedEmail) {
                return true;
            }
        }

        return false;
    }

    public function emails(): Generator
    {
        return $this->storage->getContent();
    }

    public function put(string $email): void
    {
        if ($this->exists($email)) {
            return;
        }

        $this->storage->put($email);
    }
}
