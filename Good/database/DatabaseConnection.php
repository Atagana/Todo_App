<?php
class DatabaseConnection
{
    public function __construct()
    {
        $conn = new PDO("mysql:host=localhost;port=3306;dbname=todolist_app", 'root', '');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
}
