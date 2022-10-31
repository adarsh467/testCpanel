<?php
include_once 'config.php';

if(isset($_SESSION['id'])) {
    if($_SESSION['id'] != '') {
        header('Location: welcome.php');
    }
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $flagError = true;
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    if($email == '') {
        $flagError = false;
        $errEmail = 'Email is required.';
    }
    if($pass == '') {
        $flagError = false;
        $errPass = 'Password is required.';
    }

    if($flagError) {
        $sqlEmail = "SELECT email FROM users WHERE email = '".$email."'";
        $checkEmail = mysqli_query($conn, $sqlEmail);
        if($checkEmail->num_rows > 0) {
            $sqlPass = "SELECT id,full_name,email,password,status FROM users WHERE email = '".$email."' and password = '".md5($pass)."'";
            $checkPass = mysqli_query($conn, $sqlPass);
            $userData = mysqli_fetch_array($checkPass, MYSQLI_ASSOC);
            if($checkPass->num_rows > 0) {
                if($userData['status'] == 1) {
                    $_SESSION['id'] = $userData['id'];
                    $_SESSION['name'] = $userData['full_name'];
                    $_SESSION['email'] = $userData['email'];
                    $_SESSION['status'] = $userData['status'];

                    $sucMsg = 'Login Successfully!';
                    header('Location: welcome.php');
                } else {
                    $errMsg = 'Your account has been temporarily locked, please contact administrator.';
                }
            } else {
                $errMsg = 'These credentials did not match our records.';
            }
        } else {
            $errMsg = 'Email does not exist, you can do the registration by clicking on "Create an account".';
        }
    }
}


include_once 'html/login.html';