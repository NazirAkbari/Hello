<?php
    include("dbConnect.php");
    $membersCollection = $ukGymDB->members;

    $month = $_GET['month'];

    if($month !== "*"){
        // collect the general partiecepents of related month
        $particepents = $membersCollection->count(array("monthOf"=>"$month"));

        // Collects gym parts
        $Gymparticepents = $membersCollection->count(array("member_type"=>"Gym", "monthOf"=>"$month"));
        
        // query for fitness parts
        $Fitnessparticepents = $membersCollection->count(array("member_type"=>"Fitness", "monthOf"=>"$month"));
      
        // query for total males
        $totalMales = $membersCollection->count(array("gender"=>"Male", "monthOf"=>"$month"));
        
        // query for total females
        $totalFemales = $membersCollection->count(array("gender"=>"Female", "monthOf"=>"$month"));
        
        // query for total evining members
        $totalEvening = $membersCollection->count(array("extime"=>"Evening", "monthOf"=>"$month"));

        // query for total males in evening
        $totalEveningMale = $membersCollection->count(array("gender"=>"Male", "monthOf"=>"$month","extime"=>"Evening"));
        
        // query for total females in evening
        $totalEveningFemale = $membersCollection->count(array("gender"=>"Female", "monthOf"=>"$month","extime"=>"Evening"));
        
        // qeury for total afternoon
        $totalAfternoon = $membersCollection->count(array("extime"=>"Afternoon", "monthOf"=>"$month"));
        
        // query for total males in Afternoon
        $totalAfternoonMale = $membersCollection->count(array("extime"=>"Afternoon", "monthOf"=>"$month","gender"=>"Male"));
        
        // query for total females in Afternoon
        $totalAfternoonFemale = $membersCollection->count(array("extime"=>"Afternoon", "monthOf"=>"$month","gender"=>"Female"));
        
        // qeury for total morning members
        $totalMorning = $membersCollection->count(array("extime"=>"Morning", "monthOf"=>"$month"));
        
        // query for total males in Morning
        $totalMorningMale = $membersCollection->count(array("extime"=>"Morning", "monthOf"=>"$month","gender"=>"Male"));
        
        // query for total females in Morning
        $totalMorningFemale = $membersCollection->count(array("extime"=>"Morning", "monthOf"=>"$month","Gender"=>"Female"));

    }else{
        $month = "All";
        // collect the general partiecepents of related month
        $particepents = $membersCollection->count(array("class"=>"members"));

        // Collects gym parts
        $Gymparticepents = $membersCollection->count(array("member_type"=>"Gym"));
        
        // query for fitness parts
        $Fitnessparticepents = $membersCollection->count(array("member_type"=>"Fitness"));
      
        // query for total males
        $totalMales = $membersCollection->count(array("gender"=>"Male"));
        
        // query for total females
        $totalFemales = $membersCollection->count(array("gender"=>"Female"));
        
        // query for total evining members
        $totalEvening = $membersCollection->count(array("extime"=>"Evening"));

        // query for total males in evening
        $totalEveningMale = $membersCollection->count(array("gender"=>"Male","extime"=>"Evening"));
        
        // query for total females in evening
        $totalEveningFemale = $membersCollection->count(array("gender"=>"Female","extime"=>"Evening"));
        
        // qeury for total afternoon
        $totalAfternoon = $membersCollection->count(array("extime"=>"Afternoon"));
        
        // query for total males in Afternoon
        $totalAfternoonMale = $membersCollection->count(array("extime"=>"Afternoon","gender"=>"Male"));
        
        // query for total females in Afternoon
        $totalAfternoonFemale = $membersCollection->count(array("extime"=>"Afternoon","gender"=>"Female"));
        
        // qeury for total morning members
        $totalMorning = $membersCollection->count(array("extime"=>"Morning"));
        
        // query for total males in Morning
        $totalMorningMale = $membersCollection->count(array("extime"=>"Morning","gender"=>"Male"));
        
        // query for total females in Morning
        $totalMorningFemale = $membersCollection->count(array("extime"=>"Morning","Gender"=>"Female"));

     }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="images/logo.png">
    <link rel="stylesheet" href="style/stat.css">
    <title>Reports</title>
</head>
<body>
    <div class="capsole">
        <div id="header">
            <h1>Welcome to Reports of  '<?php echo $month;?>' Month!</h1>
            <button style="float:left;margin-top:-80px;background-color:lightgray;" onclick="window.location.href='see.php?month=<?php echo $_GET['month'];?>';">Home</button>
        </div>
        <div id="nav">
            <h2>The Total Patricipants Is <span style="color:brown;border-bottom:1px solid brown;font-size:30px;"><?php echo $particepents;?></span> Members. ---- Gym Members <span style="color:brown;border-bottom:1px solid brown;font-size:30px;"><?php echo $Gymparticepents;?></span> / Fitness Members <span style="color:brown;border-bottom:1px solid brown;font-size:30px;"><?php echo $Fitnessparticepents;?></span></h2>
        </div>
        <div id="content">
            <div class="left">
                <!-- Morning -->
                <div id="morning">
                    <div id="title">
                        <span class="textTitle">Morning Members</span>
                    </div>
                    <div id="digit">
                        <span class="digitText"><?php echo $totalMorning;?> Persons</span>
                    </div>
                    <div class="MF">
                        <div id="left">
                            <div id="Title">Males</div>
                            <div id="Digit"><?php echo $totalMorningMale;?></div>
                        </div>
                        <div id="right">
                            <div id="Title">Females</div>
                            <div id="Digit"><?php echo $totalMorningFemale;?></div>
                        </div>
                    </div>

                </div>
                <!-- Afternoon -->
                <div id="afternoon">
                <div id="title">
                        <span class="textTitle">Afternoon Members</span>
                    </div>
                    <div id="digit">
                        <span class="digitText"><?php echo $totalAfternoon;?> Persons</span>
                    </div>
                    <div class="MF">
                        <div id="left">
                            <div id="Title">Males</div>
                            <div id="Digit"> <?php echo $totalAfternoonMale?></div>
                        </div>
                        <div id="right">
                            <div id="Title">Females</div>
                            <div id="Digit"><?php echo $totalAfternoonFemale?></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="right">
                <!-- Evening -->
            <div id="morning">
                    <div id="title">
                        <span class="textTitle">Evening Members</span>
                    </div>
                    <div id="digit">
                        <span class="digitText"><?php echo $totalEvening;?> Persons</span>
                    </div>
                    <div class="MF">
                        <div id="left">
                            <div id="Title">Males</div>
                            <div id="Digit"> <?php echo $totalEveningMale;?></div>
                        </div>
                        <div id="right">
                            <div id="Title">Females</div>
                            <div id="Digit"><?php echo $totalEveningFemale;?></div>
                        </div>
                    </div>

                </div>
                <!-- Totals -->
                <div id="afternoon">
                <div id="title">
                        <span class="textTitle" style="margin-left:-80px;">Total Members</span>
                    </div>
                    <div id="digit">
                        <span class="digitText"><?php echo $particepents;?> Persons</span>
                    </div>
                    <div class="MF">
                        <div id="left">
                            <div id="Title">Males</div>
                            <div id="Digit"> <?php echo $totalMales;?></div>
                        </div>
                        <div id="right">
                            <div id="Title">Females</div>
                            <div id="Digit"><?php echo $totalFemales;?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>


