<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Http\Requests\Staff\InfoStaffRequest;
use App\Services\Staff\InfoStaffService;
use Illuminate\Http\Request;

class InfoStaffController extends Controller
{
    public function __construct(InfoStaffService $infoStaffService)
    {
        $this->infoStaffService = $infoStaffService;
    }

    public function edit($staffId)
    {
        $infoStaff = $this->infoStaffService->getInfoStaff($staffId);
        $staff = $this->infoStaffService->getStaff($staffId);

        return view('staff.info-staff.index', compact('infoStaff', 'staff'));
    }

    public function update(InfoStaffRequest $request, $staffId)
    {
        if ($this->infoStaffService->settingInfoStaff($request->all(), $staffId)) {
            return redirect()->route('staff.info-staff.edit', $staffId)->with('update_success', 'Installed information successfully');
        }

        return redirect()->route('staff.info-staff.edit', $staffId)->with('update_error', 'Install information failed');
    }
}
