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

	public function get(string $id): array | false
	{
    $sql = "SELECT *
            FROM notebook_entries
            WHERE id = :id";

    $stmt = $this->conn->prepare($sql);
        
    $stmt->bindValue(":id", $id, \PDO::PARAM_INT);
        
    $stmt->execute();
        
    $data = $stmt->fetch(\PDO::FETCH_ASSOC);

    return $data;	
	}

	public function update(array $current, array $new): int 
	{
		$sql = "UPDATE notebook_entries
            SET full_name = :full_name, 
                company = :company, 
                phone = :phone, 
                email = :email, 
                date_of_birth = :date_of_birth, 
                photo_path = :photo_path
            WHERE id = :id";

    $stmt = $this->conn->prepare($sql);

    $stmt->bindValue(":full_name", $new["full_name"] ?? $current["full_name"], \PDO::PARAM_STR);
    $stmt->bindValue(":company", $new["company"] ?? $current["company"], \PDO::PARAM_STR);
    $stmt->bindValue(":phone", $new["phone"] ?? $current["phone"], \PDO::PARAM_STR);
    $stmt->bindValue(":email", $new["email"] ?? $current["email"], \PDO::PARAM_STR);
    $stmt->bindValue(":date_of_birth", $new["date_of_birth"] ?? $current["date_of_birth"], \PDO::PARAM_STR);
    $stmt->bindValue(":photo_path", $new["photo_path"] ?? $current["photo_path"], \PDO::PARAM_STR);

    $stmt->bindValue(":id", $current["id"], \PDO::PARAM_INT);
    
    $stmt->execute();
    
    return $stmt->rowCount();
	}

	public function delete(string $id): int 
	{
		$sql = "DELETE FROM notebook_entries
            WHERE id = :id";
                
    $stmt = $this->conn->prepare($sql);
        
    $stmt->bindValue(":id", $id, \PDO::PARAM_INT);
        
    $stmt->execute();
        
    return $stmt->rowCount();
	}

}
