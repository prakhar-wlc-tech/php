<?php

namespace lib; // similar to folder structure. example : music folder => rock, pop, etc. now where we have to use Database class, we can use it like this: use lib\Database;
use PDO; // PHP Data Objects (PDO) is a database access layer providing a uniform method of access to multiple databases. It does not provide a database abstraction but allows for a uniform API for accessing different databases.
class Database
{
    public $connection;
    public function __construct($config, $username = "testuser", $password = "testpass")
    {

        //should not be here
        // $config = [
        //     "host" => "db",
        //     "dbname" => "learnphp",
        //     "port" => "3306",
        //     "charset" => "utf8mb4",
        // ];

        //http_build_query => use to build query string (example.com?name=xyz)
        // dd("mysql:" . http_build_query($config, '', arg_separator: ';'));

        //one way to create dsn
        // $dsn = "mysql:host={$config['host']};dbname={$config['dbname']};port={$config['port']};charset={$config['charset']}";
       
        // dd($config);
        // another way to create dsn
        $dsn = "mysql:" . http_build_query($config, '', arg_separator: ';');

        // dd($dsn);

        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC // so that won't have to pass while querying
        ]);
    }

    public function query($query, $params = [])
    {
        $stmt = $this->connection->prepare($query);
        $stmt->execute($params);
        return $stmt;
    }
}