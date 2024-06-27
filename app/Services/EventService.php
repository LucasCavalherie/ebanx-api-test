<?php

namespace App\Services;

use App\Repositories\AccountRepository;

class EventService
{
    protected $accountRepository;

    public function __construct(AccountRepository $accountRepository)
    {
        $this->accountRepository = $accountRepository;
    }

    public function deposit($destination, $amount)
    {
        $balance = $this->accountRepository->deposit($destination, $amount);
        return response()->json(['destination' => ['id' => $destination, 'balance' => $balance]], 201);
    }

    public function withdraw($origin, $amount)
    {
        $balance = $this->accountRepository->withdraw($origin, $amount);

        if ($balance === null) {
            return response('0', 404);
        }

        return response()->json(['origin' => ['id' => $origin, 'balance' => $balance]], 201);
    }

    public function transfer($origin, $amount, $destination)
    {
        $transfer = $this->accountRepository->transfer($origin, $amount, $destination);

        if ($transfer === null) {
            return response('0', 404);
        }

        return response()->json([
            'origin' => ['id' => $origin, 'balance' => $transfer['originBalance']],
            'destination' => ['id' => $destination, 'balance' => $transfer['destinationBalance']]
        ], 201);
    }
}