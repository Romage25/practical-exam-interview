  <!doctype html>
  <html lang="en">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Practical Exam - Interview</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>
    <body>
      <div class="container mt-5">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createModal">Create Student</button>

        <!-- Create Modal -->
        <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <form action="./functions/create.php" method="POST">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="createModalLabel">Create Student Form</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="mb-3">
                    <label for="firstName" class="form-label">Firtname</label>
                    <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Peter" required>
                  </div>
                  <div class="mb-3">
                    <label for="lastName" class="form-label">Lastname</label>
                    <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Pan" required>
                  </div>
                  <div class="mb-3">
                    <label for="age" class="form-label">Age</label>
                    <input type="number" class="form-control" id="age" name="age" placeholder="18" min="1" max="100" required>
                  </div>
                </div>
                <div class="modal-footer">
                  <input type="hidden" name="submitBtn" value="ok">
                  <button type="submit" class="btn btn-success">Create</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>  
            </form>
          </div>  
        </div>
        <!-- !Create Modal -->

        <table class="table table-bordered mt-3">
          <thead>
            <tr>
              <th>No</th>
              <th>Firstname</th>
              <th>Lastname</th>
              <th>Age</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
              require "./functions/db.php";

              $rowNumber = 1;
              $sql = "SELECT * FROM students";
              $result = $conn->query($sql);      
              if ($result->num_rows > 0):
                  while ($row = $result->fetch_assoc()): ?>
                      <tr>
                          <td><?= $rowNumber ?></td>
                          <td><?= $row['firstName'] ?></td>
                          <td><?= $row['lastName'] ?></td>
                          <td><?= $row['age'] ?></td>
                          <td class="d-flex flex-row gap-3">

                            <!-- Show Button -->
                            <div> 
                              <button type="button" class="btn btn-info text-white" data-toggle="modal" 
                              data-target="#student<?= $rowNumber ?>">Show</button>
                            </div>
                             <!-- !show Button -->

                            <!-- Edit Button -->
                            <div> 
                              <button type="button" class="btn btn-primary" data-toggle="modal" 
                              data-target="#editStudent<?= $rowNumber ?>">Edit</button>
                            </div>
                             <!-- !Edit Button -->

                            <!-- Delete Button -->
                            <div>
                              <form action="./functions/delete.php" method="POST">
                                <input type="hidden" name="studentId" value="<?= $row['id'] ?>">
                                <input type="hidden" name="deleteBtn" value="ok">
                                <button type="submit" class="btn btn-danger">Delete</button>
                              </form>
                            </div>
                             <!-- !Delete Button -->

                            <!-- Show Modal -->
                            <div class="modal fade" id="student<?= $rowNumber ?>" tabindex="-1" role="dialog" aria-labelledby="student<?= $rowNumber ?>Label" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="student<?= $rowNumber ?>Label">Student Info</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span>&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <div class="mb-3">
                                      <h2>Firstname: <?= $row['firstName'] ?></h2>
                                    </div>
                                    <div class="mb-3">
                                      <h2>Lastname: <?= $row['lastName'] ?></h2>
                                    </div>
                                    <div class="mb-3">
                                      <h2>Age: <?= $row['age'] ?></h2>
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- !Show Modal -->

                            <!-- Edit Modal -->
                            <div class="modal fade" id="editStudent<?= $rowNumber ?>" tabindex="-1" role="dialog" aria-labelledby="editStudent<?= $rowNumber ?>Label" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="editStudent<?= $rowNumber ?>Label">Update Student Info of 
                                    <?= $row['firstName'] . " " . $row['lastName'] ?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span>&times;</span>
                                    </button>
                                  </div>
                                  <form action="./functions/edit.php" method="POST">
                                    <div class="modal-body">
                                      <div class="mb-3">
                                        <label for="editFirstName" class="form-label">Firstname</label>
                                        <input type="text" class="form-control" id="editFirstName" name="editFirstName" placeholder="Peter" required>
                                      </div>
                                      <div class="mb-3">
                                        <label for="editLastName" class="form-label">Lastname</label>
                                        <input type="text" class="form-control" id="editLastName" name="editLastName" placeholder="Pan" required>
                                      </div>
                                      <div class="mb-3">
                                        <label for="editAge" class="form-label">Age</label>
                                        <input type="text" class="form-control" id="editAge" name="editAge" placeholder="18" required>
                                      </div>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="submit" class="btn btn-primary">Edit</button>
                                      <input type="hidden" name="editBtn" value="ok">
                                      <input type="hidden" name="editStudentId" value="<?= $row['id'] ?>">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                            <!-- Edit Modal -->

                          </td>
                      </tr>
                      <?php
                      $rowNumber++;
                  endwhile;
              else:
                  echo "<tr><td colspan='5' class='text-center'>There are no students</td></tr>";
              endif;
              $conn->close();
            ?>
          </tbody>
        </table>
      </div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
      <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script> -->
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 
    </body>
  </html>