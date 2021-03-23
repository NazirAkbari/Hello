<?php
include("../vendor/autoload.php");
$dsn = new MongoDB\Client;
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

$ukGymdb = $dsn->ukGym;
$membersCollection = $ukGymdb->members;
$result = $membersCollection->insertOne(
    ["_id"=>"$memberId",
    "class"=>"members",
    "member_type"=>"$memberType",
    "firstname"=>"$firstname",
    "fathername"=>"$fathername",
    "gender"=>"$gender",
    "phone"=>"$phone",
    "address"=>"$address",
    "extime"=>"$exTime",
    "locker"=>"$locker",
    "plan"=>"$plan",
    "fee"=>"$fee",
    "rfee"=>"$rfee",
    "regDate"=>"$regDate",
    "expDate"=>"$expDate",
    "monthOf"=>"$monthOf",
    "yearOf"=>"1400"
    ]
);
if($result){
    echo "<script>alert('Successfully Registered!');</script>";
    echo "<script>window.location.href='index.php';</script>";
    
}else{
    echo "Error";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="images/logo.png">
    <title>Registered!</title>
</head>
<body>
    <script>
        //alert("Student Successfully Registered !")
        //window.location.href = "register.php";
    </script>
</body>
</html>