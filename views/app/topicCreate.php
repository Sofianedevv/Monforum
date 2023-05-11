
<?php include(VIEWS . '_partials/header.php'); ?>

<div class="container my-5">
<h1 class="text-center">Création d'un topic</h1>

<form action="" method="post" enctype="multipart/form-data" class="w-50 mx-auto border border-primary rounded p-5 mt-5">
  <fieldset>
    
    <div class="form-group">
      <label for="title" class="form-label mt-4">Votre Topic</label>
      <input type="text" class="form-control" id="title" placeholder="Message" name="title" >
      <small class="text-danger"><?= $topic ?? ''  ; ?></small>
    </div>

    <button type="submit" class="btn btn-primary mt-5">Créer son topic</button>
  </fieldset>
</form>



</div>




<?php include(VIEWS . '_partials/footer.php'); ?>