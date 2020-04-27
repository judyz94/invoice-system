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
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ExportController extends Controller
{
    public function exportAll()
    {
        return view('partials.__export_all');
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
        $name = 'ReportPetFriends' . '.' . $extension;
        $file = $path . 'ReportPetFriends-' . $date . '.' . $extension;
        $url = asset('storage/' . $file);
        $user = Auth::user();

        (new InvoicesExport($type, $sinceDate, $untilDate, $extension))->store($file, 'public')->chain([
            new NotifyUserOfCompletedExport($user, $type, $sinceDate, $untilDate, $extension, $name, $url)
        ]);

        return back()->with('info', 'File export in process.');
    }

    public function index()
    {
        $user = Auth::user();
        foreach ($user->unreadNotifications as $notification) {
            $notification->markAsRead();
        }

        return view('exports.index', compact('user'));
    }

    public function downloadFile()
    {
        foreach (Auth::user()->notifications as $notification) {
            $notification = $notification->data['url'];
            return Storage::download($notification);
        }
    }

    public function destroy($id)
    {
        foreach (Auth::user()->notifications as $notification) {
            if ($notification->id == $id) {
                $notification->delete();
                return redirect()->route('reports.index')->with('info', 'Report successfully deleted.');
            }
        }
    }
}


