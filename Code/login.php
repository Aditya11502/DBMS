<?php
$login=false;
$displayerror="";
if($_SERVER["REQUEST_METHOD"]=="POST"){
    include 'partials/_dbconnect.php';
    $username=$_POST["mis"];
    $password=$_POST["password"];

    $sql="Select * from students where MIS='$username'";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);

    if($num == 1){
        while($row=mysqli_fetch_assoc($result)){
            if(password_verify($password,$row['Password'])){
               $login=true;
               session_start();
               $_SESSION['loggedin']=true;
               $_SESSION['mis']=$username;
               header("location: welcome.php");
            }
            else{
                $displayerror="Invalid Credentials";
            }
        }
    }
    elseif($num==0){
        $diaplayerror="Invalid Credentials";
    }
}


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Login</title>
    <link rel='stylesheet' type='text/css' href="style.css">
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    <?php
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Error! </strong>'.$displayerror.'
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';

    ?>
    <form action="/LMS/login.php" method="POST">
        <div class="login-block">
            <h1>Login</h1>
            <input type="text" value="" placeholder="Username" id="mis" name="mis" />
            <input type="password" value="" placeholder="Password" id="password"  name="password"/>
            <button>Login</button>
        </div>
    </form>
</body>
</html>