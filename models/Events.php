<?php

require_once(__DIR__ . '/../utils/connect.php');

class Event
{

    private int $id_event;
    private string $events_name;
    private string $events_description;
    private string $events_start_date;
    private string $events_end_date;
    private int $id_product;
    private $pdo;
    private string $search;

    public function __construct()
    {
        $this->pdo = Database::DBconnect();
    }


    //------------- SETTERS ---------//
    public function setID(int $id_event): void
    {
        $this->id_event = $id_event;
    }
    public function setEventName(string $events_name): void
    {
        $this->events_name = $events_name;
    }
    public function setEventDescription(string $events_description): void
    {
        $this->events_description = $events_description;
    }
    public function setEventStartDate(string $events_start_date): void
    {
        $this->events_start_date = $events_start_date;
    }
    public function setEventEndDate(string $events_end_date): void
    {
        $this->events_end_date = $events_end_date;
    }
    public function setEventProductID(int $id_product): void
    {
        $this->id_product = $id_product;
    }
    public function setSearch(int $search): void
    {
        $this->search = $search;
    }

    //------------- GETTERS ---------//
    public function getID(): int
    {
        return $this->id_event;
    }
    public function getEventName(): string
    {
        return $this->events_name;
    }
    public function getEventDescription(): string
    {
        return $this->events_description;
    }
    public function getEventStartDate(): string
    {
        return $this->events_start_date;
    }
    public function getEventEndDate(): string
    {
        return $this->events_end_date;
    }
    public function getProductID(): int
    {
        return $this->id_product;
    }


    //------------- SAVE CREATE carrier ---------//
    public function save(string $events_name, string $events_description, string $events_start_date, string $events_end_date, int $id_product = NULL)
    {
        // var_dump(empty($id_product));die;
        $pdo = Database::DBconnect();
        $event_new = Event::isEventExist($events_name, $events_end_date);
        if ($event_new == 0) {

            try {
                if ($id_product != 0) {
                    $sql = "INSERT INTO `events` (`events_name`,`events_description`,`events_start_date`,`events_end_date`,`id_product`) 
                                    VALUES (:events_name,:events_description,:events_start_date,:events_end_date,:id_product)";
                } else {
                    $sql = "INSERT INTO `events` (`events_name`,`events_description`,`events_start_date`,`events_end_date`) 
                                    VALUES (:events_name,:events_description,:events_start_date,:events_end_date)";
                }
                $sth = $pdo->prepare($sql);
                $sth->bindValue(':events_name', $events_name, PDO::PARAM_STR);
                $sth->bindValue(':events_description', $events_description, PDO::PARAM_STR);
                $sth->bindValue(':events_start_date', $events_start_date, PDO::PARAM_STR);
                $sth->bindValue(':events_end_date', $events_end_date, PDO::PARAM_STR);
                if ($id_product != 0) {
                    $sth->bindValue(':id_product', $id_product, PDO::PARAM_INT);
                }
                // var_dump($sth->execute());die;
                $result = $sth->execute();

                if (!$result) {
                    throw new PDOException();
                }
                unset($events_name, $events_description, $id_product);
            } catch (PDOException $e) {
                var_dump($e);
                die;
                return false;
            }
            return true;
        } else {
            return false;
        }
    }

