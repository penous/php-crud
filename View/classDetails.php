<?php require 'includes/header.php'?>
<!-- this is the view, try to put only simple if's and loops here.
Anything complex should be calculated in the model -->
<section class="d-flex justify-content-center flex-column align-items-center">

  <div>
    <!-- table of class details -->
    <table class="total table table-striped table-wide">
      <thead>
        <tr>
          <th width="25%">ID</th>
          <th width="25%">name</th>
          <th width="25%">location</th>
          <th colspan="3" width="25%">Teacher</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><?php echo $class->getId(); ?></td>
          <td><?php echo $class->getName(); ?></td>
          <td><?php echo $class->getLocation(); ?></td>
          <td><?php echo $class->getTeacherName(); ?></td>
          <td>
            <form method="get">
              <input type="hidden" name="id" value="<?php echo $class->getid() ?>" />
              <input type="submit" name="button" value="Update" class="btn btn-warning">
            </form>
          </td>
          <td>
            <form method="get">
              <input type="hidden" name="id" value="<?php echo $class->getid() ?>" />
              <input type="submit" name="button" value="Delete" class="btn btn-danger">
            </form>
          </td>
        </tr>

      </tbody>
    </table>
  </div>

</section>
<?php require 'includes/footer.php'?>