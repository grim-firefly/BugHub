<?php
session_start();
$host = 'localhost';
$user = 'root';
$host_pass = '';
$db_name = 'BugHub';
$conn = new mysqli($host, $user, $host_pass, $db_name);

function signup()
{
    // echo '<div style="margin-bottom:0px; margin-top:-5px" class="alert alert-danger" role="alert">A simple danger alert—check it out!</div>';
    if (isset($_POST['signup-btn'])) {
        $username = $_POST['username'];
        $email = $_POST['useremail'];
        $pass = $_POST['password'];
        $cpass = $_POST['cpassword'];
        $utype=$_POST['usertype'];
        if (empty($username) || empty($email) || empty($pass) || empty($cpass) || empty($utype)) {
            echo '<div style="margin-bottom:0px; margin-top:-5px" class="alert alert-danger" role="alert">No field can\'t be empty!</div>';
        } else if ($pass != $cpass) {
            echo '<div style="margin-bottom:0px; margin-top:-5px" class="alert alert-danger" role="alert">Password not Matched!</div>';
        } else {
            global $conn;
            $qusername = "SELECT `username` FROM `user` WHERE `username`='$username'";
            $quseremail = "SELECT `email` FROM `user` WHERE `email`='$email'";
            $result = mysqli_query($conn, $qusername);
            $result2 = mysqli_query($conn, $quseremail);
            if (mysqli_num_rows($result) > 0 or mysqli_num_rows($result2) > 0) {
                echo '<div style="margin-bottom:0px; margin-top:-5px" class="alert alert-danger" role="alert">username or email is already taken!</div>';
            } else {
                $e_pass = password_hash($pass, PASSWORD_BCRYPT);
                $qinsert = "INSERT INTO `user`(`username`, `email`, `password`,`usertype`) VALUES ('$username','$email','$e_pass','$utype')";
                mysqli_query($conn, $qinsert);
                $_SESSION['massage'] = '<div style="margin-bottom:0px; margin-top:-5px" class="alert alert-success" role="alert">Successfully Registerd!</div>';
                header('location:login.php');
            }
        }
    }
}


function login()
{
    if (isset($_POST['login-btn'])) {
        $username = $_POST['username'];
        $email = $_POST['username'];
        $pass = $_POST['password'];
        if (empty($username) || empty($pass)) {
            echo '<div style="margin-bottom:0px; margin-top:-5px" class="alert alert-danger" role="alert">No field can\'t be empty!</div>';
        } else {
            global $conn;
            $qusername = "SELECT * FROM user WHERE username='$username'";
            $quseremail = "SELECT * FROM user WHERE email='$email'";
            $result = mysqli_query($conn, $qusername);
            $result2 = mysqli_query($conn, $quseremail);
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $hash = $row['password'];
                $flag = password_verify($pass, $hash);
                if ($flag) {
                    $_SESSION['username'] = $username;
                    $_SESSION['utype']=$row['usertype'];
                    header('location:dashboard.php');
                } else {
                    echo '<div style="margin-bottom:0px; margin-top:-5px" class="alert alert-danger" role="alert">Incorrect username or password!</div>';
                }
            } else if (mysqli_num_rows($result2) > 0) {
                // $row = $result2->fetch_row();
                $row = mysqli_fetch_assoc($result2);
                $hash = $row['password'];
                $flag = password_verify($pass, $hash);
                if ($flag) {
                    $user = $row['username'];
                    $_SESSION['username'] = $user;
                    $_SESSION['utype']=$row['usertype'];
                    header('location:dashboard.php');
                } else {
                    echo '<div style="margin-bottom:0px; margin-top:-5px" class="alert alert-danger" role="alert">Incorrect username or password!</div>';
                }
            } else {
                echo '<div style="margin-bottom:0px; margin-top:-5px" class="alert alert-danger" role="alert">Incorrect username or password!</div>';
            }
        }
    }
}



function addnew( )
{
    if (isset($_POST['addnew_btn'])) {
        $Title = $_POST['title'];
        $Description=$_POST['description'];
        if(empty($Title) || empty($Description)){
            $_SESSION['massage']= '<div class="container"><div class="alert alert-danger" role="alert">Field Can\'t be empty!</div></div>';
           header("location:addnew.php");
        }
        else{
            $name =$_FILES['myfile']['name'];
            $tmp = $_FILES['myfile']['tmp_name'];
            $tmp_ext=explode('.',$name);
            $ext= strtolower(end($tmp_ext));
            $file_new_name=uniqid('',true).".".$ext;
            $file_destination='uploads/'.$file_new_name;
            $label="New";
            
            $user=$_SESSION['username'];
            global $conn; 
            move_uploaded_file($tmp,$file_destination);
            $query = "INSERT INTO `bugs`(`username`, `title`, `description`, `label`, `files`) VALUES ('$user','$Title','$Description','$label','$file_new_name')";
            $result=mysqli_query($conn, $query);
            $_SESSION['massage']='<div class="container"><div class="alert alert-success" role="alert">Bug added succesfully!</div></div>';
            header("location:dashboard.php");
        }
       
    }
}
function assignAndLabel($id){
    if(isset($_POST['change'])){
        $label=$_POST['label_change'];
        $assign=$_POST['assign'];
        $query="UPDATE `bugs` SET `label`='$label',`developer`='$assign' WHERE id=$id;";
        global $conn;
        mysqli_query($conn,$query);
        $loc='location:view.php?id='.$id;
        header($loc);
        
    }


}
function changestate($id){

    if(isset($_POST['change'])){
        $label=$_POST['label_change'];
       
        $query="UPDATE `bugs` SET `label`='$label' WHERE id=$id;";
        global $conn;
        mysqli_query($conn,$query);
        $loc='location:view.php?id='.$id;
        header($loc);
        
    }

}