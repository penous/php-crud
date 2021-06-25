<?php require 'includes/header.php' ?>

<section class="mt-5">
  <form method="post" class="row g3">
    <div class="form-floating mb-3">
      <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="<?php if (isset($class)) {
    echo $class->getName();
} ?>">
      <label class="ms-3" for="floatingInput">Name</label>
    </div>
    <div class="form-floating mb-3">
      <input type="text" class="form-control" id="location" name="location" placeholder="Location" value="<?php if (isset($class)) {
    echo $class->getLocation();
} ?>">
      <label class="ms-3" for="floatingPassword">location</label>
    </div>
    <div class="input-group mb-3">
      <label class="input-group-text" for="inputGroupSelect01">Teacher</label>
      <select class="form-select" id="teacher_id" name="teacher_id">
        <?php foreach ($teachers as $teacher): ?>
        <option <?php if (isset($class) && $class->getTeacherId() == $teacher->getId()): ?> selected="selected"
          <?php endif; ?> value="<?php echo $teacher->getId() ?>"><?php echo $teacher->getName() ?></option>
        <?php endforeach ?>
      </select>
    </div>
    <?php if (isset($class)): ?>
    <input type="hidden" name="id" value="<?php echo $class->getId() ?>">
    <?php endif; ?>
    <input type="submit" name="button" value="<?php echo $button ?>" class="btn btn-success">
    <input type="hidden" name="object" value="class">
  </form>
</section>

<?php require 'includes/footer.php' ?>