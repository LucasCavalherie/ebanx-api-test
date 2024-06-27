<?php

namespace App\Http\Controllers;

use App\Services\AccountService;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AccountController extends Controller
{
    protected AccountService $accountService;

    public function __construct(AccountService $accountService)
    {
        $this->accountService = $accountService;
    }

    public function reset(): Application|Response|\Illuminate\Contracts\Foundation\Application|ResponseFactory
    {
        $this->accountService->reset();
        return response('OK', 200);
    }

    public function getBalance(Request $request): Application|Response|\Illuminate\Contracts\Foundation\Application|ResponseFactory
    {
        $accountId = $request->query('account_id');
        $balance = $this->accountService->getBalance($accountId);

        if ($balance === null) {
            return response('0', 404);
        }

        return response($balance, 200);
    }
}