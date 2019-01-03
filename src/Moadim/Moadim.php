<?php

namespace Zman\Moadim;

trait Moadim
{
    use Yuntif;
    use FastDays;
    use Holidays;
    use CholHamoed;
    use RoshChodesh;
    use AseresYimeiTeshuva;
    
    public static $holidays = [
        "Rosh Hashana"         => "ראש השנה",
        "Yom Kippur"           => "יום כיפור",
        "Sukkos"               => "סוכות",
        "Shmini Atzeres"       => "שמיני עצרת",
        "Simchas Torah"        => "שמחת תורה",
        "Rosh Chodesh Chanuka" => "ראש חודש חנוכה",
        "Chanuka"              => "חנוכה",
        "Tu Bishvat"           => "ט״ו בשבט",
        "Purim Kattan"         => "פורים קטן",
        "Purim"                => "פורים",
        "Shushan Purim"        => "שושן פורים",
        "Pesach"               => "פסח",
        "Pesach Sheni"         => "פסח שני",
        "Shavuos"              => "שבועות",

        //FAST DAYS
        "Tzom Gedaliah"        => "צום גדליה",
        "Asara Biteives"       => "עשרה בטבת",
        "Taanis Esther"        => "תענית אסתר",
        "Shiva Asar Bitamuz"   => "שבעה עשר בתמוז",
        "Tisha Bav"            => "תשעה באב",

        //OTHER
        "Rosh Chodesh"         => "ראש חודש",
        "Aseres Yimei Teshuva" => "עשרת ימי תשובה",
    ];
    
    public function getHoliday($language = 'English') {
        foreach (self::$holidays as $english => $hebrew) {
            try {
                if ($this->{"is" . str_replace(' ','',$english)}()) {
                    switch ($language) {
                        case 'English':
                            return $english;
                        case 'Hebrew':
                            return $hebrew;
                        default:
                            return false;
                    }
                    
                }
            } catch (\Exception $e) {
                // isPurimKattan will fail in non-leap years, so we can just ignore it
            }
        }
        return false;
    }
}
