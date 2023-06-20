<?php

include_once('connection.php');

$query="SELECT * FROM report";
$result = mysqli_query($conn, $query);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Report Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <style type="text/css">
        .marks_div {
            margin-top: 20px;
        }

        .main_div {
            padding: 20px;
        }

        .header{
            padding: 30px 0;
        }
    </style>
  </head>
  <body>
    
    <div class="container">
        <div class="header">
            <h2>Student Report Dashboard</h2>
            <a href="add_report.php" class="btn btn-md btn-success float-end">Create New Report</a>
        </div>
        
        <div class="shadow p-3 mb-5 bg-body-tertiary rounded main_div">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Studnet ID</th>
                  <th scope="col">First Name</th>
                  <th scope="col">Last Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                    $inc = 1;
                    if (mysqli_num_rows($result) > 0) {
                      // output data of each row
                      while($row = mysqli_fetch_assoc($result)) { ?>

                        <tr>
                          <th scope="row"><?=$inc?></th>
                          <th><?=$row['student_id'];?></th>
                          <td><?=$row['first_name'];?></td>
                          <td><?=$row['last_name'];?></td>
                          <td><?=$row['email'];?></td>
                          <td><a data-id=""<?=$row['id'];?> class="btn btn-sm btn-primary" href="view_report.php?record=<?=$row['id'];?>">View Report</td>
                        </tr>
                      <?php $inc++; }
                    }
                ?>
              </tbody>
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <script type="text/javascript">
      $(document).ready(function(){
        var submit_msg = "<?=$submit_msg;?>";
          if(submit_msg != ''){
              alert(submit_msg);
          }
      })
    </script>
  </body>
</html>
