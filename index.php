<?php
if (isset ($_POST['email']))
{
    require 'connect.php';
   $name= $_POST["name"];
   $email=$_POST["email"];
   $gender=$_POST["gender"];
   $course=$_POST["course"];
   $phone=$_POST["phone"];
    $target_dir = "photos/";
    $random=rand(1000000,5000000);
    $target_file = $target_dir .$random. basename($_FILES["photo"]["name"]);
    if(move_uploaded_file($_FILES['photo']['tmp_name'],$target_file)) {
        //save in db
        $stm = $pdo->prepare("INSERT INTO `students`(`id` , `name`, `email`, `phone`, `photo`, `course`, `gender`, `reg_date`) VALUES (?,?,?,?,?,?,?,?)");
        $reg_date = date("Y-m-d");
        $stm->execute([null,$name,$email,$phone,$target_file,$course,$gender,$reg_date]);
    }
    else
    {
        die("It Failed");
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">




</head>

<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-5">
            <div class="card">
                <div class="card-body">
                    <form action="index.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label >Full names</label>
                            <input type="text"class="form-control" required name="name" placeholder="Full Name">
                        </div>
                        <div class="form-group">
                            <label >Email</label>
                            <input type="email"class="form-control" required name="email" placeholder="email">
                        </div>
                        <div class="form-group">
                            <label >Phone Number</label>
                            <input type="tel"class="form-control"  required name="phone" placeholder="phone">
                        </div>

                        <div class="form-group">
                            <label>Passport</label>
                            <input type="file" accept="image/*" class="form-control-file border" required name="photo" placeholder="photo">
                        </div>



                        <div class="form-group">
                            <label >select course</label>
                            <select name="course"class ="form-control">
                                <option value="Python">python</option>
                                <option value="java">java</option>
                                <option value="php">php</option>
                                <option value="laravel">laravel</option>
                                <option value="Django">Django</option>

                            </select>
                        </div>

                        <label>Choose Gender</label> <br>
                        <div class="form-check">

                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" value="Male" name="gender">Male
                            </label>
                        </div>

                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" value="Female" name="gender">Female
                            </label>
                        </div>
                        <br>
                        <input type="submit" value="Submit">
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
</body>
</html>