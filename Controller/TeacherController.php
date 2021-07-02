<?php
declare(strict_types=1);

class TeacherController
{
    public function render(array $GET, array $POST)
    {
        $pdo = Connection::Open();
        $studentLoader = new StudenLoader($pdo);
        $classLoader = new KlassLoader($pdo);
        $teacherLoader = new TeacherLoader($pdo);

        // function to load all students to avoid duplicate code.
        function loadStudents($studentLoader)
        {
            $studentsData = $studentLoader->getAllStudents();
            foreach ($studentsData as  $student) {
                $student = $studentLoader->createStudent($student);
                $students[] = $student;
            }
            if (!isset($students)) {
                return [];
            }
            return $students;
        }

        // function to load all classes to avoid duplicate code.
        function loadTeachers($teacherLoader)
        {
            $teacherData = $teacherLoader->getAllTeachers();
            foreach ($teacherData as  $teacher) {
                $teacher = $teacherLoader->createTeacher($teacher);
                $teachers[] = $teacher;
            }
            return $teachers;
        }

        // ADD teacher TO DB
        if ((isset($POST['object']) && $POST['object'] == 'teacher')) {
            $GET = [];
            // fill in get so index page gets loaded only once
            $GET['post'] = 'post';

            // Check if create or update
            if (isset($POST['button']) && $POST['button'] == 'create') {
                array_splice($POST, -2);
                $teacherLoader->addTeacher($POST);
            } elseif (isset($POST['button']) && $POST['button'] == 'update') {
                array_splice($POST, -2);
                $teacherLoader->updateTeacher($POST);
            }

            // Load teacher AGAIN
            $teachers = loadTeachers($teacherLoader);

            //load the view
            require 'View/teacherIndex.php';
        }

        // DELETE teacher
        if (isset($GET['button']) && $GET['button'] == 'Delete') {
            $teacherLoader->deleteTeacher($GET['id']);

            // Load teachers
            $teachers = loadTeachers($teacherLoader);

            //load the view
            require 'View/teacherIndex.php';
        }

        // INDEX PAGE teachers
        if ((isset($GET['page']) && $GET['page'] == 'teachers') && count($GET) == 1) {
            // Load teachers
            $teachers = loadTeachers($teacherLoader);

            //load the view
            require 'View/teacherIndex.php';
        }

        // DETAILS PAGE teacher
        if (isset($GET['button']) && $GET['button'] == 'Details') {
            $teacher = $teacherLoader->getTeacherById($GET['id']);
            $teacher = $teacherLoader->createTeacher($teacher);

            //load the view
            require 'View/teacherDetails.php';
        }

        // CREATE NEW teacher PAGE
        if (isset($GET['button']) && $GET['button'] == 'New') {
            $button = 'create';

            //load the view
            require 'View/teacherNew.php';
        }

        // UPDATE teacher PAGE
        if (isset($GET['button']) && $GET['button'] == 'Update') {
            $teacher = $teacherLoader->getTeacherById($GET['id']);
            $teacher = $teacherLoader->createTeacher($teacher);
            $button = 'update';

            //load the view
            require 'View/teacherNew.php';
        }
    }
}