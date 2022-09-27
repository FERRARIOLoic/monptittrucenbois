<?php

require_once(__DIR__ . '/../utils/connect.php');

class Carrier
{

    private int $carrier_id;
    private string $carrier_name;
    private $pdo;
    private string $search;

    public function __construct()
    {
        $this->pdo = Database::DBconnect();
    }


    //------------- SETTERS ---------//
    public function setID(int $carrier_id): void
    {
        $this->carrier_id = $carrier_id;
    }
    public function setLastname(string $carrier_name): void
    {
        $this->carrier_name = $carrier_name;
    }
    public function setSearch(int $search): void
    {
        $this->search = $search;
    }

    //------------- GETTERS ---------//
    public function getID(): int
    {
        return $this->carrier_id;
    }
    public function getLastname(): string
    {
        return $this->carrier_name;
    }


    //------------- SAVE CREATE carrier ---------//
    public static function save(string $carriers_name, string $carriers_number, string $carriers_email)
    {
        $pdo = Database::DBconnect();
        $carrier_new = Carrier::isCarrierExist($carriers_name);
        // var_dump($carrier_new);die;
        if ($carrier_new == 0) {

            try {
                $sql = "INSERT INTO `carriers` (`carriers_name`,`carriers_number`,`carriers_email`) 
                                    VALUES (:carriers_name,:carriers_number,:carriers_email)";
                $sth = $pdo->prepare($sql);
                $sth->bindValue(':carriers_name', $carriers_name, PDO::PARAM_STR);
                $sth->bindValue(':carriers_number', $carriers_number, PDO::PARAM_STR);
                $sth->bindValue(':carriers_email', $carriers_email, PDO::PARAM_STR);
                $result = $sth->execute();

                if (!$result) {
                    throw new PDOException();
                }
                unset($carriers_name);
                unset($carriers_number);
                unset($carriers_email);
            } catch (PDOException $e) {
                return false;
            }
            return true;
        } else {
            return false;
        }
    }

    //------------- CHECK carrier EXIST ---------//
    public static function isCarrierExist(string $carriers_name): int
    {
        try {
            $pdo = Database::DBconnect();
            $sql = "SELECT `carriers_name` FROM `carriers` WHERE `carriers_name`=:carriers_name";
            $sth = $pdo->prepare($sql);
            $sth->bindValue(':carriers_name', $carriers_name, PDO::PARAM_STR);
            if ($sth->execute()) {
                $checkedCarrier = $sth->fetch();
                return $checkedCarrier ? 1 : 0;
            } else {
                return 2;
            }
        } catch (PDOException $e) {
            return 2;
        }
    }

    //------------- UPDATE carrier DATA ---------//
    public static function update(int $id_wood, string $carrier_name)
    {
        // var_dump($id_wood);die;
        $pdo = Database::DBconnect();
        try {
            $sql = "UPDATE `woods` SET `woods_name`=:woods_name WHERE `id`=:id_wood";
            $sth = $pdo->prepare($sql);
            $sth->bindValue(':id_wood', $id_wood, PDO::PARAM_STR);
            $sth->bindValue(':woods_name', $carrier_name, PDO::PARAM_STR);
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
    public static function getAll(int $carrier_id = 0)
    {
        try {
            $pdo = Database::DBconnect();
            $sql = "SELECT * FROM `categories`";
            if ($carrier_id != 0) {
                $sql .= " WHERE id_product_carrier = :carrier_id";
            }
            $sql .= " ORDER BY `categories`";
            $sth = $pdo->prepare($sql);
            if ($carrier_id != 0) {
                $sth->bindValue(':carrier_id', $carrier_id, PDO::PARAM_INT);
            }
            if ($sth->execute()) {
                $categories_list = $sth->fetchAll();
                return $categories_list;
            } else {
                return false;
            }
        } catch (PDOException $ex) {
            return false;
        }
    }



    //------------- GET carrier ---------//
    public static function getcarrier(int $carrier_id = 0)
    {
        try {
            $pdo = Database::DBconnect();
            $sql = "SELECT * FROM `carriers`";
            if ($carrier_id != 0) {
                $sql .= " WHERE id_carrier = :carrier_id";
            }
            $sql .= " ORDER BY `carriers_name`";
            $sth = $pdo->prepare($sql);

            if ($carrier_id != 0) {
                $sth->bindValue(':carrier_id', $carrier_id, PDO::PARAM_INT);
            }
            if ($sth->execute()) {
                if ($carrier_id != 0) {

                    $carriers_list = $sth->fetch();
                } else {
                    $carriers_list = $sth->fetchAll();
                }
                return $carriers_list;
            } else {
                return false;
            }
        } catch (PDOException $ex) {
            return false;
        }
    }



    //------------- DELETE PATIENT ---------//
    public static function delete(int $carrier_id)
    {
        try {
            $pdo = Database::DBconnect();
            $sql = "DELETE FROM `users` WHERE `id`=:carrier_id ";
            $sth = $pdo->prepare($sql);
            $sth->bindValue(':carrier_id', $carrier_id, PDO::PARAM_INT);
            $result = $sth->execute();
            if (!$result) {
                throw new PDOException();
                $resultView = 'Erreur lors de la suppression du patient';
                return $resultView;
            } else {
                $resultView = "Le patient a été supprimé";
                return $resultView;
            }
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}
