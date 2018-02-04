<?php

class AI
{
    public static function process($text)
    {
        $result = [
            'gender' => self::getGender($text),
            'sentiment' => self::getSentiment($text),
            'rude_words' => self::getRudeWords($text),
            'languages' => self::getLanguages($text),
        ];
        return $result;
    }

    /**
     * @return string 'Male' or 'Female' or 'Unknown'
     */
    public static function getGender($text)
    {
        $male = ["ผม","ข๊าพเจ้า","ครับ","นาย"];
        $female = ["ค่ะ","หนู","นาง","ทอม"];

        for($i = 0 ; $i <sizeof($male); $i++){
            if (stripos($text,$male[$i]) !== false){
                return 'Male';
            }
        }

        for($i = 0 ; $i <sizeof($female); $i++){
            if (stripos($text,$female[$i]) !== false){
                return 'Female';
            }
        }
        return 'Unknown';
    }

    /**
     * @return string 'Positive' or 'Neutral' or 'Negative'
     */
    public static function getSentiment($text)
    {
        $happy = ["ดี","เก่ง","มีความสุข"];
        $normal = ["คุณ","ท่าน","กิน"];
        $unhappy = ["เหม็น","แย่","ไม่"];

        for($i = 0 ; $i <sizeof($happy); $i++){
            if (stripos($text,$happy[$i]) !== false){
                return 'Positive';
            }
        }

        for($i = 0 ; $i <sizeof($normal); $i++){
            if (stripos($text,$normal[$i]) !== false){
                return 'Neutral';
            }
        }
        for($i = 0 ; $i <sizeof($unhappy); $i++){
            if (stripos($text,$unhappy[$i]) !== false){
                return 'Negative';
            }
        }
    }

    /**
     * @return array of all rude words in Thai
     */
    public static function getRudeWords($text)
    {
        $not = ['เลว','อีบ้า','ควย','kuy','หำ','ใจร้าย'];
        $arry = [];
        for($i = 0 ; $i <sizeof($not); $i++){
            if (stripos($text,$not[$i]) !== false){
                array_push($arry,$not[$i]);
            }
        }
        return $arry;
    }

    /**
     * @return array of languages (TH, EN)
     */
    public static function getLanguages($text)
    {
        $language = [];
        if(preg_replace('/[^ก-๙]/ u','',$text)!=""){
            array_push($language,"TH");
        } 
        if(preg_replace('/[^a-z]/ u','',$text)!=""){
            array_push($language,"EN");
        }
        return $language;
    }
}