<?php
declare(strict_types=1);

class Klass {
    private $id;
    private $name;
    private $location;
    private $teacherId;
    private $teacherName;
    private $students;

    public function __construct(int $id, string $name, string $location, int $teacherId, string $teacherName) {
        $this->id = $id;
        $this->name = $name;
        $this->location = $location;
        $this->teacherId = $teacherId;
        $this->teacherName = $teacherName;
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
     * Get the value of location
     */
    public function getLocation() {
        return $this->location;
    }

    /**
     * Get the value of teacherId
     */
    public function getTeacherId() {
        return $this->teacherId;
    }

    /**
     * Get the value of teacherName
     */
    public function getTeacherName() {
        return $this->teacherName;
    }

    /**
     * Get the value of students
     */
    public function getStudents() {
        return $this->students;
    }
}

class KlassLoader {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function createClass($classData) {
        $class = new Klass((int)$classData['class_id'], $classData['class_name'], $classData['location'], (int)$classData['teacher_id'], $classData['teacher_name']);
        return $class;
    }

    public function getAllClasses() {
        $handle = $this->pdo->prepare('SELECT c.id class_id, c.name class_name, c.location, c.teacher_id, concat(t.firstname," ", t.lastname) AS teacher_name  FROM class c LEFT JOIN teacher t ON c.teacher_id = t.id;');
        $handle->execute();
        $classes = $handle->fetchAll();
        return $classes;
    }

    public function GetClassById($id) {
        $handle = $this->pdo->prepare('SELECT c.id class_id, c.name class_name, c.location, c.teacher_id, concat(t.firstname," ", t.lastname) AS teacher_name  FROM class c LEFT JOIN teacher t ON c.teacher_id = t.id where c.id=:id;');
        $handle->bindValue(':id', $id);
        $handle->execute();
        $class = $handle->fetch();
        return $class;
    }

    public function addClass($classData) {
        $handle = $this->pdo->prepare('INSERT INTO class (name, location, teacher_id) VALUES (:name, :location, :teacher_id);');
        $handle->execute($classData);
    }

    public function updateClass($classData) {
        $handle = $this->pdo->prepare('UPDATE class SET name=:name, location=:location, teacher_id=:teacher_id WHERE id=:id');
        $handle->execute($classData);
    }

    public function deleteClass($id) {
        $handle = $this->pdo->prepare('DELETE FROM class WHERE id=:id');
        $handle->bindValue(':id', $id);
        $handle->execute();
    }
}