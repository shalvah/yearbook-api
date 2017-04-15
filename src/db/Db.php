<?php

class Db
{

    private $dbh;
    private $table;
    private $sql;
    private $args;

    //todo: sanitise user input
    public function __construct($table)
    {
        $this->dbh = require __DIR__ . '\..\db\init.php';
        $this->table = $table;
    }

    public static function table($name)
    {
        $name = self::sanitise($name);
        return new Db($name);
    }

    public function select(array $columns = null)
    {
        $columns = self::sanitise($columns);
        if (empty($columns)) {
            $this->sql = "SELECT * FROM {$this->table}";
        } else {
            $columnsString = implode(", ", $columns);
            $this->sql = "SELECT $columnsString FROM {$this->table}";
        }
        return $this;
    }

    public function where(array $options)
    {
        $optionStrings = [];
        foreach ($options as $option) {
            $option = self::sanitise($option);
            $optionStrings[] = implode(" ", $option);
        }
        $this->sql .= " WHERE " . implode(" AND ", $optionStrings);

        return $this;
    }

    public function insert(array $values)
    {
        $sanitisedValues = [];
        $this->args = [];

        foreach($values as $key => $item) {
            $sanitisedValues[self::sanitise($key)] = "?";
            $this->args[] = $item;
        }

        $columnsString = implode(", ", array_keys($sanitisedValues));
        $valuesString = implode(", ", $sanitisedValues);
        $this->sql = "INSERT INTO {$this->table} ($columnsString) VALUES ($valuesString)";

        return $this;
    }

    public function update(array $values)
    {
        $columnValuesString = [];
        $this->args = [];

        foreach($values as $key => $item) {
            $key = self::sanitise($key);
            $this->args[] = $item;
            $columnValuesString[] = "$key = ?";
        }

        $columnValuesString = implode(", ", $columnValuesString);
        $this->sql = "UPDATE {$this->table} SET $columnValuesString";

        return $this;
    }

    public function get($num = null)
    {
        $num = self::sanitise($num);
        if ($num) {
            $this->sql .= " LIMIT $num";
        }
        $stmnt = $this->dbh->prepare($this->sql);
        $stmnt->execute();
        return $stmnt->fetchAll();
    }

    public function run()
    {
        $stmnt = $this->dbh->prepare($this->sql);
        $stmnt->execute($this->args);
        return $this->dbh->lastInsertId();
    }

    private static function sanitise($input)
    {
        if($input == null || $input == "" || $input == []) {
            return $input;
        }
        return $input;
    }

    public function toSql()
    {
        return $this->sql;
    }

}