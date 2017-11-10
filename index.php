<!--Caroline Lee
  - 10-2-2017
  - Project
  - Homepage
-->
<?php require 'header.php' ?>

<body>
    <div class='page-wrapper'>
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
                        <li class="active"><a href="#">Home</a></li>
                        <li><a href="/project/help.php">Help</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <div class="dropdown login-dropdown">
                            <button class="btn btn-secondary navbar-btn" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Login
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <form id="login" action="login.php" method="post">
                                    <div class="form-group login-portal">
                                        <label for="username">Username:</label>
                                        <input type="text" class="form-control" name ="username" id="username">
                                        <label for="password">Password:</label>
                                        <input type="password" class="form-control" name="password" id="password">
                                        <div class="forgot-password">
                                            <a data-toggle="modal" class="clickable" data-target="#password-modal">Forgot Password?</a>
                                        </div>
                                        <div class="login-submit-btn">
                                            <button type="submit" class="btn btn-default" value="Submit" data-dismiss="modal">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container-fluid register">
            <div class="row">
                <div class="col-md-offset-4 col-md-4">
                </div>
                <div class="col-md-4">
                    <div class="logo">
                        <img src="./images/Logo.png" alt="placeholder" class="img-thumbnail" width="150px" height="150px">
                    </div>
                </div>
            </div>
            <div class="row main-row">
                <div class="col-md-offset-1 col-md-5 jumbotron-col">
                    <div class="jumbotron">
                        <h1>Field Trip</h1>
                        <p>Plan your next get-together with ease. Set the location, time, and add members to your unique group.</p>
                    </div>
                </div>
                <div class="col-md-4 register-module">
                    <div class="form">
                        <div class="register-title">
                            <h4>Register</h4>
                        </div>
                        <form action="/login.php">
                            <div class="form-group">
                                <label for="email">Username:</label>
                                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                            </div>
                            <div class="form-group">
                                <label for="pwd">Enter Password:</label>
                                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
                            </div>
                            <div class="form-group">
                                <label for="pwd">Re-enter Password:</label>
                                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
                            </div>
                            <div class="submit">
                                <button type="submit" class="btn btn-default">Submit</button>
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
                        <!--form action-->
                            <div class="form-group">
                                <label for="email">Email Address:</label>
                                <input type="email" class="form-control" id="email">
                                <button type="button" class="btn btn-default" data-dismiss="modal" onclick="autoRespond()">Submit</button> 
                            </div>
                        <!--form action-->
                    </div>
                </div>
            </div>
        </div>   
    </div>
    <div class="modal" id="email-sent">
        <div class="confirm">
        	<p>An email with your password has been sent to your email address.</p>
		</div>
    </div>

<?php require 'footer.php' ?>