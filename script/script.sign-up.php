<?php
if(isset($_POST['sign-up-submit'])){

    require "script.dbh.php";

    $admin_email = $_POST['email'];
    $admin_fname = $_POST['fname'];
    $admin_lname = $_POST['lname'];
    $admin_password = $_POST['password'];

    if(empty($admin_email) || empty($admin_fname) || empty($admin_lname) || empty($admin_password)){
        header("Location: ../sign-up.php?error=emptyfields&email=".$admin_email."&fname=".$admin_fname."&lname=".$admin_lname);
        exit();
    }
    else if(!filter_var($admin_email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $admin_fname) && !preg_match("/^[a-zA-Z0-9]*$/", $admin_lname)){
        header("Location: ../sign-up.php?error=invalidemailfname&lname=".$admin_lname);
        exit();
    }
    else if(!filter_var($admin_email, FILTER_VALIDATE_EMAIL)){
        header("Location: ../sign-up.php?error=invalidemail&fname=".$admin_fname."&lname=".$admin_lname);
        exit();
    }
    else if(!preg_match("/^[a-zA-Z0-9]*$/", $admin_fname)){
        header("Location: ../sign-up.php?error=invalidfname&email=".$admin_email."&lname=".$admin_lname);
        exit();
    }
    else if(!preg_match("/^[a-zA-Z0-9]*$/", $admin_lname)){
        header("Location: ../sign-up.php?error=invalidlname&email=".$admin_email."&fname=".$admin_fname);
        exit();
    }
    else{
        $sql = "SELECT admin_email FROM admin WHERE admin_email=?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../sign-up.php?error=sqlerror");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "s", $admin_email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if($resultCheck > 0){
                header("Location: ../sign-up.php?error=emailtaken&fname=".$admin_fname."&lname=".$admin_lname);
                exit();
            }
            else{
                $sql = "INSERT INTO admin (admin_email, admin_pwd, lname, fname) VALUES (?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql)){
                    header("Location: ../sign-up.php?error=sqlerror");}
                else{
                    $hashedPwd = password_hash($admin_password, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt, "ssss", $admin_email, $hashedPwd, $admin_lname, $admin_fname);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../sign-up.php?signup=success");
                    exit();
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    header("Location: ../sign-up.php");
    exit();
}