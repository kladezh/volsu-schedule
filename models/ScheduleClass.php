<?php

/**
 * 
 * ScheduleClass - Domain Object of DB Schedule class.
 * 
 * ---
 * можно сделать более гибкие типы данных вместо строк
 * 
 */

class ScheduleClass
{
    private $name;
    private $type;
    private $time;
    private $classroom;
    private $teacher;
    private $subgroup;

    public function __construct(
        string $name,
        string $type,
        string $time,
        string $classroom,
        string $teacher = null,
        string $subgroup = null,
    )
    {
        $this->name = $name;
        $this->type = $type;
        $this->time = $time;
        $this->classroom = $classroom;

        $this->teacher = $teacher;
        $this->subgroup = $subgroup;
    }

    public function name(): string          { return $this->name; }
    public function type(): string          { return $this->type; }
    public function time(): string          { return $this->time; }
    public function classroom(): string     { return $this->classroom; }
    public function teacher(): string|null  { return $this->teacher; }
    public function subgroup(): string|null { return $this->subgroup; }
}