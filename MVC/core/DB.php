<?php
class DB
{
    function __construct()
    {
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=simple-messenger;charset=utf8', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    private static function connect()
    {
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=simple-messenger;charset=utf8', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }

    public static function query($query, $params = array())
    {
        $statement = self::connect()->prepare($query);
        $statement->execute($params);
        if (explode(' ', $query)[0] == 'SELECT') { //explode la ham dung de tach chuoi thanh mang
            $data = $statement->fetchAll();
            return $data;
        }
    }
}
