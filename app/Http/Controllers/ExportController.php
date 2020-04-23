<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Invoice;
use App\Payment;
use App\Product;
use App\Seller;
use App\State;
use App\User;
use DateTime;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use App\Exports\InvoicesExport;
use App\Exports\InvoicesExportAll;
use App\Jobs\NotifyUserOfCompletedExport;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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

        $pdf = PDF::loadView('invoices.invoice_download', $data,
            compact('invoice', 'invoices', 'states', 'sellers', 'customers', 'users', 'product'));

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
            'Content-Type' => 'text/plain'
        ]);
    }

    public function invoiceReport()
    {
        return view('partials.__invoice_report');
    }

    public function filter(Request $request)
    {
        $sinceDate = $request->get('sinceDate');
        $untilDate = $request->get('untilDate');

        $invoices = Invoice::orderBy('id', 'ASC')
            ->export('created_at', $sinceDate, $untilDate)
            ->paginate(10);

        return view('invoices.index', compact('invoices', 'sinceDate', 'untilDate'));
    }

    public function downloadXLS($sinceDate, $untilDate)
    {
        $date = new DateTime();
        $date = $date->format('Y-m-d H-i-s');
        $extension = 'xls';
        $file = 'public/XLS Reports/'. 'ReportPetFriends' .$date. '.' .$extension;
        $user = Auth::user();

        (new InvoicesExport($sinceDate, $untilDate))->store($file)->chain([
            new NotifyUserOfCompletedExport($user, $sinceDate, $untilDate, $file)
        ]);

        return back()->with('info', 'XLS file export in process');
    }

    public function downloadCSV($sinceDate, $untilDate)
    {
        $date = new DateTime();
        $date = $date->format('Y-m-d H-i-s');
        $extension = 'csv';
        $file = 'public/CSV Reports/'. 'ReportPetFriends' .$date. '.' .$extension;
        $user = Auth::user();

        (new InvoicesExport($sinceDate, $untilDate))->store($file)->chain([
            (new NotifyUserOfCompletedExport($user, $sinceDate, $untilDate, $file))
        ]);
        return back()->with('info', 'CSV file export in process');
    }

    public function downloadTXT($sinceDate, $untilDate)
    {
        $date = new DateTime();
        $date = $date->format('Y-m-d H-i-s');
        $extension = 'tsv';
        $file = 'public/TXT Reports/'. 'ReportPetFriends' .$date. '.' .$extension;
        $user = Auth::user();

        (new InvoicesExport($sinceDate, $untilDate))->store($file)->chain([
            (new NotifyUserOfCompletedExport($user, $sinceDate, $untilDate, $file))
        ]);
        return back()->with('info', 'TSV file export in process');
    }

    public function exportNotifications()
    {
        $user = Auth::user();
        return view('exports.notifications', compact('user'));
    }
}

