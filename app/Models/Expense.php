<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ExpenseReport;

class Expense extends Model
{
    use HasFactory;

    // Relación expenses Pertenece a un ExpendReport
    public function expenseReport() {
        return $this->belongsTo(ExpenseReport::class);
    }
}
