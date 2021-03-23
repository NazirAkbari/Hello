<?php
    include("../vendor/autoload.php");
    include("dbConnect.php");
    $membersCollection = $ukGymDB->members;
    $currentId =  $membersCollection->count(array("class" => "members"));

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="images/logo.png">
    <link rel="stylesheet" href="style/main.css">
    <link rel="stylesheet" href="style/register.css">
    <title>Register New Member</title>
</head>
<body>
<div class="capsole">
        <h2 style="text-align:center; font-family:arial;font-weight:bold;">Welcome To Registeration Form For Gym Member !</h2>
        <div id="form">
            <form onsubmit="return validate_form();" action="added.php" method="get" enctype="multipart/form-data">
                <fieldset style="display:inline;">
                    <legend lang="en" dir="ltr" >Personal Info</legend>
                    <table>
                        <tr>
                            <td><label for="name">Bill No</label></td>
                            <td><input style="pointer-events:none;" type="text" value="<?php echo $currentId+1;?>" name="memberId"></td>
                        </tr>
                        <tr>
                            <td><label for="name">First name</label></td><td><input type="text" name="firstname" id="firstname"></td>
                        </tr>
                        
                        <tr>
                            <td><label for="fname">Father name</label></td><td><input type="text" name="fName" id="fathername" ></td>
                        </tr>
                        <tr>
                            <td><label for="gender">Gender</label></td><td>
                                <select name="gender" id="gender">
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
                                    <select name="memberType" id="membertype">
                                        <option value="" style="display:none;"></option>
                                        <option value="Gym">Gym</option>
                                        <option value="Fitness">Fitness</option>
                                    </select>
                                </td>
                        </tr>
                        <tr>
                        <td>
                            <label for="Practice">Practice Time</label></td>
                                <td>
                                    <select name="exTime" id="time">
                                        <option style="display:none;" value=""></option>
                                        <option value="Morning">Morning</option>
                                        <option value="Afternoon">Afternoon</option>
                                        <option value="Evening">Evening</option>
                                    </select>
                                </td>
                        </tr>
                        </tr>
                        <tr>
                            <td><label for="locker">Locker</label></td>
                                <td>
                                    <select style="width:110px;" name="lockerValid" id="locker" onChange = "prepareLocker(this.selectedIndex);">
                                        <option value="" style="display:none;"></option>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                    <input type="text" id = "lockerNo" name="locker" placeholder="1 - 126" style="width:100px;float:right;margin-right:7px;">
                                </td>
                        </tr>
                        <tr>
                            <td><label for="plan">Plan Duration</label></td><td>
                                <select name="plan" onChange = "preparePlan(this.selectedIndex);" id="plan">
                                    <option value="" style="display:none;"></option>
                                    <option value="monthly">Monthly / No discount</option>
                                    <option value="6month">6 Month / $500 discount</option>
                                    <option value="12month">12 Month / $1000 discount</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="fee">Totalize Fee</label></td>
                            <td><input type="text" value = 0 name="fee" id="fee"></td>
                        </tr>
                        <tr>
                            <td><label for="rfee">Remain Fee</label></td>
                            <td><input type="text" name="rfee" value=0 id="fee"></td>
                        </tr>
                        <tr>
                            <td><label for="regDate">Reg - Date</label></td><td>
                                <input type="text"  name="regDate" id="regDate">
                            </td>
                        </tr>
                        <tr>
                            <td><label for="expDate">Exp - Date</label></td><td>
                                <input style="margin-bottom:14px;" type="text" name="expDate" id= "expDate">
                            </td>
                        </tr>
                        
                    </table>
                
                </fieldset>
                <!-- 3rd field set-->
                <fieldset id="contact">
                    <legend lang="en" dir="rtl" >Contact Info</legend>
                    <table>
                        <tr>
                            <td><label for="name">Phone No</label></td><td><input type="text" name="phone" id="phone"></td>
                        </tr>
                        
                        <tr>
                            <div id="rightSide">
                                <td><label for="rfee">Address</label></td>
                                <td><input type="text" name="addres" id="address"></td>
                                
                            </div>
                        </tr>
                        <tr>
                        <td><label for="slect month" >In Month</label></td><td>
                            <select name="monthSelect" id="ms">
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
                        <tr><td> <input style="margin-left:350px;" class="btn" type="submit" value = "Register"></td><td><input class="btn" type="button" onclick="window.location.href='index.php';" value="Cancel"></td></tr>
                    </table>
                
                    <h3 id="copyright">Alrights Reserved 2020 by Mohammad Nazir Akbari</h3>
                </fieldset>
            </form>
        </div>
    </div>
    <script src="script/mdSystem.js"></script>
    <script src="script/validation.js"></script>
</body>
</html>

