<?php
class User {
  //Properties
  	public $conn;
  	public $name;
  	public $username;
  	public $password;

  // Methods
    public function __construct($conn){
        $this->conn = $conn;
    }

  	public function Ap_dutertegroup($Brands, $Clothing, $Size, $Price, $Description) {

          $sql = "INSERT INTO apparel (Id, Brands, Clothing, Size, Price, Description) VALUES ('$Id','$Brands', '$Clothing', '$Size', '$Price', '$Description')";

    	if ($this->conn->query($sql) === TRUE) {
			return true;
    	} else {
        	return false;
    	}
  	}
}
?>