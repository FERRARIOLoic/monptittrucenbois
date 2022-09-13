<?php

require_once(__DIR__ . '/../utils/connect.php');

class Product
{

    private int $product_id;
    private string $lastname;
    private string $firstname;
    private string $birthdate;
    private string $phone;
    private string $mail;
    private $pdo;
    private string $search;

    public function __construct()
    {
        $this->pdo = Database::DBconnect();
    }


    //------------- SETTERS ---------//
    public function setID(int $product_id): void
    {
        $this->product_id = $product_id;
    }
    public function setLastname(string $lastname): void
    {
        $this->lastname = $lastname;
    }
    public function setFirstname(string $firstname): void
    {
        $this->firstname = $firstname;
    }
    public function setBirthdate(string $birthdate): void
    {
        $this->birthdate = $birthdate;
    }
    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }
    public function setEmail(string $mail): void
    {
        $this->mail = $mail;
    }
    public function setSearch(int $search): void
    {
        $this->search = $search;
    }

    //------------- GETTERS ---------//
    public function getID(): int
    {
        return $this->product_id;
    }
    public function getLastname(): string
    {
        return $this->lastname;
    }
    public function getFirstname(): string
    {
        return $this->firstname;
    }
    public function getBirthdate(): string
    {
        return $this->birthdate;
    }
    public function getPhone(): string
    {
        return $this->phone;
    }
    public function getEmail(): string
    {
        return $this->mail;
    }


    //------------- SAVE CREATE PATIENT ---------//
    public function save()
    {
        User::checkEmail($this->mail);
        try {
            $sql = "INSERT INTO `products` (`lastname`, `firstname`, `birthdate`, `phone`, `mail`) 
                                    VALUES (:lastname, :firstname, :birthdate, :phone, :mail)";
            $sth = $this->pdo->prepare($sql);
            $sth->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
            $sth->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
            $sth->bindValue(':birthdate', $this->birthdate, PDO::PARAM_STR);
            $sth->bindValue(':phone', $this->phone, PDO::PARAM_INT);
            $sth->bindValue(':mail', $this->mail, PDO::PARAM_STR);
            $result = $sth->execute();

            if (!$result) {
                throw new PDOException();
            }
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }


    //------------- UPDATE PATIENT DATA ---------//
    public function update(): int
    {
        try {
            $sql = "UPDATE `products` SET `lastname`=:lastname, `firstname`=:firstname, `birthdate`=:birthdate, `phone`=:phone, `mail`=:mail WHERE `id`=:product_id";
            $sth = $this->pdo->prepare($sql);
            $sth->bindValue(':product_id', $this->product_id, PDO::PARAM_INT);
            $sth->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
            $sth->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
            $sth->bindValue(':birthdate', $this->birthdate, PDO::PARAM_STR);
            $sth->bindValue(':phone', $this->phone, PDO::PARAM_INT);
            $sth->bindValue(':mail', $this->mail, PDO::PARAM_STR);
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
                $sql .= " WHERE id_product_category = :category_id";
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
    //------------- GET ALL products ---------//
    public static function getCategory(int $category_id = 0)
    {
        try {
            $pdo = Database::DBconnect();
            $sql = "SELECT * FROM `products_categories`";
            if ($category_id != 0) {
                $sql .= " WHERE `id_product_category`=:category_id";
            }
            $sql .= " ORDER BY `categories`";
            $sth = $pdo->prepare($sql);

            if ($category_id != 0) {
                $sth->bindValue(':category_id', $category_id, PDO::PARAM_INT);
            }
            if ($sth->execute()) {
                if ($category_id != 0) {

                    $all_categories = $sth->fetch();
                } else {
                    $all_categories = $sth->fetchAll();
                }
                return $all_categories;
            } else {
                return false;
            }
        } catch (PDOException $ex) {
            return false;
        }
    }


    //------------- DELETE PATIENT ---------//
    public static function delete(int $product_id)
    {
        try {
            $pdo = Database::DBconnect();
            $sql = "DELETE FROM `users` WHERE `id`=:product_id ";
            $sth = $pdo->prepare($sql);
            $sth->bindValue(':product_id', $product_id, PDO::PARAM_INT);
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
