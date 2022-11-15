<?php  

class Todo extends DB
{

	function __construct(DB $conn) {
		$this->conn = $conn->conn;
	}


		public function all_data (){
		$sql = "SELECT * FROM todos";
		$stmt = $this ->conn->prepare($sql);
		$stmt->execute();
		return $stmt->fetchall(PDO::FETCH_OBJ);

		}

public function edit($id) {
	$sql = "SELECT * FROM todos WHERE id =".$id;
	$stmt = $this ->conn->prepare($sql);
	$stmt->bindValue(':id', $id);
	$stmt->execute();
	return $stmt->fetchall(PDO::FETCH_OBJ);
}
public function insert($todo, $author, $status){
 $sql = "INSERT INTO 'todos' ('todo', 'author', 'status')
 VALUES (:todo, :author, :status)";
 $stmt = $this->conn->prepare($sql);
 $stmt->bindValue(':todo', $todo);
 $stmt->bindValue(':author', $author);
 $stmt->bindValue(':status', $status);
 $stmt->execute();
 return $stmt;


}
public function update($todo, $author, $status, $id){
	$sql = "UPDATE todos SET (todo = :todo, author = :author, status =
		:status WHERE id = :id";
 $stmt = $this->conn->prepare($sql);
 $stmt->bindValue(':id', $id);
 $stmt->bindValue(':todo', $todo);
 $stmt->bindValue(':author', $author);
 $stmt->bindValue(':status', $status);
 $stmt->execute();
 return $stmt;
}
 public function delete($id){
	$sql = "DELETE FROM todos WHERE id = :id";
 $stmt = $this->conn->prepare($sql);
 $stmt->bindValue(':id', $id);
 $stmt->execute();
 return $stmt;

}
	
}

?>