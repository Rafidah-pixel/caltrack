<?php

namespace App\Helpers;

use App\Models\BmiReference;

class Anthropometry
{
    /**
     * Menghitung IMT
     */
    public static function bmi($weight, $height)
    {
        return round(
            $weight / pow($height / 100, 2),
            2
        );
    }

    /**
     * Menghitung Z-Score
     */
    public static function zScore($bmi, $reference)
    {
        if (!$reference) {
            return null;
        }

        $L = $reference->L;
        $M = $reference->M;
        $S = $reference->S;

        if ($L == 0) {
            return log($bmi / $M) / $S;
        }

        return ((pow($bmi / $M, $L)) - 1)
                / ($L * $S);
    }

    /**
     * Menentukan kategori
     */
    public static function category($zscore)
    {
        if ($zscore < -3)
            return "Gizi Buruk";

        if ($zscore < -2)
            return "Gizi Kurang";

        if ($zscore <= 1)
            return "Gizi Baik";

        if ($zscore <= 2)
            return "Gizi Lebih";

        return "Obesitas";
    }
}