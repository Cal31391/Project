<!--Caroline Lee
  - 10-2-2017
  - Project
  - Account Settings
-->
<?php require 'header.php' ?>

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
                    <a class="navbar-brand" href="#">Field Trip</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="#">Dashboard</a></li>
                        <li><a href="#">Groups</a></li>
                        <li><a href="#">Help</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active"><a href="#">Account</a></li>
                        <li><a href="#">Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!--CONTAINER FOR ALL ACCOUNT SETTINGS-->
        <div class="container-fluid settings">
            <!--TITLE AND LOGO-->
            <div class="row" align="center">
                <div class="col-md-offset-4 col-md-4">
                    <div class="title">
                        <h1>Account Settings</h1>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="logo">
                        <img src="./images/logo.png" alt="placeholder" class="img-thumbnail" width="100px" height="100px">
                    </div>
                </div>
            </div>
            <!--CONTAINER FOR EVERYTHING ELSE-->
            <div class="container-fluid">
                <!--EVERYTHING ELSE-->
                <div class="row stuff">
                    <!--USER STUFF-->
                    <div class="col-sm-offset-5 col-sm-3 user-info">
                        <div class="user">
                            <img src="./images/Profile-Placeholder.png" alt="placeholder" class="img-thumbnail" width="200px" height="200px">
                        </div>
                        <div class="link" style="cursor: pointer">
                            <div class="change-pic">
                                <a data-toggle="modal" data-target="#pic-modal">Change</a>
                            </div>
                        </div>
                        <br>
                        <br>
                        <p class="username">Username: Andy Dwyer</p>
                        <div class="link" style="cursor: pointer">
                            <div class="change-username">
                                <a data-toggle="modal" data-target="#username-modal">Change</a>
                            </div>
                        </div>
                        <p class="password">Password: ******</p>
                        <div class="link" style="cursor: pointer">
                            <div class="change-password">
                                <a data-toggle="modal" data-target="#password-modal">Change</a>
                            </div>
                        </div>
                        <p class="email">Email: (ADwyer@cityofpawnee.gov)</p>
                        <div class="link" style="cursor: pointer">
                            <div class="change-email">
                                <a data-toggle="modal" data-target="#email-modal">Change</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--MODALS-->
        <div class="modal fade" id="pic-modal" role="dialog">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form action="/action_page.php">
                            <div class="form-group">
                                <label class="control-label">Select File</label>
                                <input id="input-b5" name="input-b5[]" type="file" multiple>
                                <input type="pic" class="form-control" id="pic">
                                <button type="button" class="btn btn-default account_modify-btn" data-dismiss="modal">Submit</button>
                                <!--http://plugins.krajee.com/file-basic-usage-demo-->
                                <!--Add dialog after submit-->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="username-modal" role="dialog">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form action="/action_page.php">
                            <div class="form-group">
                                <label for="username">Enter New Username:</label>
                                <input type="username" class="form-control" id="username">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Submit</button>
                                <!--Add dialog after submit-->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="password-modal" role="dialog">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form action="/action_page.php">
                            <div class="form-group">
                                <label for="password">Old Password:</label>
                                <input type="password" class="form-control" id="password-old">
                                <br>
                                <label for="password">New Password:</label>
                                <input type="password" class="form-control" id="password-new">
                                <br>
                                <label for="password">Re-enter New Password:</label>
                                <input type="password" class="form-control" id="password-new-re">
                                <br>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Submit</button>
                                <!--Add dialog after submit-->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="email-modal" role="dialog">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form action="/action_page.php">
                            <div class="form-group">
                                <label for="email">Enter Email:</label>
                                <input type="email" class="form-control" id="email">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Submit</button>
                                <!--Add dialog after submit-->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require 'footer.php' ?>