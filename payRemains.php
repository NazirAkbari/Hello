<?php
    include("dbConnect.php");
    $membersCollection = $ukGymDB->members;
    // get id and mony from url
    $memberId = $_GET["memberId"];
    $payedMoney = $_GET["money"];
    
    $money = $membersCollection->find(
        ["_id"=>"$memberId"],
        ["projection" => ["fee"=>1, "rfee"=>1]]
    );

    foreach($money as $data){
        $fee = $data["fee"];
        $rfee = $data["rfee"];
    }
    
    // calculation for payments
    $fee = $fee + $payedMoney;
    $rfee = $rfee - $payedMoney;

    //update money into database
    $upadatePayments = $membersCollection->updateOne(
        ["_id"=>"$memberId"],
        ['$set'=>["fee"=>"$fee", "rfee"=>"$rfee"]]
    );
    if($upadatePayments){
        echo "<script>
            alert('Remain Money Payed Successfully!');
            window.location.href='see.php';
        </script>";
    }else{
        echo "<script>
            alert('Paying was unsuccessful!');
            window.location.href='remains.php';
        </script>";
    }
    // echo $fee;
    // echo $rfee;
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="images/logo.png">
    <title>Paying Remains</title>
</head>
<body>
    
</body>
</html>