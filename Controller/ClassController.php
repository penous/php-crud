<?php
declare(strict_types=1);

class ClassController {
    //render function with both $_GET and $_POST vars available if it would be needed.
    public function render(array $GET, array $POST) {
        $pdo = Connection::Open();
        $studentLoader = new StudenLoader($pdo);
        $classLoader = new KlassLoader($pdo);
        $teacherLoader = new TeacherLoader($pdo);

        // function to load all students to avoid duplicate code.
        function loadStudents($studentLoader) {
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

        // function to load all students to avoid duplicate code.
        function loadTeachers($teacherLoader) {
            $teacherData = $teacherLoader->getAllTeachers();
            foreach ($teacherData as  $teacher) {
                $teacher = $teacherLoader->createTeacher($teacher);
                $teachers[] = $teacher;
            }
            if (!isset($teachers)) {
                return [];
            }
            return $teachers;
        }

        // function to load all classes to avoid duplicate code.
        function loadClasses($classLoader) {
            $classData = $classLoader->getAllClasses();
            foreach ($classData as  $class) {
                $class = $classLoader->createClass($class);
                $classes[] = $class;
            }
            return $classes;
        }

        // ADD class TO DB
        if ((isset($POST['object']) && $POST['object'] == 'class')) {
            $GET = [];

            // Check if create or update
            if (isset($POST['button']) && $POST['button'] == 'create') {
                array_splice($POST, -2);
                $classLoader->addClass($POST);
            } elseif (isset($POST['button']) && $POST['button'] == 'update') {
                array_splice($POST, -2);
                $classLoader->updateClass($POST);
            }

            // Load class AGAIN
            $classes = loadClasses($classLoader);

            //load the view
            require 'View/classIndex.php';
        }

        // DELETE class
        if (isset($GET['button']) && $GET['button'] == 'Delete') {
            $classLoader->deleteClass($GET['id']);

            // Load classes
            $classes = loadClasses($classLoader);

            //load the view
            require 'View/classIndex.php';
        }

        // INDEX PAGE classes
        if ((isset($GET['page']) && $GET['page'] == 'classes') && count($GET) == 1) {
            // Load classes
            $classes = loadClasses($classLoader);

            //load the view
            require 'View/classIndex.php';
        }

        // DETAILS PAGE class
        if (isset($GET['button']) && $GET['button'] == 'Details') {
            $class = $classLoader->GetClassById($GET['id']);
            $class = $classLoader->createClass($class);

            //load the view
            require 'View/classDetails.php';
        }

        // CREATE NEW class PAGE
        if (isset($GET['button']) && $GET['button'] == 'New') {
            $teachers = loadTeachers($teacherLoader);
            $button = 'create';
            //load the view
            require 'View/classNew.php';
        }

        // UPDATE class PAGE
        if (isset($GET['button']) && $GET['button'] == 'Update') {
            $teachers = loadTeachers($teacherLoader);
            $class = $classLoader->GetClassById($GET['id']);
            $class = $classLoader->createClass($class);
            $button = 'update';

            //load the view
            require 'View/classNew.php';
        }
    }
}