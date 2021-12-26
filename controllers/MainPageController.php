<?php

class MainPageController extends PageController
{
    private $mapper;

    public function __construct()
    {
        $this->mapper = new ScheduleMapper;
        parent::__construct();
    }

    public function process()
    {
        // ставим выбранную групу и активный тип недели
        $active_group = $this->parameters['group'];
        $this->mapper->setGroup($active_group);
        $this->mapper->setWeekmode(DateHandler::resolveCurrentWeekmode());

        // получаем расписание по дням
        $schedule_days = $this->mapper->getDays();
        $this->setSuitableDays($schedule_days);

        // получаем название текщуего типа недели
        $weekmode = $this->mapper->getWeekmodeName();

        // получаем список групп
        $groups = $this->mapper->getGroups();

        // получаем даты не неделю
        $weekdate = DateHandler::getCurrentDateOfWeek();
        $this->translateWeekdate($weekdate);

        // устанавливаем полученные значения для страницы
        $this->vh->week = $weekmode;
        $this->vh->days = $schedule_days;
        $this->vh->groups = $groups;
        $this->vh->activeGroup = $active_group;
        $this->vh->weekdate = $weekdate;

        $this->renderPage('main.php');
    }

    private function setSuitableDays(array &$days)
    {
        foreach(array_keys($days) as $day_name){
            $suitable_day = DateHandler::translateWeekday($day_name);

            $days[$suitable_day] = $days[$day_name];
            unset($days[$day_name]);
        }
    }

    private function translateWeekdate(array &$weekdate)
    {
        foreach($weekdate as $weekday => $date){
            $date_parts = explode(' ', $date);
            $weekdate[$weekday] = $date_parts[0] . ' ' . DateHandler::translateMonth($date_parts[1]);
        }
    }
}