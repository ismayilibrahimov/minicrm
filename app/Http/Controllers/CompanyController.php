<?php

namespace App\Http\Controllers;

use App\DataTables\CompanyDataTable;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{

    public function index()
    {
        $companies = Company::all();

        return view('companies.index', compact('companies'));
    }


    public function create()
    {
        return view('companies.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'string|required',
            'email' => 'string|email',
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'website' => 'string',
        ]);

        $input = $request->all();

        if ($request->hasFile('logo')) {
            $image = $request->file('logo');
            $imageName = $image->getClientOriginalName();
            $uniqueImageName = date('YmdHis') . "." . $imageName;
            $request->logo->storeAs('public', $uniqueImageName);
            $input['logo'] = $uniqueImageName;
        }


        Company::create($input);

        return redirect()->route('companies.index')->with('success', 'Company created successfully!');
    }


    public function show(Company $company)
    {
        return view('companies.show', compact('company'));
    }


    public function edit(Company $company)
    {
        return view('companies.edit', compact('company'));
    }


    public function update(Request $request, Company $company)
    {
        $request->validate([
            'name' => 'string|required',
            'email' => 'string|email',
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'website' => 'string',
        ]);

        $input = $request->all();



        if ($request->hasFile('logo')) {
            $image = $request->file('logo');
            $imageName = $image->getClientOriginalName();
            $uniqueImageName = date('YmdHis') . "." . $imageName;
            $request->logo->storeAs('public', $uniqueImageName);
            $input['logo'] = $uniqueImageName;

            if (Storage::disk('local')->exists('public/' . $company->logo)) {
                Storage::disk('local')->delete('public/' . $company->logo);
            }
        }

        $company->update($input);

        return redirect()->route('companies.index')->with('success', 'Company updated successfully!');
    }


    public function destroy(Company $company)
    {
        if (Storage::disk('local')->exists('public/' . $company->logo)) {
            Storage::disk('local')->delete('public/' . $company->logo);
        }

        $company->delete();

        return redirect()->route('companies.index')
            ->with('success', 'Company deleted successfully!');
    }
}
