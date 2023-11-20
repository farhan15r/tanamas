<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Session;
use Auth;
use DB;

class ReportController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        Session::put('menu', 'report');
        return view('dashboard.report');
    }

    public function export(Request $request)
    {
        $year = $request->get('year');
        $month = $request->get('month');

        $monthName = date('F', mktime(0, 0, 0, $month, 10));

        $likeQuert = $year . '-' . $month . '-%';

        $transactions = Transaction::with('product', 'user')->where('status_transaction', 'agree')
            ->where('transaction_date', 'LIKE', $likeQuert)->get();
        $pdf = PDF::loadView('pdf.report', compact('transactions', 'monthName', 'year'));
        return $pdf->download('report.pdf');
    }
}
