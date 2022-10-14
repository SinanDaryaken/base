<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Collection as DatabaseCollection;
use Illuminate\Database\Eloquent\Model;

interface BaseInterface
{
    /**
     * @param string $id
     * @return Model|null
     */
    public function getById(string $id): ?Model;

    /**
     * @return DatabaseCollection
     */
    public function getAll(): DatabaseCollection;
}