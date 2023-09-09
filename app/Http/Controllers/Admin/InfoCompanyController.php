<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\InfoCompanyRequest;
use App\Services\Admin\InfoCompanyService;
use Illuminate\Http\Request;

class InfoCompanyController extends Controller
{
    public function __construct(InfoCompanyService $infoCompanyService)
    {
        $this->infoCompanyService = $infoCompanyService;
    }

    public function edit($id)
    {
        $infoCompany = $this->infoCompanyService->getInfoCompany($id);

        return view('admin.info-company.edit', compact('infoCompany'));
    }

    public function update(InfoCompanyRequest $request, $id)
    {
        if ($this->infoCompanyService->settingInfoCompany($request->all(), $id)) {
            return redirect()->route('admin.info-company.edit', $id + 1)->with('update_success', 'Installed information successfully');
        }

        return redirect()->route('admin.info-company.edit', $id)->with('update_error', 'Information installation failed');
    }
}
