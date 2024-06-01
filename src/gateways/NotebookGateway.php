<?php 

namespace gateways;

class NotebookGateway
{
	private \PDO $conn;

	public function __construct(\config\Database $database)
	{
		$this->conn = $database->getConnection();
	}

	public function getAll() : array 
	{
		$sql = "SELECT * FROM notebook_entries";

		$stmt = $this->conn->query($sql);

		$data = [];

		while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
			$data[] = $row;
		}

		return $data;
	}


	public function create(array $data): string
	{
		$sql = "INSERT INTO notebook_entries (full_name, company, phone, email, date_of_birth, photo_path)
            VALUES (:full_name, :company, :phone, :email, :date_of_birth, :photo_path)";
                
    	$stmt = $this->conn->prepare($sql);
        
	    $stmt->bindValue(":full_name", $data["full_name"], \PDO::PARAM_STR);
	    $stmt->bindValue(":company", $data["company"] ?? null, \PDO::PARAM_STR);
	    $stmt->bindValue(":phone", $data["phone"], \PDO::PARAM_STR);
	    $stmt->bindValue(":email", $data["email"], \PDO::PARAM_STR);
	    $stmt->bindValue(":date_of_birth", $data["date_of_birth"] ?? null, \PDO::PARAM_STR);
	    $stmt->bindValue(":photo_path", $data["photo_path"] ?? null, \PDO::PARAM_STR);
	        
	    $stmt->execute();
        
    	return $this->conn->lastInsertId();
	}


}
