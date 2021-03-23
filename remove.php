<?php
    include("dbConnect.php");
    $membersCollection = $ukGymDB->members;

    $id = $_GET["id"];

    $deleteMember = $membersCollection->deleteOne(
        ["_id"=>"$id"]
    );
    
    if($deleteMember){
        echo "<script>alert('Successfully Deleted !');</script>";
    }else{
        echo "<script>alert('Deletion Was Unsuccessfull !');</script>";
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="images/logo.png">
    <title>Removed</title>
</head>
<body>
    <h1>Removed Successfully</h1>
    <?php
        echo "<script>
            window.location.href = 'see.php';
        </script>";
    ?>
</body>
</html>