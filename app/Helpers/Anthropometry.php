<?php

namespace App\Helpers;

class Anthropometry
{
    public static function bmi($weight,$height)
    {
        return round(

            $weight /

            pow($height/100,2),

            2

        );
    }

    public static function zScore($bmi,$L,$M,$S)
    {
        if($L==0){

            return log($bmi/$M)/$S;

        }

        return (

            pow(($bmi/$M),$L)-1

        )/($L*$S);
    }
}