<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\AdminService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(AdminService $adminService)
    {
        $this->adminService = $adminService;
    }

    public function index()
    {
        $admins = $this->adminService->getListAdmin();
        $staffs = $this->adminService->getListStaff();
        $users = $this->adminService->getListUser();

        return view('admin.user.index', compact('admins', 'staffs', 'users'));
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

    public function changeStatusStaff(Request $request)
    {
        $statusStaff = $this->adminService->changeStatusStaff($request->staffId);

        if ($statusStaff->is_active == 1) {
            return response()->json([
                'status' => '<span class="badge bg-label-danger me-1">Lock</span>'
            ]);
        } else {
            return response()->json([
                'status' => '<span class="badge bg-label-success me-1">Active</span>'
            ]);
        }
    }
}
