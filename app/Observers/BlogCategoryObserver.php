<?php

namespace App\Observers;

use App\Models\BlogCategory;
use Illuminate\Support\Facades\Log;

class BlogCategoryObserver
{
    /**
     * Handle the BlogCategory "created" event.
     *
     * @param  \App\Models\BlogCategory  $blogCategory
     * @return void
     */
    public function saved(BlogCategory $blogCategory)
    {
        Log::info('Danh mục blog vừa được lưu: ' . $blogCategory->title);
    }

    public function created(BlogCategory $blogCategory)
    {
        Log::info('Danh mục blog vừa được tạo: ' . $blogCategory->title);
    }

    /**
     * Handle the BlogCategory "updated" event.
     *
     * @param  \App\Models\BlogCategory  $blogCategory
     * @return void
     */
    public function updating(BlogCategory $blogCategory)
    {
        Log::info('Danh mục blog đang được cập nhật: ' . $blogCategory->title);
    }

    public function updated(BlogCategory $blogCategory)
    {
        Log::info('Danh mục blog vừa được cập nhật: ' . $blogCategory->title);
    }

    /**
     * Handle the BlogCategory "deleted" event.
     *
     * @param  \App\Models\BlogCategory  $blogCategory
     * @return void
     */
    public function deleted(BlogCategory $blogCategory)
    {
        Log::info('Danh mục blog vừa bị xóa: ' . $blogCategory->title);
    }

    /**
     * Handle the BlogCategory "restored" event.
     *
     * @param  \App\Models\BlogCategory  $blogCategory
     * @return void
     */
    public function restored(BlogCategory $blogCategory)
    {
        //
    }

    /**
     * Handle the BlogCategory "force deleted" event.
     *
     * @param  \App\Models\BlogCategory  $blogCategory
     * @return void
     */
    public function forceDeleted(BlogCategory $blogCategory)
    {
        //
    }
}
