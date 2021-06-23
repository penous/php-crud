<?php
declare(strict_types=1);

class Student {
    private $id;
    private $firstname;
    private $lastname;
    private $email;
    private $class;
    private $teacherFirstname;
    private $teacherLastname;

    public function __construct(int $id, string $firstname, string $lastname, string $email, string $class, string $teacherFirstname, string $teacherLastname) {
        $this->id = $id;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->class = $class;
        $this->teacherFirstname = $teacherFirstname;
        $this->teacherLastname = $teacherLastname;
    }

    /**
     * Get the value of id
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Get the value of firstname
     */
    public function getFirstname() {
        return $this->firstname;
    }

    /**
     * Get the value of lastname
     */
    public function getLastname() {
        return $this->lastname;
    }

    /**
     * Get the value of email
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * Get the value of class
     */
    public function getClassName() {
        return $this->class;
    }

    /**
     * Get the full name of the teacher
     */
    public function getTeacherFullName() {
        return $this->teacherFirstname . ' ' . $this->teacherLastname;
    }
}

class StudenLoader {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function createStudent($studentData) {
        $student = new Student((int)$studentData['id'], $studentData['student_firstname'], $studentData['student_lastname'], $studentData['student_email'], $studentData['class_name'], $studentData['teacher_firstname'], $studentData['teacher_lastname']);
        return $student;
    }

    public function getAllStudents() {
        $handle = $this->pdo->prepare('SELECT s.id, s.firstname student_firstname, s.lastname student_lastname, s.email student_email, c.name class_name, t.firstname teacher_firstname, t.lastname teacher_lastname FROM student s LEFT JOIN class c ON s.class_id AND c.id LEFT JOIN teacher t ON c.teacher_id AND t.id;
        ');
        $handle->execute();
        $students = $handle->fetchAll();
        return $students;
    }

    public function GetStudentById($id) {
        $handle = $this->pdo->prepare('SELECT s.id, s.firstname student_firstname, s.lastname student_lastname, s.email student_email, c.name class_name, t.firstname teacher_firstname, t.lastname teacher_lastname FROM student s LEFT JOIN class c ON s.class_id AND c.id LEFT JOIN teacher t ON c.teacher_id AND t.id where s.id=:id');
        $handle->bindValue(':id', $id);
        $handle->execute();
        $student = $handle->fetch();
        return $student;
    }

    public function addStudent($studentData) {
        $handle = $this->pdo->prepare('INSERT INTO student (firstname, lastname, email, class_id) VALUES (:firstname, :lastname, :email, :class_id);');
        $handle->execute($studentData);
    }
}