<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class InvoicesExport implements FromView
{
    private $invoice;
    public function __construct($invoice)
    {
        $this->invoice = $invoice;
    }

    /**
     * @return View
     */
    public function view(): View
    {
        return view('dashboard.templates.pdf.invoice', [
            'invoice' => $this->invoice,
        ]);
    }
}
