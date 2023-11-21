<?php

namespace Modules\CManager\src\Repositories;

use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Hash;
use Modules\CManager\src\Models\CManager;
use Modules\CManager\src\Repositories\CManagerRepositoryInterface;

class CManagerRepository extends BaseRepository implements CManagerRepositoryInterface
{
    public function getModel()
    {
        return CManager::class;
    }

    public function getCManagers($limit = 20)
    {
        $limit = $limit ?? config('common.default_per_page');

        return $this->model->paginate($limit);
    }

    public function setPassword($id, $password)
    {
        return $this->update($id, ['password' => bcrypt($password)]);
    }

    public function checkPassword($id, $password)
    {
        $manager = $this->find($id);

        if ($manager) {
            $hashPassword = $manager->password;

            return Hash::check($password, $hashPassword);
        }

        return false;
    }
}