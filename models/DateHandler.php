<?php

class DateHandler
{
    private const WEEKS = [
        'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'
    ];

    private const MONTHS = [
        'January', 'Februrary', 'March', 'April', 'May', 'June', 
        'July', 'August', 'September', 'October', 'November', 'December'
    ];

    public const WEEK_MODE_EVEN = 0; 
    public const WEEK_MODE_ODD  = 1;

    public static function resolveCurrentWeekmode(): int
    {
        $base_date = new DateTime("1 September " . date('Y'));
        $current_date = new DateTime();

        $days = $current_date->diff($base_date)->days;
        $week_number = floor($days / 7);

        $week_mode = ($week_number % 2 == 0) ? self::WEEK_MODE_EVEN : self::WEEK_MODE_ODD;

        return $week_mode;
    }

    public static function getCurrentDateOfWeek(): array
    {
        $datetime = new DateTime();    
        $weekdate = [];

        foreach(self::WEEKS as $weekday){
            $datetime->setTimestamp(strtotime($weekday . ' this week'));

            $weekdate[$weekday] = $datetime->format('j F');
        }

        return $weekdate;
    }

    public static function translateMonth(string $month): string 
    {
        $utf8_months = [
            'Января', 'Февраля', 'Марта', 'Апреля', 'Мая', 'Июня', 
            'Июля', 'Августа', 'Сентября', 'Октября', 'Ноября', 'Декабря'
        ];
        
        $utf8_month = array_search($month, self::MONTHS);
        return $utf8_months[$utf8_month];
    }

    public static function translateWeekday(string $utf8_day): string
    {
        $utf8_days = [
            'понедельник', 'вторник', 'среда', 'четверг', 'пятница', 'суббота','воскресенье'
        ];

        $day = array_search(mb_strtolower(trim($utf8_day), 'UTF-8'), $utf8_days);
        return self::WEEKS[$day];
    }

}