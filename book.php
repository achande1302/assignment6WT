<?php

class product {
    public $book_id = null;
    public $shelf_no = null;
    public $book_name = null;
    public $author = null;

    private $table_name = "book_details";
    private $conn = null;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getRecords() {
        $sql = "SELECT * FROM {$this->table_name} ORDER BY book_id";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt;
    }

    public function getByID() {
        $sql = "SELECT * FROM {$this->table_name} WHERE book_id like ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $this->book_id);
        $stmt->execute();

        return $stmt;
    }

     public function add() {
        $sql = "INSERT INTO {$this->table_name} VALUES (:book_id,:book_name,:author,:shelf_no)";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':book_id',$this->book_id);
        $stmt->bindParam(':book_name',$this->book_name);
        $stmt->bindParam(':author',$this->author);
        $stmt->bindParam(':shelf_no',$this->shelf_no);

        $stmt->execute();
        print_r($stmt->errorInfo());
        return $stmt->rowCount();
        
    }
    public function update() {
        $sql = "UPDATE
                    {$this->table_name}
                SET
                    book_name = :book_name,
                    author = :author,
                    shelf_no = :shelf_no
                WHERE
                    book_id = :book_id";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':book_id',$this->book_id);
        $stmt->bindParam(':book_name',$this->book_name);
        $stmt->bindParam(':shelf_no',$this->shelf_no);
        $stmt->bindParam(':author',$this->author);
        $stmt->execute();
        print_r($stmt->errorInfo());
        return $stmt->rowCount();
    }

    function delete() {
        $sql = "DELETE FROM {$this->table_name} WHERE book_id = ?";
        $stmt = $this->conn->prepare($sql);
        $this->book_id = htmlspecialchars($this->book_id);
        // echo $this->prn;
        $stmt->bindParam(1,$this->book_id);

        // echo $stmt->q
        $stmt->execute();
        print_r($stmt->errorInfo());
        return $stmt->rowCount();
    }



}
?>