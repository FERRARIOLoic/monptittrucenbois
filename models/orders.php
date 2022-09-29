<?php

require_once(__DIR__ . '/../utils/connect.php');
require_once(__DIR__ . '/../models/products.php');

class Order
{

    private int $id_order;
    private int $id_product;
    private int $user_id;
    private int $quantity;
    private $pdo;
    private string $search;

    public function __construct()
    {
        $this->pdo = Database::DBconnect();
    }


    //------------- SETTERS ---------//
    public function setOrderId(int $id_order): void
    {
        $this->id_order = $id_order;
    }
    public function setProductId(int $id_product): void
    {
        $this->id_product = $id_product;
    }
    public function setUserId(int $user_id): void
    {
        $this->user_id = $user_id;
    }
    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }
    public function setSearch(int $search): void
    {
        $this->search = $search;
    }

    //------------- GETTERS ---------//
    public function getOrderId(): int
    {
        return $this->id_order;
    }
    public function getProductId(): int
    {
        return $this->id_product;
    }
    public function getUserId(): int
    {
        return $this->user_id;
    }
    public function getQuantity(): int
    {
        return $this->quantity;
    }


    //------------- SAVE CREATE ORDER ---------//
    public function save()
    {
        $pdo = Database::DBconnect();
        $product_info = Product::getProduct($this->id_product);
        $product_exist = self::isProductExist($this->id_product, $this->user_id);
        // var_dump($product_exist->orders_quantity);die;

        try {

            if (isset($product_exist->orders_quantity)) {
                $product_quantity_new = $product_exist->orders_quantity + $this->quantity;

                $sql = "UPDATE `orders` SET `orders_quantity`=:orders_quantity WHERE (`id_product`=:id_product AND `id_user`=:id_user AND ISNULL(`orders_payed`))";

                $sth = $pdo->prepare($sql);
                $sth->bindValue(':id_product', $this->id_product, PDO::PARAM_INT);
                $sth->bindValue(':orders_quantity', $product_quantity_new, PDO::PARAM_INT);
                $sth->bindValue(':id_user', $this->user_id, PDO::PARAM_INT);
            } else {
                $sql = "INSERT INTO `orders` (`orders_weight`,`orders_price`,`id_product`,`orders_quantity`,`id_user`) 
                                    VALUES (:orders_weight,:orders_price,:id_product,:orders_quantity,:id_user)";

                $sth = $pdo->prepare($sql);
                $sth->bindValue(':orders_weight', $product_info->products_weight, PDO::PARAM_INT);
                $sth->bindValue(':orders_price', $product_info->products_price, PDO::PARAM_INT);
                $sth->bindValue(':id_product', $this->id_product, PDO::PARAM_INT);
                $sth->bindValue(':orders_quantity', $this->quantity, PDO::PARAM_INT);
                $sth->bindValue(':id_user', $this->user_id, PDO::PARAM_INT);
            }

            $result = $sth->execute();

            if (!$result) {
                throw new PDOException();
            }
        } catch (PDOException $e) {
            var_dump($e);
            die;
            return false;
        }
        return true;
    }

    //------------- CHECK PRODUCT EXIST ---------//
    public static function isProductExist(int $id_product, int $user_id)
    {
        try {
            $pdo = Database::DBconnect();
            $sql = "SELECT `orders_quantity` FROM `orders` WHERE (`id_product`=:id_product AND `id_user`=:id_user AND ISNULL(`orders_payed`))";
            $sth = $pdo->prepare($sql);
            $sth->bindValue(':id_product', $id_product, PDO::PARAM_INT);
            $sth->bindValue(':id_user', $user_id, PDO::PARAM_INT);
            if ($sth->execute()) {
                $checkedOrder = $sth->fetch();
                return $checkedOrder ?? 0;
            } else {
                return 2;
            }
        } catch (PDOException $e) {
            return 2;
        }
    }

    //------------- UPDATE ORDER DATA ---------//
    public static function update(int $user_id, int $id_order, int $quantity)
    {
        // var_dump($id_order);die;
        $pdo = Database::DBconnect();
        try {
            $sql = "UPDATE `orders` SET `orders_quantity`=:quantity WHERE (`id_order`=:id_order AND `id_user`=:user_id)";
            $sth = $pdo->prepare($sql);
            $sth->bindValue(':quantity', $quantity, PDO::PARAM_STR);
            $sth->bindValue(':id_order', $id_order, PDO::PARAM_STR);
            $sth->bindValue(':user_id', $user_id, PDO::PARAM_STR);
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


    //------------- GET ALL ORDERS ---------//
    public static function getAll(int $id_product = 0)
    {
        try {
            $pdo = Database::DBconnect();
            $sql = "SELECT * FROM `categories`";
            if ($id_product != 0) {
                $sql .= " WHERE id_product_carrier = :id_product";
            }
            $sql .= " ORDER BY `categories`";
            $sth = $pdo->prepare($sql);
            if ($id_product != 0) {
                $sth->bindValue(':id_product', $id_product, PDO::PARAM_INT);
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



    //------------- GET ORDER PENDING ---------//
    public static function getPending(int $user_id)
    {
        try {
            $pdo = Database::DBconnect();
            $sql = "SELECT 
            `orders`.`id_order`,
            `orders`.`orders_date`,
            `orders`.`orders_weight`,
            `orders`.`orders_price`,
            `orders`.`id_product`,
            `orders`.`orders_quantity`,
            `products`.`products_name`
            FROM `orders` 
            INNER JOIN `products` ON `orders`.`id_product`=`products`.`id_product`
            WHERE (`id_user` = :id_user AND ISNULL(`orders_payed`)) 
            ORDER BY `products`.`products_name`";
            $sth = $pdo->prepare($sql);

            if ($user_id != 0) {
                $sth->bindValue(':id_user', $user_id, PDO::PARAM_INT);
            }
            if ($sth->execute()) {
                    $carriers_list = $sth->fetchAll();
                return $carriers_list;
            } else {
                return false;
            }
        } catch (PDOException $ex) {
            return false;
        }
    }



    //------------- DELETE PATIENT ---------//
    public static function delete(int $id_user, int $id_order)
    {
        // var_dump($id_order); die;
        try {
            $pdo = Database::DBconnect();
            $sql = "DELETE FROM `orders` WHERE (`id_order`=:id_order AND `id_user`=:id_user) ";
            $sth = $pdo->prepare($sql);
            $sth->bindValue(':id_order', $id_order, PDO::PARAM_INT);
            $sth->bindValue(':id_user', $id_user, PDO::PARAM_INT);
            $result = $sth->execute();
            if (!$result) {
                throw new PDOException();
                $resultView = 'Erreur lors de la suppression';
                return $resultView;
            } else {
                $resultView = "Le produit a été supprimé";
                return $resultView;
            }
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}
