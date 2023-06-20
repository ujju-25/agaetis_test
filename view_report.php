<?php

include_once('connection.php');

$record = $_GET['record'];
if(empty($record)){
  die('Invalid record');
}

$query="SELECT * FROM report where id = '$record'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

$total = ($row['english_marks'] + $row['hindi_marks'] + $row['math_marks'] + $row['science_marks'] + $row['history_marks'] + $row['geography_marks'])
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Report</title>
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
            <div class="row">
                <div class="col-md-6">
                    <h2>Student Report</h2>
                </div>
                <div class="col-md-6">
                    <a href="index.php" class="btn btn-md btn-primary float-end">Go to Dashboard</a>
                </div>
            </div>
        </div>
        
        <div class="shadow p-3 mb-5 bg-body-tertiary rounded main_div">
            <table class="table">
              <tr class="table-primary">
                <th colspan="4">Student Information</th>
              </tr>
              <tr class="table-warning">
                <td colspan="2">Student ID:</td>
                <td colspan="2"><?=$row['student_id'];?></td>
              </tr>
              <tr class="table-warning">
                <td colspan="2">First Name:</td>
                <td colspan="2"><?=$row['first_name'];?></td>
              </tr>
              <tr class="table-warning">
                <td colspan="2">Last Name:</td>
                <td colspan="2"><?=$row['last_name'];?></td>
              </tr>
              <tr class="table-warning">
                <td colspan="2">Email:</td>
                <td colspan="2"><?=$row['email'];?></td>
              </tr>

              <tr class="table-primary">
                <th colspan="4">Subjects Marks</th>
              </tr>
              <tr class="table-info">
                <td colspan="2">English</td>
                <td colspan="2"><?=$row['english_marks'];?></td>
              </tr>
              <tr class="table-info">
                <td colspan="2">Hindi</td>
                <td colspan="2"><?=$row['hindi_marks'];?></td>
              </tr>
              <tr class="table-info">
                <td colspan="2">Math</td>
                <td colspan="2"><?=$row['math_marks'];?></td>
              </tr>
              <tr class="table-info">
                <td colspan="2">Science</td>
                <td colspan="2"><?=$row['science_marks'];?></td>
              </tr>
              <tr class="table-info">
                <td colspan="2">History</td>
                <td colspan="2"><?=$row['history_marks'];?></td>
              </tr>
              <tr class="table-info">
                <td colspan="2">Geography</td>
                <td colspan="2"><?=$row['geography_marks'];?></td>
              </tr>
                
              <tr class="table-primary">
                <th colspan="4">Marks Result</th>
              </tr>
              <tr class="table-info">
                <td colspan="2">Total</td>
                <td colspan="2"><?=$total;?></td>
              </tr>
              <tr class="table-info">
                <td colspan="2">Percentage</td>
                <td colspan="2"><?=round($total/6, 2);?></td>
              </tr>
              <tr class="table-success">
                <td colspan="2">Grade</td>
                <td colspan="2"><?=$row['grade'];?></td>
              </tr>
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
