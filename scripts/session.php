<?php
session_start();
class Session {
private $sessionKey;
public function __construct($sessionKey)
{
    $this->sessionKey = $sessionKey;
}

public function checkLogin()
{
    if(empty($_SESSION[$this->sessionKey]))
    {
        header("location: login.php");
    }
}

public function setSession($data)
{
    $_SESSION[$this->sessionKey] = $data;
}

public function getSession($sessionKey, $dataKey)
{
    return $_SESSION[$sessionKey][$dataKey];
}
public function logout()
{
  session_unset();
}
}