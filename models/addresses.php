<?php

require_once(__DIR__ . '/../utils/connect.php');
require_once(__DIR__ . '/../models/users.php');

class Address
{

    private int $user_id;
    private int $address_id;
    private int $address_type;
    private string $address;
    private string $address_more;
    private string $postal_code;
    private string $city;
    private $pdo;
    private string $search;

    public function __construct()
    {
        $this->pdo = Database::DBconnect();
    }


    //------------- SETTERS ---------//
    public function setUserId(int $user_id): void
    {
        $this->user_id = $user_id;
    }
    public function setID(int $address_id): void
    {
        $this->address_id = $address_id;
    }
    public function setAddressType(int $address_type): void
    {
        $this->address_type = $address_type;
    }
    public function setAddress(string $address): void
    {
        $this->address = $address;
    }
    public function setAddressMore(?string $address_more): void
    {
        $this->address_more = !empty($address_more) ? $address_more : '';
    }
    public function setPostalCode(string $postal_code): void
    {
        $this->postal_code = $postal_code;
    }
    public function setCity(string $city): void
    {
        $this->city = $city;
    }
    public function setSearch(string $search): void
    {
        $this->search = $search;
    }

    //------------- GETTERS ---------//
    public function getUserId(): int
    {
        return $this->user_id;
    }
    public function getID(): int
    {
        return $this->address_id;
    }
    public function getAddressType(): int
    {
        return $this->address_type;
    }
    public function getAddress(): string
    {
        return $this->address;
    }
    public function getAddressMore(): string
    {
        return $this->address_more;
    }
    public function getPostalCode(): string
    {
        return $this->postal_code;
    }
    public function getCity(): string
    {
        return $this->city;
    }


    //------------- SAVE CREATE CATEGORY ---------//
    public function save(): int
    {
        $pdo = Database::DBconnect();
        Category::isCategoryExist($this->address);
        try {
            $sql = "INSERT INTO `categories` (`categories`,`address_more`,`postal_code`,`city`,`text4`) 
            VALUES (:address,:address_more,:postal_code,:city,:text4)";
            $sth = $pdo->prepare($sql);
            $sth->bindValue(':address', $this->address, PDO::PARAM_STR);
            $sth->bindValue(':address_more', $this->address_more, PDO::PARAM_STR);
            $sth->bindValue(':postal_code', $this->postal_code, PDO::PARAM_STR);
            $sth->bindValue(':city', $this->city, PDO::PARAM_STR);
            $sth->bindValue(':text4', $this->text4, PDO::PARAM_STR);
            $result = $sth->execute();

            if (!$result) {
                throw new PDOException();
            }
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    //------------- CHECK CATEGORY EXIST ---------//
    public static function isCategoryExist(string $address): int
    {
        // var_dump($address); die;
        try {
            $pdo = Database::DBconnect();
            $sql = "SELECT `categories` FROM `categories` WHERE `categories`=:address";
            $sth = $pdo->prepare($sql);
            $sth->bindValue(':address', $address, PDO::PARAM_STR);
            if ($sth->execute()) {
                $checkedCategory_name = $sth->fetch();
                return $checkedCategory_name ? 1 : 0;
            } else {
                return 2;
            }
        } catch (PDOException $e) {
            return 2;
        }
    }

    //------------- UPDATE CATEGORY DATA ---------//
    public function update(int $address_id = 0)
    {
        // var_dump($this->user_id);die;
        $pdo = Database::DBconnect();
        try {
            if ($address_id == 0) {
                $sql = "INSERT INTO `addresses` (`addresses_address`,`addresses_address_more`,`addresses_postal_code`,`addresses_city`,`addresses_type`,`id_user`)
                VALUES (:address,:address_more,:postal_code,:city,:addresses_type,:user_id);";
            }
            if ($address_id != 0) {
                $sql = "UPDATE `addresses` 
                SET `addresses_address`=:address,
                `addresses_address_more`=:address_more,
                `addresses_postal_code`=:postal_code,
                `addresses_city`=:city,
                `id_user`=:user_id WHERE `id_address`=:address_id";
            }

            $address_new = Address::isCategoryExist($this->address);

            $sth = $pdo->prepare($sql);
            $sth->bindValue(':address', $this->address, PDO::PARAM_STR);
            $sth->bindValue(':address_more', $this->address_more, PDO::PARAM_STR);
            $sth->bindValue(':postal_code', $this->postal_code, PDO::PARAM_STR);
            $sth->bindValue(':city', $this->city, PDO::PARAM_STR);
            $sth->bindValue(':user_id', $this->user_id, PDO::PARAM_STR);
            if($address_new>0)
            {
                $sth->bindValue(':addresses_type', '0', PDO::PARAM_STR);
            }
            else{
                $sth->bindValue(':addresses_type', '1', PDO::PARAM_STR);
            }
            if ($address_id != 0) {
                $sth->bindValue(':address_id', $this->address_id, PDO::PARAM_INT);
            }
            $result = $sth->execute();

            if (!$result) {
                throw new PDOException();
            } else {
                return true;
            }
        } catch (PDOException $e) {
            var_dump($e);
            die;
            return false;
        }
    }


    //------------- GET CATEGORY ---------//
    public static function getAddressInfo(int $user_id = 0, int $address_type = 0)
    {
        // var_dump($address_type);die;
        try {
            $pdo = Database::DBconnect();
            $sql = "SELECT * FROM `addresses`";
            if ($user_id != 0) {
                $sql .= " WHERE (`id_user` = :user_id AND `addresses_type` = :address_type)";
            }
            $sql .= " ORDER BY `addresses_address`";
            $sth = $pdo->prepare($sql);

            if ($user_id != 0) {
                $sth->bindValue(':user_id', $user_id, PDO::PARAM_INT);
                $sth->bindValue(':address_type', $address_type, PDO::PARAM_INT);
            }
            if ($sth->execute()) {
                if ($user_id != 0) {

                    $wood_list = $sth->fetch();
                } else {
                    $wood_list = $sth->fetchAll();
                }
                // var_dump($wood_list);die;
                return $wood_list;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            var_dump($e);die;
            return false;
        }
    }



    //------------- DELETE CATEGORY ---------//
    public static function delete(int $address_id): int
    {
        // var_dump($address_id);die;
        try {
            $pdo = Database::DBconnect();
            $sql = "DELETE FROM `categories` WHERE `address_id`=:address_id ";
            $sth = $pdo->prepare($sql);
            $sth->bindValue(':address_id', $address_id, PDO::PARAM_INT);
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
