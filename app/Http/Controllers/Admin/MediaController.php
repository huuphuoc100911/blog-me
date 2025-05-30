<?php

namespace App\Http\Controllers\Admin;

use App\Enums\MediaStatus;
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

    public function index(Request $request)
    {
        if (session()->has('check')) {
            session()->pull('check');
        }
        $medias = $this->mediaService->getListMedia($request->all());
        $categories = $this->categoryService->getListCategoryPluck();

        return view('admin.media.index', compact('medias', 'categories'));
    }

    public function create()
    {
        $categories = $this->categoryService->getListCategoryPluck();

        return view('admin.media.create', compact('categories'));
    }

    public function store(MediaRequest $request)
    {
        if ($this->mediaService->mediaCreate($request->all())) {
            if (session()->get('check')) {
                $categoryId = session()->get('check');
                session()->pull('check');

                return redirect()->route('admin.category.show', $categoryId)->with('update_success',  __('messages.update_success'));
            } else {
                return redirect()->route('admin.media.index')->with('update_success',  __('messages.update_success'));
            }
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
        $media = $this->mediaService->findModel($id);
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
            if (session()->get('check')) {
                $categoryId = session()->get('check');
                session()->pull('check');
                return redirect()->route('admin.category.show', $categoryId)->with('update_success',  __('messages.update_success'));
            } else {
                return redirect()->route('admin.media.index')->with('update_success',  __('messages.update_success'));
            }
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

    public function changeStatusMedia(Request $request)
    {
        $media = $this->mediaService->changeStatusMedia($request->mediaId);

        if ($media->is_active === MediaStatus::ACTIVE) {
            return response()->json([
                'status' => '<span class="badge bg-success">Active</span>'
            ]);
        } else {
            return response()->json([
                'status' => '<span class="badge bg-danger">Inactive</span>'
            ]);
        }
    }
}
