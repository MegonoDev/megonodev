<?php

namespace App\Repositories;
use App\Models\Transaksi;
class Invoice
{
    public static function getInvoice($code)
    {
        $latestInvoice      = Transaksi::latest('created_at')->first();
        if ($latestInvoice != null) {
            $explodeInvoice = explode($code, $latestInvoice->invoice);
            $invoicePlus    = $explodeInvoice[1] + 1;
            return $code . $invoicePlus;
        } else {
            return $code.'01';
        }
    }
}
