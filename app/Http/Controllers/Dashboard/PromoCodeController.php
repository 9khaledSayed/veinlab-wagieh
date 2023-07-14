<?php

namespace App\Http\Controllers\Dashboard;

use App\Enums\PromoCodeTypes;
use App\Http\Classes\PromoCode\PromoCodeFactory;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\PromoCode\{StoreRequest, UpdateRequest};
use App\Http\Services\Dashboard\{MainAnalysisService, PromoCodeService};
use App\Models\{Marketer, PromoCode};
use Illuminate\Http\Request;


class PromoCodeController extends Controller
{
    private PromoCodeService $promoCodeService;
    private PromoCodeFactory $promoCodeFactory;

    public function __construct(private MainAnalysisService $mainAnalysisService)
    {
        $this->promoCodeFactory = PromoCodeFactory::getInstance();
        $promoCodeClass = $this->promoCodeFactory->getPromoInstance(request()->type ?? 0);
        $this->promoCodeService = new PromoCodeService($promoCodeClass);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\JsonResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index(Request $request)
    {
        $this->authorize('view_promo_code');
        if ($request->ajax()) {
            return response()->json($this->promoCodeService->index());
        }
        return  view('dashboard.promo_code.index');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('create_promo_code');
        $partPathName = $this->promoCodeFactory->getValue();
        $marketers = Marketer::get();
        $mainAnalysis = $this->mainAnalysisService->getAll();
        return  view('dashboard.promo_code.create', compact('partPathName', 'marketers', 'mainAnalysis'));
    }

    /**
     * @param StoreRequest $request
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(StoreRequest $request)
    {
        $this->authorize('create_promo_code');
        $this->promoCodeService->store($request->validated());
    }

    /**
     * @param PromoCode $promoCode
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(PromoCode $promoCode)
    {
        $this->authorize('show_promo_code');
        return redirect()->back();
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit($id)
    {
        $this->authorize('update_promo_code');
        $promoCode = $this->promoCodeService->getModelById($id);
        if($promoCode->percentage) {
            $discount = $promoCode->percentage;
        } elseif ($promoCode->fixed_value) {
            $discount = $promoCode->fixed_value;
        }

        $marketers = Marketer::get();
        $mainAnalysis = $this->mainAnalysisService->getAll();
        return view('dashboard.promo_code.edit', compact('discount','promoCode', 'marketers', 'mainAnalysis'));
    }

    /**
     * @param UpdateRequest $request
     * @param PromoCode     $promoCode
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(UpdateRequest $request, PromoCode $promoCode)
    {
        $this->authorize('update_promo_code');
        $this->promoCodeService->update($request->validated(), $promoCode);
    }

    /**
     * @param Request   $request
     * @param PromoCode $promoCode
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(Request $request, PromoCode $promoCode)
    {
        $this->authorize('delete_promo_code');
        if($request->ajax())
        {
            $this->promoCodeService->delete($promoCode);
        }
    }

}
