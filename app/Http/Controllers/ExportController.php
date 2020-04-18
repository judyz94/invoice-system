<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Exports\InvoicesExport;
use App\Invoice;
use App\Payment;
use App\Product;
use App\Seller;
use App\State;
use App\User;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function downloadPDF(Invoice $invoice, Product $product )
    {
        $invoices = Invoice::all();
        $states = State::all();
        $customers = Customer::all();
        $sellers = Seller::all();
        $users = User::all();

        $data = [
            'title' => 'InvoicePetFriends'
        ];

        $pdf = PDF::loadView('invoices.invoice_download', $data, compact('invoice', 'invoices', 'states', 'sellers', 'customers', 'users', 'product'));

        return $pdf->download('InvoicePetFriends.pdf');
    }

    public function downloadPaymentPDF(Invoice $invoice)
    {
        $payments = Payment::all();

        $data = [
            'title' => 'PaymentAttemptsPetFriends'
        ];

        $pdf = PDF::loadView('payments.payment_download', $data, compact('invoice', 'payments'));
        $pdf->setPaper('a4', 'landscape');

        return $pdf->download('PaymentAttemptsPetFriends.pdf');
    }

    public function invoiceReport(Request $request)
    {
        $filter = $request->input('filter');
        $search = $request->input('search');

        $invoices = Invoice::with(['customer', 'seller'])
            ->searchfor($filter, $search);

        return view('partials.__invoice_report', compact( 'invoices', 'filter', 'search'));
    }

    public function downloadXLS()
    {
        return Excel::download(new InvoicesExport, 'ReportPetFriends.xls');
    }

    public function downloadCSV()
    {
        return (new InvoicesExport)->download('ReportPetFriends.csv', \Maatwebsite\Excel\Excel::CSV, [
            'Content-Type' => 'text/csv',
            'Content-disposition: attachment'
        ]);
    }

    public function downloadTSV()
    {
        return (new InvoicesExport)->download('ReportPetFriends.txt', \Maatwebsite\Excel\Excel::TSV, [
            'Content-Type' => 'text/plain',
        ]);
    }
}

