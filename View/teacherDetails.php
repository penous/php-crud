<?php require 'includes/header.php'?>
<!-- this is the view, try to put only simple if's and loops here.
Anything complex should be calculated in the model -->
<section class="d-flex justify-content-center flex-column align-items-center">

  <div>
    <!-- Details page teacher -->
    <table class="total table table-striped table-wide">
      <thead>
        <tr>
          <th width="25%">ID</th>
          <th width="25%">Firstname</th>
          <th width="25%">Lastname</th>
          <th colspan="3" width="25%">Email</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><?php echo $teacher->getId(); ?></td>
          <td><?php echo $teacher->getFirstname(); ?></td>
          <td><?php echo $teacher->getLastname(); ?></td>
          <td><?php echo $teacher->getEmail(); ?></td>
          <td>
            <form method="get">
              <input type="hidden" name="id" value="<?php echo $teacher->getid() ?>" />
              <input type="submit" name="button" value="Update" class="btn btn-warning">
            </form>
          </td>
          <td>
            <form method="get">
              <input type="hidden" name="id" value="<?php echo $teacher->getid() ?>" />
              <input type="submit" name="button" value="Delete" class="btn btn-danger">
            </form>
          </td>
        </tr>

      </tbody>
    </table>
  </div>

</section>
<?php require 'includes/footer.php'?>