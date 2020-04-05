<?php

namespace App\Http\Controllers\API\Employees;

use App\Company;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Employee;
use App\Http\Resources\EmployeeResource;
use Illuminate\Support\Facades\DB;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index ()
    {
        $employee = Employee::orderBy('created_at', 'desc')->paginate(5);
        return EmployeeResource::collection($employee);
    }

    /**
     * Show specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $company = Employee::where('company_id', '=', $request->id)->get();
        return response()->json($company);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request)
     {
         $validate = $this->validate($request, [
             "company_id" => "required",
             "name" => "required",
             "email" => "email|unique:employees|required",
             "phone" => "required|integer",
        ]);

        if($validate){

            $employee = new Employee();
            $employee->company_id = $request->company_id;
            $employee->name = $request->name;
            $employee->email = $request->email;
            $employee->phone = $request->phone;
            $employee->save();

        }else{

            return $validate;

        }
     }

      /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  \App\Employee  $employee
      * @return \Illuminate\Http\Response
      */
      public function update(Request $request, Employee $employee)
      {
        $validate = $this->validate($request, [
                "name" => "required",
                "email" => "email|required",
                "phone" => "required|integer",
        ]);

        if($validate){

            if($request->company_id != null){
                $employee = Employee::find($request->id);
                $employee->company_id = $request->company_id;
                $employee->name = $request->name;
                $employee->email = $request->email;
                $employee->phone = $request->phone;
                $employee->save();
            }else{
                $employee = Employee::find($request->id);
                $employee->name = $request->name;
                $employee->email = $request->email;
                $employee->phone = $request->phone;
                $employee->save();
            }

        }else{

            return $validate;

        }
      }

     /**
      * Remove the specified resource from storage.
      *
      * @param  \App\Employee  $employee
      * @return \Illuminate\Http\Response
      */
      public function destroy(Request $request)
      {
         $employee = Employee::where('id', $request->id);

         if($employee->delete()){
             return new EmployeeResource($employee );
         }
     }
}
