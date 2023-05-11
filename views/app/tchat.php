
<?php include(VIEWS . '_partials/header.php'); ?>
<?php if(isset($topic)):  ?>
    <h1 class="text-center text-white"><?= $topic['title'] ; ?></h1>
<?php else:  ?>
    <h1 class="text-center">pas de topic selectionné</h1>
<?php endif;  ?>

<div class="container row">
<div class="text-dark my-3 col-md-8">
<?php if(!empty($messages)):  ?>
    <?php foreach($messages as $message):  ?>
   
    <!-- la deuxième méthode se trouve dans le model message ou je fais une requete SQL en INNERJOIN pour accèder au nickname et a la photo de profil -->
    <div class="<?= (isset($_SESSION['user']) && $message['id_user'] == $_SESSION['user']['id'])? "bg-light" : "bg-info" ; ?>">
        <img src="<?= UPLOAD . $message['picture_profil'] ;  ?>" alt="" width="70" class="rounded-circle mt-3">
        <p class="mt-2">par : <?= $message['nickname'] ; ?></p>
        <p class="my-3 h4"><?= $message['content'] ; ?></h2>
        
        <p class="mt-1">créé le : <?= date('d-m-Y H:i:s', strtotime($message['created_at'])) ; ?></p>
    </div>

    <?php endforeach;  ?>
<?php else:  ?>
    <h2 class="text-center">Pas encore de message dans ce topic</h2>
<?php endif;  ?>
</div>
<div class="col-md-4">
    <?php if(isset($_SESSION['user'])):  ?>
        <form action="" method="post">
        <div class="form-group">
        <label for="content" class="form-label mt-4">Contenue</label>
        <textarea class="form-control" id="content" name="content"></textarea>
        <small class="text-danger"><?= $content ?? ''  ; ?></small>
        </div>
        <button type="submit" class="btn btn-primary mt-5">envoyer</button>

        </form>
    <?php else:  ?>
        <p><a href="<?= BASE . "connexion" ; ?>">Connectez-vous</a> pour pouvoir envoyer un message dans ce topic</p>
    <?php endif;  ?>

</div>
</div>




<?php include(VIEWS . '_partials/footer.php'); ?>