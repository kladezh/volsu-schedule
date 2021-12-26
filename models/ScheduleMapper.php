<?php

// работает с Schedule Data в Firebase Realtime Database
class ScheduleMapper
{
    private $firebase;

    private $active_group;
    private $active_weekmode;

    public function __construct()
    {
        $this->firebase = Database::getInstance()->getDatabase();
    }

    public function setGroup(string $group_name)
    {
        $this->active_group = $group_name;
    }

    public function setWeekmode(int $mode)
    {
        $mode_name = match($mode){
            DateHandler::WEEK_MODE_EVEN => 'Числитель',
            DateHandler::WEEK_MODE_ODD => 'Знаменатель'
        };

        $this->active_weekmode = $mode_name;
    }

    public function getWeekmodeName() : string
    {
        return $this->active_weekmode;
    }

    public function getDays(): array
    {
        // хардкод института 'ИМИТ'
        $node = $this->firebase->getReference('ИМИТ')
            ->getChild($this->active_group)
            ->getChild($this->active_weekmode);

        $days = $node->getValue();
        
        foreach($days as &$day){
            foreach($day as $class => $data){
                $day[$class] = $this->createClass($data);  
            }
        }

        return $days;
    }

    public function getGroups(): array
    {
        // хардкод института 'ИМИТ'
        $node = $this->firebase->getReference('ИМИТ');

        $groups = $node->getChildKeys();

        return $groups;
    }

    private function createClass(array $data): ScheduleClass
    {
        return new ScheduleClass(
            $data['subject'],
            $data['type'],
            $data['time'],
            $data['classroom'],
            $data['teacher'] ?? null,
            $data['subgroup'] ?? null
        );
    }
}