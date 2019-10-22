<?php
//show all the data
require 'connect.php';
$stm = $pdo->prepare("select*from students");
$stm->execute([]);
$students = $stm->fetchAll();
//var_dump($students);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Students</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>

<body>
<?php require "nabar.php" ?>
    <div class="container" style="justify-content-center">
      <div class="row justify-content-center">
          <div class="col-sm-8">
              <table class="table table-striped">
                  <tr>
                      <th>ID</th>
                      <th>NAME</th>
                      <th>EMAIL</th>
                      <th>PHONE</th>
                      <th>COURSE</th>
                      <th>OTHER DETAILS</th>
                  </tr>
                  <?php foreach ($students as $student):?>
                      `               <tr>
                          <td><?=$student->id?></td>
                          <td><?=$student->name?></td>
                          <td><?=$student->email?></td>
                          <td><?=$student->phone?></td>
                          <td><?=$student->course?></td>
                          <td> <button class="btn btn-info"  data-toggle="modal" data-target="#myModal<?=$student->id?>">More...</button></td>
                          <td><a href="delete.php? id=<?=$student->id?>"class="btn btn-danger">X</a></td>

                      </tr>
                      <div class="modal" id="myModal<?=$student->id?>">
                          <div class="modal-dialog">
                              <div class="modal-content">

                                  <!-- Modal Header -->
                                  <div class="modal-header">
                                      <h4 class="modal-title"><?=$student->name?></h4>
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  </div>

                                  <!-- Modal body -->
                                  <div class="modal-body">
                                      <div class="row justify-content-center">
                                          <div class="col-sm-8">
                                              <img class="rounded-circle mx-auto d-block" src="<?=$student->photo?>" alt="" width="200" height="200">
                                              <p class="text-center"><?=$student->reg_date?></p>
                                              <p class="text-center"><?=$student->gender?></p>
                                              <p class="text-center"><?=$student->course?></p>
                                          </div>
                                      </div>
                                  </div>

                                  <!-- Modal footer -->
                                  <div class="modal-footer">
                                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                  </div>

                              </div>
                          </div>
                      </div>



                  <?php endforeach;?>
              </table>
          </div>
      </div>
      </div>
</body>
</html>
