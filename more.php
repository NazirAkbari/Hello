<?php
    include("dbConnect.php");
    $membersCollection = $ukGymDB->members;

    $memberId = $_GET["memberId"];

    $data = $membersCollection->find(
        ["_id"=>"$memberId"]
    );
    
    foreach($data as $info){
        $mName = $info["firstname"];
        $mType = $info["member_type"];
        $mFname = $info["fathername"];
        $mGender = $info["gender"];
        $mPhone = $info["phone"];
        $mAddress = $info["address"];
        $mExTime = $info["extime"];
        $mLocker = $info["locker"];
        $mPlan = $info["plan"];
        $mFee = $info["fee"];
        $mrfee = $info["rfee"];
        $mRegDate = $info["regDate"];
        $mExpDate = $info["expDate"];
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="images/logo.png">
    <link rel="stylesheet" href="style/more.css">
    <title><?php echo $mName;?> Information</title>
</head>
<body>
    <div class="capsole">
        <div class="about">
            <h1>All Information About <?php echo $mName;?></h1>
            <hr>
            <fieldset id="left">
                <table>
                    <tr>
                        <td id="lebel">
                            <label for="name">Name: </label>
                        </td>
                        <td id="lebel2">
                            <span id="data"><?php echo $mName;?></span>
                        </td>
                    </tr>

                    <tr>
                        <td id="lebel">
                            <label for="name">F/Name: </label>
                        </td>
                        <td id="lebel2">
                            <span id="data"><?php echo $mFname;?></span>
                        </td>
                    </tr>

                    <tr>
                        <td id="lebel">
                            <label for="name">member Type: </label>
                        </td>
                        <td id="lebel2">
                            <span id="data"><?php echo $mType;?></span>
                        </td>
                    </tr>

                    <tr>
                        <td id="lebel">
                            <label for="name">Gender: </label>
                        </td>
                        <td id="lebel2">
                            <span id="data"><?php echo $mGender;?></span>
                        </td>
                    </tr>

                    <tr>
                        <td id="lebel">
                            <label for="name">Phone: </label>
                        </td>
                        <td id="lebel2">
                            <span id="data"><?php echo $mPhone;?></span>
                        </td>
                    </tr>

                    <tr>
                        <td id="lebel"> 
                            <label for="name">Address: </label>
                        </td>
                        <td id="lebel2">
                            <span id="data"><?php echo $mAddress;?></span>
                        </td>
                    </tr>
                    
                    <div id="ax">
                        <img src="upload/<?php echo $mName . '-' .$mFname.'.jpg'?>" alt="Member Picture! please enter 'name-fathername'" style="width:100%;height:100%;">
                    </div>
                </table>
            </fieldset>
            <fieldset id="right">
            <table>
                    <tr>
                        <td id="lebel">
                            <label for="name">Bill No: </label>
                        </td>
                        <td id="lebel2">
                            <span id="data"><?php echo $memberId;?></span>
                        </td>
                    </tr>

                    <tr>
                        <td id="lebel">
                            <label for="name">Locker: </label>
                        </td>
                        <td id="lebel2">
                            <span id="data"><?php echo $mLocker;?></span>
                        </td>
                    </tr>

                    <tr>
                        <td id="lebel">
                            <label for="name">Exercize Time: </label>
                        </td>
                        <td id="lebel2">
                            <span id="data"><?php echo $mExTime;?></span>
                        </td>
                    </tr>

                    <tr>
                        <td id="lebel">
                            <label for="name">Plan: </label>
                        </td>
                        <td id="lebel2">
                            <span id="data"><?php echo $mPlan;?></span>
                        </td>
                    </tr>

                    <tr>
                        <td id="lebel">
                            <label for="name">Total Fee: </label>
                        </td>
                        <td id="lebel2">
                            <span id="data"><?php echo $mFee;?></span>
                        </td>
                    </tr>

                    <tr>
                        <td id="lebel">
                            <label for="name">Remain Fee: </label>
                        </td>
                        <td id="lebel2">
                            <span id="data"><?php echo $mrfee;?></span>
                        </td>
                    </tr>

                    <tr>
                        <td id="lebel">
                            <label for="name">Reg-Date: </label>
                        </td>
                        <td id="lebel2">
                            <span id="data"><?php echo $mRegDate;?></span>
                        </td>
                    </tr>     
                    <tr>
                        <td id="lebel">
                            <label for="name">Exp-Date: </label>
                        </td>
                        <td id="lebel2">
                            <span id="data"><?php echo $mExpDate;?></span>
                        </td>
                    </tr>     
                </table>
                
            </fieldset>

        </div>
    </div>
</body>
</html>
