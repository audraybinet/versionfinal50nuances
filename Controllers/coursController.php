<?php

require_once ROOT . '/Utils/Database.php';
require_once ROOT . '/Models/Courses.php';
require_once ROOT . '/Models/ClientCourse.php';

//verification si session ok
if (!isset($_SESSION['auth']['login'])) {
    header('Location:login.php');
    exit();
}

$userId = htmlspecialchars($_SESSION['auth']['id']);
//Si je click sur reserver et récupére le get submit
if (isset($_GET['reservation'])) {
  $courseId = $_GET['reservation'];
  $clientcourse = new ClientCourse($courseId, $userId);
  $clientcourse ->create();
 }
 
$course = new Course();
$courselist = $course->getCoursesList();
$viewsCourseUser = $course->getCoursesByUser($userId);
  var_dump($viewsCourseUser);





     
        
require_once ROOT . '/Views/cours.php';


