<?php
    include("dbConnect.php");
    $membersCollection = $ukGymDB->members;

    $memberId = $_GET["memberId"];

    $info = $membersCollection->find(
        ["_id" => "$memberId"]
    );
  
    foreach($info as $data){
        $memberType =  $data["member_type"];
        $name =  $data["firstname"];
        $fname =  $data["fathername"];
        $gender =  $data["gender"];
        $phone =  $data["phone"];
        $addres =  $data["address"];
        $exTime =  $data["extime"];
        $locker =  $data["locker"];
        $plan =  $data["plan"];
        $fee =  $data["fee"];
        $rfee =  $data["rfee"];
        $regDate =  $data["regDate"];
        $expDate =  $data["expDate"];
        $year =  $data["yearOf"];
        $month =  $data["monthOf"];
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="images/logo.png">
    <link rel="stylesheet" href="style/main.css">
    <link rel="stylesheet" href="style/register.css">
    <title></title>
</head>
<body>
<div class="capsole">
        <h2 style="text-align:center; font-family:arial;font-weight:bold;">Edit The <?php echo $name;?> Information !</h2>
        <div id="form">
            <form  action="edited.php" method="get" enctype="multipart/form-data">
                <fieldset style="display:inline;">
                    <legend lang="en" dir="ltr" >Personal Info</legend>
                    <table>
                        <tr>
                            <td><label for="name">Bill No</label></td>
                            <td><input style="pointer-events:none;" type="text" value="<?php echo $memberId;?>" name="memberId"></td>
                        </tr>
                        <tr>
                            <td><label for="name">First name</label></td><td><input type="text" value="<?php echo $name;?>" name="firstname"></td>
                        </tr>
                        
                        <tr>
                            <td><label for="fname">Father name</label></td><td><input type="text" value="<?php echo $fname;?>" name="fName"></td>
                        </tr>
                        <tr>
                            <td><label for="gender">Gender</label></td><td>
                                <select name="gender" id="select-lang">
                                    <?php echo "<option value='$gender'>$gender</option>"?>
                                    <option value="" style="display:none;"></option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </td>
                        </tr>
                    </table>
                
                </fieldset>
                <!-- second field set -->
                <fieldset style="float:right;">
                    <legend lang="en" dir="rtl" >Gym Info</legend>
                    <table>
                        
                        <tr>
                        <td>
                            <label for="MemberType">Member Type</label></td>
                                <td>
                                    <select name="memberType" id="">
                                        <?php echo "<option value'$memberType'>$memberType</option>"?>
                                        <option value="" style="display:none;"></option>
                                        <option value="Gym">Gym</option>
                                        <option value="Fitness">Fitness</option>
                                    </select>
                                </td>
                        </tr>
                        <tr>
                        <td>
                            <label for="Practice">Practice Time</label></td>
                                <td><input  type="text" value="<?php echo $exTime;?>" name="exTime"></td>
                        </tr>
                        </tr>
                        <tr>
                            <td><label for="locker">Locker</label></td><td>
                                
                                    <select name="locker" id="locker" onChange = "prepareLocker(this.selectedIndex);">
                                        <?php echo "<option value='$locker'>$locker</option>"?>
                                        <option value="" style="display:none;"></option>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                
                            </td>
                        </tr>
                        <tr>
                            <td><label for="plan">Plan Duration</label></td><td>
                                <select name="plan" onChange = "preparePlan(this.selectedIndex);" id="plan">
                                    <?php echo "<option value='$plan'>$plan";?> / No discount <?php echo "</option>";?>
                                    <option value="" style="display:none;"></option>
                                    <option value="Monthly">Monthly / No discount</option>
                                    <option value="3 Month">3 Month / discount</option>
                                    <option value="6 Month">6 Month / discount</option>
                                    <option value="12 Month">12 Month / 50% discount</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="fee">Totalize Fee</label></td>
                            <td><input type="text" value="<?php echo $fee;?>" name="fee" id="fee"></td>
                        </tr>
                        <tr>
                            <td><label for="rfee">Remain Fee</label></td>
                            <td><input type="text" value="<?php echo $rfee;?>" name="rfee" id="fee"></td>
                        </tr>
                        <tr>
                            <td><label for="regDate">Reg - Date</label></td><td>
                                <input type="text" value="<?php echo $regDate;?>" name="regDate" id="regDate">
                            </td>
                        </tr>
                        <tr>
                            <td><label for="expDate">Exp - Date</label></td><td>
                                <input style="margin-bottom:14px;" type="text" value="<?php echo $expDate;?>" name="expDate" id= "expDate">
                            </td>
                        </tr>
                        
                    </table>
                
                </fieldset>
                <!-- 3rd field set-->
                <fieldset id="contact">
                    <legend lang="en" dir="rtl" >Contact Info</legend>
                    <table>
                        <tr>
                            <td><label for="name">Phone No</label></td><td><input type="text" value="<?php echo $phone;?>" name="phone"></td>
                        </tr>
                        
                        <tr>
                            <div id="rightSide">
                                <td><label for="rfee">Address</label></td>
                                <td><input type="text" value="<?php echo $addres;?>" name="addres" ></td>
                                
                            </div>
                        </tr>
                        <tr>
                        <td><label for="slect month" >In Month</label></td><td>
                            <select name="monthSelect" id="ms">
                                <?php echo "<option value='$month'>$month</option>"?>
                                <option value="hamal">حمل</option>
                                <option value="sawr">ثور</option>
                                <option value="jawza">جوزا</option>
                                <option value="saratan">سرطان</option>
                                <option value="asad">اسد</option>
                                <option value="sonbola">سنبله</option>
                                <option value="mezan">میزان</option>
                                <option value="aqrab">عقرب</option>
                                <option value="qaws">قوس</option>
                                <option value="jaddi">جدی</option>
                                <option value="dalw">دلو</option>
                                <option value="hoot">حوت</option>
                            </select>
                        </td>

                        </tr>
                        
                    </table>
                
                </fieldset>
                <!--BUTTON FIELD SET-->
                <fieldset id="btn">
                    <table>
                        <tr><td> <input style="margin-left:350px;" class="btn" type="submit" value = "Confirm"></td><td><input class="btn" type="button" onclick="window.location.href='see.php';" value="Cancel"></td></tr>
                    </table>
                
                    <h3 id="copyright">Alrights Reserved 2020 by Mohammad Nazir Akbari</h3>
                </fieldset>
            </form>
        </div>
    </div>
    
</body>
</html>