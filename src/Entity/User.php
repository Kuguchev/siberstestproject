<?php

class User extends AbstractModel
{
    protected $id;
    protected $status;
    protected $login;
    protected $password;
    protected $name;
    protected $surname;
    protected $gender;
    protected $birthday;

    public static function getTable() : string {
        return 'users';
    }

    public static function getFields() : array {
        return ['id', 'status', 'login', 'password', 'name', 'surname', 'gender', 'birthday'];
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status): void
    {
        $this->status = $status;
    }


    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param mixed $login
     */
    public function setLogin($login): void
    {
        $this->login = $login;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * @param mixed $surname
     */
    public function setSurname($surname): void
    {
        $this->surname = $surname;
    }

    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param mixed $gender
     */
    public function setGender($gender): void
    {
        $this->gender = $gender;
    }

    /**
     * @return mixed
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * @param mixed $birthday
     */
    public function setBirthday($birthday): void
    {
        $this->birthday = $birthday;
    }

    public static function getUsers($limit, $offset) : array
    {
        $connection = Db::getConnection();

        $table = static::getTable();

        $sql = "SELECT * FROM {$table} WHERE status = 'user' LIMIT :limit OFFSET :offset";

        $result = $connection->prepare($sql);
        $result->bindParam(':limit', $limit, PDO::PARAM_INT);
        $result->bindParam(':offset', $offset, PDO::PARAM_INT);

        $result->setFetchMode(PDO::FETCH_ASSOC);

        $result->execute();

        $data = $result->fetchAll();

        $models = [];
        foreach ($data as $modelData) {
            $models[] = self::getModelByData($modelData);
        }
        return $models;
    }

    public static function getUsersNum() : array
    {
        $connection = Db::getConnection();
        $table = static::getTable();
        $sql = "SELECT COUNT(*) AS NUM FROM {$table} WHERE status = 'user'";
        $result = $connection->prepare($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        return $result->fetchAll();
    }
}