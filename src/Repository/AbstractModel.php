<?php

abstract class AbstractModel
{
    public static function getById(int $id) : ?static
    {
        $connection = Db::getConnection();
        $table = static::getTable();
        $sql = "SELECT * FROM {$table} WHERE id = :id";

        $result = $connection->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        $data = $result->fetch();

        if($data === FALSE) {
            return null;
        }
        return  self::getModelByData($data);
    }

    public static function deleteById(int $id) : void
    {
        $connection = Db::getConnection();
        $table = static::getTable();
        $sql = "DELETE FROM {$table} WHERE id = :id";

        $result = $connection->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
    }

    public function save(): void
    {
        $fields = [];
        $data = [];

        foreach(static::getFields() as $field) {
            if(isset($this->$field)) {
                $fields[] = $field;
                $data[] = $this->$field;
            }
        }

        $queryFields = implode(', ', $fields);

        $rangePlace = array_fill('0', count($fields), '?');
        $queryData = implode(',', $rangePlace);

        $connection = Db::getConnection();
        $table = static::getTable();

        try {
            $sql = "INSERT INTO {$table} ({$queryFields}) VALUES ($queryData)";
            $stmt = $connection->prepare($sql);
            $stmt->execute($data);
        } catch (PDOException $e) {
            echo 'Error : ' . $e->getMessage();
            echo '<br/>Error sql : ' . "INSERT INTO {$table} ({$queryFields}) VALUES ($queryData)";
            exit();
        }
    }

    public function update() : void
    {
        $fields = [];
        $data = [];

        foreach(static::getFields() as $field) {
            if(isset($this->$field) && $field != 'id') {
                $fields[]= $field . '=' . '?';
                $data[] = $this->$field;
            }
        }
        $data[] = $this->id;

        $queryFields = implode(', ', $fields);
        $connection = Db::getConnection();
        $table = static::getTable();

        try {
            $sql = "UPDATE {$table} SET {$queryFields} WHERE id = ?";
            $stmt = $connection->prepare($sql);
            $stmt->execute($data);
        } catch (PDOException $e) {
            echo 'Error : ' . $e->getMessage();
            echo '<br/>Error sql : ' . "UPDATE {$table} SET {$queryFields} WHERE id = {$this->id}";
            exit();
        }
    }

    public static function getByLogin(string $login) : ?static
    {
        $connection = Db::getConnection();
        $table = static::getTable();
        $sql = "SELECT * FROM {$table} WHERE login = :login";

        $result = $connection->prepare($sql);
        $result->bindParam(':login', $login, PDO::PARAM_STR);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        $data = $result->fetch();

        if($data === FALSE) {
            return null;
        }
        return  self::getModelByData($data);
    }

    public static function getModelByData(array $data) : ?static
    {
        $model = new static();
        foreach(static::getFields() as $field) {
            if($data[$field] !== null) {
                $model->$field = $data[$field];
            }
        }
        return $model;
    }
}