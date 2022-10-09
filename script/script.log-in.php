<?php

if(isset($_POST['log-in-submit'])){
    require "script.dbh.php";
    
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(empty($email) || empty($password)){
        header("Location: ../log-in.php?error=emptyfields");
        exit();
    }
    else{
        $sql = "SELECT * FROM admin WHERE admin_email=?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../log-in.php?error=sqlerror");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if($row = mysqli_fetch_assoc($result)){
                $pwdCheck = password_verify($password, $row['admin_pwd']);
                if($pwdCheck == false){
                    header("Location: ../log-in.php?error=wrongpwd");
                    exit();
                }
                else if($pwdCheck == true){
                    session_start();
                    $_SESSION['admin_id'] = $row['idAdmin'];
                    $_SESSION['admin_email'] = $row['admin_email'];
                    header("Location: ../index.php?login=success");
                    exit();
                }
                else{
                    header("Location: ../log-in.php?error=wrongpwd");
                    exit();
                }
            }
            else{
                header("Location: ../log-in.php?error=nouser");
                exit();
            }
        }
    }
}
else {
    header("Location: ../log-in.php");
    exit();
}