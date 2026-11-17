<?php

namespace TexasRoyaltyBrokers\RoyaltyCalc;

/**
 * Simple helpers for estimating oil and gas royalty payments.
 * Texas Royalty Brokers: https://texasroyaltybrokers.com/
 */
class Royalty
{
    public static function decimalInterest(float $netMineralAcres, float $unitAcres, float $royaltyRate): float
    {
        if ($unitAcres <= 0) {
            return 0.0;
        }
        return $netMineralAcres / $unitAcres * $royaltyRate;
    }

    public static function monthlyPayment(float $grossValue, float $decimalInterest, float $deductions): float
    {
        $payment = $grossValue * $decimalInterest - $deductions;
        return $payment < 0 ? 0.0 : $payment;
    }
}
