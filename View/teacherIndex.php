<?php require 'includes/header.php'?>
<section class="d-flex justify-content-center flex-column align-items-center">

  <div>
    <!-- Index table teachers -->
    <table class="total table table-striped table-wide">
      <thead>
        <tr>
          <th width="25%">ID</th>
          <th width="25%">Firstname</th>
          <th width="25%">Lastname</th>
          <th width="25%">Email</th>
          <th colspan="3">
            <form method="get">
              <input type="hidden" name="page" value="teachers">
              <input style="padding: 0.1rem 7rem;" type="submit" name="button" value="New" class="btn btn-dark ">
            </form>
          </th>
        </tr>
      </thead>
      <tbody>
        <?php if (!empty($teachers)): ?>
        <?php foreach ($teachers as $teacher): ?>
        <tr>
          <td><?php echo $teacher->getId(); ?></td>
          <td><?php echo $teacher->getFirstname(); ?></td>
          <td><?php echo $teacher->getLastname(); ?></td>
          <td><?php echo $teacher->getEmail(); ?></td>
          <td>
            <form method="get">
              <input type="hidden" name="page" value="teachers">
              <input type="hidden" name="id" value="<?php echo $teacher->getid() ?>" />
              <input type="submit" name="button" value="Update" class="btn btn-warning">
            </form>
          </td>
          <td>
            <form method="get">
              <input type="hidden" name="page" value="teachers">
              <input type="hidden" name="id" value="<?php echo $teacher->getid() ?>" />
              <input type="submit" name="button" value="Details" class="btn btn-info">
            </form>
          </td>
          <td>
            <form method="get">
              <input type="hidden" name="page" value="teachers">
              <input type="hidden" name="id" value="<?php echo $teacher->getid() ?>" />
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