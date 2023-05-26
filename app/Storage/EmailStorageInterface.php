<?php

namespace App\Storage;

use Generator;

interface EmailStorageInterface
{
    public function exists(string $email): bool;

    public function emails(): Generator;

    public function put(string $email): void;
}
