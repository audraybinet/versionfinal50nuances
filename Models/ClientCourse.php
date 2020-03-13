<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ClientCourse
 *
 * @author audray
 */
class ClientCourse {

    public $courseId;
    public $userId;
    public $db;

    public function __construct($_courseId, $_userId) {
        $this->userId = $_userId;
        $this->courseId = $_courseId;
        $this->db = Database::getInstance();
    }

    public function create() {
        $sql = 'INSERT INTO `clients_courses`(`course_id`,`user_id`) VALUES (:course_id, :user_id)';
        $req = $this->db->prepare($sql);
        $req->bindValue(':course_id', $this->courseId, PDO::PARAM_INT);
        $req->bindValue(':user_id', $this->userId, PDO::PARAM_INT);
        $req->execute();
    }
    public function deleteCourse() {
        $query = 'DELETE FROM `clients_courses` WHERE `user_id`=:user_id AND `course_id`=:course_id';
        $queryResult = $this->db->prepare($query);
        $queryResult->bindValue(':course_id', $this->courseId, PDO::PARAM_INT);
        $queryResult->bindValue(':user_id', $this->userId, PDO::PARAM_INT);
        
        $queryResult->execute();
    }


}
