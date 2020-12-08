<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Expense;
use DB;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expense=Expense::orderBy('id','DESC')->get();
        return response()->json($expense);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $validatedData = $request->validate([
         'details' => 'required|max:255',
         'amount'=> 'required'
        ]);

           $expense = new Expense;
           $expense->details = $request->details;
           $expense->amount = $request->amount;
           $expense->expense_date = date('d/m/Y');
           $expense->expense_month = date('F');
           $expense->save();
    }
    
    public function thismonthexpense(){
        $this_month = date('F');
        $month_expense = DB::table('expenses')->where('expense_month',$this_month)->get();
        return response()->json($month_expense);
    }

    public function getmonth(){
        $this_month = date('F');
        return response()->json($this_month);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $expense=Expense::findorfail($id);
         return response()->json($expense);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $validatedData = $request->validate([
         'details' => 'required|max:255',
         'amount'=> 'required'
        ]);

        $data=array();
        $data['details']=$request->details;
        $data['amount']=$request->amount;
        DB::table('expenses')->where('id',$id)->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('expenses')->where('id',$id)->delete();
    }
}
