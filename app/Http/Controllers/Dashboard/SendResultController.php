<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Services\Dashboard\ResultService;

class SendResultController extends Controller
{
    /**
     * SendResultController constructor.
     * @param ResultService $resultService
     */
    public function __construct(private ResultService $resultService,) {
    }

    /**
     *
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function sendViaWhatsapp($id) {
        return $this->resultService->sendViaWhatsapp($id);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendViaEmail($id) {
        return $this->resultService->sendViaEmail($id);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendViaWebNotification($id) {
        return $this->resultService->sendViaWebNotification($id);
    }
}
