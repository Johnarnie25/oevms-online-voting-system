<!-- PROFILE MODAL -->
<div class="modal hide fade" id="profileModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" style="max-width: 600px;">
    <div class="modal-content hero-profile">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h3>Edit Your Profile</h3>
      </div>
      <div class="modal-body">
        <?php
        // Fetch user info
        $query = mysqli_query($conn, "SELECT * FROM users WHERE User_id = '$id_session'");
        $row = mysqli_fetch_assoc($query);

        if (isset($_POST['save'])) {
            $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
            $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
            $username = mysqli_real_escape_string($conn, $_POST['username']);
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // secure hash
            $user_type = 'admin';

            mysqli_query($conn, "UPDATE users SET 
                FirstName = '$firstname',
                LastName = '$lastname',
                UserName = '$username',
                Password = '$password',
                User_Type = '$user_type'
                WHERE User_id = '$id_session'") or die(mysqli_error($conn));

            echo "<div class='alert alert-success'>Profile updated successfully.</div>";

            // Refresh
            $query = mysqli_query($conn, "SELECT * FROM users WHERE User_id = '$id_session'");
            $row = mysqli_fetch_assoc($query);
        }
        ?>
        <form method="post">
          <div class="form-group">
            <label>First Name</label>
            <input type="text" name="firstname" value="<?php echo $row['FirstName']; ?>" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Last Name</label>
            <input type="text" name="lastname" value="<?php echo $row['LastName']; ?>" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" value="<?php echo $row['UserName']; ?>" class="form-control" required>
          </div>
          <div class="form-group">
            <label>New Password</label>
            <input type="password" name="password" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Position</label>
            <input type="text" value="<?php echo $row['Position']; ?>" class="form-control" readonly>
          </div>
          <input type="submit" name="save" value="Save" class="btn btn-primary">
        </form>
      </div>
    </div>
  </div>
</div>
