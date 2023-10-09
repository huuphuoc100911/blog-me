<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Staff;
use App\Services\Admin\AdminService;
use Illuminate\Http\Request;
use PDF;

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

    public function downloadPdf()
    {
        $data['title'] = 'Danh sách nhân viên';
        $data['staffs'] =  Staff::get();

        $pdf = PDF::loadView('admin.user.pdf', $data);

        return $pdf->download('tuts_notes.pdf');
    }

    public function changeStatusStaff(Request $request)
    {
        $statusStaff = $this->adminService->changeStatusStaff($request->staffId);
        $countStaffLock = $this->adminService->countStaffLock();

        if ($statusStaff->is_active == 1) {
            return response()->json([
                'status' => '<span class="badge bg-label-danger me-1">Lock</span>',
                'count' => $countStaffLock,
            ]);
        } else {
            return response()->json([
                'status' => '<span class="badge bg-label-success me-1">Active</span>',
                'count' => $countStaffLock,
            ]);
        }
    }

    public function sendMailStaff()
    {
        if ($this->adminService->sendEmail()) {
            return redirect()->back()->with('send_email_success', __('messages.send_email_success'));
        } else {
            return redirect()->back()->with('send_email_fail', __('messages.send_email_fail'));
        }
    }

    public function sendSMS()
    {
        $activeCode = $this->adminService->generateSmsCode();
        $content = "Your activate code is: $activeCode";

        if ($this->adminService->send('+84799130624', $content, null)) {
            return redirect()->back()->with('send_email_success', __('messages.send_email_success'));
        } else {
            return redirect()->back()->with('send_email_fail', __('messages.send_email_fail'));
        }
    }
}
