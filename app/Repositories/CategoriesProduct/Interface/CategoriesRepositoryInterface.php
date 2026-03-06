<?php

namespace App\Repositories\CategoriesProduct\Interface;

use App\Repositories\BaseRepositoryInterface;

interface CategoriesRepositoryInterface extends BaseRepositoryInterface
{
    public function DataTables();
    public function getMainCategories();
}
