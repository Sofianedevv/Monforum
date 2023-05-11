<?php

class User extends Db
{

    public static function create(array $data)
    {
        //* $data recoit un tableau avec les marqueurs associés à la valeur
        $pdo = self::getDb();
        $request = "INSERT INTO user (email, nickname, password, picture_profil) VALUES (:email, :nickname, :password, :picture_profil)";
        $response = $pdo->prepare($request);
        $response->execute(self::htmlspecialchars($data));
        return $pdo->lastInsertId();
    }

    public static function findByEmail(array $email)
    {
        $request = "SELECT * FROM user WHERE email = :email";
        $response = self::getDb()->prepare($request);
        $response->execute(self::htmlspecialchars($email));

        return $response->fetch(PDO::FETCH_ASSOC);
    }

    public static function findById(array $id)
    {
        $request="SELECT * FROM user WHERE id=:id";
        $response = self::getDb()->prepare($request);
        $response->execute(self::htmlspecialchars($id));

        return $response->fetch(PDO::FETCH_ASSOC);
    }





}