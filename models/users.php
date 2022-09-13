<?php

require_once(__DIR__ . '/../utils/connect.php');

class User
{

    private int $user_id;
    private int $category;
    private int $gender;
    private string $lastname;
    private string $firstname;
    private string $birthdate;
    private string $phone;
    private string $mail;
    private string $password;
    private $pdo;
    private string $search;

    public function __construct()
    {
        $this->pdo = Database::DBconnect();
    }


    //------------- SETTERS ---------//
    public function setID(int $user_id): void
    {
        $this->user_id = $user_id;
    }
    public function setCategory(string $category): void
    {
        $this->category = $category;
    }
    public function setGender(string $gender): void
    {
        $this->gender = $gender;
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
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }
    public function setSearch(int $search): void
    {
        $this->search = $search;
    }

    //------------- GETTERS ---------//
    public function getID(): int
    {
        return $this->user_id;
    }
    public function getCategory(): string
    {
        return $this->category;
    }
    public function getGender(): string
    {
        return $this->gender;
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
    public function getPassword(): string
    {
        return $this->password;
    }


    //------------- SAVE CREATE PATIENT ---------//
    public function save()
    {
        User::checkEmail($this->mail);
        try {
            $sql = "INSERT INTO `users` (`users_email`,`users_password`,`users_type`,`users_status`) VALUES (:mail,:password_user,1,2)";
            $sth = $this->pdo->prepare($sql);
            $sth->bindValue(':mail', $this->mail, PDO::PARAM_STR);
            $sth->bindValue(':password_user', $this->password, PDO::PARAM_STR);
            $result = $sth->execute();

            if (!$result) {
                throw new PDOException();
            }
            return true;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    //------------- CHECK EMAIL EXIST ---------//
    public static function checkEmail(string $email): int
    {
        try {
            $pdo = Database::DBconnect();
            $sql = "SELECT `users_email` FROM `users` WHERE `users_email`=:email";
            $sth = $pdo->prepare($sql);
            $sth->bindValue(':email', $email, PDO::PARAM_STR);
            if ($sth->execute()) {
                $checkedEmail = $sth->fetch();
                return $checkedEmail ? 1 : 0;
            } else {
                return 2;
            }
        } catch (PDOException $e) {
            return 2;
        }
    }

    public static function validated(string $mail): bool
    {
        try {
            $pdo = Database::DBconnect();
            $sql = "UPDATE `users` SET `validated_at`=CURRENT_TIMESTAMP WHERE `mail`=:mail";
            $sth = $pdo->prepare($sql);
            $sth->bindValue(':mail', $mail, PDO::PARAM_STR);
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

    //------------- UPDATE PATIENT DATA ---------//
    public function update(): int
    {
        try {
            $sql = "UPDATE `users` SET `users_gender`=:gender, `users_lastname`=:lastname, `users_firstname`=:firstname, `users_email`=:mail, `users_phone`=:phone, `users_birthdate`=:birthdate, `users_type`=:category WHERE `id`=:user_id";
            $sth = $this->pdo->prepare($sql);
            $sth->bindValue(':category', $this->category, PDO::PARAM_STR);
            $sth->bindValue(':gender', $this->gender, PDO::PARAM_STR);
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


    //------------- GET ALL USERS ---------//
    public static function getAll(int $user_id = 0)
    {
        try {
            $pdo = Database::DBconnect();
            $sql = "SELECT * FROM `users`";
            if ($user_id != 0) {
                $sql .= " WHERE `users_id`=:user_id";
            }
            $sql .= " ORDER BY `users_lastname`";
            $sth = $pdo->prepare($sql);
            if ($user_id != 0) {
                $sth->bindValue(':user_id', $user_id, PDO::PARAM_INT);
            }
            if ($sth->execute()) {
                if ($user_id != 0) {
                    $users_info = $sth->fetch();
                } else {
                    $users_info = $sth->fetchAll();
                }
                return $users_info;
            } else {
                return false;
            }
        } catch (PDOException $ex) {
            return false;
        }
    }


    //------------- GET ALL USERS ---------//
    public static function getInfoID(string $mail)
    {
        try {
            $pdo = Database::DBconnect();
            $sql = "SELECT * FROM `users` WHERE `users_email`=:mail";
            $sth = $pdo->prepare($sql);
            $sth->bindValue(':mail', $mail, PDO::PARAM_STR);
            if ($sth->execute()) {
                $users_info = $sth->fetch();
                return $users_info;
            } else {
                return false;
            }
        } catch (PDOException $ex) {
            return false;
        }
    }


    //------------- DELETE PATIENT ---------//
    public static function delete(int $user_id)
    {
        try {
            $pdo = Database::DBconnect();
            $sql = "DELETE FROM `users` WHERE `id`=:user_id ";
            $sth = $pdo->prepare($sql);
            $sth->bindValue(':user_id', $user_id, PDO::PARAM_INT);
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
