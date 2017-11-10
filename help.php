<!--Caroline Lee
  - 10-2-2017
  - Project
  - Help Screen
-->
<?php require 'header.php' ?>

<body>
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Field Trip</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a href="./">Home</a></li>
                    <li class="active"><a href="#">Help</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <div class="dropdown login-dropdown">
                        <button class="btn btn-secondary navbar-btn" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Login
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <form action="/db_connect.php">
                                <div class="form-group login-portal">
                                    <label for="username">Username:</label>
                                    <input type="username" class="form-control" id="username">
                                    <label for="username">Password:</label>
                                    <input type="password" class="form-control" id="password">
                                    <div class="forgot-password">
                                        <a data-toggle="modal" class="clickable" data-target="#password-modal">Forgot Password?</a>
                                    </div>
                                    <div class="login-submit-btn">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Submit</button>
                                        <!--Add dialog after submit-->
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </ul>
            </div>
        </div>
    </nav>
    <div class="col-md-2">
        <nav id="sidebar">
            <div class="sidebar-header">
                <ul class="list-unstyled components">
                    <li><a href="#home">Home</a></li>
                    <li><a href="#login">Login</a></li>
                    <li><a href="#dashboard">Dashboard</a></li>
                    <li><a href="#account">Account Settings</a></li>
                    <li><a href="#groups">Group Settings</a></li>
                    <li><a href="#meeting">Edit Meeting</a></li>
                    <li><a href="#meeting-info">Meeting Info</a></li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="col-md-10">
        <div id="home" align="center">
            <h2>Home</h2>
            <img src="./images/Home_Screen.png" width="800px" height="600px">
        </div>
        <div id="login" align="center">
            <h2>Login</h2>
            <img src="./images/Login_Screen.png" width="800px" height="600px">
        </div>
        <div id="dashboard" align="center">
            <h2>Dashboard</h2>
            <img src="./images/Dashboard_Screen.png" width="800px" height="600px">
        </div>
        <div id="account" align="center">
            <h2>Account Settings</h2>
            <img src="./images/Account_Settings_Screen.png" width="800px" height="600px">
        </div>
        <div id="groups" align="center">
            <h2>Group Settings</h2>
            <img src="./images/Edit_Groups_Screen.png" width="800px" height="600px">
        </div>
        <div id="meeting" align="center">
            <h2>Edit Meeting</h2>
            <img src="./images/Edit_Meeting_Screen.png" width="800px" height="600px">
        </div>
        <div id="meeting-info" align="center">
            <h2>Meeting Info</h2>
            <img src="./images/Meeting_Info_Screen.png" width="800px" height="600px">
        </div>
        <div class="modal fade" id="password-modal" role="dialog">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form action="/db_connect.php">
                            <div class="form-group">
                                <label for="email">Email Address:</label>
                                <input type="email" class="form-control" id="email">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Submit</button>
                                <!--**FOOTER ISSUE**-->
                                <!--Add dialog after submit-->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
   <?php require 'footer.php' ?>