<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MediaRequest;
use App\Services\Admin\CategoryService;
use App\Services\Staff\MediaService;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function __construct(MediaService $mediaService, CategoryService $categoryService)
    {
        $this->mediaService = $mediaService;
        $this->categoryService = $categoryService;
    }
    public function index()
    {
        $medias = $this->mediaService->getListMedia();

        return view('staff.media.index', compact('medias'));
    }

    public function mediaTable(Request $request)
    {
        $medias = $this->mediaService->getListMedia($request->all());
        $categories = $this->categoryService->getListCategoryPluck();
        $sortTypeUrl = isset($request->sort_type) ? $request->sort_type : 'desc';

        if ($sortTypeUrl == 'asc') {
            $sortType = 'desc';
            $sortClass = 'up';
        } else {
            $sortType = 'asc';
            $sortClass = 'down';
        }

        // dd($sortType);

        return view('staff.media-table.index', compact('medias', 'categories', 'sortType', 'sortClass'));
    }

    public function create()
    {
        $categories = $this->categoryService->getListCategoryPluck();

        return view('staff.media.create', compact('categories'));
    }

    public function store(MediaRequest $request)
    {
        if ($this->mediaService->mediaCreate($request->all())) {
            return redirect()->route('staff.media.index')->with('create_success', __('messages.create_success'));
        }

        return redirect()->back()->with('create_fail',  __('messages.create_fail'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $media = $this->mediaService->getMedia($id);
        $categories = $this->categoryService->getListCategoryPluck();

        return view("staff.media.edit", compact('media', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MediaRequest $request, $mediaId)
    {
        if ($this->mediaService->mediaUpdate($request->all(), $mediaId)) {
            return redirect()->route('staff.media.index')->with('update_success',  __('messages.update_success'));
        }

        return redirect()->back()->with('update_fail',  __('messages.update_fail'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($mediaId)
    {
        if ($this->mediaService->deleteMedia($mediaId)) {
            return redirect()->back()->with('delete_success',  __('messages.delete_success'));
        }

        return redirect()->back()->with('delete_fail',  __('messages.delete_fail'));
    }
}
