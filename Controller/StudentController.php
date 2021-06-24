<?php
declare(strict_types=1);

class StudentController {
    //render function with both $_GET and $_POST vars available if it would be needed.
    public function render(array $GET, array $POST) {
        $pdo = Connection::Open();
        $studentLoader = new StudenLoader($pdo);
        $classLoader = new KlassLoader($pdo);

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

        // function to load all classes to avoid duplicate code.
        function loadClasses($classLoader) {
            $classData = $classLoader->getAllClasses();
            foreach ($classData as  $class) {
                $class = $classLoader->createClass($class);
                $classes[] = $class;
            }
            return $classes;
        }

        // ADD student TO DB
        if ((isset($POST['object']) && $POST['object'] == 'student')) {
            var_dump($POST);
            $GET = [];
            // fill in get so index page gets loaded only once
            $GET['post'] = 'post';

            // Check if create or update
            if (isset($POST['button']) && $POST['button'] == 'create') {
                array_splice($POST, -2);
                $studentLoader->addStudent($POST);
            } elseif (isset($POST['button']) && $POST['button'] == 'update') {
                array_splice($POST, -2);
                $studentLoader->updateStudent($POST);
            }

            // Load student AGAIN
            $students = loadStudents($studentLoader);

            //load the view
            require 'View/studentIndex.php';
        }

        // INDEX PAGE students
        if ((isset($GET['page']) && $GET['page'] == 'students') || empty($GET)) {
            // Load student
            $students = loadStudents($studentLoader);

            //load the view
            require 'View/studentIndex.php';
        }

        // DETAILS PAGE student
        if (isset($GET['button']) && $GET['button'] == 'Details') {
            $student = $studentLoader->GetStudentById($GET['id']);
            $student = $studentLoader->createStudent($student);

            //load the view
            require 'View/studentDetails.php';
        }

        // CREATE NEW student PAGE
        if (isset($GET['button']) && $GET['button'] == 'New') {
            $classes = loadClasses($classLoader);
            $button = 'create';

            //load the view
            require 'View/studentNew.php';
        }

        // UPDATE student PAGE
        if (isset($GET['button']) && $GET['button'] == 'Update') {
            $classes = loadClasses($classLoader);
            $student = $studentLoader->GetStudentById($GET['id']);
            $student = $studentLoader->createStudent($student);
            $button = 'update';

            //load the view
            require 'View/studentNew.php';
        }
    }
}