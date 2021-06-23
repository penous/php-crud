<?php
declare(strict_types=1);

class HomepageController {
    //render function with both $_GET and $_POST vars available if it would be needed.
    public function render(array $GET, array $POST) {
        $pdo = Connection::Open();
        $studentLoader = new StudenLoader($pdo);
        $classLoader = new KlassLoader($pdo);

        function loadStudents($studentLoader) {
            $studentsData = $studentLoader->getAllStudents();
            foreach ($studentsData as  $student) {
                $student = $studentLoader->createStudent($student);
                $students[] = $student;
            }
            return $students;
        }

        // ADD student TO DB
        if ((isset($POST['object']) && $POST['object'] == 'student')) {
            $GET = [];
            $GET['post'] = 'post';
            array_splice($POST, -2);
            $studentLoader->addStudent($POST);

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
            $classData = $classLoader->getAllClasses();
            foreach ($classData as  $class) {
                $class = $classLoader->createClass($class);
                $classes[] = $class;
            }

            //load the view
            require 'View/studentNew.php';
        }
    }
}