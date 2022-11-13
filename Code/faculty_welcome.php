<?php
session_start();
if(!(isset($_SESSION['loggedin'])) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
}

?>





<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}
</style>
</head>
<body class="w3-light-grey w3-content" style="max-width:1600px">

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container">
    <a href="#" onclick="w3_close()" class="w3-hide-large w3-right w3-jumbo w3-padding w3-hover-grey" title="close menu">
      <i class="fa fa-remove"></i>
    </a>
    <img src="https://examinationresults.ind.in/wp-content/uploads/2020/06/COEP-Faculty-Recruitment-1024x1024.jpeg" style="width:45%;" class="w3-round"><br><br>
    <h4><b>Dashboard</b></h4>

  </div>
  <div class="w3-bar-block">
    <a href="logout.php" onclick="wclose()" class="w3-bar-item w3-button w3-padding w3-text-teal"><i class="fa fa-th-large fa-fw w3-margin-right"></i>LOGOUT</a>
    <a href="#about" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-user fa-fw w3-margin-right"></i>PROFILE</a>
    <a href="#contact" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-envelope fa-fw w3-margin-right"></i>CONTACT</a>
  </div>

</nav>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px">

  <!-- Header -->
  <header id="portfolio">
    <a href="#"><img src="Images/ABC.jpg" style="width:65px;" class="w3-circle w3-right w3-margin w3-hide-large w3-hover-opacity"></a>
    <span class="w3-button w3-hide-large w3-xxlarge w3-hover-text-grey" onclick="w3_open()"><i class="fa fa-bars"></i></span>
    <div class="w3-container">
    <h1  id="wel" ><b>WELCOME <?php echo $_SESSION['mis']?> </b></h1>
    <div class="w3-section w3-bottombar w3-padding-16">
      <span class="w3-margin-right">Filter:</span>
      <button class="w3-button w3-black">ALL</button>
      <button class="w3-button w3-white"><i class=" w3-margin-right"></i>Completed</button>

    </div>
    </div>
  </header>


  <h4>Tests Available</h4>
    <!-- Pricing Tables -->
    <div class="w3-row-padding" style="margin:0 -16px">
      <div class="w3-third w3-margin-bottom">
        <ul class="w3-ul w3-border w3-white w3-center w3-opacity w3-hover-opacity-off">
          <li class="w3-black w3-xlarge w3-padding-32">MHTCET 2017</li>
          <li class="w3-padding-16">PHYSICS 50Q</li>
          <li class="w3-padding-16">CHEMISTRY 50Q</li>
          <li class="w3-padding-16">MATHEMATICS 50Q</li>
          <li class="w3-padding-16">TOTAL 200 Marks</li>

          <li class="w3-light-grey w3-padding-24">
            <button id="ST" class="w3-button w3-teal w3-padding-large w3-hover-black" onclick="clickHandler()">START TEST</button>
            <script>
            function clickHandler(){
              window.location.href="http://localhost:3000/inst";
            }
            </script>
          </li>
        </ul>
      </div>

      <div class="w3-third w3-margin-bottom">
        <ul class="w3-ul w3-border w3-white w3-center w3-opacity w3-hover-opacity-off">
          <li class="w3-teal w3-xlarge w3-padding-32">MHTCET 2018</li>
          <li class="w3-padding-16">PHYSICS 50Q</li>
          <li class="w3-padding-16">CHEMISTRY 50Q</li>
          <li class="w3-padding-16">MATHEMATICS 50Q</li>
          <li class="w3-padding-16">TOTAL 200 Marks</li>

          </li>
          <li class="w3-light-grey w3-padding-24">
            <button class="w3-button w3-teal w3-padding-large w3-hover-black">START TEST</button>
          </li>
        </ul>
      </div>

      <div class="w3-third">
        <ul class="w3-ul w3-border w3-white w3-center w3-opacity w3-hover-opacity-off">
          <li class="w3-black w3-xlarge w3-padding-32">MHTCET 2019</li>
          <li class="w3-padding-16">PHYSICS 50Q</li>
          <li class="w3-padding-16">CHEMISTRY 50Q</li>
          <li class="w3-padding-16">MATHEMATICS 50Q</li>
          <li class="w3-padding-16">TOTAL 200 Marks</li>

          <li class="w3-light-grey w3-padding-24">
            <button class="w3-button w3-teal w3-padding-large w3-hover-black">START TEST</button>
          </li>
        </ul>
      </div>
    </div>
  </div>






<script>
// Script to open and close sidebar
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
    document.getElementById("myOverlay").style.display = "block";
}

function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
    document.getElementById("myOverlay").style.display = "none";
}

</script>

<script src="app.js"></script>

</body>
</html>
