<?php

namespace App\Helpers;

class NutritionStatus
{
    public static function category($age,$zscore,$bmi)
    {

        if($age<=19){

            if($zscore<-3){

                return [
                    'status'=>'Gizi Buruk',
                    'color'=>'text-red-600'
                ];

            }

            if($zscore<-2){

                return [
                    'status'=>'Gizi Kurang',
                    'color'=>'text-orange-500'
                ];

            }

            if($zscore<=1){

                return [
                    'status'=>'Gizi Baik',
                    'color'=>'text-green-600'
                ];

            }

            if($zscore<=2){

                return [
                    'status'=>'Gizi Lebih',
                    'color'=>'text-yellow-500'
                ];

            }

            return [

                'status'=>'Obesitas',

                'color'=>'text-red-600'

            ];

        }

        if($bmi<18.5){

            return [

                'status'=>'Gizi Kurang',

                'color'=>'text-red-500'

            ];

        }

        if($bmi<25){

            return [

                'status'=>'Gizi Baik',

                'color'=>'text-green-500'

            ];

        }

        if($bmi<30){

            return [

                'status'=>'Gizi Lebih',

                'color'=>'text-yellow-500'

            ];

        }

        return [

            'status'=>'Obesitas',

            'color'=>'text-red-600'

        ];

    }
}