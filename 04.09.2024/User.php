<?php
class User extends QueryBuilder
{
    public static string $table = "users";
    public static function usersCount()
    {
        $db = parent::connect();
        $sql = "SELECT count(id) as user_count FROM " . self::$table;
        $query = $db->prepare($sql);
        $query->execute([]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}
