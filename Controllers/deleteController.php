<?php
   require_once ROOT .'/Utils/Database.php';
   require_once ROOT . '/Models/User.php';
// protection de la page par la session auth
if(!isset($_SESSION['auth']['login'])){
    header('Location:login.php');
    exit();
}

$user = new user();
if (!empty($_SESSION['auth']['id'])) {
    $user->id = htmlspecialchars($_SESSION['auth']['id']);
    if($user->deleteUser()){
    $_SESSION['auth'] = [];
    session_destroy();
    header('Location:home.php');
    exit();
}
    }
   require_once ROOT . '/Views/dashboard.php';