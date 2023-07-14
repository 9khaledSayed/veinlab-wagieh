<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Invoice\StoreRequest;
use App\Http\Services\Dashboard\{DoctorServices, HospitalServices, InvoiceService, LaboratoryService, MainAnalysisService, PackageService, PatientService, SectorService};
use App\Models\{Invoice, PromoCode};
use Illuminate\Http\{JsonResponse, Request};
use Illuminate\Validation\ValidationException;


class InvoiceController extends Controller
{

    public function __construct(
        private MainAnalysisService $mainAnalysisService,
        private PackageService      $packageService,
        private SectorService       $sectorService,
        private DoctorServices      $doctorService,
        private HospitalServices    $hospitalService,
        private InvoiceService      $invoiceService,
        private PatientService      $patientService,
        private LaboratoryService   $laboratoryService,
    )
    {
        //
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|JsonResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index()
    {
        $this->authorize('view_invoices');
        if (request()->ajax()) {
            return response()->json($this->invoiceService->index());
        }
        return view('dashboard.invoice.index');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|JsonResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create(Request $request)
    {
        $this->authorize('create_invoices');
        if ($request->ajax()) {
            return $this->_responseCreateIfAjax($request);
        }
        $mainAnalyses  = $this->mainAnalysisService->getAllWithLaboratories();
        $packages      = $this->packageService->getAll();
        $sectors       = $this->sectorService->getAll();
        $doctors       = $this->doctorService->getAll();
        $laboratories  = $this->laboratoryService->getAll();
        $patients      = $this->patientService->getAll();
        $homeVisitFees = settings()->get('home_visit_fees');
        $startUseDWP   = settings()->get('start_approve_discount_with_point');
        return view('dashboard.invoice.create', compact('mainAnalyses',
            'packages', 'sectors', 'doctors', 'laboratories','patients', 'homeVisitFees', 'startUseDWP'));
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    private function _responseCreateIfAjax(Request $request): JsonResponse
    {
        if (isset($request->patient_id) && $request->patient_id) {
            //get patient info like (tax, points)
            return response()->json($this->invoiceService->getPatientInfo($request->patient_id));
        } else if (isset($request->laboratory_id) && $request->laboratory_id) {
            //refresh Main analysis
            return response()->json($this->invoiceService->getMainAnalyzeWithLaboratory($request->laboratory_id));
        } else if ($request->promo_code) {
            //refresh promo code
            return response()->json($this->getPromoCode($request->promo_code));
        } else
            return response()->json('Error in request', 500);
    }

    /**
     * @param $promoCode
     * @return mixed
     */
    public function getPromoCode($promoCode)
    {
        $promo_code = PromoCode::where('code', $promoCode)->first();
        if ($promo_code?->getIsValid()) {
            return $promo_code;
        } else {
            throw ValidationException::withMessages(['promo_code' => __('This code is not valid')]);
        }
    }

    /**
     * @param Request $request
     */
    public function refreshMainAnalyse(Request $request)
    {
        if (isset($request->hospitalId) && $request->hospitalId) {
            $this->invoiceService->getMainAnalyzeWithHospital($request->hospitalId);
        }
    }

    /**
     * @param StoreRequest $request
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(StoreRequest $request)
    {
        $this->authorize('create_invoices');
        $this->invoiceService->store($request->validated());
    }

    /**
     * @param Request $request
     * @param Invoice $invoice
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Request $request, Invoice $invoice)
    {
        $this->authorize('show_invoices');
        $purchases = unserialize($invoice->purchases);
        return view('dashboard.invoice.show', compact('invoice', 'purchases'));
    }

    /**
     * @param Invoice $invoice
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Invoice $invoice)
    {
        $this->authorize('update_invoices');
    }

    /**
     * @param Request $request
     * @param Invoice $invoice
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(Request $request, Invoice $invoice)
    {
        $this->authorize('update_invoices');
    }

    /**
     * @param Invoice $invoice
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(Invoice $invoice)
    {
        $this->authorize('delete_invoices');
    }
}
