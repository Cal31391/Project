<!--Caroline Lee
  - 10-2-2017
  - Project
  - Dashboard
-->
<?php require 'header.php';
session_start();
if(session_id() == '' || !isset($_SESSION)) {
    header("location:index.php");
}
else {
    $user = $_SESSION['username'];
    $id = $_SESSION['id'];
    include("config/db_connect.php");
}
?>

<body>
    <div class='page-wrapper'>
        <!--NAVBAR-->
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                            aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="dashboard.php">Field Trip</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Dashboard</a></li>
                        <li><a href="edit_groups.php">Groups</a></li>
                        <li><a href="help.php">Help</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="account_settings.php">Account</a></li>
                        <li><a href="index.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!--CONTAINER FOR ALL DASHBOARD-->
        <div class="container-fluid dashboard">
            <!--TITLE AND LOGO-->
            <div class="row">
                <div class="col-md-offset-4 col-md-4">
                    <div class="title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="logo">
                        <img src="./images/Logo.png" alt="placeholder" class="img-thumbnail" width="100px" height="100px">
                    </div>
                </div>
            </div>
            <!--CONTAINER FOR EVERYTHING ELSE-->
            <div class="container-fluid">
                <!--EVERYTHING ELSE-->
                <div class="row vertical-align account-elements">
                    <!--ACCOUNT ELEMENTS-->
                    <div class="col-md-offset-1 col-md-3 account">
                        <div class="user">
                            <img src="./images/Profile-Placeholder.png" alt="placeholder" class="img-thumbnail" width="100px" height="100px">
                        </div>
                        <br>
                        <br>
                        <p id="username">Username: <?php echo $user; ?></p>
                        <div class="link">
                            <button type="button" class="btn btn-primary" onclick="location.href = './account_settings.php'">Account Settings</button>
                        </div>
                    </div>
                    <!--MEETING SCHEDULE STUFF-->
                    <div class="col-md-3 scheduled-meetings">
                        <h4 class="schedule">Scheduled Meetings</h4>
                        <div class="list" id="list" align="center">
                            <?php
                            $user_id = $id;

                            $stmt = $conn->prepare("SELECT m.id FROM meetings m 
                            INNER JOIN groups g on m.group_name=g.name
                            INNER JOIN user_group ug on ug.group_id=g.id
                            INNER JOIN users u on ug.user_id=u.id
                            WHERE u.id = $user_id");
                            $stmt->execute();
                            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            $meeting_count = $stmt->rowCount();

                            $meeting_name = "";
                            $meeting_day = "";
                            $i = 0;
                            if ($meeting_count > 0) {
                                foreach($rows as $row) {
                                    //$row = $rows[$i];
                                    $meeting_id = $row['id'];

                                    $stmt = $conn->prepare("SELECT name, day, start_time, end_time FROM meetings 
                                                                      WHERE id = $meeting_id");
                                    $stmt->execute();
                                    $rows = $stmt->fetch(PDO::FETCH_ASSOC);
                                    $meeting_name = $rows['name'];
                                    $meeting_day = $rows['day'];
                                    $sTime = $rows['start_time'];
                                    $eTime = $rows['end_time'];
                                    //$escapedUrl = htmlspecialchars(json_encode($meeting_name));

                                    echo "<a class='clickable' id='meeting-name-link$i' style='display: inline-block; margin: 2%' 
                                            onclick='getMeetingDetails($i)'>$meeting_name, $meeting_day<br>$sTime-$eTime</a><br>";
                                    $i++;
                                }
                            }
                            ?>
                        </div>
                        <br>
                        <div class="new-meeting-link">
                            <button type="button" class="btn btn-primary" onclick="location.href = './new_meeting.php'">New Meeting</button>
                        </div>
                    </div>
                    <!--GROUPS STUFF-->
                    <div class="col-md-3 your-groups">
                        <h4 class="schedule">Your Groups</h4>
                        <div class="list" id="group-list" align="center">
                            <?php
                            $user_name = $user;
                            $stmt = $conn->prepare("SELECT g.name FROM groups g
                                                              INNER JOIN user_group ug on ug.group_id=g.id
                                                              INNER JOIN users u on u.id=ug.user_id
                                                              WHERE u.username='$user'");
                            $stmt->execute();
                            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            $count = $stmt->rowCount();

                            if ($count > 0) {
                                for($i=0; $i<$count; $i++) {
                                    $row = $rows[$i];
                                    echo "<li class='list-group-item list-group-item'>".$row["name"]."</li>";
                                }
                            }
                            ?>
                        </div>
                        <button type="button" class="btn btn-primary" onclick="location.href = './edit_groups.php'">Edit Groups</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require 'footer.php' ?>