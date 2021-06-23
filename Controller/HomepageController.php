<?php
declare(strict_types=1);

class HomepageController {
    //render function with both $_GET and $_POST vars available if it would be needed.
    public function render(array $GET, array $POST) {
        $pdo = Connection::Open();
        $studentLoader = new StudenLoader($pdo);

        if ((isset($GET['page']) && $GET['page'] == 'students') || empty($GET)) {
            $studentsData = $studentLoader->getAllStudents();
            foreach ($studentsData as  $student) {
                $student = $studentLoader->createStudent($student);
                $students[] = $student;
            }
            var_dump($student);

            //load the view
            require 'View/studentIndex.php';
        }
    }
}