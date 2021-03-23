<script src="script/months.js"></script>
<?php
    session_start();
    include("dbConnect.php");
    $memberCollection = $ukGymDB->members;
    
    // collect General Information Of Members
    $membersInfo = $memberCollection->find(
        ["class"=>"members"]
    );
    
    // collect total incomes of Gym
    $fees = $memberCollection->find(
        ["class" => "members"],
        ["projection" => ["fee"=> 1]]
    );
    $totalFee = 0;
    foreach($fees as $fee){
        $totalFee += $fee["fee"];
    }
    
    // collect total remains of Gym Members

    $rfees = $memberCollection->find(
        ["class" => "members"],
        ["projection" => ["rfee" => 1]]
    );
    $totalRFee = 0;
    foreach($rfees as $rfee){
        $totalRFee += $rfee["rfee"];
        // echo $rfee["rfee"];
    }

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="images/logo.png">
    <link rel="stylesheet" href="style/see.css">
    <title>See Statistics</title>
</head>
<body>
    <div class="capsole">
        <div id="header">
            <h2>All Information About Gym Members !</h2>
            <button name ="logout" style="margin-left:1139px;margin-top:-70px;background-color:lightgray;" onclick="window.location.href='loginControl.php?logout=1';">Logout</button>
            <button style="float:left;margin-top:-38px;background-color:lightgray;" onclick="window.location.href='statistics.php?month=<?php echo $_GET['month'];?>';">Reports</button>
        </div>
        <div id="nav">
            <div id="searchBox">
                <input type="text" placeholder="search here" id="searchKey">
            </div>
            <div id="searchBtn">
                <button onclick="searchStudent();">Search</button>
            </div>
            <div id="totalMoney" class="">
                <p style="padding:0px;margin-top:6px;border-bottom:1px solid black;">BMI:</p>
                <p style="font-size:20px;margin-top:0px;font-weight:bold;"><a href="bmi.html"><button id="bmiButton" >Check BMI</button></a></p>
            </div>

            <div id="totalMoney">
                <p style="padding:0px;margin-top:6px;border-bottom:1px solid black;cursor:pointer;" onClick="showRemains();">Total Remains:</p>
                <p style="font-size:20px;margin-top:0px;font-weight:bold;"><?php echo $totalRFee; ?> afs</p>
            </div>
            <div id="totalMoney">
                <p style="padding:0px;margin-top:6px;border-bottom:1px solid black;">Total Incomes:</p>
                <p style="font-size:20px;margin-top:0px;font-weight:bold;"><?php echo $totalFee; ?> afs</p>
            </div>
            
            <div id="totalMoney">
                <p style="padding:0px;margin-top:6px;border-bottom:1px solid black;">Month of:</p>
                <p style="font-size:20px;margin-top:0px;font-weight:bold;">
                    <select style="background-color:lightgray;font-size:14px;padding:5px;margin-top:-5px;border-radius:8px;" name="selectMonth" id="sm" onChange = "selectMonth(this.selectedIndex);">
                        <option value="whole">Choose the month</option>
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
                        <option value="all">تمام سال</option>
                    </select>
                </p>
            </div>
            
        </div>
        <div id="content">
            <table>
                <th>
                    
                    <td style="font-weight:bold;">BillNo#</td>
                    <td style="font-weight:bold;">Firstname</td>
                    <td style="font-weight:bold;">Father name</td>
                    <td style="font-weight:bold;">RegDate</td>
                    <td style="font-weight:bold;">ExpDate</td>
                    <td style="font-weight:bold;">DB Operations</td>
                    
                </th>
                
                <?php foreach ($membersInfo as $member):?> 
                      
                        <tr>
                            <td></td>        
                            <td class="billNo"><?php echo $member["_id"]?></td>
                            <td><?php echo $member["firstname"]?></td>
                            <td><?php echo $member["fathername"]?></td>
                            <td><?php echo $member["regDate"]?></td>
                            <td class="billNo expDate"><?php echo $member["expDate"]?></td>
                            <td style="width:80px;">
                                <a style="color:black;background-color:lightblue;border-right:2px solid black;padding-right:10px;padding-left:10px;" href="more.php?memberId=<?php echo $member["_id"];?>&memberName=<?php echo $member["firstname"];?>"> More Info </a>
                                <a style="color:black;background-color:lightgreen ;border-right:2px solid black;padding-right:10px;padding-left:10px;" href="edit.php?memberId=<?php echo $member["_id"];?>&memberName=<?php echo $member["firstname"];?>"> Edit </a>
                                <a style="cursor:pointer;color:black;background-color:pink;padding-right:5px;padding-left:10px;" onclick="removeIt('<?php echo $member['_id'];?>','<?php echo $member['firstname'];?>');"> Remove </a>
                        <!------>
                            </td>         
                        </tr>
                    <?php endforeach; ?>
            </table>
        </div>
    </div>
    <script>
        function removeIt(id,name) {
            if(confirm("Are you sure want to delete " + name +" from gym?")){
                window.location.href = "remove.php?id="+id;
        }
    }
    </script>
    <script src="script/search_Expiration.js"></script>
    <script src="script/months.js"></script>
</body>
</html>