<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Services\Dashboard\InvoiceService;
use Throwable;

class SendInvoiceController extends Controller
{
    /**
     * SendInvoiceController constructor.
     * @param InvoiceService $invoiceService
     */
    public function __construct(private InvoiceService $invoiceService,) {
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function sendViaWhatsapp($id) {
        return $this->invoiceService->sendViaWhatsapp($id);
    }

    /**
     * @param $id
     * @return string
     */
    public function generateInvoicePdf($id) {
        try {
            return $this->invoiceService->generateInvoicePdf($id);
        } catch(Throwable $e) {
            info($e->getMessage());
            return $e->getMessage();
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function generateBillPdf($id) {
        try {
            return $this->invoiceService->generateBillPdf($id);
        } catch(Throwable $e) {
            info($e->getMessage());
            return $e->getMessage();
        }
    }
}
