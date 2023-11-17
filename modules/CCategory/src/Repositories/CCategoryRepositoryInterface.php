<?php

namespace Modules\CCategory\src\Repositories;

use App\Repositories\RepositoryInterface;

interface CCategoryRepositoryInterface extends RepositoryInterface
{
    public function getCategories();
}
