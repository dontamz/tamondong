<?php

include("DbConfig.php");

class Crud extends DbConfig{

	public function retrieve_all() {
		$get_data = "SELECT * FROM `employees`";
		$result = mysqli_query($this->connection, $get_data);
		return $result;
	}
	
	public function retrieve_single_data($id) {
		// $id = $_GET['id'];
		$get_data = "SELECT * FROM `employees` WHERE id = $id";
		$result = mysqli_query($this->connection, $get_data);
		
		return $result;
	}
	
	public function add() {
		if (isset($_POST['submit'])) {
			$name = $this->connection->real_escape_string($_POST['name']);
			$address = $this->connection->real_escape_string($_POST['address']);
			$contact_number = $this->connection->real_escape_string($_POST['contact_number']);
			$email = $this->connection->real_escape_string($_POST['email']);
			$birthday = date('Y-m-d', strtotime($_POST['birthday']));
			$birthday = $this->connection->real_escape_string($birthday);
			
			$message = $this->check_empty($_POST, array('name', 'address', 'contact_number', 'email', 'birthday'));
			
			if($message == null || $message == "") {
				$insert = "INSERT INTO `employees` (name, address, contact_number, email, birthday) VALUES ('$name', '$address', '$contact_number', '$email', '$birthday')";
				mysqli_query($this->connection, $insert);
				
				echo "<font color='green'>Employee added successfully.</font>";
				echo "<br/><a href='index.php'>View Result</a>";
			}
			else {
				echo $message; 
			}
		}
	}
	
	public function edit($id) {
		// $id = $_GET['id'];
		
		if (isset($_POST['edit'])) {
			$name = $this->connection->real_escape_string($_POST['name']);
			$address = $this->connection->real_escape_string($_POST['address']);
			$contact_number = $this->connection->real_escape_string($_POST['contact_number']);
			$email = $this->connection->real_escape_string($_POST['email']);
			$birthday = date('Y-m-d', strtotime($_POST['birthday']));
			$birthday = $this->connection->real_escape_string($birthday);
			
			$message = $this->check_empty($_POST, array('name', 'address', 'contact_number', 'email', 'birthday'));

			if($message == null || $message == "") {
				$update = "UPDATE `employees` set name = '$name', address = '$address', contact_number = '$contact_number', email = '$email', birthday = '$birthday' WHERE id = '$id'";
				mysqli_query($this->connection, $update);
				
				header("Location: index.php");
			}
			else {
				echo $message; 
			}
		}
		
	}
	
	public function check_empty($data, $fields) {
        $message = null;
        foreach ($fields as $value) {
            if (empty($data[$value])) {
                $message .= "$value field empty <br />";
            }
        } 
        return $message;
    }
	
	public function delete_record($id) {
		$delete = "DELETE FROM `employees` WHERE id = $id";
		$result =  mysqli_query($this->connection, $delete);
		
		if ($result == true) {
			return true;
		}
		else {
			echo 'Cannot delete employee.';
            return false;
		}
	} 
	
}
?>