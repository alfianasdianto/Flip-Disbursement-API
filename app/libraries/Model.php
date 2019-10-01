<?php
namespace App\Libraries;

class Model
{
    protected static $tableName = '';
    protected static $primaryKey = '';
    protected $columns;

    public function __construct()
    {
        $this->columns = array();
    }

    public function setColumnValue($column, $value)
    {
        $this->columns[$column] = $value;
    }

    public function getColumnValue($column)
    {
        return $this->columns[$column];
    }

    /**
     * Save the item data in database
     */
    public function save()
    {
        require __DIR__.'/../config/database.php';

        $class = get_called_class();
        $query = "INSERT INTO " . static::$tableName . " (" . implode(",", array_keys($this->columns)) . ") VALUES(";
        $keys = array();
        foreach ($this->columns as $key => $value) {
            $keys[":" . $key] = $value;
        }
        $query .= implode(",", array_keys($keys)) . ")";
        $s = $connect->prepare($query);
        $s->execute($keys);
    }

    /**
     * Update the item data in database
     */
    public function update($data)
    {
        require __DIR__.'/../config/database.php';

        $class = get_called_class();
        $query = "UPDATE ".static::$tableName." SET status=:status, receipt=:receipt, time_served=:time_served WHERE id=:id";
        $s = $connect->prepare($query);
        $s->execute($data);
    }

    /**
     * Create an instance of this Model from the database row
     */
    public function createFromDb($column)
    {
        foreach ($column as $key => $value) {
            $this->columns[$key] = $value;
        }
    }

    /**
     * Get a single item
     */
    public static function getOne($condition = array(), $order = null, $startIndex = null)
    {
        require __DIR__.'/../config/database.php';

        $query = "SELECT * FROM " . static::$tableName;
        if (!empty($condition)) {
            $query .= " WHERE ";
            foreach ($condition as $key => $value) {
                $query .= $key . "=:" . $key . " AND ";
            }
        }

        $query = rtrim($query, ' AND ');

        if ($order) {
            $query .= " ORDER BY " . $order;
        }

        if ($startIndex !== null) {
            $query .= " LIMIT " . $startIndex . ",1";
        }
    
        $s = $connect->prepare($query);
        foreach ($condition as $key => $value) {
            $condition[':' . $key] = $value;
            unset($condition[$key]);
        }

        $s->execute($condition);
        $row = $s->fetch();
        $className = get_called_class();
        $item = new $className();

        if ($row) {
            $item->createFromDb($row);
        } else {
            $item = null;
        }

        return $item;
    }
}
