<?php

namespace App\Http\Controllers;
//

use App\Models\ExpenseReport;
use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SummaryReport;

class ExpenseReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('expenseReport.index', [
            'expenseReports' => ExpenseReport::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('expenseReport.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validación de inputs
        $validarData = $request->validate([
            'title' => 'required|min:3|max:10'
        ]);

        // Instancio conexión al modelo
        $report = new ExpenseReport();

        // Recupero el title desde el formulario
        $report->title = $validarData['title'];

        // Guardo cambios
        $report->save();

        // Redireccionamos
        return redirect('/expense_reports');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ExpenseReport $expenseReport)
    {
        // Model binding - Antes de la extracción ejecuta
        return view('expenseReport.show', [
            'report' => $expenseReport
        ]);

        // return view('expenseReport.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Buscamos reporte a actualizar
        $report = ExpenseReport::findOrFail($id);

        // Retornamos vista editar reporte con el reporte a editar
        return view('expenseReport.edit', [
            'report' => $report
        ]);
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
        // Validación de Input
        $validarData = $request->validate([
            'title' => 'required|min:3|max:10'
        ]);

        // Buscamos el reporte a editar
        $report = ExpenseReport::findOrFail($id);

        // obtenemos el title del request enviado
        $report->title = $validarData['title'];

        // Ejecutamos guardar actualización
        $report->save();

        // Redireccionamos
        return redirect('/expense_reports');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Buscamos el reporte a editar
        $report = ExpenseReport::findOrFail($id);

        // Ejecutamos guardar actualización
        $report->delete();

        // Redireccionamos
        return redirect('/expense_reports');
    }

    // Función para la confirmación de eliminación del reporte
    public function confirmDelete($id) {
        // dd($id);
        $report = ExpenseReport::findOrFail($id);

        // Retornar via de confirmación de eliminación
        return view('expenseReport.confirmDelete', [
            'report' => $report
        ]);
    }

    // Función para el envio de email
    public function confirmSendMail($id) {
        // Consultamos datos del reporte
        $report = ExpenseReport::find($id);

        // Retornamos la vista con el reporte
        return view('expenseReport.confirmSendMail', [
            'report' => $report
        ]);
    }

    // función para enviar correo
    public function sendMail(Request $request, $id) {
        // Consultamos datos del reporte
        $report = ExpenseReport::find($id);

        // Ejecutamos envio del email con la vista a procesar....
        Mail::to($request->get('email'))->send(new SummaryReport($report));

        // Retornamos vista
        return redirect('/expense_reports/' . $id);
    }
}
