<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FunctionsController extends Controller
{
    public static function email_stars($email){

        $fill=4;  // minimum number of asterisks to inject

        $EmailBefore=strstr($email,'@',true);  // extract entire substring before @

        $EmailBeforeLength=strlen($EmailBefore);  // get number of username string

        // increase fill amount for more asterisks in str_repeat
        if($EmailBeforeLength>$fill+2){
            $fill=$EmailBeforeLength-2;
        }

        $starred = substr($EmailBefore,0,1).
            str_repeat("*",$fill).substr($EmailBefore,-1).
            strstr($email,'@');

        // 1st char-----------^^^ fill--------^^^^^^^^^ last char-----^^  ^^^^^^^^^^^^^^^^^-the rest of the original email string
        return "$starred\n";

    }

    public static function show_size($size){
        if (strlen($size) <= '6'){
            $ConvertedSize = number_format($size/1024,'2','.',''). 'Kb';
        }elseif ((strlen($size) == "7") || (strlen($size) == "8") || (strlen($size) == "9")){
            $ConvertedSize = number_format($size/1024/1024,'2','.',''). 'Mb';
        }elseif (strlen($size) >= '10'){
            //     $ConvertedSize = $size/1024/1024/1024 . 'Gb'; //=> 1.51548653154GB
            $ConvertedSize = number_format($size/1024/1024/1024,'2','.',''). 'Gb';
        }else {
            return $size;
        }
        return $ConvertedSize;
    }
}
