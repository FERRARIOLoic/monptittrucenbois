<?php

require_once(__DIR__ . '/../utils/connect.php');

class ErrorText
{

    public static function getByID(int $error_id = 0)
    {
        try {
            $pdo = Database::DBconnect();

            $sql = "SELECT `text_error` FROM `errors`";
            if (isset($error_id)) {
                $sql .= " WHERE `id`=:error_id";
            }
            $sql .= " ORDER BY id ;";
            $sth = $pdo->prepare($sql);
            $sth->bindValue(':error_id', $error_id, PDO::PARAM_INT);
            $sth->execute();
            if (isset($error_id)) {
                $errorText = $sth->fetch();
                return $errorText;
            } else {
                $errorText = $sth->fetchAll();
                return $errorText;
            }
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}
