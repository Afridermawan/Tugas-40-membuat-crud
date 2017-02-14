<?php 
 namespace Crud\Src;

 use Crud\Config\Config;

 class CollegeStudent
 {
 	private $db;

 	public function __construct()
 	{
 		$this->db = new Config();
 	}

 	public function add($name, $gender, $phone_number, $address, $photo, $deleted)
 	{
 		$query = "INSERT INTO college_student (name, gender, phone_number, address, photo, deleted) VALUES (:name, :gender, :phone_number, :address, :photo, :deleted)";
 		$stmt = $this->db->prepare($query);
 		$stmt->bindParam(':name', $name);
 		$stmt->bindParam(':gender', $gender);
 		$stmt->bindParam(':phone_number', $phone_number);
 		$stmt->bindparam(':address', $address);
 		$stmt->bindParam(':photo', $photo);
 		$stmt->bindParam(':deleted', $deleted);
 		$stmt->execute();
	}

	public function getAll()
	{
		$query = "SELECT * FROM college_student WHERE deleted = 0";
		$stmt = $this->db->prepare($query); 
		$stmt->execute();

		return $stmt->fetchAll($this->db::FETCH_ASSOC);
	}
	public function edit($id, $name, $gender, $phone_number, $address, $deleted)
	{
		$query = "UPDATE college_student SET name=:name, gender=:gender, phone_number=:phone_number, address=:address, deleted=:deleted WHERE id =:id";
		$stmt = $this->db->prepare($query);
		$stmt->bindParam(':name', $name);
		$stmt->bindParam(':gender', $gender);
		$stmt->bindParam(':phone_number', $phone_number);
		$stmt->bindParam(':address', $address);
		$stmt->bindParam(':deleted', $deleted);
		$stmt->bindParam(':id', $id);
		$stmt->execute();

		return $stmt;
	} 

	public function editPhoto($id, $photo)
	{
		$query = "UPDATE college_student SET photo=:photo WHERE id =:id";
		$stmt = $this->db->prepare($query);
		$stmt->bindParam(':id', $id );
		$stmt->bindParam(':photo', $photo);
		$stmt->execute();
	}

	public function getCollegeStudentId($id)
	{
		$query = "SELECT * FROM college_student WHERE id =:id";
		$stmt = $this->db->prepare($query);
		$stmt->bindParam(':id', $id);
		$stmt->execute();
		return $stmt->fetch($this->db::FETCH_ASSOC);
	}

	public function softDelete($id)
	{
		$query = "UPDATE college_student SET deleted = 1 WHERE id =:id";
		$stmt = $this->db->prepare($query);
		$stmt->bindParam(':id', $id);
		$stmt->execute();
	}
 }

?>