    //------------- CHECK carrier EXIST ---------//
    public static function isEventExist(string $events_name, string $events_end_date): int
    {
        try {
            $pdo = Database::DBconnect();
            $sql = "SELECT `events_name` FROM `events` WHERE (`events_name`=:events_name AND `events_end_date`=:events_end_date);";
            $sth = $pdo->prepare($sql);
            $sth->bindValue(':events_name', $events_name, PDO::PARAM_STR);
            $sth->bindValue(':events_end_date', $events_end_date, PDO::PARAM_STR);
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
    public static function update(int $id_event, string $events_name, string $events_description, string $id_product)
    {
        // var_dump($id_wood);die;
        $pdo = Database::DBconnect();
        try {
            $sql = "UPDATE `events` SET `events_name`=:events_name, `events_des$events_description`=:events_des$events_description, `id_product`=:id_product WHERE `id_event`=:id_event";
            $sth = $pdo->prepare($sql);
            $sth->bindValue(':id_event', $id_event, PDO::PARAM_STR);
            $sth->bindValue(':events_name', $events_name, PDO::PARAM_STR);
            $sth->bindValue(':events_des$events_description', $events_description, PDO::PARAM_STR);
            $sth->bindValue(':id_product', $id_product, PDO::PARAM_STR);
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
            $sql = "SELECT 
            `events`.`events_name`, 
            `events`.`events_description`, 
            `events`.`events_start_date`, 
            `events`.`events_end_date`, 
            `products`.`id_product`,  
            `products`.`products_name` 
            FROM `events` 
            INNER JOIN `products` ON `events`.`id_product`=`products`.`id_product`
            ORDER BY `events`.`events_name`";
            $sth = $pdo->prepare($sql);
            if ($sth->execute()) {
                $eventList = $sth->fetchAll();
                return $eventList;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            var_dump($e);
            die;
            return false;
        }
    }

    //------------- GET PENDING EVENTS ---------//
    public static function getPending()
    {
        try {
            $pdo = Database::DBconnect();
            $sql = "SELECT 
            `events`.`events_name`, 
            `events`.`events_description`, 
            `events`.`events_start_date`, 
            `events`.`events_end_date`, 
            `products`.`id_product`,  
            `products`.`products_name` 
            FROM `events` 
            LEFT JOIN `products` ON `events`.`id_product`=`products`.`id_product`
            WHERE `events`.`events_end_date`>=NOW()
            ORDER BY `events`.`events_start_date`,`events`.`events_end_date`; ";
            $sth = $pdo->prepare($sql);


            if ($sth->execute()) {
                $eventList = $sth->fetchAll();
                return $eventList;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            var_dump($e);
            die;
            return false;
        }
    }



    //------------- GET ALL products ---------//
    public static function getEnded()
    {
        try {
            $pdo = Database::DBconnect();
            $sql = "SELECT 
            `events`.`events_name`, 
            `events`.`events_description`, 
            `events`.`events_start_date`, 
            `events`.`events_end_date`, 
            `products`.`id_product`,  
            `products`.`products_name` 
            FROM `events` 
            INNER JOIN `products` ON `events`.`id_product`=`products`.`id_product`
            WHERE `events`.`events_end_date`<NOW()
            ORDER BY `events`.`events_name`";
            $sth = $pdo->prepare($sql);


            if ($sth->execute()) {
                $eventList = $sth->fetchAll();
                return $eventList;
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
    public static function getEvent(int $id_event = 0)
    {
        try {
            $pdo = Database::DBconnect();
            $sql = "SELECT * FROM `events`";
            if ($id_event != 0) {
                $sql .= " WHERE `id_event` = :id_event";
            }
            $sql .= " ORDER BY `events_name`";
            $sth = $pdo->prepare($sql);

            if ($id_event != 0) {
                $sth->bindValue(':id_event', $id_event, PDO::PARAM_INT);
            }
            if ($sth->execute()) {
                if ($id_event != 0) {

                    $events_list = $sth->fetch();
                } else {
                    $events_list = $sth->fetchAll();
                }
                return $events_list;
            } else {
                return false;
            }
        } catch (PDOException $ex) {
            return false;
        }
    }



    //------------- GET PRICE ---------//
    public static function getPrice(int $id_event, int $order_weight)
    {
        // var_dump('order_weight',$order_weight);die;
        try {
            $pdo = Database::DBconnect();
            $sql = "SELECT * FROM `prices` WHERE (`id_event` = :id_event AND `events_max_weight`>=:order_weight); ";
            $sth = $pdo->prepare($sql);
            $sth->bindValue(':id_event', $id_event, PDO::PARAM_INT);
            $sth->bindValue(':order_weight', $order_weight, PDO::PARAM_INT);

            if ($sth->execute()) {
                $events_price = $sth->fetch();
                return $events_price;
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
    public static function delete(int $id_event)
    {
        try {
            $pdo = Database::DBconnect();
            $sql = "DELETE FROM `users` WHERE `id`=:id_event ";
            $sth = $pdo->prepare($sql);
            $sth->bindValue(':id_event', $id_event, PDO::PARAM_INT);
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
