<?php

require_once(__DIR__ . '/../utils/connect.php');

class Product
{

    private int $product_id;
    private int $id_category;
    private string $product_name;
    private int $id_wood;
    private string $product_description;
    private int $product_weight;
    private int $product_price;
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
    public function setIdCategory(int $id_category): void
    {
        $this->id_category = $id_category;
    }
    public function setProductName(string $product_name): void
    {
        $this->product_name = $product_name;
    }
    public function setIdWood(int $id_wood): void
    {
        $this->id_wood = $id_wood;
    }
    public function setDescription(string $product_description): void
    {
        $this->product_description = $product_description;
    }
    public function setWeight(int $product_weight): void
    {
        $this->product_weight = $product_weight;
    }
    public function setPrice(int $product_price): void
    {
        $this->product_price = $product_price;
    }
    public function setSearch(string $search): void
    {
        $this->search = $search;
    }

    //------------- GETTERS ---------//
    public function getID(): int
    {
        return $this->product_id;
    }
    public function getIdCategory(): int
    {
        return $this->id_category;
    }
    public function getProductName(): string
    {
        return $this->product_name;
    }
    public function getIdWood(): int
    {
        return $this->id_wood;
    }
    public function getDescription(): string
    {
        return $this->product_description;
    }
    public function getWeight(): int
    {
        return $this->product_weight;
    }
    public function getPrice(): int
    {
        return $this->product_price;
    }


    //------------- SAVE PRODUCT ---------//
    public function save()
    {
        $productNew = Product::isProductExist($this->product_name);
        // var_dump($productNew);die;
        if ($productNew == 0) {
            try {
                $sql = "INSERT INTO `products` (`products_name`,`products_description`,`products_price`,`products_weight`,`id_category`,`id_wood`)
                                    VALUES (:product_name, :product_description, :product_price, :product_weight, :id_category, :id_wood)";
                $sth = $this->pdo->prepare($sql);
                $sth->bindValue(':id_category', $this->id_category, PDO::PARAM_INT);
                $sth->bindValue(':product_name', $this->product_name, PDO::PARAM_STR);
                $sth->bindValue(':id_wood', $this->id_wood, PDO::PARAM_INT);
                $sth->bindValue(':product_description', $this->product_description, PDO::PARAM_STR);
                $sth->bindValue(':product_weight', $this->product_weight, PDO::PARAM_INT);
                $sth->bindValue(':product_price', $this->product_price, PDO::PARAM_INT);
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

    //------------- CHECK PRODUCT EXIST ---------//
    public static function isProductExist(string $product_name): int
    {
        try {
            $pdo = Database::DBconnect();
            $sql = "SELECT `products_name` FROM `products` WHERE `products_name`=:product_name";
            $sth = $pdo->prepare($sql);
            $sth->bindValue(':product_name', $product_name, PDO::PARAM_STR);
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


    //------------- UPDATE PATIENT DATA ---------//
    public function update(): int
    {
        $productNew = Product::isProductExist($this->product_name);
        // var_dump($productNew);die;
        if ($productNew == 1) {
            try {
                $sql = "UPDATE `products` SET 
                `products_name`=:product_name,
                `products_description`=:product_description,
                `products_price`=:product_price,
                `products_weight`=:product_weight,
                `id_category`=:id_category,
                `id_wood`=:id_wood WHERE `id_product`=:product_id";
                $sth = $this->pdo->prepare($sql);
                $sth->bindValue(':id_category', $this->id_category, PDO::PARAM_INT);
                $sth->bindValue(':product_name', $this->product_name, PDO::PARAM_STR);
                $sth->bindValue(':id_wood', $this->id_wood, PDO::PARAM_INT);
                $sth->bindValue(':product_description', $this->product_description, PDO::PARAM_STR);
                $sth->bindValue(':product_weight', $this->product_weight, PDO::PARAM_INT);
                $sth->bindValue(':product_price', $this->product_price, PDO::PARAM_INT);
                $sth->bindValue(':product_id', $this->product_id, PDO::PARAM_INT);
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


    //------------- GET ALL products ---------//
    public static function getAll(int $category_id = 0)
    {
        try {
            $pdo = Database::DBconnect();
            $sql = "SELECT `products_name`,
            `products_description`,
            `products_price`,
            `products_weight`
            FROM `products` ORDER BY `products_name`";
            $sth = $pdo->prepare($sql);
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
    public static function getProduct(int $id_product = 0)
    {
        // var_dump('data',$id_product);
        $pdo = Database::DBconnect();
        try {
            $sql = "SELECT `products`.`id_product`,
            `products`.`products_name`,
            `products`.`products_description`,
            `products`.`products_price`,
            `products`.`products_weight`,
            `categories`.`categories_name`,
            `woods`.`woods_name`
            FROM `products` 
            INNER JOIN `categories` ON `products`.`id_category`=`categories`.`id_category` 
            INNER JOIN `woods` ON `products`.`id_wood`=`woods`.`id_wood`";
            if ($id_product != 0) {
                $sql .= " WHERE `products`.`id_product`=:id_product";
            }
            $sql .= " ORDER BY `products`.`products_name`";
            $sth = $pdo->prepare($sql);
            if ($id_product != 0) {
                $sth->bindValue(':id_product', $id_product, PDO::PARAM_INT);
            }
            // var_dump($sth->execute());die;
            if ($sth->execute()) {
                if ($id_product != 0) {
                    
                    $ProductInfo = $sth->fetch();
                    // var_dump('fetch',$ProductInfo);
                    return $ProductInfo;
                } else {
                    $ProductsList = $sth->fetchAll();
                    return $ProductsList;
                }
            } else {
                return false;
            }
        } catch (PDOException $e) {
            var_dump($e);die;
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


    //------------- GET WOOD ---------//
    public static function getCategory(int $category_id)
    {
        try {
            $pdo = Database::DBconnect();
            $sql = "SELECT `products`.`id_product`,
            `products`.`products_name`,
            `products`.`products_description`,
            `products`.`products_price`,
            `products`.`products_weight`,
            `woods`.`woods_name`
            FROM `products`
            INNER JOIN `woods` ON `products`.`id_category`=`woods`.`id_wood`";
            if ($category_id != 0) {
                $sql .= " WHERE `products`.`id_category`=:category_id";
            }
            $sql .= " ORDER BY `products`.`products_name`";
            $sth = $pdo->prepare($sql);
            $sth->bindValue(':category_id', $category_id, PDO::PARAM_INT);
            if ($sth->execute()) {
                $wood_list = $sth->fetchAll();
                return $wood_list;
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
