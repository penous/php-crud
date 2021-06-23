<?php
declare(strict_types=1);

class Klass {
    private $id;
    private $name;
    private $location;
    private $teacher_id;
    private $students;

    public function __construct(int $id, string $name, string $location, int $teacher_id, array $students) {
        $this->id = $id;
        $this->name = $name;
        $this->location = $location;
        $this->teacher_id = $teacher_id;
        $this->students = [];
    }
}