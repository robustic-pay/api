<?php

namespace App\Services;

use App\Models\Store;

class StoreService
{
    public function slug(string $storeName) 
    {
       $storeName = strtolower(str_replace(' ', '', $storeName));
       return $storeName;
    }
}