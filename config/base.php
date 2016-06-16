<?php
session_start();
class BaseClass {
	public $dataEmp;
	public $dataClass;
	public $conn;
	public $CountLoan;
	public function __construct() {
		$this->conn = new mysqli('localhost', 'root', '', 'mahad');
	}
	public function readData($query) {
		$result     = $this->conn->query($query);
		$num_result = $result->num_rows;

		if ($num_result > 0) {
			while ($rows = $result->fetch_assoc()) {
				$this->dataClass[] = $rows;
			}
			return $this->dataClass;
		}
	}
	public function displayTable($query) {
		$result = $this->conn->query($query);
		return $result;
	}

	public function getDebtData($idMember){
		$query="call getDebtData('$idMember')";
		$result=$this->conn->query($query);
		return $result;
	}

	public function login($usr, $pass) {
		$passNew = md5($pass);
		$log     = $this->conn->query("select *from viewlogin where UserName='$usr' and Password='$passNew';");
		if ($log->num_rows > 0) {
			$data          = $log->fetch_array();
			$this->dataEmp = $data;
			return true;
		} else {return false;}
	}
	public function checkValue($tabelku, $whereis = null) {
		$this->dataEmp = null;
		$sql           = "select * from $tabelku ";
		if ($whereis != null) {
			$sql .= " WHERE $whereis";
		}
		$log = $this->conn->query($sql);
		if ($log->num_rows > 0) {
			$data          = $log->fetch_array();
			$this->dataEmp = $data;
			return true;
		} else {return false;}
	}
	public function ValueCheck($table, $wheres) {
		$sql = "select * from $table";
		if ($wheres != null) {
			$sql .= " where $wheres";
		}
		$log = $this->conn->query($sql);
		if ($log->num_rows > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function fetchData($table, $where = null) {
		$sql = "SELECT * FROM $table";
		if ($where != null) {
			$sql .= "WHERE $where";
		}
		$data = null;
		$log  = $this->conn->query("select * from class;");
		if ($log->num_rows > 0) {
			$data = $log->fetch_array();
		}

		return $data;
		//$query=$this->conn->query($sql) or die($this->conn->error);
		//return $query->fetch_all(MYSQL_BOTH);
	}
	public function insert($table, $rows = null) {
		$sql   = "INSERT INTO $table";
		$row   = null;
		$value = null;
		foreach ($rows as $key => $nilai) {
			$row .= ",".$key;
			$value .= ",'".$nilai."'";
		}
		$sql .= "(".substr($row, 1).")";
		$sql .= "VALUES(".substr($value, 1).")";
		if ($result = $this->conn->query($sql)) {
			return true;
		} else {
			return false;
		}
		//$result=$this->conn->query($sql) or die(mysqli_connect_errno()."Simpan Gagal !!");
	}

	public function update($table, $field = null, $where = null) {
		$sql = "UPDATE $table SET ";
		$set = null;
		foreach ($field as $key => $values) {
			$set .= ", ".$key." = '".$values."'";
		}
		$sql .= substr($set, 1)."  WHERE $where";
		if ($result = $this->conn->query($sql)) {
			return true;
		} else {
			return false;
		}
	}

	public function cancelInsert($table, $field = null, $where = null) {
		$sql = "UPDATE $table SET ";
		$set = null;
		foreach ($field as $key => $values) {
			$set .= ", ".$key." = ".$values."";
		}
		$sql .= substr($set, 1)."  WHERE $where";
		print_r($sql);
		if ($result = $this->conn->query($sql)) {
			return true;
		} else {
			return false;
		}
	}

	public function delete($table, $where) {
		$sql = "DELETE FROM $table WHERE $where";
		$this->conn->query($sql);
		if ($result = $this->conn->query($sql)) {
			return true;
		} else {
			return false;
		}
	}

	public function getAutoId($textquery, $prefix) {
		$result = "";
		$log    = $this->conn->query($textquery);
		if ($log->num_rows > 0) {
			$row  = $log->fetch_array();
			$rows = $row[0];
			/*Convert to Int*/
			$count = (int) $rows+1;
			if ($count < 10) {
				$result = $prefix."000".$count;
			} else if ($count < 100) {
				$result = $prefix."00".$count;
			} else if ($count < 1000) {
				$result = $prefix."0".$count;
			}
			return $result;
		} else {
			return $prefix."0001";
		}
	}
	public function getAutoIdInven($textquery, $prefix) {
		$result = "";
		$log    = $this->conn->query($textquery);
		if ($log->num_rows > 0) {
			$row  = $log->fetch_array();
			$rows = $row[0];
			/*Convert to Int*/
			$count = (int) $rows+1;
			if ($count < 10) {
				$result = $prefix."00".$count;
			} else if ($count < 100) {
				$result = $prefix."0".$count;
			}
			return $result;
		} else {
			return $prefix."01";
		}
	}
	public function uploadImage() {
		$target_dir    = "";
		$target_file   = $target_dir.basename($_FILES["fileToUpload"]["name"]);
		$uploadOk      = 1;
		$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

		// Check if image file is a actual image or fake image
		if (isset($_POST["submit"])) {
			$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
			if ($check !== false) {
				echo "File is an image - ".$check["mime"].".";
				$uploadOk = 1;
			} else {
				echo "File is not an image.";
				$uploadOk = 0;
			}
		}

		// Check if file already exists
		if (file_exists($target_file)) {
			echo "Sorry, file already exists.";
			$uploadOk = 0;
		}

		// Check file size
		if ($_FILES["fileToUpload"]["size"] > 500000) {
			echo "Sorry, your file is too large.";
			$uploadOk = 0;
		}

		// Allow certain file formats
		if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
			echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			$uploadOk = 0;
		}

		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			echo "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
		} else {
			if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
				echo "The file ".basename($_FILES["fileToUpload"]["name"])." has been uploaded.";
			} else {
				echo "Sorry, there was an error uploading your file.";
			}
		}
	}
	/* END FUnCTION UPLOAD IMAGE*/
	public function viewMessage($notif, $message) {
		$_SESSION['notif']   = "$notif";
		$_SESSION['message'] = "$message";
	}

	public function dateIndo($date){
		$monthIndo = array("Januari","Februari","Maret","April"
						  ,"Mei","Juni","Juli","Agustus","September"
						  ,"Oktober","November","Desember");
		$tahun=substr($date,0,4);
		$bulan=substr($date,5,2);
		$tgl=substr($date,8,2);
		$result = $tgl . " " . $monthIndo[(int)$bulan-1] . " ". $tahun;
		return($result);
	}
	public function getMonth($key){
		$monthIndo = array("","Januari","Februari","Maret","April"
						  ,"Mei","Juni","Juli","Agustus","September"
						  ,"Oktober","November","Desember");
		return $monthIndo[$key];
	}

}

?>
