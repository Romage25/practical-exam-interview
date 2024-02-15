<?php 
  require "./db.php";

  if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['editBtn'])) {
    $editFirstName = $_POST['editFirstName'];
    $editLastName = $_POST['editLastName'];
    $editAge = $_POST['editAge'];

    $sql = "INSERT INTO students (firstName, lastName, age) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);

    $stmt->bind_param("ssi", $firstName, $lastName, $age);
    $stmt->execute();

    $stmt->close();
    $conn->close();
  }

  header("Location: ../index.php");