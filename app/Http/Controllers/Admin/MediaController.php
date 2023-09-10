<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MediaRequest;
use App\Services\Admin\CategoryService;
use App\Services\Admin\MediaService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

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

        return view('admin.media.index', compact('medias'));
    }

    public function create()
    {
        $categories = $this->categoryService->getListCategoryPluck();

        return view('admin.media.create', compact('categories'));
    }

    public function store(MediaRequest $request)
    {
        if ($this->mediaService->mediaCreate($request->all())) {
            return redirect()->route('admin.media.index')->with('create_success', __('messages.create_success'));
        }

        return redirect()->back()->with('create_fail',  __('messages.create_success'));
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

        return view("admin.media.edit", compact('media', 'categories'));
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
            return redirect()->route('admin.media.index')->with('update_success',  __('messages.update_success'));
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

    public function sortMedia(Request $request)
    {
        if ($this->mediaService->sortMedia($request->all())) {
            return response()->apiSuccess([
                'code' => Response::HTTP_OK,
                'message' => __('messages.edit_success'),
                'status' => true,
            ]);
        }
    }
}
