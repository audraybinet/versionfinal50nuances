<?php
class course {

    private $db;
    public $id = 0;
    public $nameCours = '';

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function createCourse() {
        $query = 'INSERT INTO `cours` ( `nameCours`) VALUES (:nameCours)';
        $queryResult = $this->db->prepare($query);
        $queryResult->bindValue(':nameCours', $this->nameCours, PDO::PARAM_STR);
        $queryResult->bindValue(':id', $this->iduser, PDO::PARAM_INT);
        return $queryResult->execute();
    }


    public function getCoursesList() {
        $query  = 'SELECT cours.id, cours.nameCours, DATE_FORMAT(course_slots.slots, "%d/%m/%Y %h:%i") AS slots FROM `cours` INNER JOIN course_slots ON course_slots.course_id = cours.id';
        $queryResult = $this->db->query($query);
        return $queryResult->fetchAll(PDO::FETCH_OBJ);
    }
    
    public function getCoursesByUser($userId) {
        $query = 'SELECT users.id, cours.nameCours, course_slots.slots FROM users JOIN clients_courses ON clients_courses.user_id = users.id JOIN cours ON cours.id = clients_courses.course_id JOIN course_slots ON course_slots.id = cours.id  WHERE users.id = :userId';
        $queryResult = $this->db->prepare($query);
        $queryResult->bindValue(':userId', $userId);
        $queryResult->execute();
        return $queryResult->fetchAll(PDO::FETCH_OBJ);
    }
   
}
