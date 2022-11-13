<?php
$showalert=false;
$showError=" ";
if($_SERVER["REQUEST_METHOD"]=="POST"){
    if($_POST["firstname"]==" "){
        $showError="Please Enter All the details";
    }
    include 'partials/_dbconnect.php';
    if(empty($_POST["firstname"])){
        $showError="Enter First Name";
    }
    if(empty($_POST["middlename"])){
        $showError="Enter Middle Name";
    }
    if(empty($_POST["lastname"])){
        $showError="Enter Last Name";
    }
    if(empty($_POST["mis"])){
        $showError="Enter MIS";
    }
    if(empty($_POST["mobilenumber"])){
        $showError="Enter MobileNumber";
    }
    if (empty($_POST["clgemail"])) {
        $showError = "Email is required";
    }
    $firstname=$_POST["firstname"];
    $middlename=$_POST["middlename"];
    $lastname=$_POST["lastname"];
    $mis=$_POST["mis"];
    $mobilenumber=$_POST["mobilenumber"];
    $collegeemail=$_POST["clgemail"];
    $password=$_POST["password"];
    $cpassword=$_POST["cpassword"];
    $alreadyExists="SELECT * FROM `students` WHERE MIS = $mis";
    $result=mysqli_query($conn,$alreadyExists);
    $noOfrows=mysqli_num_rows($result);
    if($noOfrows > 0){
        $showError="Username already exists";
    }
    else{
        $exists=false;

        if(($password==$cpassword) && $exists==false){
           $hashpass=password_hash($password,PASSWORD_DEFAULT);
           if(!$showError){
            $sql="INSERT INTO `students` (`First_Name`, `Middle_Name`, `Last_Name`, `MIS`, `Mobile_Number`, `College_Email`, `Password`) VALUES ('$firstname', '$middlename', '$lastname', '$mis', '$mobilenumber', '$collegeemail', '$hashpass')";
            $result=mysqli_query($conn,$sql);
            if($result){
               $showalert=true;
            }
           }
        }
        else{
            $showError="Passwords do not match";
        }
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>
    <link rel='stylesheet' type='text/css' href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<?php
if($showalert){
  echo '<script type="text/javascript">
        window.onload = function () { alert("You Have successfully Singed Up!!. You can now Login."); } 
        </script>';
    }

if($showError){
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Error!</strong>'.$showError.'
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}    
?> 

    <form action="/LMS/signup.php" method="POST">
        <div class="signup-block" top:0px>
            <h1>SignUp</h1>
            <input type="text" value="" placeholder="First Name" id="firstname" name="firstname" />
            <input type="text" value="" placeholder="Middle Name" id="middlename" name="middlename" />
            <input type="text" value="" placeholder="Last Name" id="lastname" name="lastname" />
            <input type="number" value="" placeholder="MIS" id="mis" name="mis" />
            <input type="tel" value="" placeholder="Mobile Number" id="mobilenumber" name="mobilenumber" />
            <input type="email" value="" placeholder="College Email" id="clgemail" name="clgemail" />
            <input type="password" value="" placeholder="Password" id="password"  name="password"/>
            <input type="password" value="" placeholder="Confirm Password" id="cpassword" name="cpassword" />
            <button>SignUp</button>
        </div>
    </form>
</body>
</html>