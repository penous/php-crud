<?php
declare(strict_types=1);

//include all your model files here
require './Model/Pdo.php';
require './Model/Student.php';
require './Model/Teacher.php';
require './Model/Class.php';

//include loaders
require './Model/TeacherLoader.php';

//include all your controllers here
require './Controller/StudentController.php';
require './Controller/TeacherController.php';
require './Controller/ClassController.php';

//you could write a simple IF here based on some $_GET or $_POST vars, to choose your controller
//this file should never be more than 20 lines of code!

$controller = new StudentController();
if (isset($_GET['page']) && $_GET['page'] === 'teachers') {
    $controller = new TeacherController();
}
if (isset($_GET['page']) && $_GET['page'] === 'classes') {
    $controller = new ClassController();
}

$controller->render($_GET, $_POST);