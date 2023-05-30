<?php

class Session {

  private $logged_in = false;
  public $user_id;
  public $message;
  public $dt;
  public $mysql_datetime;

  function __construct(){
    session_start();
    $this->check_message();
    $this->check_login();
    if($this->logged_in){
      // action to take right away if user is logged in
    } else {
      // actions to take right away if user is not logged in
    }
  }

  public function is_logged_in(){
    return $this->logged_in;
  }

  public function login($user){
    // database should find user based on username/password
    if($user){
      $this->user_id = $_SESSION['user_id'] = $user->id;
      $this->logged_in = true;
      $this->dt = time();
      $this->mysql_datetime = strftime("%Y-%m-%d %H:%M:%S", $this->dt);
      file_put_contents('Logs_TimeIn/login.txt', "User $this->user_id logged in at  $this->mysql_datetime||||                \n", FILE_APPEND);
    }
  }

  public function logout(){
    unset($_SESSION['user_id']);
    unset($this->user_id);
    $this->logged_in = false;
    $this->dt = time();
    $this->mysql_datetime = strftime("%Y-%m-%d %H:%M:%S", $this->dt);
    file_put_contents('Logs_TimeOut/logout.txt', "Last User logged out at  $this->mysql_datetime||||                  \n", FILE_APPEND);
  }

  public function message($msg=""){
    if(!empty($msg)) {
      // then this is "set message"
      // make sure you understand why $this->message=$msg wouldnt work
      $_SESSION['message'] = $msg;
    } else {
      // then this is "get message"
      return $this->message;
    }
  }

  private function check_login(){
    if(isset($_SESSION['user_id'])){
      $this->user_id = $_SESSION['user_id'];
      $this->logged_in = true;
    } else {
      unset($this->user_id);
      $this->logged_in = false;
    }
  }

  private function check_message(){
    // Is there a message stored in the session?
    if(isset($_SESSION['message'])){
      // Add it as an attribute and erase the stored version
      $this->message = $_SESSION['message'];
      unset($_SESSION['message']);
    } else {
      $this->message = "";
    }
  }

}

$session = new Session();
$message = $session->message();



?>
