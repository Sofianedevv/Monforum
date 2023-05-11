<!doctype html>
<html lang="en">

<head>
    <title><?= CONFIG['app']['name'] ?></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/5.2.3/solar/bootstrap.min.css" integrity="sha512-SGLY63IpxQgjNZfOfmayBxXeh5Uw6/b3ZgAxONQb9OW5MosjvFOPmT6aTgLEerDOTc03knEaeeTdV6q5lOkLKw==" crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?= BASE ; ?>">Forum</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor02">
      <ul class="navbar-nav me-auto">
      <?php if(isset($_SESSION['user'])): ?>
        <li class="nav-item">
          <a class="nav-link btn btn-outline-primary" href="<?= BASE . "topic/create" ; ?>">Créer un Topic
          </a>
        </li>
        <?php else:  ?>
          <li>
            <p class="mt-3"><a href="<?= BASE . 'connexion' ; ?>">Connectez-vous</a> pour pouvoir créer un topic</p>
          </li>
        <?php endif;  ?>
        
      </ul>
      <?php if(isset($_SESSION['user'])): ?>
      <a href="<?= BASE . 'deconnexion' ; ?>" class="btn btn-danger mx-2">Déconnexion</a>
      <?php else:  ?>
      <a href="<?= BASE . 'connexion' ; ?>" class="btn btn-info mx-2">Connexion</a>
      <a href="<?= BASE . 'inscription' ; ?>" class="btn btn-secondary mx-2">Inscription</a>
      <?php endif;  ?>
      
    </div>
  </div>
</nav>



<div class="container mt-5">

    <?php if(isset($_SESSION['messages'])):
        foreach ($_SESSION['messages'] as $type => $messages):
          foreach($messages as $message):
    ?>
    
            <div class="w-50 text-center mx-auto alert alert-<?= $type; ?>"> <?= $message; ?> </div>
    
    
    <?php endforeach; endforeach;
    //* suppression de tout les messages sauvegardé dans la session.
    unset($_SESSION['messages']);  
  endif;
    ?>


</div>


