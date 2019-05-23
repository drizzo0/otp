<?php

/**
 * Class OTP
 */
class OTP{

    /**
     * returns a modified epoch variable
     * @return string
     */
    function getTime10sec(){
        $modifiedLast2=0;
        $time = microtime(false);
        $time = explode(" ", $time);
        $time = $time[1];
        $epochLength = strlen($time);
        $last2=$epochLength-2;
        $allTime=substr($time,0,$last2);
        $last2 = substr($time,$last2);
        if($last2>=0&&$last2<=10){
            $modifiedLast2="01";
        }elseif($last2>=11&&$last2<=20){
            $modifiedLast2=11;
        }elseif($last2>=21&&$last2<=30){
            $modifiedLast2=21;
        }elseif($last2>=31&&$last2<=40){
            $modifiedLast2=31;
        }elseif($last2>=41&&$last2<=50){
            $modifiedLast2=41;
        }elseif($last2>=51&&$last2<=60){
            $modifiedLast2=51;
        }elseif($last2>=61&&$last2<=70){
            $modifiedLast2=61;
        }elseif($last2>=71&&$last2<=80){
            $modifiedLast2=71;
        }elseif($last2>=81&&$last2<=90){
            $modifiedLast2=81;
        }elseif($last2>=91&&$last2<=100){
            $modifiedLast2=91;
        }
        $modifiedTime=$allTime.$modifiedLast2;
        return $modifiedTime;
    }

    /**
     * returns a modified epoch variable
     * @return string
     */
    function getTime20sec(){
        $modifiedLast2=0;
        $time = microtime(false);
        $time = explode(" ", $time);
        $time = $time[1];
        $epochLength = strlen($time);
        $last2=$epochLength-2;
        $allTime=substr($time,0,$last2);
        $last2 = substr($time,$last2);
        if($last2>=0&&$last2<=20){
            $modifiedLast2="01";
        }elseif($last2>=21&&$last2<=40){
            $modifiedLast2=21;
        }elseif($last2>=41&&$last2<=60){
            $modifiedLast2=41;
        }elseif($last2>=61&&$last2<=80){
            $modifiedLast2=61;
        }elseif($last2>=81&&$last2<=100){
            $modifiedLast2=81;
        }
        $modifiedTime=$allTime.$modifiedLast2;
        return $modifiedTime;
    }

    /**
     * passing the key it will return a 6 digits OTP code
     * @param $key
     * @return bool|string
     */
    function getOTP($key){
        $time=$this->getTime10sec();
        $method = "AES-256-CFB8";
        $iv=2707201820180727;
        $oneTime = openssl_encrypt($time,$method,$key,0, $iv);
        $hex = $this->strToHex($oneTime);
        $dec = hexdec($hex);
        $dec = $dec / 100000000000000000000000000000000;
        $dec = $dec * $time;
        $dec = (int)$dec;
        $decLength=strlen($dec);
        $decLengthMinusSix=$decLength-6;
        $decLastSix = substr($dec,$decLengthMinusSix);
        return $decLastSix;
    }

    /**
     * giving a string it will returns an hex
     * @param $string
     * @return string
     */
    function strToHex($string){
        $hex = '';
        for ($i=0; $i<strlen($string); $i++){
            $ord = ord($string[$i]);
            $hexCode = dechex($ord);
            $hex .= substr('0'.$hexCode, -2);
        }
        return strToUpper($hex);
    }

}