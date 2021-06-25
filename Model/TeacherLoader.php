<?php

class TeacherLoader {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function createTeacher($teacherData) {
        $teacher = new Teacher((int)$teacherData['teacher_id'], $teacherData['firstname'], $teacherData['lastname'], $teacherData['email']);
        return $teacher;
    }

    public function getAllTeachers() {
        $handle = $this->pdo->prepare('SELECT id teacher_id, firstname , lastname, email FROM teacher;');
        $handle->execute();
        $teachers = $handle->fetchAll();
        return $teachers;
    }

    public function getTeacherById($id) {
        $handle = $this->pdo->prepare('SELECT SELECT id teacher_id, firstname , lastname, email FROM teacher where id=:id;');
        $handle->bindValue(':id', $id);
        $handle->execute();
        $teacher = $handle->fetch();
        return $teacher;
    }

    public function addTeacher($teacherData) {
        $handle = $this->pdo->prepare('INSERT INTO teacher (firstname, lastname, email) VALUES (:firstname, :lastname, :email);');
        $handle->execute($teacherData);
    }

    public function updateTeacher($teacherData) {
        $handle = $this->pdo->prepare('UPDATE teacher SET firstname=:firstname, lastname=:lastname, email=:email WHERE id=:id');
        $handle->execute($teacherData);
    }

    public function deleteTeacher($id) {
        $handle = $this->pdo->prepare('DELETE FROM teacher WHERE id=:id');
        $handle->bindValue(':id', $id);
        $handle->execute();
    }
}