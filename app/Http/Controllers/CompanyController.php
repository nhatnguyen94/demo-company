<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyCreateRequest;
use App\Http\Requests\CompanyEditRequest;
use Illuminate\Http\Request;
use App\Company;
class CompanyController extends Controller
{


    public function index(Request $request)
    {
        $data = Company::paginate(10);
        return view('companies.list',['data' => $data]);
    }

    public function create()
    {
        return view('companies.store');
    }

    public function store(CompanyCreateRequest $request)
    {
        $data = [
                'name' => $request->name,
                'email' => $request->email,
                'website' => $request->website
                ];
        $company = new Company;
        $dirUpload = 'uploads';
        if (!file_exists($dirUpload)) {
            mkdir($dirUpload, 0757, true);
        }
        $imageName = date("Ymd").'.'.time().'.'.request()->logo->getClientOriginalExtension();
        $urlNewFile = $dirUpload . '/' . $imageName;
        request()->logo->move(public_path($dirUpload), $imageName);
        $company->fill($data);
        $company->logo = $urlNewFile;
        $company->save();
        return redirect()->route('company.index');

    }

    public function edit($id)
    {
        $company = Company::findOrFail($id);
        return view('companies.store',['company' => $company]);
    }

    public function update(CompanyEditRequest $request, $id)
    {
        $company = Company::findOrFail($id);
        $logoUpdate;
        $dirUpload = 'uploads';
        if (!file_exists($dirUpload)) {
            mkdir($dirUpload, 0757, true);
        }
            if ($request->hasFile('logo')) {
                $imageName = date("Ymd").'.'.time().'.'.request()->logo->getClientOriginalExtension();
                $logoUpdate = $dirUpload . '/' . $imageName;
                request()->logo->move(public_path($dirUpload), $imageName);

            } else {
             $logoUpdate  = $company->logo;
         }
        $data = [
                'name' => $request->name,
                'email' => $request->email,
                'website' => $request->website
        ];
        $company->fill($data);
        $company->logo = $logoUpdate;
        $company->save();
        return redirect()->route('company.index');
    }

    public function show($id)
    {
        $company = Company::findOrFail($id);
        return view('companies.show',['company' => $company]);
    }

    public function destroy($id)
    {
        $company = Company::findOrFail($id);
        $company->delete();
        return redirect()->route('company.index');
    }
}
