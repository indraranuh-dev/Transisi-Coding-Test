<?php

namespace App\Http\Controllers\API\Companies;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Company;
use App\Http\Resources\CompanyResource;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\Storage;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index ()
    {
        $company = Company::orderBy('created_at', 'desc')->paginate(5);
        return CompanyResource::collection($company);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $uuid = Uuid::uuid6()->getHex();
        $id = substr($uuid, 0, 20);
        
        $validate = $this->validate($request, [
            "name" => "required",
            "email" => "email|unique:companies|required",
            "phone" => "required|integer",
            "logo" => "max:2000|required"
            ]);
        if($validate){

            $imageName = $request->logo->getClientOriginalName();
            $company = new Company;
            $company->id = $id;
            $company->name = $request->name;
            $company->email = $request->email;
            $company->phone = $request->phone;
            $company->logo = $imageName;

            if($company->save()){

                $request->logo->move(storage_path('app/company'), $imageName);
                return new CompanyResource($company);
            }

        }else{
            return $validate;
        }
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request, Company $company)
     {
        $company = Company::findOrFail($request->id);

        $company->name = $request->name;
        $company->email = $request->email;
        $company->phone = $request->phone;
        if( $request->logo != null ){
            $imageName = $request->logo->getClientOriginalName();
            $company->logo = $imageName;
        }
        
        if($company->save()){
            
            if( $request->logo != null ){
                $request->logo->move(storage_path('app/company'), $imageName);
            }

            return new CompanyResource($company);
        }

     }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
     public function destroy(Request $request)
     {
        $imagePath = storage_path('app/company');
        $company = Company::where('id', $request->id);

        if($company->delete()){
            return new CompanyResource($company );
        }
    }
}
