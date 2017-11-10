<!--Caroline Lee
  - 10-2-2017
  - Project
  - Meeting Info
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
                        <li><a href="/project/dashboard.php">Dashboard</a></li>
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
                        <h1>Meeting Name</h1>
                        <div class="link">
                            <a href="#">Edit</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="logo">
                        <img src="./images/logo.png" alt="logo" class="img-thumbnail" width="100px" height="100px">
                    </div>
                </div>
            </div>
        </div>
        <!--CONTAINER FOR SECOND ROW-->
        <div class="container-fluid second-row">
            <!--SECOND ROW-->
            <div class="col-md-4 group-module">
                <div class="group-box">
                    <h4 class="group-name">Group Name</h4>
                    <a href="#" class="list-group-item list-group-item-action">Group member 1</a>
                    <a href="#" class="list-group-item list-group-item-action">Group member 2</a>
                    <a href="#" class="list-group-item list-group-item-action">Group member 3</a>
                    <a href="#" class="list-group-item list-group-item-action">Group member 4</a>
                    <a href="#" class="list-group-item list-group-item-action">Group member 5</a>
                </div>
            </div>
            <div class="col-md-4 meeting-calendar">
                <!--CALENDAR STUFF-->
                <div class="googleCalendar">
                    <h4 class="meeting-time">7:00pm-11:00pm</h4>
                    <iframe src="https://calendar.google.com/calendar/embed?title=Put%20your%20Title%20here&amp;showCalendars=0&amp;height=600&amp;wkst=1&amp;bgcolor=%23ffffff&amp;src=8d3fc8l9g04n7r9im45fsn08ak%40group.calendar.google.com&amp;color=%238D6F47&amp;ctz=America%2FNew_York" width=310 height=300 frameborder="0" scrolling="no"></iframe>
                </div>
                <!--Calendar from: https://codepen.io/profstein/pen/ozrbPJ-->
            </div>
            <div class="col-md-4 map-col">
                <h4 class="location">Location</h4>
                <div class="map">
                    <div class="map-space" id="map" style="width:300px;height:300px;background:black"></div>
                </div>
            </div>
        </div>
        <div class="row notes">
            <a href="#notes" class="meeting-notes" data-toggle="popover" data-content="Notes about the meeting... anything that the user needs to know">Meeting Notes</a>
        </div>
    </div>
<script>//placeholder//
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