<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Games;
use App\Numbers;

class BingoController extends Controller
{
    function save_data(){
        $id_game=3;
        // $model_game = new Games();
        $model_number = new Numbers();
        $array_numbersXgame=Numbers::where('game_id',$id_game)->get();
        if($array_numbersXgame==null){
            $id_game=$this->crear_juego();
        }
        $numero_azar= $this->numero_azar($array_numbersXgame);
        $model_number->game_id=$id_game;
        $model_number->number=$numero_azar;
        $model_number->save();
        $letra="";
        if($numero_azar>0 && $numero_azar <=15){
            $letra="B";
        }elseif($numero_azar>15 && $numero_azar <=30){
            $letra="I";
        }elseif($numero_azar>30 && $numero_azar <=45){
            $letra="N";
        }elseif($numero_azar>45 && $numero_azar <=60){
            $letra="G";
        }elseif($numero_azar>60 && $numero_azar <=75){
            $letra="O";
        }  
        $respuesta["letra"]=$letra;
        $respuesta["numero"]=$numero_azar;
        return $respuesta;
    }
    function crear_juego(){
        $model= new Games();
        $model->save();
        return $model->id;
    }
    function numero_azar($array_numbersXgame){
        $min=1;
        $max=75;
        $send=true;
        $numero_azar=rand($min , $max );
        if($array_numbersXgame==null){
            return $numero_azar;
        }
        foreach ($array_numbersXgame as $numbers_in_game) {
            if($numbers_in_game->number==$numero_azar){
                $this->numero_azar($array_numbersXgame);
            }
        }
        return $numero_azar;
    }
}
