<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Services\Staff\GroupService;
use App\Services\Staff\ModuleService;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function __construct(GroupService $groupService, ModuleService $moduleService)
    {
        $this->groupService = $groupService;
        $this->moduleService = $moduleService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = $this->groupService->getListGroups();

        return view('staff.group.index', compact('groups'));
    }

    public function permission(Group $group)
    {
        $modules = $this->moduleService->getListModules();
        $roleListArr = [
            'view' => 'Xem',
            'add' => 'Thêm',
            'edit' => 'Sửa',
            'delete' => 'Xóa',
        ];
        if (!empty($group->permissions)) {
            $roleGroup = json_decode($group->permissions, true);
        } else {
            $roleGroup = [];
        }
        // dd($roleGroup);

        return view('staff.group.permission', compact('group', 'modules', 'roleListArr', 'roleGroup'));
    }

    public function postPermission(Request $request, Group $group)
    {
        if (!empty($request->role)) {
            $roleArr = $request->role;
        } else {
            $roleArr = [];
        }

        $roleJson = json_encode($roleArr);

        $group->permissions = $roleJson;
        $group->save();

        return redirect()->back()->with('msg', 'Phân quyền thành công');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
