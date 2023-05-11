<?php  


class Topic extends Db
{
    public static function create(array $data)
    {
        $pdo = self::getDb();
        $request = "INSERT INTO topic (title, id_user, created_at) VALUES (:title, :id_user, :created_at)";
        $response = $pdo->prepare($request);
        $response->execute(self::htmlspecialchars($data));
        return $pdo->lastInsertId();


    }

    public static function findAll()
    {   
        $request = "SELECT * FROM topic ORDER BY created_at DESC";
        $response = self::getDb()->prepare($request);
        $response->execute();

        return $response->fetchAll(PDO::FETCH_ASSOC);


    }

    public static function findById(array $id)
    {
        $request="SELECT * FROM topic WHERE id=:id";
        $response = self::getDb()->prepare($request);
        $response->execute(self::htmlspecialchars($id));

        return $response->fetch(PDO::FETCH_ASSOC);
    }
    public static function supprimer(array $id)
    {
        $request="DELETE FROM topic WHERE id=:id";
        $response=self::getDb()->prepare($request);
        $response->execute(self::htmlspecialchars($id));

        return $response;
    }

}