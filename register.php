<?php
include_once 'config.php';

if(isset($_SESSION['id'])) {
    if($_SESSION['id'] != '') {
        header('Location: welcome.php');
    }
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $flagError = true;
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $re_pass = $_POST['re_pass'];
    $terms = $_POST['terms'];

    if($name == '') {
        $flagError = false;
        $errName = 'Name is required.';
    }
    if($email == '') {
        $flagError = false;
        $errEmail = 'Email is required.';
    } elseif($email != '') {
        $sqlEmail = "SELECT email FROM users WHERE email = '".$email."'";
        $checkEmail = mysqli_query($conn, $sqlEmail);
        if($checkEmail->num_rows > 0) {
            $flagError = false;
            $errEmail = 'Email already exist.';
        }
    }
    if($pass == '') {
        $flagError = false;
        $errPass = 'Password is required.';
    }
    if($re_pass == '') {
        $flagError = false;
        $errPass = 'Confirm Password is required.';
    }
    if($terms == '') {
        $flagError = false;
        $errTerms = 'Terms of service is required.';
    }
    if(($pass && $re_pass) != '') {
        $flagError = false;
        $errPass = 'Password and cofirm password did not matched.';
    }

    if($flagError) {
        try {
            
        } catch (Throwable $th) {
            
        }
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
    }
}



include_once 'html/register.html';