<?php

require_once(__DIR__ . '/../utils/connect.php');
require_once(__DIR__ . '/../models/Products.php');

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

    //------------- UPDATE ORDER QUANTITY ---------//
    public static function updateQuantity(int $user_id, int $id_order, int $quantity)
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

    //------------- UPDATE ORDER QUANTITY ---------//
    public static function updateCarrier(int $user_id, int $id_carrier, int $order_weight)
    {
        $carrier_price = Carrier::getPrice($id_carrier, $order_weight);
        // var_dump($carrier_price);die;
        $pdo = Database::DBconnect();
        try {
            $sql = "UPDATE `orders` SET `id_carrier_price`=:id_carrier_price WHERE (ISNULL(`orders_payed`) AND `id_user`=:user_id)";
            $sth = $pdo->prepare($sql);
            $sth->bindValue(':id_carrier_price', $carrier_price->id_price, PDO::PARAM_STR);
            $sth->bindValue(':user_id', $user_id, PDO::PARAM_STR);
            $result = $sth->execute();

            if (!$result) {
                throw new PDOException();
            } else {
                return true;
            }
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    //------------- UPDATE ORDER QUANTITY ---------//
    public static function updateStatus(int $id_order, int $orders_status)
    {
        $pdo = Database::DBconnect();
        try {
            $sql = "UPDATE `orders` SET `orders_status`=:orders_status WHERE `id_order`=:id_order ; ";
            $sth = $pdo->prepare($sql);
            $sth->bindValue(':id_order', $id_order, PDO::PARAM_STR);
            $sth->bindValue(':orders_status', $orders_status, PDO::PARAM_STR);
            $result = $sth->execute();

            if (!$result) {
                throw new PDOException();
            } else {
                return true;
            }
            return true;
        } catch (PDOException $e) {
            var_dump($e);
            die;
            return false;
        }
    }

    //------------- UPDATE ORDER QUANTITY ---------//
    public static function updateShipNumber(int $id_order, int $ship_number)
    {
        $pdo = Database::DBconnect();
        try {
            $sql = "UPDATE `orders` 
            SET `orders_ship_number`=:ship_number 
            WHERE (`iduser`=:id_user 
            AND `orders_payed`!=NULL 
            AND `orders_status`!=NULL 
            AND `orders_ship_number`!=NULL) ; ";
            $sth = $pdo->prepare($sql);
            $sth->bindValue(':id_order', $id_order, PDO::PARAM_STR);
            $sth->bindValue(':ship_number', $ship_number, PDO::PARAM_STR);
            $result = $sth->execute();

            if (!$result) {
                throw new PDOException();
            } else {
                return true;
            }
            return true;
        } catch (PDOException $e) {
            var_dump($e);
            die;
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


    //------------- GET USER ORDERS ---------//
    public static function getByUser(int $id_user = 0)
    {
        try {
            $pdo = Database::DBconnect();
            $sql = "SELECT `` FROM `categories`";
            if ($id_user != 0) {
                $sql .= " WHERE id_user_carrier = :id_user";
            }
            $sql .= " ORDER BY `categories`";
            $sth = $pdo->prepare($sql);
            if ($id_user != 0) {
                $sth->bindValue(':id_user', $id_user, PDO::PARAM_INT);
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


    //------------- ORDER VALIDATE ---------//
    public static function validate(int $id_user, string $orders_number)
    {
        try {
            $pdo = Database::DBconnect();
            $sql = "UPDATE `orders` SET `orders_number`=:orders_number, `orders_payed`=:orders_payed WHERE id_user = :id_user";
            $sth = $pdo->prepare($sql);
            $sth->bindValue(':id_user', $id_user, PDO::PARAM_INT);
            $sth->bindValue(':orders_payed', 1, PDO::PARAM_INT);
            $sth->bindValue(':orders_number', $orders_number, PDO::PARAM_STR);
            if ($sth->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $ex) {
            return false;
        }
    }



    //------------- GET ORDER PENDING ---------//
    public static function getPending(int $user_id = 0, int $payed = 0, int $made = 0, int $ship = 0, int $deliver = 0)
    {
        // var_dump($user_id,$payed,$made,$ship,$deliver);
        try {
            $pdo = Database::DBconnect();
            $sql = "SELECT 
            `orders`.`id_order`,
            `orders`.`orders_number`,
            `orders`.`orders_date`,
            `orders`.`orders_weight`,
            `orders`.`orders_price`,
            `orders`.`orders_payed`,
            `orders`.`orders_delivered`,
            `orders`.`orders_ship_number`,
            `orders`.`id_product`,
            `orders`.`orders_quantity`,
            `orders`.`id_carrier_price`,
            `orders`.`id_user`,
            `orders`.`orders_status`,
            `products`.`products_name`,
            `users`.`users_lastname`,
            `users`.`users_firstname`
            FROM `orders` 
            INNER JOIN `products` ON `orders`.`id_product`=`products`.`id_product`
            INNER JOIN `users` ON `users`.`user_id`=`orders`.`id_user`";


            /*
id_carrier_price
orders_payed
orders_status
orders_ship_number
orders_delivered

AND (`orders`.`id_carrier_price` IS NOT NULL) 
AND (`orders`.`orders_payed`=1) 
AND (`orders`.`orders_status`=1) 
AND (`orders`.`orders_ship_number` IS NOT NULL) 
AND (`orders`.`orders_delivered`=1) 

*/
            if ($user_id != 0) {
                if ($payed != 0) {
                    if ($made != 0) {
                        if ($ship != 0) {
                            if ($deliver != 0) {
                                $sql .= " WHERE (`id_user` = :id_user 
                                AND (`orders`.`id_carrier_price` IS NOT NULL) 
                                AND (`orders`.`orders_payed`=1) 
                                AND (`orders`.`orders_status`=1) 
                                AND (`orders`.`orders_ship_number` IS NOT NULL) 
                                AND (`orders`.`orders_delivered`=1) 
                                ) 
                                ORDER BY `orders`.`orders_number`";
                            } else {
                                $sql .= " WHERE (`id_user` = :id_user 
                                AND (`orders`.`id_carrier_price` IS NOT NULL) 
                                AND (`orders`.`orders_payed`=1) 
                                AND (`orders`.`orders_status`=1) 
                                AND (`orders`.`orders_ship_number` IS NOT NULL) 
                                AND ISNULL(`orders`.`orders_delivered`) 
                                ) 
                                ORDER BY `orders`.`orders_number`";
                            }
                        } else {
                            $sql .= " WHERE (`id_user` = :id_user 
                            AND (`orders`.`id_carrier_price` IS NOT NULL) 
                            AND (`orders`.`orders_payed`=1) 
                            AND (ISNULL(`orders`.`orders_status`) OR (`orders`.`orders_status`=1)) 
                            AND ISNULL(`orders`.`orders_ship_number`) 
                            AND ISNULL(`orders`.`orders_delivered`) 
                            ) 
                            ORDER BY `orders`.`orders_date`";
                        }
                    } else {
                        $sql .= " WHERE (`id_user` = :id_user 
                        AND (`orders`.`id_carrier_price` IS NOT NULL) 
                        AND (`orders`.`orders_payed`=1) 
                        AND (ISNULL(`orders`.`orders_status`) OR (`orders`.`orders_status`=1)) 
                        AND ISNULL(`orders`.`orders_ship_number`) 
                        AND ISNULL(`orders`.`orders_delivered`) 
                        ) 
                        ORDER BY `orders`.`orders_date`";
                    }
                } else {
                    $sql .= " WHERE (`id_user` = :id_user 
                    AND (ISNULL(`orders`.`id_carrier_price`) OR (`orders`.`id_carrier_price` IS NOT NULL)) 
                    AND ISNULL(`orders`.`orders_payed`) 
                    AND ISNULL(`orders`.`orders_status`) 
                    AND ISNULL(`orders`.`orders_ship_number`) 
                    AND ISNULL(`orders`.`orders_delivered`) 
                    ) 
                    ORDER BY `orders`.`orders_date`";
                }
            } else {
                if ($payed != 0) {
                    if ($made != 0) {
                        if ($ship != 0) {
                            if ($deliver != 0) {
                                $sql .= " WHERE (
                                    (`orders`.`id_carrier_price` IS NOT NULL) 
                                AND (`orders`.`orders_payed`=1) 
                                AND (`orders`.`orders_status`=1) 
                                AND (`orders`.`orders_ship_number` IS NOT NULL) 
                                AND (`orders`.`orders_delivered`=1) 
                                ) 
                                ORDER BY `orders`.`orders_date`";
                            } else {
                                $sql .= " WHERE (
                                    (`orders`.`id_carrier_price` IS NOT NULL) 
                                AND (`orders`.`orders_payed`=1) 
                                AND (`orders`.`orders_status`=1) 
                                AND (`orders`.`orders_ship_number` IS NOT NULL) 
                                AND ISNULL(`orders`.`orders_delivered`) 
                                ) 
                                ORDER BY `orders`.`orders_date`";
                            }
                        } else {
                            $sql .= " WHERE (
                                (`orders`.`id_carrier_price` IS NOT NULL) 
                            AND (`orders`.`orders_payed`=1) 
                            AND (`orders`.`orders_status`=1) 
                            AND ISNULL(`orders`.`orders_ship_number`) 
                            AND ISNULL(`orders`.`orders_delivered`) 
                            ) 
                            ORDER BY `orders`.`orders_date`";
                        }
                    } else {
                        $sql .= " WHERE (
                            (`orders`.`id_carrier_price` IS NOT NULL) 
                        AND (`orders`.`orders_payed`=1) 
                        AND (ISNULL(`orders`.`orders_status`)) 
                        AND ISNULL(`orders`.`orders_ship_number`) 
                        AND ISNULL(`orders`.`orders_delivered`) 
                        ) 
                        ORDER BY `orders`.`orders_date`";
                    }
                } else {
                    $sql .= " WHERE (
                        (ISNULL(`orders`.`id_carrier_price`) OR (`orders`.`id_carrier_price` IS NOT NULL)) 
                    AND ISNULL(`orders`.`orders_payed`) 
                    AND ISNULL(`orders`.`orders_status`) 
                    AND ISNULL(`orders`.`orders_ship_number`) 
                    AND ISNULL(`orders`.`orders_delivered`) 
                    ) 
                    ORDER BY `orders`.`orders_date`";
                }
            }
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
        } catch (PDOException $e) {
            var_dump($e);
            die;
            return false;
        }
    }




    //------------- GET BY ORDER NUMBER ---------//
    public static function getByNumber(int $id_user = 0)
    {
        try {
            $pdo = Database::DBconnect();
            $sql = "SELECT * FROM `orders`";
            if ($id_user != 0) {
                $sql .= " WHERE `id_user`=:id_user";
            }
            $sql .= " GROUP BY `orders_number` ";
            $sth = $pdo->prepare($sql);
            $sth->bindValue(':id_user', $id_user, PDO::PARAM_INT);
            if ($sth->execute()) {
                $orders_list = $sth->fetchAll();
                return $orders_list;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            var_dump($e);
            die;
            return false;
        }
    }


    //------------- GET ORDER SHIP ---------//
    public static function getShip()
    {
        try {
            $pdo = Database::DBconnect();
            $sql = "SELECT 
            `orders`.`id_user`,
            `orders`.`orders_number`,
            `users`.`users_lastname`,
            `users`.`users_firstname`
            FROM `orders` 
            INNER JOIN `users` ON `orders`.`id_user`=`users`.`user_id`
            WHERE (`orders_payed`=1 AND `orders_status`=1 AND ISNULL(`orders_ship_number`)) 
            GROUP BY `id_user`;";
            $sth = $pdo->prepare($sql);
            if ($sth->execute()) {
                $users_order_list = $sth->fetchAll();
                return $users_order_list;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            var_dump($e);
            die;
            return false;
        }
    }


    //------------- SHIP RECEIVED ---------//
    public static function shipReceived(string $orders_number)
    {
        try {
            $pdo = Database::DBconnect();
            $sql = "UPDATE `orders` SET `orders_delivered`=1 WHERE `orders_number` = :orders_number";
            $sth = $pdo->prepare($sql);
            $sth->bindValue(':orders_number', $orders_number, PDO::PARAM_STR);
            if ($sth->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $ex) {
            return false;
        }
    }


    //------------- GET ORDER SHIP ---------//
    public static function saveShip(string $orders_number, string $orders_ship_number)
    {
        try {
            $pdo = Database::DBconnect();
            $sql = "UPDATE `orders` 
            SET `orders_ship_number`=:orders_ship_number 
            WHERE `orders_number`=:orders_number;";
            $sth = $pdo->prepare($sql);
            $sth->bindValue(':orders_number', $orders_number, PDO::PARAM_STR);
            $sth->bindValue(':orders_ship_number', $orders_ship_number, PDO::PARAM_STR);
            if ($sth->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            // var_dump($e);die;
            return false;
        }
    }


    //------------- GET ORDER SHIP ---------//
    public static function getEnded()
    {
        try {
            $pdo = Database::DBconnect();
            $sql = "SELECT 
            `orders`.`id_order`,
            `orders`.`orders_number`,
            `orders`.`orders_date`,
            `orders`.`orders_weight`,
            `orders`.`orders_price`,
            `orders`.`orders_payed`,
            `orders`.`orders_delivered`,
            `orders`.`orders_ship_number`,
            `orders`.`id_product`,
            `orders`.`orders_quantity`,
            `orders`.`id_carrier_price`,
            `orders`.`id_user`,
            `orders`.`orders_status`,
            `products`.`products_name`,
            `users`.`users_lastname`,
            `users`.`users_firstname`
            FROM `orders` 
            INNER JOIN `products` ON `orders`.`id_product`=`products`.`id_product`
            INNER JOIN `users` ON `users`.`user_id`=`orders`.`id_user`
            WHERE `orders`.`orders_ship_number` IS NOT NULL 
            GROUP BY `orders`.`orders_number`";
            $sth = $pdo->prepare($sql);
            if ($sth->execute()) {
                $users_order_list = $sth->fetchAll();
                return $users_order_list;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            var_dump($e);
            die;
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
