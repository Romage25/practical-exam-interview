<?php 
  require "./db.php";

  if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['deleteBtn'])) {
    $studentId = $_POST['studentId'];

    $sql = "DELETE FROM students WHERE id = ?";
    $stmt = $conn->prepare($sql);  
    $stmt->bind_param("i", $studentId);
    $stmt->execute();


    $stmt->close();
    $conn->close();
  }

  header("Location: ../index.php");
