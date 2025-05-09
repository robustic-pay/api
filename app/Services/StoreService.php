<?php

namespace App\Services;

class StoreService
{
    public function slug(string $storeName)
    {
        $storeName = strtolower(str_replace(' ', '', $storeName));

        return $storeName;
    }
}
