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
    public function downloadPDF(Invoice $invoice, Product $product)
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

    public function downloadXLS()
    {
        return (new InvoicesExportAll)->download('InvoicesPetFriends.xls');
    }


    public function downloadCSV()
    {
        return (new InvoicesExportAll)->download('InvoicesPetFriends.csv', \Maatwebsite\Excel\Excel::CSV, [
            'Content-Type' => 'text/csv',
            'Content-disposition: attachment'
        ]);
    }

    public function downloadTXT()
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
        $type = $request->input('type');
        $sinceDate = $request->input('sinceDate');
        $untilDate = $request->input('untilDate');

        $invoices = Invoice::orderBy('id', 'ASC')
            ->export($type, $sinceDate, $untilDate)
            ->paginate(10);

        return view('invoices.index', compact('invoices', 'type', 'sinceDate', 'untilDate'));
    }

    public function exportReport($type, $sinceDate, $untilDate, $extension)
    {
        $date = new DateTime();
        $date = $date->format('Y-m-d H-i-s');
        $path = 'public/Reports/';
        $file = $path.'ReportPetFriends' .$date. '.' .$extension;
        $url = asset('storage/' . $file);
        $user = Auth::user();

        (new InvoicesExport($type, $sinceDate, $untilDate, $extension))->store($file, 'public')->chain([
            new NotifyUserOfCompletedExport($user, $type, $sinceDate, $untilDate, $extension, $url)
        ]);

        return back()->with('info', 'File export in process.');
    }

    public function exportNotifications()
    {
        $user = Auth::user();
        $user->unreadNotifications->markAsRead();

        foreach ($user->unreadNotifications as $notification) {
            $notification->type;
        }

        return view('exports.notifications', compact('user'));
    }

    public function downloadFile($file)
    {
        return Storage::download($file);
    }

    public function index()
    {
        $user = Auth::user();

        foreach ($user->notifications as $notification) {
            $notification->type;
        }

        return view('exports.index', compact('user'));
    }

    public function destroy($id)
    {
        foreach (Auth::user()->notifications as $notification) {
            if ($notification->id == $id) {
                $notification->delete();
                return redirect()->route('report.index')->with('info', 'Report successfully deleted.');
            }
        }
    }
}


