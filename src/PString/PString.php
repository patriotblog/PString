<?php
namespace PString;
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2/1/19
 * Time: 12:57 PM
 */
class PString
{
    public static function Fa($string)
    {
        $EN = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
        $PN = array('۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹');
        return str_replace($EN, $PN, $string);
    }
    public static function En($string)
    {
        $EN = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
        $PN = array('۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹');
        return str_replace($PN, $EN, $string);
    }
    public static function FixPersian($text)
    {
        if (is_null($text))
            return null;

        $replacePairs = array(
            chr(0xD9) . chr(0xA0) => chr(0xDB) . chr(0xB0),
            chr(0xD9) . chr(0xA1) => chr(0xDB) . chr(0xB1),
            chr(0xD9) . chr(0xA2) => chr(0xDB) . chr(0xB2),
            chr(0xD9) . chr(0xA3) => chr(0xDB) . chr(0xB3),
            chr(0xD9) . chr(0xA4) => chr(0xDB) . chr(0xB4),
            chr(0xD9) . chr(0xA5) => chr(0xDB) . chr(0xB5),
            chr(0xD9) . chr(0xA6) => chr(0xDB) . chr(0xB6),
            chr(0xD9) . chr(0xA7) => chr(0xDB) . chr(0xB7),
            chr(0xD9) . chr(0xA8) => chr(0xDB) . chr(0xB8),
            chr(0xD9) . chr(0xA9) => chr(0xDB) . chr(0xB9),
            chr(0xD9) . chr(0x83) => chr(0xDA) . chr(0xA9),
            chr(0xD9) . chr(0x89) => chr(0xDB) . chr(0x8C),
            chr(0xD9) . chr(0x8A) => chr(0xDB) . chr(0x8C),
            chr(0xDB) . chr(0x80) => chr(0xD9) . chr(0x87) . chr(0xD9) . chr(0x94));

        return strtr($text, $replacePairs);
    }
    public static function Num2Fa($number){

        $bil = round(($number/1000000000));
        if($bil>0){
            return self::Fa($bil).' میلیارد';
        }

        $mil = round(($number/1000000));
        if($mil>0){
            return self::Fa($mil).' میلیون';
        }

        $thos = round(($number/1000));
        if($thos>0){
            return self::Fa($thos).' هزار';
        }

        return self::Fa($number);
    }
    public static function FaEgo($time_ago){
        return self::Fa(self::Ego($time_ago));
    }
    public static function Ego($time_ago){
        $cur_time = time();
        $time_elapsed = $cur_time - $time_ago;
        $seconds = $time_elapsed ;
        $minutes = round($time_elapsed / 60 );
        $hours = round($time_elapsed / 3600);
        $days = round($time_elapsed / 86400 );
        $weeks = round($time_elapsed / 604800);
        $months = round($time_elapsed / 2600640 );
        $years = round($time_elapsed / 31207680 );
        // Seconds
        if($seconds <= 60){
            return "$seconds ثانیه پیش";
        }
        //Minutes
        else if($minutes <=60){
            if($minutes==1){
                return "یک ماه پیش";
            }else{
                return "$minutes دقیقه پیش";
            }
        }
        //Hours
        else if($hours <=24){
            if($hours==1){
                return "یک ساعت پیش";
            }else{
                return "$hours ساعت پیش";
            }
        }
        //Days
        else if($days <= 7){
            if($days==1){
                return "دیروز";
            }else{
                return "$days روز پیش";
            }
        }
        //Weeks
        else if($weeks <= 4.3){
            if($weeks==1){
                return "یک هفته پیش";
            }else{
                return "$weeks هفته پیش";
            }
        }
        //Months
        else if($months <=12){
            if($months==1){
                return "یک ماه پیش";
            }else{
                return "$months ماه پیش";
            }
        }
        //Years
        else{
            if($years==1){
                return "یک سال پیش";
            }else{
                return "$years سال پیش";
            }
        }
    }
    public static function Random($len){
        $str = '';
        for($i=0; $i<$len; $i++)
            $str .= rand(0, 9);
        return $str;
    }
    public static function RandomString($len){
        $str = '';
        $list = 'abcdefghigklmnopqrstuvwxyz';
        for($i=0; $i<$len; $i++)
            $str .= $list[rand(0, strlen($list)-1)];
        return $str;
    }
}