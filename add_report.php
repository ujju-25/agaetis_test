<?php

include_once('connection.php');
// Function to calculate grade based on marks
function calculateGrade($marks)
{
    if ($marks >= 75) {
        return "Distinction";
    } elseif ($marks >= 60 && $marks <= 74) {
        return "First Class";
    } elseif ($marks >= 33 && $marks <= 59) {
        return "Pass";
    } else {
        return "Fail";
    }
}

// Function to validate alphabetic input
function validateAlphabetic($input)
{
    return preg_match("/^[a-zA-Z]+$/", $input);
}

// Function to validate numeric input
function validateNumeric($input)
{
    return is_numeric($input);
}

// Function to validate email address
function validateEmail($email)
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Function to validate decimal input
function validateDecimal($input)
{
    return preg_match("/^\d+(\.\d+)?$/", $input);
}

// Sanitize POST data
function sanitizeInput($input, $connection) {
    $input = trim($input);
    $input = htmlspecialchars($input);
    $input = mysqli_real_escape_string($connection, $input);

    return $input;
}

// Process form submission
if (isset($_POST['report_submit'])) {
    $student_id = sanitizeInput($_POST["student_id"], $conn);
    $first_name = sanitizeInput($_POST["first_name"], $conn);
    $last_name = sanitizeInput($_POST["last_name"], $conn);
    $batch_class = sanitizeInput($_POST["batch_class"], $conn);
    $email = sanitizeInput($_POST["email"], $conn);
    $english_marks = sanitizeInput($_POST["english_marks"], $conn);
    $hindi_marks = sanitizeInput($_POST["hindi_marks"], $conn);
    $math_marks = sanitizeInput($_POST["math_marks"], $conn);
    $science_marks = sanitizeInput($_POST["science_marks"], $conn);
    $history_marks = sanitizeInput($_POST["history_marks"], $conn);
    $geography_marks = sanitizeInput($_POST["geography_marks"], $conn);
    $remarks = sanitizeInput($_POST["remarks"], $conn);

    // Validation
    $isValid = true;
    $errors = [];

    if (!validateNumeric($student_id)) {
        $isValid = false;
        $errors[] = "Invalid student ID. Please enter a numeric value.";
    }

    if (!validateAlphabetic($first_name)) {
        $isValid = false;
        $errors[] = "Invalid first name. Please enter alphabets only.";
    }

    if (!validateAlphabetic($last_name)) {
        $isValid = false;
        $errors[] = "Invalid last name. Please enter alphabets only.";
    }

    if (empty($batch_class)) {
        $isValid = false;
        $errors[] = "Batch/Class cannot be empty.";
    }

    if (!validateEmail($email)) {
        $isValid = false;
        $errors[] = "Invalid email address.";
    }

    if (!validateDecimal($english_marks) || !validateDecimal($hindi_marks) || !validateDecimal($math_marks) || !validateDecimal($science_marks) || !validateDecimal($history_marks) || !validateDecimal($geography_marks)) {
        $isValid = false;
        $errors[] = "Invalid marks entered. Please enter numeric values.";
    }

    if ($isValid) {
        // Calculate total marks and average
        $totalMarks = $english_marks + $hindi_marks + $math_marks + $science_marks + $history_marks + $geography_marks;
        $averageMarks = $totalMarks / 6;
        $grade = calculateGrade($averageMarks);

        $a = "INSERT INTO report (student_id,first_name,last_name,batch_class,email,english_marks,hindi_marks,
        math_marks,science_marks,history_marks,geography_marks,remarks,grade) VALUES ('$student_id','$first_name',
        '$last_name','$batch_class','$email','$english_marks','$hindi_marks',
        '$math_marks','$science_marks','$history_marks','$geography_marks','$remarks','$grade')";

        $sql=mysqli_query($conn,$a);
         //echo $sql;

         if($sql)
         {
              $submit_msg = 'Data inserted successfully..!';
         }

         else{
              $submit_msg =  'Failed to insert Data. Error description: '. mysqli_error($conn);
         }

    }else{

    }
}    

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
    </style>
  </head>
  <body>

    <div class="container shadow p-3 mb-5 bg-body-tertiary rounded">
        <div class="main_div">
            <h2>Student Report</h2>

            <form action="add_report.php" method="POST">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="student_id" class="col-sm-2 col-form-label">Student ID:</label>
                        <input type="number" class="form-control" name="student_id" id="student_id" required>
                    </div>
                    <div class="col-md-6">
                        <label for="first_name" class="col-sm-2 col-form-label">First Name:</label>
                        <input type="text" class="form-control" name="first_name" id="first_name" required>
                    </div>
                    <div class="col-md-6">
                        <label for="last_name" class="col-sm-2 col-form-label">Last Name:</label>
                        <input type="text" class="form-control" name="last_name" id="last_name" required>
                    </div>
                    <div class="col-md-6">
                        <label for="batch_class" class="col-sm-2 col-form-label">Batch/Class:</label>
                        <input type="text" class="form-control" name="batch_class" id="batch_class" required>
                    </div>

                    <div class="col-md-12">
                        <label for="email" class="col-sm-2 col-form-label">Email Address:</label>
                        <input type="text" class="form-control" name="email" id="email" required>
                    </div>
                </div>

              <div class="marks_div">
                  <p class="lead">Enter Subject Marks Out of 100 each.</p>
                  <div class="row mb-3">
                    <label for="english_marks" class="col-sm-2 col-form-label">English Marks:</label>
                    <div class="col-sm-10">
                      <input type="number" step="0.01" min="0" max="100" class="form-control" name="english_marks" id="english_marks" required>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="hindi_marks" class="col-sm-2 col-form-label">Hindi Marks:</label>
                    <div class="col-sm-10">
                      <input type="number" step="0.01" min="0" max="100" class="form-control" name="hindi_marks" id="hindi_marks" required>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="math_marks" class="col-sm-2 col-form-label">Math Marks:</label>
                    <div class="col-sm-10">
                      <input type="number" step="0.01" min="0" max="100" class="form-control" name="math_marks" id="math_marks" required>
                    </div>
                  </div>
                  
                  <div class="row mb-3">
                    <label for="science_marks" class="col-sm-2 col-form-label">Science Marks:</label>
                    <div class="col-sm-10">
                      <input type="number" step="0.01" min="0" max="100" class="form-control" name="science_marks" id="science_marks" required>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="history_marks" class="col-sm-2 col-form-label">History Marks:</label>
                    <div class="col-sm-10">
                      <input type="number" step="0.01" min="0" max="100" class="form-control" name="history_marks" id="history_marks" required>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="geography_marks" class="col-sm-2 col-form-label">Geography Marks:</label>
                    <div class="col-sm-10">
                      <input type="number" step="0.01" min="0" max="100" class="form-control" name="geography_marks" id="geography_marks" required>
                    </div>
                  </div>
                </div>

              <div class="row mb-3">
                <label for="remarks" class="col-sm-2 col-form-label">Remarks:</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="remarks" rows="4" cols="50" maxlength="150" id="remarks" name="remarks"></textarea>
                </div>
              </div>
              
              <input type="submit" class="btn btn-primary" value="Generate Report" name="report_submit">
            </form>
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
