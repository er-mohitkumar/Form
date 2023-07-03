<?php

$email = $_GET['email'];

$query = "SELECT health_report FROM users WHERE email = '$email'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
  $row = mysqli_fetch_assoc($result);
  $healthReportPath = $row['health_report'];

  if (file_exists($healthReportPath)) {
    header('Content-Type: application/pdf');
    header('Content-Disposition: inline; filename="health_report.pdf"');
    readfile($healthReportPath);
  } else {
    echo "Health report file not found.";
  }
} else {
  echo "No health report found for the specified email ID.";
}

mysqli_close($conn);
?>
