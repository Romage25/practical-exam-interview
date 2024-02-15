<?php 
  require "./db.php";

  if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['editBtn'])) {
    $editFirstName = $_POST['editFirstName'];
    $editLastName = $_POST['editLastName'];
    $editAge = $_POST['editAge'];
    $editStudentId = $_POST['editStudentId'];

    $sql = "UPDATE students SET firstName=?, lastName=?, age=? WHERE id=?";
    $stmt = $conn->prepare($sql);

    $stmt->bind_param("ssii", $editFirstName, $editLastName, $editAge, $editStudentId);
    $stmt->execute();

    $stmt->close();
    $conn->close();
  }

  header("Location: ../index.php");