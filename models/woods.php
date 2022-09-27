<?php

require_once(__DIR__ . '/../utils/connect.php');

class Wood
{

    private int $wood_id;
    private string $wood_name;
    private $pdo;
    private string $search;

    public function __construct()
    {
        $this->pdo = Database::DBconnect();
    }


    //------------- SETTERS ---------//
    public function setID(int $wood_id): void
    {
        $this->wood_id = $wood_id;
    }
    public function setLastname(string $wood_name): void
    {
        $this->wood_name = $wood_name;
    }
    public function setSearch(int $search): void
    {
        $this->search = $search;
    }

    //------------- GETTERS ---------//
    public function getID(): int
    {
        return $this->wood_id;
    }
    public function getLastname(): string
    {
        return $this->wood_name;
    }


    //------------- SAVE CREATE WOOD ---------//
    public static function save(string $wood_name): string
    {
        $pdo = Database::DBconnect();
        $wood_new = Wood::isWoodExist($wood_name);
        if ($wood_new == 0) {

            try {
                $sql = "INSERT INTO `woods` (`woods_name`) 
                                    VALUES (:woods_name)";
                $sth = $pdo->prepare($sql);
                $sth->bindValue(':woods_name', $wood_name, PDO::PARAM_STR);
                $result = $sth->execute();

                if (!$result) {
                    throw new PDOException();
                }
                return true;
            } catch (PDOException $e) {
                return false;
            }
        } else {
            return false;
        }
    }

    //------------- CHECK WOOD EXIST ---------//
    public static function isWoodExist(string $wood_name): int
    {
        try {
            $pdo = Database::DBconnect();
            $sql = "SELECT `woods_name` FROM `woods` WHERE `woods_name`=:woods_name";
            $sth = $pdo->prepare($sql);
            $sth->bindValue(':woods_name', $wood_name, PDO::PARAM_STR);
            if ($sth->execute()) {
                $checkedEwood_name = $sth->fetch();
                return $checkedEwood_name ? 1 : 0;
            } else {
                return 2;
            }
        } catch (PDOException $e) {
            return 2;
        }
    }

    //------------- UPDATE WOOD DATA ---------//
    public static function update(int $id_wood, string $wood_name)
    {
        // var_dump($id_wood);die;
        $pdo = Database::DBconnect();
        try {
            $sql = "UPDATE `woods` SET `woods_name`=:woods_name WHERE `id`=:id_wood";
            $sth = $pdo->prepare($sql);
            $sth->bindValue(':id_wood', $id_wood, PDO::PARAM_STR);
            $sth->bindValue(':woods_name', $wood_name, PDO::PARAM_STR);
            $result = $sth->execute();

            if (!$result) {
                throw new PDOException();
            } else {
                $resultView = "Les modifications ont été enregistrées";
                return $resultView;
            }
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }


    //------------- GET ALL products ---------//
    public static function getAll(int $category_id = 0)
    {
        try {
            $pdo = Database::DBconnect();
            $sql = "SELECT * FROM `products`";
            if ($category_id != 0) {
                $sql .= " WHERE id_category = :category_id";
            }
            $sql .= " ORDER BY `products_name`";
            $sth = $pdo->prepare($sql);
            if ($category_id != 0) {
                $sth->bindValue(':category_id', $category_id, PDO::PARAM_INT);
            }
            if ($sth->execute()) {
                $products_list = $sth->fetchAll();
                return $products_list;
            } else {
                return false;
            }
        } catch (PDOException $ex) {
            return false;
        }
    }



    //------------- GET WOOD ---------//
    public static function getWood(int $wood_id = 0)
    {
        try {
            $pdo = Database::DBconnect();
            $sql = "SELECT * FROM `woods`";
            if ($wood_id != 0) {
                $sql .= " WHERE `id_wood`=:wood_id";
            }
            $sql .= " ORDER BY `woods_name`";
            $sth = $pdo->prepare($sql);

            if ($wood_id != 0) {
                $sth->bindValue(':wood_id', $wood_id, PDO::PARAM_INT);
            }
            if ($sth->execute()) {
                if ($wood_id != 0) {

                    $wood_list = $sth->fetch();
                } else {
                    $wood_list = $sth->fetchAll();
                }
                return $wood_list;
            } else {
                return false;
            }
        } catch (PDOException $ex) {
            return false;
        }
    }



    //------------- DELETE PATIENT ---------//
    public static function delete(int $id_wood): int
    {
        try {
            $pdo = Database::DBconnect();
            $sql = "DELETE FROM `woods` WHERE `id_wood`=:id_wood ";
            $sth = $pdo->prepare($sql);
            $sth->bindValue(':id_wood', $id_wood, PDO::PARAM_INT);
            $result = $sth->execute();
            if (!$result) {
                throw new PDOException();
                return false;
            } else {
                return 2;
            }
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}
