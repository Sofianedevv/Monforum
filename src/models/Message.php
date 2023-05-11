<?php 


class Message extends Db
{
    public static function findAllTopicMessage(array $id)
    {   
        $request = 'SELECT content, created_at, id_user, nickname, picture_profil FROM message INNER JOIN user ON message.id_user = user.id WHERE id_topic = :id_topic';
        $response= self::getDb()->prepare($request);
        $response->execute(self::htmlspecialchars($id));
        return $response->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function create(array $data)
    {
        $pdo = self::getDb();
        $request = 'INSERT INTO message (content, id_user, id_topic, created_at) VALUES (:content, :id_user, :id_topic, :created_at)';
        $response= $pdo->prepare($request);
        $response->execute(self::htmlspecialchars($data));
        return $pdo->lastInsertId();


    }

    public static function supprimer(array $id)
    {
        $request="DELETE FROM message WHERE id_topic=:id_topic";
        $response=self::getDb()->prepare($request);
        $response->execute(self::htmlspecialchars($id));

        return $response;
    }


}