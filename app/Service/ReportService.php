<?php

namespace App\Service;

class ReportService
{
    public function getReport($transactions)
    {
        $report = [];
        $total = 0;
        foreach ($transactions as $transaction) {
            $total += $transaction->amount;
            $report[] = [
                'id' => $transaction->id,
                'type' => $transaction->type,
                'amount' => $transaction->amount,
                'total' => $total
            ];
        }
        return $report;
    }
}
