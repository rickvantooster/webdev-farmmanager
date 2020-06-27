<?php
  session_start();
  include 'database.php';
  /*when form is submitted*/
  if((isset($_POST['submitReg'])))
  {
    $username=$_POST['username'];
    $pwd=$_POST['pwd'];
    $pwdcheck=$_POST['pwdcheck'];
    $name=$_POST['name'];
    $address=$_POST['address'];
    $city=$_POST['city'];
    $email=$_POST['email'];

    /*form handling*/
    if( $_POST['username']="" || $_POST['pwd']=""  || $_POST['pwdcheck']=""  ||
        $_POST['name']=""  || $_POST['address']=""  || $_POST['city']="" || $_POST['email']="")
    {
        // echo "Niet alle invoervelden zijn ingevuld!";
    }
    else
    {
      if(!filter_var($email, FILTER_VALIDATE_EMAIL))
      {
        // echo "email is niet juist ingevuld!";
      }
      else
      {
        // Check om te kijken of de gebruikersnaam al bestaat
        $sql = "SELECT * FROM user WHERE username=`$username`"
        /*
          $stmt = $pdo->prepare($sql);
          $stmt->bindValue(':username', $username);
          $stmt->execute();
          $row = $stmt->fetch(PDO::FETCH_ASSOC);
        */
        if($row['num'] > 0)
        {
          // echo "gebruikersnaam bestaat al!";
        }
        else
        {
          //hashing pwd
          if($pwd != $pwdcheck)
          {
            // echo "wachtwoorden komen niet overeen!";
          }
          else{
            $hashedpwd = password_hash($pwd, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare("INSERT INTO `user`(`email`, `username`, `password`, `name`, `address`, `city`) VALUES (:email,:username,:password,:name,:address,:city)");

            $stmt->bindParam(':username',$username);
            $stmt->bindParam(':password',$pwd);
            $stmt->bindParam(':name',$name);
            $stmt->bindParam(':address',$address);
            $stmt->bindParam(':city',$city);
            $stmt->bindParam(':email',$email);

            $stmt->execute();
          }
        }
      }
    }
  }
?>
