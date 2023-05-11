<?php

class SecurityController
{
    public static function inscription()
    {
        if(!empty($_POST)):
            $error = [];

            function valid_pass($candidate)
            {
                $r1 = '/[A-Z]/';  //Uppercase
                $r2 = '/[a-z]/';  //lowercase
                $r3 = '/[!@#$%^&*()\-_=+{};:,<.>]/';  // whatever you mean by 'special char'
                $r4 = '/[0-9]/';  //numbers
                //*pour faciliter la création lors du développement on met en commentaire nos vérification sur le mot de passe 
            //    if (preg_match_all($r1, $candidate, $o) < 1) return FALSE;

            //    if (preg_match_all($r2, $candidate, $o) < 1) return FALSE;

            //    if (preg_match_all($r3, $candidate, $o) < 1) return FALSE;

            //    if (preg_match_all($r4, $candidate, $o) < 1) return FALSE;

               if (strlen($candidate) < 5) return FALSE;

                return TRUE;
            }




            if(empty($_POST['nickname'])):
                $error['nickname'] = 'le champs est obligatoire';
            endif;
            //*il va falloir vérifier qu'il y ai pas 2 utilisateur avec la meme adress mail
            if( empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)  || User::findByEmail(['email' => $_POST['email']]) ):
                //*ici on revérifie si un utilisateur avec la même adresse mail existe, au quel cas on lui met un message d'erreur en session.
                if(User::findByEmail(['email' => $_POST['email']])):
                    
                    $error['email']= 'Un compte est déjà existant à cete adresse mail, veuillez procéder à la récupération du mot de passe';
                else:
                    $error['email'] = 'le champs est obligatoire et l\'adresse mail doit être valide';
                endif;
            endif;
            if(empty($_POST['password']) || !valid_pass($_POST['password']) ):
                $error['password'] = 'le champs est obligatoire et votre mot de passe doit contenir, majuscule, minuscule,chiffre et caractère spécial';
            endif;
            if(empty($_POST['confirmPassword']) || $_POST['password'] !== $_POST['confirmPassword']):
                $error['confirmPassword']= 'Le champs est obligatoire et doit concorder avec le champs mot de passe';
            endif;
            if(empty($_FILES['picture_profil']['name'])):
            
                $error['picture_profil'] = "Le champs est obligatoire";
                
            elseif( ($_FILES['picture_profil']['type'] !== 'image/jpeg' || $_FILES['picture_profil']['type'] !== 'image/png' || $_FILES['picture_profil']['type'] !== 'image/webp') && $_FILES['picture_profil']['size'] > 3000000 ):
                $error['picture_profil'] = "Le fichier doit être une image (jpeg/png/webp) et doit être inférieur à 3mo";

            endif;   

            if(empty($error)):
                
                $nomImage = date('dmYHis') . $_FILES['picture_profil']['name'];

                //ici on copy le fichier stocké temporairement (tmp) ($_FILES['image']['tmp_name']  image faisant référence au name de l'input type file)
                //le deuxième paramètre est l'endroit où le fichier doit être copier avec son nouveau nom (en une seul chaine de caractère ici sa donnerai : 
                // MVC/public/upload/dateAInstantTNomDuFichier.typeDuFichier)
                copy($_FILES['picture_profil']['tmp_name'],PUBLIC_FOLDER . "/upload/" . $nomImage ); 

                $mdp = password_hash($_POST['password'], PASSWORD_DEFAULT);

                User::create([
                    'nickname' => $_POST['nickname'],
                    'email' =>$_POST['email'],
                    'password' => $mdp,
                    'picture_profil' => $nomImage
                ]);

                $_SESSION['messages']['success'][] = "Félicitation, vous êtes à présent inscrit. Connectez-vous!!";
                header("location:" . BASE);
                exit();

            endif;
            

        endif;

        include(VIEWS . 'security/inscription.php');
    }


    public static function connexion()
    {
        //* vérifie que notre formulaire a été envoyé, si il est envoyé il est non vide
        if(!empty($_POST)):
            //* dans user on stock l'utilisateur qui a le mail taper dans le formulaire
            $user = User::findByEmail(['email' => $_POST['email']]);
            //* on vérifie que la méthode findByEmail nous ai bien retourné un utilisateur, s'il y a pas d'utilisateuron ne rentrera pas dans le if
            if($user):
                //* ici on vérifie si le mot de passe taper correspond au mot de passe de l'utilisateur récupéré avec son adresse mail
                if(password_verify($_POST['password'], $user['password'])):
                    $_SESSION['user'] = $user;
                    $_SESSION['messages']['success'][] = "Bienvenue ". $user['pseudo'] . " !!!";
                    header("location:" . BASE);
                    exit();
                //* si le mot de passe ne corresponde pas on lui met un message d'erreur
                else:
                    $_SESSION['messages']['danger'][] = 'Erreur sur le mot de passe';

                endif;
            //* Si l'adresse mail n'existe pas dans la base de donnée
            else:
                $_SESSION['messages']['danger'][] = 'Aucun compte existant à cette adresse mail';

            endif;
        endif;    

        include(VIEWS . 'security/connexion.php');
    }

    public static function deconnexion()
    {
        // die(var_dump($_SESSION['user']));
        unset($_SESSION['user']);
        // die(var_dump($_SESSION));
        $_SESSION['messages']['info'][] = 'A bientôt !!!';
        header('location:' . BASE);
        exit();
    }

}