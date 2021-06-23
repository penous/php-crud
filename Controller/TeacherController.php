<?php
declare(strict_types=1);

class TeacherController {
    public function render(array $GET, array $POST) {
        //load the view
        require 'View/homepage.php';
    }
}