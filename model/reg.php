<?php
class users {
  //Properties
  	public $conn;
  	public $firstname;
  	public $username;
  	public $password;

  // Methods
    public function __construct($conn){
        $this->conn = $conn;
    }

  	public function Ap_dutertegroup($firstname, $lastname, $middle, $address ,$username, $password) {

          $sql = "INSERT INTO users (firstname, lastname, middle, address, username, password) VALUES ('$firstname', '$lastname', '$middle', '$address' ,'$username', '$password')";

    	if ($this->conn->query($sql) === TRUE) {
			return true;
    	} else {
        	return false;
    	}
  	}
}
?>