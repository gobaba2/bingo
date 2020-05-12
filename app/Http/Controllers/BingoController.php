<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BingoController extends Controller
{
    function numero_azar(){
        $min=1;
        $max=75;
        $number=rand ($min , $max );
        $letra="";
        if($number>0 && $number <=15){
            $letra="B";
        }elseif($number>15 && $number <=30){
            $letra="I";
        }elseif($number>30 && $number <=45){
            $letra="N";
        }elseif($number>45 && $number <=60){
            $letra="G";
        }elseif($number>60 && $number <=75){
            $letra="O";
        }  
        $respuesta["letra"]=$letra;
        $respuesta["numero"]=$number;
        return $respuesta;
    }
}
