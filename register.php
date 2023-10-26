<?php
session_start();

include_once('dbconnect/connection.php');

$con = connection();

if (isset($_POST['submit'])) {
    if ($_POST['password'] == $_POST['confirm-password']) {

        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $gender = $_POST['gender'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $role = 'user';
        $status = 'active';

        // Check if email already exists
        $emailExist = "SELECT COUNT(*) as emailCount FROM user WHERE email = '$email'";
        $emailResult = $con->query($emailExist);
        $emailRow = $emailResult->fetch_assoc();

        if ($emailRow['emailCount'] > 0) {
            echo "<script language='javascript'>
                    alert('Email already exists!');
                    window.location.href ='register.html';
                  </script>";
            exit;
        }

        // Prepare and bind the values to prevent SQL injection
        $stmt = $con->prepare("INSERT INTO `user` (`firstName`, `lastName`, `gender`, `address`, `email`, `password`, `role`, `status`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssss", $fname, $lname, $gender, $address, $email, $password, $role, $status);

        if ($stmt->execute()) {
            $sql = "SELECT * FROM user WHERE email = '" . $email . "' and password = '" . $password . "'";
            $result = $con->query($sql);
            $row = $result->fetch_assoc();

            echo "<script language='javascript'>
            alert('Registered Successfully!');
            </script>";

            $_SESSION['ID'] = $row['ID'];
            $_SESSION['Role'] = $row['role'];
            $_SESSION['status'] = "Account Registered Successfully!";
            $_SESSION['status_code'] = "success";

            header('Location: user/user.php');
            exit;
        } else {
            // echo 'Error: ' . $stmt->error;
            $_SESSION['status'] = "Account Registered Failed!";
            $_SESSION['status_code'] = "error";
        }

        $stmt->close();
        $con->close();

    } else {
        // $password = $_POST['password'];
        // $confirmPassword = $_POST['confirm-password'];

        $_SESSION['status'] = "Pasword and Confirm Password Does Match";
        $_SESSION['status_code'] = "error";
        

        // echo "<script>
        //         alert('Password is Incorrect!');
        //         window.location.href ='register.php';            
        //     </script>";
        exit;
    }
}
?>