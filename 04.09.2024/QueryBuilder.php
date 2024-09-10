<?php



class QueryBuilder
{
    public static string $table = "";
    private static string $host = "localhost";

    private static string $userNAme = 'root';
    private static string $password = "";
    private static string $database = "oopcrud";
    private static $connection = null;

    public const FETCH_ALL = 1;
    public const FETCH_ONE = 2;
    public static function connect()
    {
        if (self::$connection == null) {
            try {
                self::$connection = new PDO("mysql:host=" . self::$host . "; dbname=" . self::$database, self::$userNAme, self::$password);
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
        return self::$connection;
    }

    public static function all()
    {
        $db = self::connect();
        $sql = "SELECT* FROM " . static::$table;
        $query = $db->prepare($sql);
        $query->execute([]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function get($column = [], $type = self::FETCH_ALL, $where = "", $order = ["id" => "DESC"])
    {
        $db = self::connect();
        $columns = implode(",", $column);
        if (count($column) == 0) {
            $columns = '*';
        }
        if ($where != "") {
            $where = "WHERE " . $where;
        }
        $orderColumn = array_key_first($order);
        $orderType = $order[$orderColumn];

        $sql = "SELECT $columns From " . static::$table . " " . $where . " ORDER BY $orderColumn $orderType";
        // return $sql;
        $query = $db->prepare($sql);
        $query->execute([]);
        switch ($type) {
            case self::FETCH_ALL:
                return $query->fetchAll(PDO::FETCH_ASSOC);
                break;
            case self::FETCH_ONE;
                return $query->fetch(PDO::FETCH_ASSOC);
                break;
        }
    }

    public static function insert(array $data)
    {
        $db = self::connect();
        $columnsArray = array_keys($data);
        $columnsValuesArray = array_values($data);

        $columns = implode(",", $columnsArray);
        $questionMarks = str_repeat("?,", count($columnsArray) - 1) . "?";
        $sql = "INSERT INTO " . static::$table . "($columns) VALUES ($questionMarks)";
        $query = $db->prepare($sql);
        $query->execute($columnsValuesArray);
        return [
            "id" => $db->lastInsertId()
        ];
    }

    public static function update($data, $where)
    {
        $db = self::connect();
        if ($where != "") {
            $where = "WHERE " . $where;
        }
        $set = "";
        $i = 1;
        foreach ($data as $key => $value) {
            $set .= "$key=?";
            if (count($data) != $i) {
                $set .= ",";
            }
            $i++;
        }
        $sql = "UPDATE " . static::$table . " SET $set $where";
        $query = $db->prepare($sql);
        $query->execute(array_values($data));
    }

    public static function delete($where = "")
    {
        $db = self::connect();
        if ($where != "") {
            $where = "WHERE " . $where;
        }
        $sql = "DELETE FROM " . static::$table . " " . $where;
        $query = $db->prepare($sql);
        $query->execute([]);
    }

    public static function find($id){
        $db = self::connect();
        $sql="SELECT * FROM ". static::$table. " WHERE ID=?";
        $query = $db->prepare($sql);
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }
}
