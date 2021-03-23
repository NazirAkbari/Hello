<?php
    include("dbConnect.php");
    $membersCollection = $ukGymDB->members;

    $memberId = $_GET["memberId"];
    $memberType = $_GET["memberType"];
    $firstname = $_GET["firstname"];
    $fathername = $_GET["fName"];
    $gender = $_GET["gender"];
    $phone = $_GET["phone"];
    $address = $_GET["addres"];
    $exTime = $_GET["exTime"];
    $locker = $_GET["locker"];
    $plan = $_GET["plan"];
    $fee = $_GET["fee"];
    $rfee = $_GET["rfee"];
    $regDate = $_GET["regDate"];
    $expDate = $_GET["expDate"];
    $monthOf = $_GET["monthSelect"];
    $yearOf = 1400;
    
    $update = $membersCollection->updateOne(
        ["_id"=>"$memberId"],
        ['$set'=>["member_type"=>"$memberType", "firstname"=>"$firstname", "fathername"=>"$fathername", "gender"=>"$gender", "phone"=>"$phone", "address"=>"$address", "extime"=>"$exTime", "locker"=>"locker", "plan"=>"$plan", "fee"=>"$fee", "rfee"=>"$rfee", "regDate"=>"$regDate", "expDate"=>"$expDate", "monthOf"=>"$monthOf", "yearOf"=>"$yearOf"]]
    );

    if($update){
        echo "<script>
            alert('$firstname information has been updated successfully!' );
        </script>";
        echo "<script>
            window.location.href='see.php?month=*';
        </script>";
    }else{
        echo "<script>alert('Edition was not successfull');</script>";
        //echo "<script></script>";
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="images/logo.png">
    <title>Edited</title>
</head>
<body>
    
</body>
</html>


