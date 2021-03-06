<?php require 'includes/header.php'?>
<!-- this is the view, try to put only simple if's and loops here.
Anything complex should be calculated in the model -->
<section class="d-flex justify-content-center flex-column align-items-center">

  <div>
    <!-- Index table students -->
    <table class="total table table-striped table-wide">
      <thead>
        <tr>
          <th width="16.7%">ID</th>
          <th width="16.7%">Firstname</th>
          <th width="16.7%">Lastname</th>
          <th width="16.7%">Email</th>
          <th width="16.7%">Class</th>
          <th colspan="3" width="16.7%">Teacher</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><?php echo $student->getId(); ?></td>
          <td><?php echo $student->getFirstname(); ?></td>
          <td><?php echo $student->getLastname(); ?></td>
          <td><?php echo $student->getEmail(); ?></td>
          <td><?php echo $student->getClassName(); ?></td>
          <td><?php echo $student->getTeacherFullName(); ?></td>
          <td>
            <form method="get">
              <input type="hidden" name="id" value="<?php echo $student->getid() ?>" />
              <input type="submit" name="button" value="Update" class="btn btn-warning">
            </form>
          </td>
          <td>
            <form method="get">
              <input type="hidden" name="id" value="<?php echo $student->getid() ?>" />
              <input type="submit" name="button" value="Delete" class="btn btn-danger">
            </form>
          </td>
        </tr>

      </tbody>
    </table>
  </div>

</section>
<?php require 'includes/footer.php'?>