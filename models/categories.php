<?php

require_once(__DIR__ . '/../utils/connect.php');

class Category
{

    private int $id_category;
    private string $category_name;
    private string $text1;
    private string $text2;
    private string $text3;
    private string $text4;
    private $pdo;
    private string $search;

    public function __construct()
    {
        $this->pdo = Database::DBconnect();
    }


    //------------- SETTERS ---------//
    public function setID(int $id_category): void
    {
        $this->id_category = $id_category;
    }
    public function setCategoryName(string $category_name): void
    {
        $this->category_name = $category_name;
    }
    public function setText1(string $text1): void
    {
        $this->text1 = $text1;
    }
    public function setText2(string $text2): void
    {
        $this->text2 = $text2;
    }
    public function setText3(string $text3): void
    {
        $this->text3 = $text3;
    }
    public function setText4(string $text4): void
    {
        $this->text4 = $text4;
    }
    public function setSearch(string $search): void
    {
        $this->search = $search;
    }

    //------------- GETTERS ---------//
    public function getID(): int
    {
        return $this->id_category;
    }
    public function getCategoryName(): string
    {
        return $this->category_name;
    }
    public function getText1(): string
    {
        return $this->text1;
    }
    public function getText2(): string
    {
        return $this->text2;
    }
    public function getText3(): string
    {
        return $this->text3;
    }
    public function getText4(): string
    {
        return $this->text4;
    }


    //------------- SAVE CREATE CATEGORY ---------//
    public function save(): int
    {
        $pdo = Database::DBconnect();
        Category::isCategoryExist($this->category_name);
        try {
            $sql = "INSERT INTO `categories` (`categories`,`text1`,`text2`,`text3`,`text4`) 
            VALUES (:category_name,:text1,:text2,:text3,:text4)";
            $sth = $pdo->prepare($sql);
            $sth->bindValue(':category_name', $this->category_name, PDO::PARAM_STR);
            $sth->bindValue(':text1', $this->text1, PDO::PARAM_STR);
            $sth->bindValue(':text2', $this->text2, PDO::PARAM_STR);
            $sth->bindValue(':text3', $this->text3, PDO::PARAM_STR);
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
    public static function isCategoryExist(string $category_name): int
    {
        // var_dump($category_name); die;
        try {
            $pdo = Database::DBconnect();
            $sql = "SELECT `categories` FROM `categories` WHERE `categories`=:category_name";
            $sth = $pdo->prepare($sql);
            $sth->bindValue(':category_name', $category_name, PDO::PARAM_STR);
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
    public function update()
    {
        // var_dump($id_wood);die;
        $pdo = Database::DBconnect();
        try {
            $sql = "UPDATE `categories` 
            SET `categories`=:category_name,
            `text1`=:text1,
            `text2`=:text2,
            `text3`=:text3,
            `text4`=:text4
            WHERE `id_category`=:id_category";
            
            $sth = $pdo->prepare($sql);
            $sth->bindValue(':id_category', $this->id_category, PDO::PARAM_INT);
            $sth->bindValue(':category_name', $this->category_name, PDO::PARAM_STR);
            $sth->bindValue(':text1', $this->text1, PDO::PARAM_STR);
            $sth->bindValue(':text2', $this->text2, PDO::PARAM_STR);
            $sth->bindValue(':text3', $this->text3, PDO::PARAM_STR);
            $sth->bindValue(':text4', $this->text4, PDO::PARAM_STR);
            $result = $sth->execute();

            if (!$result) {
                throw new PDOException();
            } else {
                return true;
            }
        } catch (PDOException $e) {
            return false;
        }
    }


    //------------- GET ALL products ---------//
    public static function getAll()
    {
        try {
            $pdo = Database::DBconnect();
            $sql = "SELECT * FROM `categories` ORDER BY `categories`";
            $sth = $pdo->prepare($sql);

            if ($sth->execute()) {
                return $sth->fetchAll();
            } else {
                return false;
            }
        } catch (PDOException $ex) {
            return false;
        }
    }



    //------------- GET CATEGORY ---------//
    public static function getCategory(int $id_category = 0)
    {
        try {
            $pdo = Database::DBconnect();
            $sql = "SELECT * FROM `categories`";
            if ($id_category != 0) {
                $sql .= " WHERE id_category = :id_category";
            }
            $sql .= " ORDER BY `categories`";
            $sth = $pdo->prepare($sql);

            if ($id_category != 0) {
                $sth->bindValue(':id_category', $id_category, PDO::PARAM_INT);
            }
            if ($sth->execute()) {
                if ($id_category != 0) {

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



    //------------- DELETE CATEGORY ---------//
    public static function delete(int $id_category): int
    {
        // var_dump($id_category);die;
        try {
            $pdo = Database::DBconnect();
            $sql = "DELETE FROM `categories` WHERE `id_category`=:id_category ";
            $sth = $pdo->prepare($sql);
            $sth->bindValue(':id_category', $id_category, PDO::PARAM_INT);
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
