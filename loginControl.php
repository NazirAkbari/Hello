<?php
    session_start();
    include("dbconnect.php");
    $adminCollection = $ukGymDB->admin;
    if(isset($_GET["login"])){

    
        $username = $_GET["username"];
        $password = $_GET["password"];
        $month = $_GET["month"];

        $UP = $adminCollection->find(
            ["username"=>"nazir","password"=>"12345"]
        );
        foreach($UP as $data){
            $usernameDB = $data["username"];
            $passwordDB = $data["password"];
        }
        if($username === $usernameDB){
            if($password === $passwordDB){
                $_SESSION["login"] = "yes";
                echo "<script>window.location.href='see.php?month=$month';</script>";
            }else{
                echo "<script>alert('Your Password is incorrect');</script>";
                echo "<script>window.location.href='index.php';</script>";
            }
        }else{
            echo "<script>alert('Your Username is incorrect');</script>";
            echo "<script>window.location.href='index.php';</script>";
        }
    }

    // logout controling
    if(isset($_GET["logout"])){
        session_destroy();
        unset($_SESSION["login"]);
        echo "<script>window.location.href='index.php';</script>";
    }

?>
