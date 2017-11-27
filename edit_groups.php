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
//do stuff...
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
                    <a class="navbar-brand" href="dashboard.php">Field Trip</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="dashboard.php">Dashboard</a></li>
                        <li class="active"><a href="#">Groups</a></li>
                        <li><a href="help.php">Help</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="account_settings.php">Account</a></li>
                        <li><a href="logout.php">Logout</a></li>
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
        <!--CONTAINER FOR SECOND ROW-->
        <div class="container-fluid second-row">
            <!--SECOND ROW-->
            <div class="row group">
                <div class="row group-info">
                    <div class="col-md-4 module-title">
                        <h4 class="group-name">Coffee Shop Group</h4>
                        <div class="group-image">
                            <img src="./images/coffee.jpg" alt="coffee" class="img-thumbnail" width="200px" height="150px">
                            <!--https://media.timeout.com/images/100893385/image.jpg-->
                        </div>
                    </div>
                    <div class="col-md-3 members-module">
                        <h5 class="members">Members</h5>
                        <ul style="list-style-type: none" class="member-names">
                            <li id="name"><a href="#"><span class="glyphicon glyphicon-minus delete-sign"></span></a> fname lname</li>
                            <li id="name"><a href="#"><span class="glyphicon glyphicon-minus delete-sign"></span></a> fname lname</li>
                            <li id="name"><a href="#"><span class="glyphicon glyphicon-minus delete-sign"></span></a> fname lname</li>
                            <li id="name"><a href="#"><span class="glyphicon glyphicon-minus delete-sign"></span></a> fname lname</li>
                            <li id="name"><a href="#"><span class="glyphicon glyphicon-minus delete-sign"></span></a> fname lmane</li>
                        </ul>
                        <a href="#"><span class="glyphicon glyphicon-plus add-sign"></span></a>
                        <input type="text" class="mem-name-box" id="mem-name-box" name="member-name " placeholder="Enter name ">
                        <div class="save-btn-div ">
                            <button type="button " class="btn save-btn">Save</button>
                        </div>
                    </div>
                    <div class="col-md-3 meetings-module ">
                        <h5 class="meetings ">Meetings</h5>
                        <ul style="list-style-type: none " class="meeting-links ">
                            <li id="name ">Meeting 1 (day/time)<a href="# " class="link ">Info</a><a href="# " class="link ">Edit</a></li>
                            <li id="name ">Meeting 2 (day/time)<a href="# " class="link ">Info</a><a href="# " class="link ">Edit</a></li>
                            <li id="name ">Meeting 3 (day/time)<a href="# " class="link ">Info</a><a href="# " class="link ">Edit</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-offset-10 col-md-2 delete-group-btn">
                    <button type="button " class="btn delete-btn" onclick="confirmDelete()">Delete Group</button>
                </div>
            </div>
            <div class="row group ">
                <div class="row group-info ">
                    <div class="col-md-4 module-title ">
                        <h4 class="group-name ">Library Group</h4>
                        <div class="group-image ">
                            <img src="./images/library.jpg" alt="library" class="img-thumbnail " width="200px " height="150px ">
                            <!--https://usatcollege.files.wordpress.com/2014/09/139786707.jpg-->
                        </div>
                    </div>
                    <div class="col-md-3 members-module ">
                        <h5 class="members ">Members</h5>
                        <ul style="list-style-type: none " class="member-names ">
                            <li id="name "><a href="# "><span class="glyphicon glyphicon-minus delete-sign "></span></a> fname lname</li>
                            <li id="name "><a href="# "><span class="glyphicon glyphicon-minus delete-sign "></span></a> fname lname</li>
                            <li id="name "><a href="# "><span class="glyphicon glyphicon-minus delete-sign "></span></a> fname lname</li>
                            <li id="name "><a href="# "><span class="glyphicon glyphicon-minus delete-sign "></span></a> fname lname</li>
                            <li id="name "><a href="# "><span class="glyphicon glyphicon-minus delete-sign "></span></a> fname lmane</li>
                        </ul>
                        <a href="# "><span class="glyphicon glyphicon-plus add-sign "></span></a>
                        <input type="text " class="mem-name-box" id="mem-name-box" name="member-name " placeholder="Enter name ">
                        <div class="save-btn-div ">
                            <button type="button" class="btn save-btn">Save</button>
                        </div>
                    </div>
                    <div class="col-md-3 meetings-module ">
                        <h5 class="meetings ">Meetings</h5>
                        <ul style="list-style-type: none " class="meeting-links ">
                            <li id="name ">Meeting 1 (day/time)<a href="# " class="link ">Info</a><a href="# " class="link ">Edit</a></li>
                            <li id="name ">Meeting 2 (day/time)<a href="# " class="link ">Info</a><a href="# " class="link ">Edit</a></li>
                            <li id="name ">Meeting 3 (day/time)<a href="# " class="link ">Info</a><a href="# " class="link ">Edit</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-offset-10 col-md-2 delete-group-btn ">
                    <button type="button " class="btn delete-btn " onclick="confirmDelete()">Delete Group</button>
                </div>
            </div>
            <div class="row group ">
                <div class="row group-info ">
                    <div class="col-md-4 module-title ">
                        <h4 class="group-name ">Bowling Group</h4>
                        <div class="group-image ">
                            <img src="./images/bowling.jpg " alt="bowling " class="img-thumbnail " width="200px " height="150px ">
                            <!--http://www.lincolnbowl.co.uk/wp-content/uploads/2016/02/bggg.jpg-->
                        </div>
                    </div>
                    <div class="col-md-3 members-module ">
                        <h5 class="members ">Members</h5>
                        <ul style="list-style-type: none " class="member-names ">
                            <li id="name "><a href="# "><span class="glyphicon glyphicon-minus delete-sign "></span></a> fname lname</li>
                            <li id="name "><a href="# "><span class="glyphicon glyphicon-minus delete-sign "></span></a> fname lname</li>
                            <li id="name "><a href="# "><span class="glyphicon glyphicon-minus delete-sign "></span></a> fname lname</li>
                            <li id="name "><a href="# "><span class="glyphicon glyphicon-minus delete-sign "></span></a> fname lname</li>
                            <li id="name "><a href="# "><span class="glyphicon glyphicon-minus delete-sign "></span></a> fname lmane</li>
                        </ul>
                        <a href="# "><span class="glyphicon glyphicon-plus add-sign "></span></a>
                        <input type="text " class="mem-name-box" id="mem-name-box " name="member-name " placeholder="Enter name ">
                        <div class="save-btn-div ">
                            <button type="button " class="btn save-btn ">Save</button>
                        </div>
                    </div>
                    <div class="col-md-3 meetings-module ">
                        <h5 class="meetings ">Meetings</h5>
                        <ul style="list-style-type: none " class="meeting-links ">
                            <li id="name ">Meeting 1 (day/time)<a href="# " class="link ">Info</a><a href="# " class="link ">Edit</a></li>
                            <li id="name ">Meeting 2 (day/time)<a href="# " class="link ">Info</a><a href="# " class="link ">Edit</a></li>
                            <li id="name ">Meeting 3 (day/time)<a href="# " class="link ">Info</a><a href="# " class="link ">Edit</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-offset-10 col-md-2 delete-group-btn ">
                    <button type="button" class="btn delete-btn" onclick="confirmDelete()">Delete Group</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="delete-group-confirm">
        <div class="confirm">
            <p>Are you sure you want to delete this group?</p>
            <button type="button" class="btn btn-default" id="modal-btn-yes">Yes</button>
            <button type="button" class="btn btn-primary" id="modal-btn-no">No</button>
        </div>
    </div>
<?php require 'footer.php' ?>