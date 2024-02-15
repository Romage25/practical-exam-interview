<?php 
  require "./db.php";

  if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submitBtn'])) {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $age = $_POST['age'];

    $sql = "INSERT INTO students (firstName, lastName, age) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);

    $stmt->bind_param("ssi", $firstName, $lastName, $age);
    $stmt->execute();

    $stmt->close();
    $conn->close();
  }

  header("Location: ../index.php");