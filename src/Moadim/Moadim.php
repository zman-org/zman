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
        "Rosh Chodesh"         => "ראש חודש",

        "Rosh Hashana"         => "ראש השנה",
        "Yom Kippur"           => "יום כיפור",
        "Sukkos"               => "סוכות",
        "Shmini Atzeres"       => "שמיני עצרת",
        "Simchas Torah"        => "שמחת תורה",
        "Chanuka"              => "חנוכה",
        "Tu Bishvat"           => "ט״ו בשבט",
        "Purim Kattan"         => "פורים קטן",
        "Purim"                => "פורים",
        "Shushan Purim"        => "שושן פורים",
        "Pesach"               => "פסח",
        "Pesach Sheni"         => "פסח שני",
        "Shavuos"              => "שבועות",

        "Tzom Gedaliah"        => "צום גדליה",
        "Asara Biteives"       => "עשרה בטבת",
        "Taanis Esther"        => "תענית אסתר",
        "Shiva Asar Bitamuz"   => "שבעה עשר בתמוז",
        "Tisha Bav"            => "תשעה באב",

        "Aseres Yimei Teshuva" => "עשרת ימי תשובה",
    ];
    
    public function holidaysEnglish()
    {
        return $this->holidays("English");
    }
    
    public function holidaysHebrew()
    {
        return $this->holidays("Hebrew");
    }
    
    private function holidays($language = 'English') {
        $holidays = [];

        foreach (self::$holidays as $english => $hebrew) {
            $getter = "is" . str_replace(' ','',$english);

            if (!$this->isJewishLeapYear() && $getter === 'isPurimKattan') {
                continue;
            }

            if ($this->$getter()) {
                switch ($language) {
                    case 'English':
                        $holidays[] = $english;
                        break;
                    case 'Hebrew':
                        $holidays[] = $hebrew;
                        break;
                    default:
                        break;
                }
            }
        }

        return $holidays;
    }
}
