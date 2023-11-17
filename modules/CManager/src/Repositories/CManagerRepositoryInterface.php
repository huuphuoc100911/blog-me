<?php

namespace Modules\CManager\src\Repositories;

use App\Repositories\RepositoryInterface;

interface CManagerRepositoryInterface extends RepositoryInterface
{
    public function getCManagers($limit);

    public function setPassword($id, $password);

    public function checkPassword($id, $password);
}
