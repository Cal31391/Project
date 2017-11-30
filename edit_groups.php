<!--Caroline Lee
  - 10-2-2017
  - Project
  - Edit Groups 
-->
<?php require 'header.php';
session_start();
if(session_id() == '' || !isset($_SESSION)) {
    header("location:index.php");
}
else {
    include("config/db_connect.php");
    $user = $_SESSION['username'];
}

?>

<body>
    <div class='page-wrapper'>
        <!--NAVBAR-->
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="./dashboard.php">Field Trip</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="./dashboard.php">Dashboard</a></li>
                        <li class="active"><a href="#">Groups</a></li>
                        <li><a href="./help.php">Help</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="./account_settings.php">Account</a></li>
                        <li><a href="./logout.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!--CONTAINER FOR FIRST ROW-->
        <div class="container-fluid first-row">
            <!--TITLE AND LOGO-->
            <div class="row first-row" align="center">
                <div class="col-md-offset-4 col-md-4">
                    <div class="title">
                        <h1>Groups</h1>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="logo">
                        <img src="./images/Logo.png" alt="logo" class="img-thumbnail" width="100px" height="100px">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-offset-5 col-md-2 group-selector">
            <select class="form-control" id="group-names-edit" name="group-names-edit">
                <?php
                $stmt = $conn->prepare("SELECT * FROM groups");
                $stmt->execute();
                $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $count = $stmt->rowCount();
                echo "<option value='" . 0 . "'>" . "(Select Group)" . "</option>";
                if ($count > 0) {
                    for($i=0; $i<$count; $i++) {
                        $row = $rows[$i];
                        echo "<option value='" . $row["name"] . "'>" . $row['name'] . "</option>";
                    }
                }
                ?>
            </select>
        </div>
        <div id="reload-btn">
            <button type="button " class="btn reload-btn" onclick="reload()">Reload</button>
            <button type="button " class="btn new-group-btn" data-toggle="modal" data-target="#create-group-name-modal"">New Group</button>
        </div>




        <!--CONTAINER FOR SECOND ROW-->
        <div class="container-fluid second-row">
            <!--SECOND ROW-->
            <div class="row group">
                <div class="row group-info">
                    <div class="col-md-4 module-title">
                        <div class="group-image">
                            <img src="./images/placeholder.png" alt="coffee" class="img-thumbnail" width="200px" height="150px">
                            <!--https://media.timeout.com/images/100893385/image.jpg-->
                        </div>
                    </div>
                    <div class="col-md-3 members-module">
                        <h5 class="members">Members</h5>
                        <ul style="list-style-type: none" class="member-names" id="member-names">
                        </ul>
                            <select class="form-control" id="mem-name-box" name="member-name">
                                <?php
                                $stmt = $conn->prepare("SELECT * FROM users");
                                $stmt->execute();
                                $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                $count = $stmt->rowCount();
                                echo "<option value='" . 0 . "'>" . "(Select Name)" . "</option>";
                                if ($count > 0) {
                                    for($i=0; $i<$count; $i++) {
                                        $row = $rows[$i];
                                        echo "<option value='" . $row["username"] . "'>" . $row['username'] . "</option>";
                                    }
                                }
                                ?>
                            </select>
                        <a class='add-member-link' style='cursor: pointer' onclick='addName();'>Add</a>
                    </div>
                    <div class="col-md-3 meetings-module ">
                        <h5 class="meetings ">Meetings</h5>
                        <ul style="list-style-type: none " class="meeting-links" id="meeting-links">
                        </ul>
                    </div>
                </div>
                <div class="col-md-offset-10 col-md-2 save-group-btn">
                    <button type="button " class="btn save-btn" data-toggle="modal" data-target="#edit-group-name-modal">Change Group Name</button>
                    <span class="popuptext" id="confirmSaved">Saved!</span>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="edit-group-name-modal" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="group-name">Enter Group Name</label>
                        <input type="text" class="form-control" id="new-group-name" name="new-group-name">
                        <button type="button" class="btn btn-default" onclick="changeGroupName()" data-dismiss="modal">Submit</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="create-group-name-modal" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="group-name">Enter Group Name</label>
                        <input type="text" class="form-control" id="new-create-group-name" name="new-create-group-name">
                        <button type="button" class="btn btn-default" onclick="createGroup()" data-dismiss="modal">Submit</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>


<?php require 'footer.php' ?>