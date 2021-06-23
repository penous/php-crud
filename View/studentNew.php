<?php require 'includes/header.php' ?>

<section class="mt-5">
  <form method="post" class="row g3">
    <div class="form-floating mb-3">
      <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Firstname">
      <label class="ms-3" for="floatingInput">Firstname</label>
    </div>
    <div class="form-floating mb-3">
      <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Lastname">
      <label class="ms-3" for="floatingPassword">Lastname</label>
    </div>
    <div class="form-floating mb-3">
      <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
      <label class="ms-3" for="floatingInput">Email address</label>
    </div>
    <div class="input-group mb-3">
      <label class="input-group-text" for="inputGroupSelect01">Class</label>
      <select class="form-select" id="class_id" name="class_id">
        <?php foreach ($classes as $class): ?>
        <option value="<?php echo $class->getId() ?>"><?php echo $class->getName() ?></option>
        <?php endforeach ?>
      </select>
    </div>
    <input type="submit" name="button" value="Submit" class="btn btn-success">
    <input type="hidden" name="object" value="student">
  </form>
</section>

<?php require 'includes/footer.php' ?>