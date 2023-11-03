<?php

namespace App\Services\Staff;

use App\Models\Group;
use App\Models\Media;
use App\Services\Helper\FilterTrait;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class GroupService extends BaseService
{
    use FilterTrait;

    public function __construct(Group $model)
    {
        $this->model = $model;
    }

    public function getListGroups($limit = 20)
    {
        $limit = $limit ?? config('common.default_per_page');

        return $this->model
            ->paginate($limit);
    }
}
