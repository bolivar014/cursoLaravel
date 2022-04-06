@extends('layouts.base')
    @section('content')
        <div class="content">
            <div class="row">
                <div class="col">
                    <h1>Reports</h1>
                    <table class="table">
                        @foreach ($expenseReports as $expenseReport)
                            <tr>
                                <td>{{ $expenseReport->updated_at }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    @endsection
