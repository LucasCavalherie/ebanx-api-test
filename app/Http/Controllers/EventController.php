<?php

namespace App\Http\Controllers;

use App\Services\EventService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\ResponseFactory;

class EventController extends Controller
{
    protected $eventService;

    public function __construct(EventService $eventService)
    {
        $this->eventService = $eventService;
    }

    public function handleEvent(Request $request): Response|JsonResponse|ResponseFactory|null
    {
        $type = $request->input('type');
        $response = null;

        switch ($type) {
            case 'deposit':
                $response = $this->eventService->deposit(
                    $request->input('destination'),
                    $request->input('amount')
                );
                break;
            case 'withdraw':
                $response = $this->eventService->withdraw(
                    $request->input('origin'),
                    $request->input('amount')
                );
                break;
            case 'transfer':
                $response = $this->eventService->transfer(
                    $request->input('origin'),
                    $request->input('amount'),
                    $request->input('destination')
                );
                break;
        }

        return $response;
    }
}