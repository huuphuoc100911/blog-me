<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MediaRequest;
use App\Models\Media;
use App\Repositories\Media\MediaRepository;
use App\Services\Admin\CategoryService;
use App\Services\Staff\MediaService;
use Illuminate\Contracts\Auth\Access\Gate as AccessGate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class MediaController extends Controller
{
    protected $mediaRepo;

    public function __construct(MediaService $mediaService, CategoryService $categoryService, MediaRepository $mediaRepo)
    {
        $this->mediaService = $mediaService;
        $this->categoryService = $categoryService;
        $this->mediaRepo = $mediaRepo;
    }

    public function index()
    {
        // $medias = $this->mediaService->getListMedia();
        $medias = $this->mediaRepo->getMediaPaginate();

        return view('staff.media.index', compact('medias'));
    }

    public function mediaTable(Request $request)
    {
        $staff = Auth::guard('staff')->user();

        if ($this->authorize('staff.medias.view')) {
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

            return view('staff.media-table.index', compact('medias', 'categories', 'sortType', 'sortClass'));
        }
    }

    public function create()
    {
        if ($this->authorize('staff.medias.add')) {
            $categories = $this->categoryService->getListCategoryPluck();

            return view('staff.media.create', compact('categories'));
        }
    }

    public function store(MediaRequest $request)
    {
        if ($this->authorize('staff.medias.add')) {
            if ($this->mediaService->mediaCreate($request->all())) {
                return redirect()->route('staff.media-table.index')->with('create_success', __('messages.create_success'));
            }

            return redirect()->back()->with('create_fail',  __('messages.create_fail'));
        }
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
        $staff = Auth::guard('staff')->user();
        $media = $this->mediaService->getMedia($id);

        if ($this->authorize('staff.medias.edit', $id)) {
            $categories = $this->categoryService->getListCategoryPluck();

            return view("staff.media.edit", compact('media', 'categories'));
        }
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
            return redirect()->route('staff.media-table.index')->with('update_success',  __('messages.update_success'));
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
