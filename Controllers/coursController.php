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
if (isset($_GET['reservation']) || isset($_GET['delete'])) {
  $isReservation = isset($_GET['reservation']);
  $courseId = ($isReservation) ? $_GET['reservation'] : $_GET['delete'];
  $clientcourse = new ClientCourse($courseId, $userId);
  if ($isReservation) {
    $clientcourse->create();
  }
  else {
    $clientcourse->deleteCourse();  
  }
}
 
$course = new Course();
$courselist = $course->getCoursesList();
$viewsCourseUser = $course->getCoursesByUser($userId);

        
require_once ROOT . '/Views/cours.php';