<?php

namespace App\Services\Api;

use App\Models\Blog;
use App\Models\InfoCompany;
use App\Models\Media;
use App\Models\Province;
use App\Models\Staff;
use App\Models\User;
use App\Services\Helper\FilterTrait;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ApiService extends BaseService
{
    use FilterTrait;

    public function __construct(
        Staff $model,
        InfoCompany $infoCompany,
        User $user,
        Media $media,
        Blog $blog,
        Province $province
    ) {
        $this->model = $model;
        $this->infoCompany = $infoCompany;
        $this->user = $user;
        $this->media = $media;
        $this->blog = $blog;
        $this->province = $province;
    }

    public function getListStaff($filters = [], $sorts = [], $relations = [], $limit = 20, $select = ['*'], $filterable = [])
    {
        $limit = $limit ?? config('common.default_per_page');

        return $this->model
            ->isActive()
            ->isStaff()
            ->with('infoStaff')->get();
    }

    public function getPlaceVn()
    {
        return $this->province->get();
    }

    public function getInfoCompany()
    {
        return $this->infoCompany->get();
    }

    public function getUserAmount()
    {
        return $this->user->isUser()->count();
    }

    public function getMediaAmount()
    {
        return $this->media
            ->whereNull('deleted_at')
            ->isActive()
            ->count();
    }

    public function getBlogAmount()
    {
        return $this->blog
            ->whereNull('deleted_at')
            ->isActive()
            ->count();
    }

    public function stasticMedia()
    {
        $range = Carbon::now()->subDays(60);

        return DB::table('medias')
            ->whereDate('created_at', '>=', $range)
            ->groupBy('date')
            ->orderBy('date', 'ASC')
            ->get([
                DB::raw('Date(created_at) as date'),
                DB::raw('COUNT(*) as value')
            ])->toJSON();
    }
}
