<?php
namespace Models;

class UserModel {
    public function __construct() {
        echo "User Model created\n";
    }

    public function getUserInfo() {
        // Ваша логика для получения информации о пользователе
        return "User information"; // Пример возвращаемой информации
    }
}
?>
