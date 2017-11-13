<!--Caroline Lee
  - 10-2-2017
  - Project
  - Edit Meeting
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
                        <li><a href="#">Account</a></li>
                        <li><a href="#">Logout</a></li>
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
                        <h1>Meeting 1</h1>
                    </div>
                    <div class="link">
                        <div class="edit-name">
                            <a data-toggle="modal" class="clickable" data-target="#edit-name-modal">Change</a>
                        </div>
                    </div>
                    <!--EDIT NAME MODAL-->
                    <div class="modal fade" id="edit-name-modal" role="dialog">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <form action="/action_page.php">
                                        <div class="form-group">
                                            <label for="meeting-name">Enter Meeting Name</label>
                                            <input type="name" class="form-control" id="meeting-name">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Submit</button>
                                            <!--Add dialog after submit-->
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
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
            <div class="row second-row">
                <!--GROUP INFO, DATES, MAP-->
                <div class="col-md-offset-1 col-md-3 second-row-col-1-meeting">
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Select Group
                            <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <li><a href="#">Group 1</a></li>
                            <li><a href="#">Group 2</a></li>
                            <li><a href="#">Group 3</a></li>
                        </ul>
                    </div>
                    <div class="link">
                        <div class="edit-groups">
                            <a href="edit_groups.php">Edit Groups</a>
                        </div>
                    </div>
                    <br>
                    <div class="group-box-elements">
                        <div class="group-box-meeting">
                            <a href="#" class="list-group-item list-group-item-action">Group member 1</a>
                            <a href="#" class="list-group-item list-group-item-action">Group member 2</a>
                            <a href="#" class="list-group-item list-group-item-action">Group member 3</a>
                            <a href="#" class="list-group-item list-group-item-action">Group member 4</a>
                            <a href="#" class="list-group-item list-group-item-action">Group member 5</a>
                        </div>
                        <div class="select-buttons">
                            <button type="button" class="btn" onclick="selectAll()">Select All</button>
                            <button type="button" class="btn" onclick="unselectAll()">Unselect All</button>
                        </div>
                        <div class="link">
                            <div class="save-new-group">
                                <a data-toggle="modal" class="clickable" data-target="#save-new-group-modal">Save New Group</a>
                            </div>
                        </div>
                        <!--SAVE NEW GROUP MODAL-->
                        <div class="modal fade" id="save-new-group-modal" role="dialog">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/action_page.php">
                                            <div class="form-group">
                                                <label for="group-name">Enter Group Name</label>
                                                <input type="name" class="form-control" id="group-name">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Submit</button>
                                                <!--Add dialog after submit-->
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 second-row-col-2">
                    <div class="start-date-dropdown">
                        <div class="form-group">
                            <label for='datetimepicker1'>From: </label>
                            <input type="text" id="datepicker1">                          
                        </div>
                    </div>
                    <div class="end-date-dropdown">
                        <div class="form-group">
                            <label for='datetimepicker2'>To: </label>
                            <input type="text" id="datepicker2">
                        </div>
                    </div>
                    <!--datepickers from: https://codepen.io/milz/pen/xbXpWw-->
                    <div class="notes-board">
                        <div class="form-group">
                            <label for="notes">Notes:</label>
                            <textarea class="form-control" rows="5" id="notes"></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 second-row-col-3">
                    <div class="map">
                        <div id="map" style="width:350px;height:350px;background:black"></div>
                    </div>
                </div>
            </div>
        </div>
        <!--CONTAINER FOR THIRD ROW-->
        <div class="container-fluid">
            <div class="row third-row">
                <div class="col-md-offset-4 col-md-4 third-row-col-1">
                    <button type="button" class="btn" onclick="clearAll()">Clear</button>
                    <button type="button" class="btn">Save</button>
                </div>
            </div>
        </div>
    </div>
    <script>
      function initMap() {
        var uluru = {lat: -25.363, lng: 131.044};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 4,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAOMcE-hq4YPziF6CDJ3VLjXBCqeUy1daA&callback=initMap"></script>
    <?php require 'footer.php' ?>