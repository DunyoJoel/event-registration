<?php
require_once "conn.php";



class Admin 
{
    private $firstname;
    private $lastname;
    private $role;
    private $email;
    private $conn;

    public function __construct($firstname="", $lastname="", $email="", $password="", $role="")
    {
        $this->conn = new Database();
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->role = $role;
        $this->password = $password;
    }
    public function addAdmin()
    {
        $adminInfo = [$this->firstname, $this->lastname, password_hash($this->password, PASSWORD_DEFAULT), $this->email, $this->role];
        $SQL = "INSERT INTO admin(firstname, lastname, password, email, role) VALUES(?, ?, ?, ?, ?)";
        try{
         $this->conn->insert($SQL, $adminInfo);
            
    }catch(PDOException $e)
    {
       echo $e->getMessage();
       die;
    }
}
    public function authenticateAdmin($email, $password)
    {
        $email = trim($email);
        $SQL = "SELECT firstname, lastname, password, email, role from admin where email = ?";
        $adminData = $this->conn->query($SQL, [$email]);
        $adminData = $adminData?$adminData[0]:null;
        if(!empty($adminData) && password_verify($password, $adminData["password"]))
        {
            return $adminData;
        }
        return null;
    }
}