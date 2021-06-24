<?php require 'includes/header.php'?>
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
          <th width="16.7%">Teacher</th>
          <th colspan="3">
            <form method="get">
              <input style="padding: 0.1rem 7rem;" type="submit" name="button" value="New" class="btn btn-dark ">
            </form>
          </th>
        </tr>
      </thead>
      <tbody>
        <?php if (!empty($students)): ?>
        <?php foreach ($students as $student): ?>
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
              <input type="submit" name="button" value="Details" class="btn btn-info">
            </form>
          </td>
          <td>
            <form method="get">
              <input type="hidden" name="id" value="<?php echo $student->getid() ?>" />
              <input type="submit" name="button" value="Delete" class="btn btn-danger">
            </form>
          </td>
        </tr>
        <?php endforeach; ?>
        <?php endif; ?>

      </tbody>
    </table>
  </div>

</section>
<?php require 'includes/footer.php'?>