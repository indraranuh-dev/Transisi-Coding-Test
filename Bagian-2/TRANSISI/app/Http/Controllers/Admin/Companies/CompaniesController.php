<?php

namespace App\Http\Controllers\Admin\Companies;

use App\Company;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CompaniesController extends Controller
{
    /**
     * Class constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.admin.company.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            "name" => "required",
            "email" => "required|email|unique:companies",
            "phone" => "required",
            "logo" => "required|mimes:jpeg,bmp,png|dimensions:min_width=100,min_height=100|size:2000"
        ];
        $validate = $this->validate($request, $rules);
        if($validate){
            $company = new Company();
            $company->name = $request->name;
            $company->email = $request->email;
            $company->phone = $request->phone;
            $company->logo = $request->logo;
            $company->save();
        }else{
            return $validate;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

   

}
