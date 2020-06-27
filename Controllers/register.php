<?php
  session_start();
  // include 'database.php';
  /*when form is submitted*/
  if((isset($_POST['submit'])))
  {

    $username=$_POST[''];
    $pwd=$_POST[''];
    $pwdcheck=$_POST[''];
    $name=$_POST[''];
    $adres=$_POST[''];
    $city=$_POST[''];
    $email=$_POST[''];

    /*form handling*/
    if( $_POST['']="" || $_POST['']=""  || $_POST['']=""  ||
        $_POST['']=""  || $_POST['']=""  || $_POST['']="" || $_POST['']="")
    {
        // echo "Niet alle invoervelden zijn ingevuld!";
    }

    /*hash pwd*/
    // $hashedpwd = password_hash($pwd, PASSWORD_DEFAULT);

    else
    {
      $stmt = $pdo->prepare("INSERT INTO `tabel` (`dbvalues`) VALUES (:vars)");

      $stmt->bindParam(':vars',$username);
      $stmt->bindParam(':vars',$pwd);
      $stmt->bindParam(':vars',$pwdcheck);
      $stmt->bindParam(':vars',$name);
      $stmt->bindParam(':vars',$adres);
      $stmt->bindParam(':vars',$city);
      $stmt->bindParam(':vars',$email);

      $stmt->execute();
    }
  }
?>
