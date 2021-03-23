<?php
    include("dbConnect.php");
    $membersCollection = $ukGymDB->members;

    // collect remains
    $remainArray = $membersCollection->find(
        ["rfee" => ['$ne' => "0"]],
        ["projection" => ["_id"=>1, "firstname"=>1, "fathername"=>1, "regDate"=>1, "rfee"=>1]]
    );

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="images/logo.png">
    <link rel="stylesheet" href="style/see.css">
    <title>Remains</title>
</head>
<body>
    <div class="container">
    
    <div id="content">
            <table>
                <th>
                    <td style="font-weight:bold;">BillNo#</td>
                    <td style="font-weight:bold;">Firstname</td>
                    <td style="font-weight:bold;">Father name</td>
                    <td style="font-weight:bold;">RegDate</td>
                    <td style="font-weight:bold;">Pay Remains</td>
                    <td style="font-weight:bold;">Cash Remain</td>
                    
                </th>
                <?php foreach ($remainArray as $member):?>   
                        <tr>
                            <td></td>
                            <td class="billNo"><?php echo $member["_id"]?></td>
                            <td><?php echo $member["firstname"]?></td>
                            <td><?php echo $member["fathername"]?></td>
                            <td><?php echo $member["regDate"]?></td>
                            <td class="billNo"><?php echo $member["rfee"]?></td>
                            <td><a style="color:pink;font-size:18px;cursor:pointer;text-decoration:underline;" onclick="pay(<?php echo $member['_id']?>);"> Pay !</a></td>         
                        </tr>
                    <?php endforeach; ?>
            </table>
        </div>
    
    </div>
    <script src="script/payRemains.js"></script>
</body>
</html>