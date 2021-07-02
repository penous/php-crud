<?php require 'includes/header.php' ?>

<section class="mt-5">
  <form method="post" class="row g3">
    <div class="form-floating mb-3">
      <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Firstname" value="<?php if (isset($teacher)) {
    echo $teacher->getFirstname();
} ?>">
      <label class="ms-3" for="floatingInput">Firstname</label>
    </div>
    <div class="form-floating mb-3">
      <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Lastname" value="<?php if (isset($teacher)) {
    echo $teacher->getLastname();
} ?>">
      <label class="ms-3" for="floatingPassword">Lastname</label>
    </div>
    <div class="form-floating mb-3">
      <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" value="<?php if (isset($teacher)) {
    echo $teacher->getEmail();
} ?>">
      <label class="ms-3" for="floatingInput">Email address</label>
    </div>
    <?php if (isset($teacher)): ?>
    <input type="hidden" name="id" value="<?php echo $teacher->getId() ?>">
    <?php endif; ?>
    <input type="submit" name="button" value="<?php echo $button ?>" class="btn btn-success">
    <input type="hidden" name="object" value="teacher">
  </form>
</section>

<?php require 'includes/footer.php' ?>