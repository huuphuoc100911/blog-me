<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Http\Requests\Staff\MediaRequest;
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
        $staffId = auth('staff')->user()->id;
        $medias = $this->mediaService->getListMedia($staffId);

        return view('staff.media.index', compact('medias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->categoryService->getListCategoryPluck();

        return view('staff.media.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MediaRequest $request)
    {
        if ($this->mediaService->createMedia($request->all())) {
            return redirect()->route('staff.media.index')->with('create_success', __('messages.create_success'));
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
        $categories = $this->categoryService->getListCategoryPluck();
        $media = $this->mediaService->getMedia($id);

        return view('staff.media.edit', compact('media', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
