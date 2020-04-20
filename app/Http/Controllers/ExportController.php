<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Exports\InvoicesExport;
use App\Exports\InvoicesExportAll;
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

    public function exportAll()
    {
        return view('partials.__export_all');
    }

    public function XLS()
    {
        return (new InvoicesExportAll)->download('InvoicesPetFriends.xls');
    }


    public function CSV()
    {
        return (new InvoicesExportAll)->download('InvoicesPetFriends.csv', \Maatwebsite\Excel\Excel::CSV, [
            'Content-Type' => 'text/csv',
            'Content-disposition: attachment'
        ]);
    }

    public function TXT()
    {
        return (new InvoicesExportAll)->download('InvoicesPetFriends.txt', \Maatwebsite\Excel\Excel::TSV, [
            'Content-Type' => 'text/plain',
        ]);
    }

    public function invoiceReport()
    {
        return view('partials.__invoice_report');
    }

    public function filter(Request $request)
    {
        $since_date = $request->get('since_date');
        $until_date = $request->get('until_date');

        $invoices = Invoice::orderBy('id', 'ASC')
            ->export('created_at', $since_date, $until_date)
            ->paginate(10);

        return view('invoices.index', compact('invoices', 'since_date', 'until_date'));
    }

    public function downloadXLS($since_date, $until_date)
    {
        return (new InvoicesExport($since_date, $until_date))->download('ReportPetFriends.xls');
    }

    public function downloadCSV($since_date, $until_date)
    {
        return (new InvoicesExport($since_date, $until_date))->download('ReportPetFriends.csv', \Maatwebsite\Excel\Excel::CSV, [
            'Content-Type' => 'text/csv',
            'Content-disposition: attachment'
        ]);
    }

    public function downloadTXT($since_date, $until_date)
    {
        return (new InvoicesExport($since_date, $until_date))->download('ReportPetFriends.txt', \Maatwebsite\Excel\Excel::TSV, [
            'Content-Type' => 'text/plain',
        ]);
    }
}

