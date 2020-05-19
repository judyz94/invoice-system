<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Exports\InvoicesExportAll;
use App\Invoice;
use App\Payment;
use App\Product;
use App\Seller;
use App\State;
use App\User;
use Barryvdh\DomPDF\Facade as PDF;

class DownloadController extends Controller
{
    public function downloadInvoicePDF(Invoice $invoice, Product $product)
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
}

