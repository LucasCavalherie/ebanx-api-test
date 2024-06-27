<?php

namespace App\Services;

use App\Repositories\AccountRepository;

class AccountService
{
    protected AccountRepository $accountRepository;

    public function __construct(AccountRepository $accountRepository)
    {
        $this->accountRepository = $accountRepository;
    }

    public function reset()
    {
        $this->accountRepository->reset();
    }

    public function getBalance($accountId)
    {
        return $this->accountRepository->getBalance($accountId);
    }
}