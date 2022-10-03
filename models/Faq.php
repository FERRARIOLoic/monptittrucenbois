<?php

require_once(__DIR__ . '/../utils/connect.php');

class Carrier
{

    private int $id_carrier;
    private string $carrier_name;
    private string $carrier_phone;
    private string $carrier_email;
    private $pdo;
    private string $search;

    public function __construct()
    {
        $this->pdo = Database::DBconnect();
    }


    //------------- SETTERS ---------//
    public function setID(int $id_carrier): void
    {
        $this->id_carrier = $id_carrier;
    }
    public function setCarrierName(string $carrier_name): void
    {
        $this->carrier_name = $carrier_name;
    }
    public function setCarrierPhone(string $carrier_phone): void
    {
        $this->carrier_phone = $carrier_phone;
    }
    public function setCarrierEmail(string $carrier_email): void
    {
        $this->carrier_email = $carrier_email;
    }
    public function setSearch(int $search): void
    {
        $this->search = $search;
    }

    //------------- GETTERS ---------//
    public function getID(): int
    {
        return $this->id_carrier;
    }
    public function getCarrierName(): string
    {
        return $this->carrier_name;
    }
    public function getCarrierPhone(): string
    {
        return $this->carrier_phone;
    }
    public function getCarrierEmail(): string
    {
        return $this->carrier_email;
    }


    //------------- SAVE CREATE carrier ---------//
    public static function save(string $carriers_name, string $carriers_phone, string $carriers_email)
    {
        $pdo = Database::DBconnect();
        $carrier_new = Carrier::isCarrierExist($carriers_name);
        if ($carrier_new == 0) {

            try {
                $sql = "INSERT INTO `carriers` (`carriers_name`,`carriers_phone`,`carriers_email`) 
                                    VALUES (:carriers_name,:carriers_phone,:carriers_email)";
                $sth = $pdo->prepare($sql);
                $sth->bindValue(':carriers_name', $carriers_name, PDO::PARAM_STR);
                $sth->bindValue(':carriers_phone', $carriers_phone, PDO::PARAM_STR);
                $sth->bindValue(':carriers_email', $carriers_email, PDO::PARAM_STR);
                // var_dump($sth->execute());die;
                $result = $sth->execute();

                if (!$result) {
                    throw new PDOException();
                }
                unset($carriers_name, $carriers_phone, $carriers_email);
            } catch (PDOException $e) {
                // var_dump($e);die;
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
    public static function update(int $id_carrier, string $carriers_name, string $carriers_phone, string $carriers_email)
    {
        // var_dump($id_wood);die;
        $pdo = Database::DBconnect();
        try {
            $sql = "UPDATE `carriers` SET `carriers_name`=:carriers_name, `carriers_phone`=:carriers_phone, `carriers_email`=:carriers_email WHERE `id_carrier`=:id_carrier";
            $sth = $pdo->prepare($sql);
            $sth->bindValue(':id_carrier', $id_carrier, PDO::PARAM_STR);
            $sth->bindValue(':carriers_name', $carriers_name, PDO::PARAM_STR);
            $sth->bindValue(':carriers_phone', $carriers_phone, PDO::PARAM_STR);
            $sth->bindValue(':carriers_email', $carriers_email, PDO::PARAM_STR);
            $result = $sth->execute();

            if (!$result) {
                throw new PDOException();
            } else {
                return 2;
            }
            return true;
        } catch (PDOException $e) {
            // var_dump($e);die;
            return false;
        }
    }


    //------------- GET ALL products ---------//
    public static function getAll()
    {
        try {
            $pdo = Database::DBconnect();
            $sql = "SELECT * FROM `carriers` GROUP BY `carriers_name`";
            $sth = $pdo->prepare($sql);
            if ($sth->execute()) {
                $categories_list = $sth->fetchAll();
                return $categories_list;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            var_dump($e);
            die;
            return false;
        }
    }



    //------------- GET carrier ---------//
    public static function getCarrier(int $id_carrier = 0)
    {
        try {
            $pdo = Database::DBconnect();
            $sql = "SELECT * FROM `carriers`";
            if ($id_carrier != 0) {
                $sql .= " WHERE `id_carrier` = :id_carrier";
            }
            $sql .= " ORDER BY `carriers_name`";
            $sth = $pdo->prepare($sql);

            if ($id_carrier != 0) {
                $sth->bindValue(':id_carrier', $id_carrier, PDO::PARAM_INT);
            }
            if ($sth->execute()) {
                if ($id_carrier != 0) {

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



    //------------- GET PRICE ---------//
    public static function getPrice(int $id_carrier, int $order_weight)
    {
        // var_dump('class',$id_carrier);die;
        try {
            $pdo = Database::DBconnect();
            $sql = "SELECT * FROM `prices` WHERE (`id_carrier` = :id_carrier AND `carriers_max_weight`>=:order_weight); ";
            $sth = $pdo->prepare($sql);
            $sth->bindValue(':id_carrier', $id_carrier, PDO::PARAM_INT);
            $sth->bindValue(':order_weight', $order_weight, PDO::PARAM_INT);

            if ($sth->execute()) {
                    $carriers_price = $sth->fetch();
                return $carriers_price;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            var_dump($e);die;
            return false;
        }
    }



    //------------- DELETE PATIENT ---------//
    public static function delete(int $id_carrier)
    {
        try {
            $pdo = Database::DBconnect();
            $sql = "DELETE FROM `users` WHERE `id`=:id_carrier ";
            $sth = $pdo->prepare($sql);
            $sth->bindValue(':id_carrier', $id_carrier, PDO::PARAM_INT);
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
