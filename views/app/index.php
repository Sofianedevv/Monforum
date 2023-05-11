<?php include(VIEWS . '_partials/header.php'); ?>

<h1 class="text-center mt-4">Bienvenue sur mon forum</h1>


<div class="container">
<?php foreach($topics as $topic):  ?>
<div class="bg-primary text-center text-white my-3">
    <?php $user = User::findById(['id' => $topic["id_user"]])  // methode 1 pour pouvoir afficher les paramètre du user derrière et aussi le supprimer ?> 
    <img src="<?= UPLOAD . $user['picture_profil'] ; ?>" alt="" width="70" class="rounded-circle mt-3">
    <a href="<?= BASE . "topic/voir?id=" . $topic['id'] ; ?>"><h2 class="my-3"><?= $topic['title'] ; ?></h2></a>
    <p class="mt-2">par : <?= $user['nickname'] ; ?></p>
    <p class="mt-1">créé le : <?= date('d-m-Y H:i:s', strtotime($topic['created_at'])) ; ?></p>
    <?php if(isset($_SESSION['user'])): ?>
    <?php if($_SESSION['user']['id'] == $user['id']):?>
        <a href="<?= BASE . 'topic/supprimer?id=' . $topic['id'] ; ?>" class="btn btn-danger">supprimer</a>
    <?php endif; endif; ?>
</div>

<?php endforeach;  ?>


</div>

<?php include(VIEWS . '_partials/footer.php'); ?>
