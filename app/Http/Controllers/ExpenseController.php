<?php

namespace App\Http\Controllers;

use App\Models\ExpenseReport;
use App\Models\Expense;

use Illuminate\Http\Request;

class Expensecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ExpenseReport $expenseReport)
    {
        // Retornamos vista create con expenseReport que se esta procesando
        return view('expense.create', [
            'report' =>  $expenseReport
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, ExpenseReport $expenseReport)
    {
        //
        $validarData = $request->validate([
            'description' => 'required|min:10',
            'amount' => 'required'
        ]);

        // Obtenemos enlace con el modelo Expense
        $expense = new Expense();

        // Recuperamos request del formulario Expense
        // $expense->description = $request->get('description');
        $expense->description = $validarData['description'];
        // $expense->amount = $request->get('amount');
        $expense->amount = $validarData['amount'];

        // Obtenos el expense Report obtenido desde la URL
        $expense->expense_report_id = $expenseReport->id;

        // Guardamos
        $expense->save();

        // Retornamos redirect
        return redirect('/expense_reports/' . $expenseReport->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
