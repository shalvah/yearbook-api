<?php

class Db
{

    private $dbh;
    private $table;
    private $sql;

    //todo: sanitise user input
    public function __construct($table)
    {
        $this->dbh = require __DIR__ . '\..\db\init.php';
        $this->table = $table;
    }

    public static function table($name)
    {
        return new Db($name);
    }

    public function select(array $columns = null)
    {
        $columns = $this->sanitise($columns);
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
            $option = $this->sanitise($option);
            $optionStrings[] = implode(" ", $option);
        }
        $this->sql .= " WHERE " . implode(" AND ", $optionStrings);

        return $this;
    }

    public function get($num = null)
    {
        $num = $this->sanitise($num);
        if ($num) {
            $this->sql .= " LIMIT $num";
        }
        $stmnt = $this->dbh->prepare($this->sql);
        $stmnt->execute();
        return $stmnt->fetchAll();

    }

    private function sanitise($input)
    {
        if($input == null || $input == "" || $input == []) {
            return $input;
        }
    }

    public function toSql()
    {
        return $this->sql;
    }

}