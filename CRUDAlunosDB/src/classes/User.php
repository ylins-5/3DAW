<?php 

class User{
    private $pdo;

    public function __construct($pdo){
        $this->pdo = $pdo;
    }

    public function create($nome, $email, $matricula){
          $sql = "INSERT INTO alunos(nome, email, matricula) VALUES (:nome, :email, :matricula)";
          $stmt = $this->pdo->prepare($sql);
          $stmt-> execute(["nome" => $nome, "email" => $email, "matricula" => $matricula]);
    }

    public function read(){
        $sql = "SELECT * from alunos";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update($id, $nome, $email, $matricula){
        $sql = "UPDATE alunos SET nome = :nome, email = :email, matricula = :matricula WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(["id" => $id, "nome" => $nome, "email" => $email, "matricula" => $matricula]);

    }

    public function delete($id){
        $sql = "DELETE from alunos where id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(["id" => $id]);
    }
}
?>