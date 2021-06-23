<?php
declare(strict_types=1);

class Teacher {
    private $id;
    private $name;
    private $email;
    private $students;

    public function __construct(int $id, string $name, string $email, array $students) {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->class_id = [];
    }
}