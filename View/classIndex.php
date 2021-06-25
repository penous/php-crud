<?php require 'includes/header.php'?>
<section class="d-flex justify-content-center flex-column align-items-center">

  <div>
    <!-- Index table classes -->
    <table class="total table table-striped table-wide">
      <thead>
        <tr>
          <th width="25%">ID</th>
          <th width="25%">Name</th>
          <th width="25%">Location</th>
          <th width="25%">Teacher</th>
          <th colspan="3">
            <form method="get">
              <input type="hidden" name="page" value="classes">
              <input style="padding: 0.1rem 7rem;" type="submit" name="button" value="New" class="btn btn-dark ">
            </form>
          </th>
        </tr>
      </thead>
      <tbody>
        <?php if (!empty($classes)): ?>
        <?php foreach ($classes as $class): ?>
        <tr>
          <td><?php echo $class->getId(); ?></td>
          <td><?php echo $class->getName(); ?></td>
          <td><?php echo $class->getLocation(); ?></td>
          <td><?php echo $class->getTeacherName(); ?></td>
          <td>
            <form method="get">
              <input type="hidden" name="page" value="classes">
              <input type="hidden" name="id" value="<?php echo $class->getid() ?>" />
              <input type="submit" name="button" value="Update" class="btn btn-warning">
            </form>
          </td>
          <td>
            <form method="get">
              <input type="hidden" name="page" value="classes">
              <input type="hidden" name="id" value="<?php echo $class->getid() ?>" />
              <input type="submit" name="button" value="Details" class="btn btn-info">
            </form>
          </td>
          <td>
            <form method="get">
              <input type="hidden" name="page" value="classes">
              <input type="hidden" name="id" value="<?php echo $class->getid() ?>" />
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