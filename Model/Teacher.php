<?php
declare(strict_types=1);

class Teacher {
    private $id;
    private $name;
    private $email;
    private $students;

    public function __construct(int $id, string $name, string $email) {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->students = [];
    }

    /**
     * Get the value of id
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Get the value of name
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Get the value of email
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * Get the value of students
     */
    public function getStudents() {
        return $this->students;
    }
}