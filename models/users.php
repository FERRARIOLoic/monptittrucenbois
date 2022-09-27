<?php

require_once(__DIR__ . '/../utils/connect.php');

class User
{

    private int $user_id;
    private int $category;
    private int $gender;
    private string $lastname;
    private string $firstname;
    private ?string $birthdate;
    private string $phone;
    private string $email;
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
    public function setCategory(int $category): void
    {
        $this->category = $category;
    }
    public function setGender(int $gender): void
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
    public function setBirthdate(?string $birthdate): void
    {
        $this->birthdate = !empty($birthdate)?$birthdate:NULL;
        // var_dump($this->birthdate);die;

    }
    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }
    public function setEmail(string $email): void
    {
        $this->email = $email;
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
    public function getCategory(): int
    {
        return $this->category;
    }
    public function getGender(): int
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
        return $this->email;
    }
    public function getPassword(): string
    {
        return $this->password;
    }


    //------------- SAVE CREATE PATIENT ---------//


    public function save(): bool
    {

        try {
            // On créé la requête avec des marqueurs nominatifs
            $sql = 'INSERT INTO `users` (`users_email`, `users_password`) 
                VALUES (:email, :password);';

            // On prépare la requête
            $sth = $this->pdo->prepare($sql);

            //Affectation des valeurs aux marqueurs nominatifs
            $sth->bindValue(':email', $this->getEmail(), PDO::PARAM_STR);
            $sth->bindValue(':password', $this->getPassword(), PDO::PARAM_STR);
            // On retourne directement true si la requête s'est bien exécutée ou false dans le cas contraire
            return $sth->execute();
        } catch (PDOException $ex) {
            //var_dump($ex);
            // On retourne false si une exception est levée
            return false;
        }
    }

    //check if email exists for user creation
    public static function isMailExists(string $email): bool
    {
        try {
            $sql = 'SELECT * FROM `users` WHERE `users_email` = :email';

            $sth = Database::DBconnect()->prepare($sql);
            $sth->bindValue(':email', $email, PDO::PARAM_STR);
            $sth->execute();

            return empty($sth->fetch()) ? false : true;
        } catch (\PDOException $ex) {
            //var_dump($ex);
            return false;
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

    //validate user from email
    public static function validated(string $email): bool
    {
        try {
            $pdo = Database::DBconnect();
            $sql = "UPDATE `users` SET `validated_at`=CURRENT_TIMESTAMP WHERE `email`=:email";
            $sth = $pdo->prepare($sql);
            $sth->bindValue(':email', $email, PDO::PARAM_STR);
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
    public function update()
    {
        try {
            $sql = "UPDATE `users` 
            SET `users_category`=:category, 
            `users_gender`=:gender, 
            `users_lastname`=:lastname, 
            `users_firstname`=:firstname, 
            `users_email`=:email, 
            `users_phone`=:phone, 
            `users_birthdate`=:birthdate
            WHERE `users_id`=:user_id";
            $sth = $this->pdo->prepare($sql);
            $sth->bindValue(':category', $this->category, PDO::PARAM_INT);
            $sth->bindValue(':gender', $this->gender, PDO::PARAM_INT);
            $sth->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
            $sth->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
            $sth->bindValue(':email', $this->email, PDO::PARAM_STR);
            $sth->bindValue(':phone', $this->phone, PDO::PARAM_STR);
            $sth->bindValue(':birthdate', $this->birthdate, PDO::PARAM_STR);
            $sth->bindValue(':user_id', $this->user_id, PDO::PARAM_INT);
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

    //------------- GET BY EMAIL ---------//
    public static function getByEmail(string $email): object|bool
    {
        try {
            // On stocke une instance de la classe PDO dans une variable
            $pdo = Database::DBconnect();

            // On créé la requête avec des marqueurs nominatifs
            $sql = 'SELECT * FROM `users` WHERE `users_email` = :email;';

            // On prépare la requête
            $sth = $pdo->prepare($sql);

            //Affectation des valeurs aux marqueurs nominatifs
            $sth->bindValue(':email', $email, PDO::PARAM_STR);

            if (!$sth->execute()) {
                return false;
            } else {
                $user = $sth->fetch();
                if (empty($user)) {
                    return false;
                }
            }
            return $user;
        } catch (\PDOException $ex) {
            return false;
        }
    }


    //------------- GET BY ID ---------//
    public static function getInfoID(string $email)
    {
        try {
            $pdo = Database::DBconnect();
            $sql = "SELECT * FROM `users` WHERE `users_email`=:email";
            $sth = $pdo->prepare($sql);
            $sth->bindValue(':email', $email, PDO::PARAM_STR);
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
