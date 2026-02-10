<?php

namespace App\Repositories\Store\Interface;

use App\Repositories\BaseRepositoryInterface;

interface StoreRepositoryInterface extends BaseRepositoryInterface
{
    public function createOnlyName($data,$id);

}
