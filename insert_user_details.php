<?php

$name = $_POST['name'];
$age = $_POST['age'];
$weight = $_POST['weight'];
$email = $_POST['email'];

$uploadDir = 'uploads/';
$healthReportName = $_FILES['healthReport']['name'];
$healthReportPath = $uploadDir . $healthReportName;

if (move_uploaded_file($_FILES['healthReport']['tmp_name'], $healthReportPath)) {
  $query = "INSERT INTO users (name, age, weight, email, health_report) 
            VALUES ('$name', '$age', '$weight', '$email', '$healthReportPath')";

  if (mysqli_query($conn, $query)) {
    echo "User details and health report inserted successfully.";
  } else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
  }
} else {
  echo "Failed to upload the health report.";
}

mysqli_close($conn);
?>
