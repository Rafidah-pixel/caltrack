<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\FoodLog;
use App\Models\UserProfile;
use App\Models\BmiReference;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        /*
        |--------------------------------------------------------------------------
        | Ambil Profil Pengguna
        |--------------------------------------------------------------------------
        */

        $profile = UserProfile::where(
            'user_id',
            Auth::id()
        )->first();

        /*
        |--------------------------------------------------------------------------
        | Riwayat Konsumsi Hari Ini
        |--------------------------------------------------------------------------
        */

        $logs = FoodLog::with('food')
            ->where('user_id', Auth::id())
            ->whereDate('consumed_at', today())
            ->get();

        /*
        |--------------------------------------------------------------------------
        | Total Asupan Hari Ini
        |--------------------------------------------------------------------------
        */

        $totalCalories = $logs->sum(function ($log) {
            return $log->food->calories * $log->quantity;
        });

        $totalProtein = $logs->sum(function ($log) {
            return $log->food->protein * $log->quantity;
        });

        $totalCarbs = $logs->sum(function ($log) {
            return $log->food->carbs * $log->quantity;
        });

        $totalFat = $logs->sum(function ($log) {
            return $log->food->fat * $log->quantity;
        });

        /*
        |--------------------------------------------------------------------------
        | Perhitungan BMR & TEE
        |--------------------------------------------------------------------------
        */

        $bmr = 0;
        $tee = 0;

        if ($profile) {

            if ($profile->gender == 'male') {

                $bmr =
                    (10 * $profile->weight) +
                    (6.25 * $profile->height) -
                    (5 * $profile->age) +
                    5;

            } else {

                $bmr =
                    (10 * $profile->weight) +
                    (6.25 * $profile->height) -
                    (5 * $profile->age) -
                    161;

            }

            $activityFactor = [

                'sedentary'   => 1.2,
                'light'       => 1.375,
                'moderate'    => 1.55,
                'active'      => 1.725,
                'very_active' => 1.9,

            ];

            $factor = $activityFactor[$profile->activity_level] ?? 1.2;

            $tee = round($bmr * $factor);

        }

        /*
        |--------------------------------------------------------------------------
        | Status Gizi WHO (IMT/U Remaja 10–19 Tahun)
        |--------------------------------------------------------------------------
        */

        $imt = 0;
        $zscore = 0;

        $statusGizi = "-";
        $statusColor = "text-gray-500";
        $edukasi = "";

        if ($profile && $profile->height > 0) {

            $tinggiMeter = $profile->height / 100;

            $imt = round(
                $profile->weight /
                ($tinggiMeter * $tinggiMeter),
                2
            );

            // konversi umur menjadi bulan
            $ageMonth = $profile->age * 12;

            // konversi gender database
            $gender = $profile->gender == 'male'
                ? 'Laki-laki'
                : 'Perempuan';

            $reference = BmiReference::where(
                    'gender',
                    $gender
                )
                ->where(
                    'age_month',
                    $ageMonth
                )
                ->first();

            if ($reference) {

                /*
                |---------------------------------------
                | Hitung Z-Score WHO
                |---------------------------------------
                */

                $zscore = round(

                    ($imt - $reference->median)

                    /

                    (
                        ($reference->plus1 - $reference->median)
                    ),

                    2

                );

                /*
                |---------------------------------------
                | Klasifikasi WHO
                |---------------------------------------
                */

                if ($imt < $reference->minus3) {

                    $statusGizi = "Gizi Buruk";
                    $statusColor = "text-red-700";

                    $edukasi =
                        "Status gizi termasuk Gizi Buruk menurut WHO. Tingkatkan asupan energi, protein, vitamin, mineral dan segera lakukan konsultasi dengan tenaga kesehatan.";

                }

                elseif ($imt < $reference->minus2) {

                    $statusGizi = "Gizi Kurang";
                    $statusColor = "text-orange-500";

                    $edukasi =
                        "Status gizi berada di bawah standar WHO. Perbanyak konsumsi makanan bergizi seimbang terutama protein hewani, nabati dan sumber energi.";

                }

                elseif ($imt <= $reference->plus1) {

                    $statusGizi = "Normal";
                    $statusColor = "text-green-600";

                    $edukasi =
                        "Status gizi berada pada kategori Normal sesuai WHO. Pertahankan pola makan sehat, aktivitas fisik dan tidur yang cukup.";

                }

                elseif ($imt <= $reference->plus2) {

                    $statusGizi = "Gizi Lebih";
                    $statusColor = "text-yellow-500";

                    $edukasi =
                        "Status gizi termasuk Gizi Lebih. Kurangi makanan tinggi gula, garam dan lemak serta tingkatkan aktivitas fisik.";

                }

                else {

                    $statusGizi = "Obesitas";
                    $statusColor = "text-red-600";

                    $edukasi =
                        "Status gizi termasuk Obesitas menurut WHO. Terapkan pola makan sehat, olahraga teratur dan konsultasikan dengan tenaga kesehatan.";

                }

            } else {

                $statusGizi = "Data Tidak Tersedia";
                $statusColor = "text-gray-500";

                $edukasi =
                    "Data antropometri WHO untuk umur tersebut belum tersedia.";

            }

        }

        /*
        |--------------------------------------------------------------------------
        | AKG Remaja (10–19 Tahun)
        |--------------------------------------------------------------------------
        */

        $targetCalories = 2100;

        if ($profile) {

            if ($profile->gender == 'male') {

                if ($profile->age >= 10 && $profile->age <= 12) {

                    $targetCalories = 2000;

                } elseif ($profile->age >= 13 && $profile->age <= 15) {

                    $targetCalories = 2400;

                } elseif ($profile->age >= 16 && $profile->age <= 19) {

                    $targetCalories = 2650;

                }

            } else {

                if ($profile->age >= 10 && $profile->age <= 12) {

                    $targetCalories = 1900;

                } elseif ($profile->age >= 13 && $profile->age <= 15) {

                    $targetCalories = 2050;

                } elseif ($profile->age >= 16 && $profile->age <= 19) {

                    $targetCalories = 2100;

                }

            }

        }

        /*
        |--------------------------------------------------------------------------
        | Target Makronutrien
        |--------------------------------------------------------------------------
        */

        $targetProtein = round(($targetCalories * 0.15) / 4);

        $targetCarbs = round(($targetCalories * 0.60) / 4);

        $targetFat = round(($targetCalories * 0.25) / 9);

        /*
        |--------------------------------------------------------------------------
        | Progress Harian
        |--------------------------------------------------------------------------
        */

        $caloriePercent = min(
            round(($totalCalories / max($targetCalories, 1)) * 100),
            100
        );

        $proteinPercent = min(
            round(($totalProtein / max($targetProtein, 1)) * 100),
            100
        );

        $carbsPercent = min(
            round(($totalCarbs / max($targetCarbs, 1)) * 100),
            100
        );

        $fatPercent = min(
            round(($totalFat / max($targetFat, 1)) * 100),
            100
        );

        /*
        |--------------------------------------------------------------------------
        | Edukasi & Rekomendasi Makanan
        |--------------------------------------------------------------------------
        */

        $message = null;
        $recommendations = [];

        if ($logs->count() > 0) {

            $proteinDeficit = max(
                $targetProtein - $totalProtein,
                0
            );

            $carbsDeficit = max(
                $targetCarbs - $totalCarbs,
                0
            );

            $fatDeficit = max(
                $targetFat - $totalFat,
                0
            );

            $maxDeficit = max(
                $proteinDeficit,
                $carbsDeficit,
                $fatDeficit
            );

            if ($maxDeficit == 0) {

                $message =
                    "Kebutuhan gizi harian sudah terpenuhi dengan baik. Pertahankan pola makan sehat dan aktivitas fisik secara rutin.";

            } elseif ($maxDeficit == $proteinDeficit) {

                $message =
                    "Asupan protein Anda masih kurang sekitar "
                    . round($proteinDeficit)
                    . " gram hari ini.";

                $recommendations = Food::orderByDesc('protein')
                    ->take(5)
                    ->pluck('name')
                    ->toArray();

            } elseif ($maxDeficit == $carbsDeficit) {

                $message =
                    "Asupan karbohidrat Anda masih kurang sekitar "
                    . round($carbsDeficit)
                    . " gram hari ini.";

                $recommendations = Food::orderByDesc('carbs')
                    ->take(5)
                    ->pluck('name')
                    ->toArray();

            } else {

                $message =
                    "Asupan lemak Anda masih kurang sekitar "
                    . round($fatDeficit)
                    . " gram hari ini.";

                $recommendations = Food::orderByDesc('fat')
                    ->take(5)
                    ->pluck('name')
                    ->toArray();

            }

        } else {

            $message =
                "Belum ada data konsumsi makanan hari ini. Mulailah mencatat makanan agar kebutuhan gizi dapat dipantau.";

        }

        /*
        |--------------------------------------------------------------------------
        | Kirim Data ke Dashboard
        |--------------------------------------------------------------------------
        */

        return view('dashboard', compact(

            'logs',
            'profile',

            'bmr',
            'tee',

            'imt',
            'zscore',

            'statusGizi',
            'statusColor',
            'edukasi',

            'totalCalories',
            'totalProtein',
            'totalCarbs',
            'totalFat',

            'targetCalories',
            'targetProtein',
            'targetCarbs',
            'targetFat',

            'caloriePercent',
            'proteinPercent',
            'carbsPercent',
            'fatPercent',

            'message',
            'recommendations'

        ));

    }

}
