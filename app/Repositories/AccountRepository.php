<?php

namespace App\Repositories;

use App\Models\Account;

class AccountRepository
{
    public function reset()
    {
        Account::truncate();
    }
    public function getBalance($accountId)
    {
        $account = Account::find($accountId);
        return $account ? $account->balance : null;
    }

    public function deposit($id, $amount)
    {
        $account = Account::where('account_id', $id)->first();

        if ($account) {
            $account->update(['balance' => $account->balance + $amount]);
        } else {
            $account = Account::create([
                'account_id' => $id,
                'balance' => $amount
            ]);
        }

        return $account->balance;
    }


    public function withdraw($id, $amount)
    {
        $account = Account::find($id);
        if (!$account || $account->balance < $amount) {
            return null;
        }

        $account->balance -= $amount;
        $account->save();

        return $account->balance;
    }

    public function transfer($id, $amount, $destinationId)
    {
        $originAccount = Account::find($id);
        $destinationAccount = Account::firstOrCreate(['account_id' => $destinationId]);

        if (!$originAccount || $originAccount->balance < $amount) {
            return null;
        }

        $originAccount->balance -= $amount;
        $originAccount->save();

        $destinationAccount->balance += $amount;
        $destinationAccount->save();

        return [
            'originBalance' => $originAccount->balance,
            'destinationBalance' => $destinationAccount->balance
        ];
    }
}