<?php

class AppController
{

    public static function index()
    {
      
        $topics = Topic::findAll();
        include(VIEWS . 'app/index.php');
    }


    public static function topicCreate()
    {
        if(!isset($_SESSION['user'])):
            header("location:" . BASE);
            exit();
        endif;
        
        if(!empty($_POST))
        {
            $error = true;
            if(empty($_POST['title'])):
                $error = false;
                $title = "le titre est obligatoire";
            endif;

            if($error):
                // die(var_dump($_POST['title'], $_SESSION['user']['id'] , date_format(new DateTime(), 'd-m-Y H:i:s') ) );
                Topic::create([
                    'title' => $_POST['title'],
                    'id_user' => $_SESSION['user']['id'],
                    'created_at' => date_format(new DateTime(), 'Y-m-d H:i:s')
                ]);
                $_SESSION['messages']['success'][] = "Votre topic a bien été créé";

                header('location:' . BASE);
                exit();


            endif;


        }

        include(VIEWS . 'app/topicCreate.php');
    }

    public static function tchat()
    {
        if(isset($_GET["id"]))
        {
            $topic = Topic::findById(['id' => $_GET['id']]);
            $messages = Message::findAllTopicMessage(['id_topic' => $_GET['id']]);

            
        }
        if(!empty($_POST)){
            $error = true;
            if(empty($_POST['content'])):
                $error = false;
                $content= "le champs est obligatoire";
            endif;

            if($error):
                if(isset($_SESSION['user']) && isset($_GET['id'])){
                    Message::create([
                    'content' =>    $_POST['content']  ,
                    'id_user' =>     $_SESSION['user']['id'],
                    'id_topic'  =>   $topic['id'] ,
                    'created_at' => date_format(new DateTime(), 'Y-m-d H:i:s')
                    ]);
                }
                



            endif;


        }


        include(VIEWS . 'app/tchat.php');
    }


    public static function supprimerTopic(){
        if(isset($_GET['id']))
        {
            Topic::supprimer(['id' => $_GET['id']]);
            Message::supprimer(['id_topic' => $_GET['id']]);
            
            $_SESSION['messages']['success'][] = "Votre topic a bien été supprimé";

                header('location:' . BASE);
                exit();

        }
    }
    

    


}
