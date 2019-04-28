<?php

/**
 * Here we define the list of holidays, with all the supported formats.
 * The list should be kept in the order of תדיר ושאינו תדיר תדיר קודם.
 */
if (!defined('HOLIDAYS')) {
    define('HOLIDAYS', [
        'Rosh Chodesh' => [
            'english' => 'Rosh Chodesh',
            'hebrew'  => 'ראש חודש',
        ],
        'Rosh Hashana' => [
            'english' => 'Rosh Hashana',
            'hebrew'  => 'ראש השנה',
        ],
        'Yom Kippur' => [
            'english' => 'Yom Kippur',
            'hebrew'  => 'יום כיפור',
        ],
        'Sukkos' => [
            'english' => 'Sukkos',
            'hebrew'  => 'סוכות',
        ],
        'Shmini Atzeres' => [
            'english' => 'Shmini Atzeres',
            'hebrew'  => 'שמיני עצרת',
        ],
        'Simchas Torah' => [
            'english' => 'Simchas Torah',
            'hebrew'  => 'שמחת תורה',
        ],
        'Chanuka' => [
            'english' => 'Chanuka',
            'hebrew'  => 'חנוכה',
        ],
        'Tu Bishvat' => [
            'english' => 'Tu Bishvat',
            'hebrew'  => 'ט״ו בשבט',
        ],
        'Purim Kattan' => [
            'english' => 'Purim Kattan',
            'hebrew'  => 'פורים קטן',
        ],
        'Purim' => [
            'english' => 'Purim',
            'hebrew'  => 'פורים',
        ],
        'Shushan Purim' => [
            'english' => 'Shushan Purim',
            'hebrew'  => 'שושן פורים',
        ],
        'Pesach' => [
            'english' => 'Pesach',
            'hebrew'  => 'פסח',
        ],
        'Pesach Sheni' => [
            'english' => 'Pesach Sheni',
            'hebrew'  => 'פסח שני',
        ],
        'Shavuos' => [
            'english' => 'Shavuos',
            'hebrew'  => 'שבועות',
        ],
        'Tzom Gedaliah' => [
            'english' => 'Tzom Gedaliah',
            'hebrew'  => 'צום גדליה',
        ],
        'Asara Biteives' => [
            'english' => 'Asara Biteives',
            'hebrew'  => 'עשרה בטבת',
        ],
        'Taanis Esther' => [
            'english' => 'Taanis Esther',
            'hebrew'  => 'תענית אסתר',
        ],
        'Shiva Asar Bitamuz' => [
            'english' => 'Shiva Asar Bitamuz',
            'hebrew'  => 'שבעה עשר בתמוז',
        ],
        'Tisha Bav' => [
            'english' => 'Tisha Bav',
            'hebrew'  => 'תשעה באב',
        ],
        'Aseres Yimei Teshuva' => [
            'english' => 'Aseres Yimei Teshuva',
            'hebrew'  => 'עשרת ימי תשובה',
        ],
    ]);
}
