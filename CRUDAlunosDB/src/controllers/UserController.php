<?php

require_once __DIR__ . '/../classes/User.php';

class UserController{
    private $user;

    public function __construct($pdo){
        $this->user = new User($pdo);
    }

    public function index(){
        return $this->user->read();
    }

    public function create($nome, $email, $matricula){
        $this->user->create($nome, $email, $matricula);
    }

    public function update($id, $nome, $email, $matricula){
        $this->user->update($id, $nome, $email, $matricula);
    }

    public function delete($id){
        $this->user->delete($id);
    }
}

?>