<?php

namespace Modules\CStudent\src\Repositories;

use App\Repositories\RepositoryInterface;

interface CStudentRepositoryInterface extends RepositoryInterface
{
    public function getCStudent();
}
