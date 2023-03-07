<?php
require_once "conn.php";

class Participant 
{
    private $firstname;
    private $lastname;
    private $phoneNumber;
    private $gender;
    private $organization;
    private $email;


    public function __construct($firstname="", $lastname="", $phoneNumber="", $organization="", $email="", $gender="")
    {
        $this->conn = new Database();
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->gender = $gender;
        $this->phoneNumber = $phoneNumber;
        $this->organization = $organization;
        $this->email = $email;
    }
    public function addNewParticipant()
    {
        $participantInfo = [$this->firstname, $this->lastname, $this->gender, $this->phoneNumber, $this->email, $this->organization];
        $SQL = "INSERT INTO participants(firstname, lastname, gender, phoneNumber, email, organization) VALUES(?, ?, ?, ?, ?, ?)";
        try{
         $this->conn->insert($SQL, $participantInfo);
         header("location: thankyou.html");
        }catch(PDOException $e)
        {
       echo $e->getMessage();
       die;
    }
}

public function getAllParticipants()
    {
        $SQL = "SELECT * from participants";
       $data = $this->conn->query($SQL);
        return $data;
    }
    
}


