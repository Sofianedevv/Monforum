<?php include(VIEWS . '_partials/header.php'); ?>
<div class="container">
<h1 class="text-center">Inscription</h1>

<form action="" method="post" enctype="multipart/form-data" class="w-50 mx-auto border row border-secondary rounded p-5 mt-5 bg-dark">
    <div class="form-group col-md-12">
      <label for="nickname" class="form-label mt-4">nickname</label>
      <input type="text" class="form-control" id="nickname" placeholder="nickname" name="nickname" value="<?= $_POST['nickname'] ?? "" ; ?>">
      <small class="text-danger"><?= $error['nickname'] ?? "" ; ?></small>
    </div>
    <div class="form-group col-md-12">
      <label for="email" class="form-label mt-4">E-mail</label>
      <input type="text" class="form-control" id="email" placeholder="dupont@mail.com"  name="email" value="<?= $_POST['email'] ?? "" ; ?>">
      <small class="text-danger"><?= $error['email'] ?? ""; ?></small>
    </div>
    <div class="form-group col-md-6">
      <label for="password" class="form-label mt-4">Mot de passe</label>
      <input type="password" class="form-control" id="password" placeholder="Mot de passe"  name="password">
      <small class="text-danger"><?= $error["password"] ?? ""; ?></small>
    </div>
    <div class="form-group col-md-6">
      <label for="confirmPassword" class="form-label mt-4">Confirmation du mot de passe</label>
      <input type="password" class="form-control" id="confirmPassword" placeholder="Confirmation du mot de passe"  name="confirmPassword">
      <small class="text-danger"><?=  $error['confirmPassword'] ?? ""; ?></small>
    </div>
    <div class="form-group">
      <label for="picture_profil" class="form-label mt-4">Image</label>
      <input class="form-control" type="file" id="picture_profil" name="picture_profil">
      <small class="text-danger"><?= $error['picture_profil'] ?? ''  ; ?></small>
    </div>
    <button type="submit" class="btn btn-primary mt-5">S'inscrire</button>
</form>




</div>
<?php include(VIEWS . '_partials/footer.php'); ?>