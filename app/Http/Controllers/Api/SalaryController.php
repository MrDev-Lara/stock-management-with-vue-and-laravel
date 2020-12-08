<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class SalaryController extends Controller
{
     public function salaryPaid(Request $request,$id)
    {
    	 $validatedData = $request->validate([
         'salary_month' => 'required',
        ]);

    	 $month=$request->salary_month;

    	$check=DB::table('salaries')->where('employee_id',$id)->where('salary_month',$month)->first();
    	if ($check) {
    		return response()->json('salary already paid');
    	}else{
	    	 $data=array();
	    	 $data['employee_id']=$id;
	    	 $data['amount']=$request->salary;
	    	 $data['salary_date']=date('d/m/Y');
	    	 $data['salary_month']=$month;
	    	 $data['salary_year']=date('Y');
	    	 DB::table('salaries')->insert($data);
    	 }
    }

    public function salary(){
    	$month = DB::table('salaries')->select('salary_month')->groupBy('salary_month')->get();
    	return response()->json($month);
    }

    public function viewsalary($id){
    	$view = DB::table('salaries')
    	->join('employees','salaries.employee_id','employees.id')
    	->select('employees.name','salaries.*')
    	->where('salary_month',$id)
    	->get();

    	return response()->json($view);
    }
}
