<?php
namespace Views;

class UserView {
    public function __construct() {
        echo "User View created\n";
    }

    public function displayUser($userInfo) {
        // Ваша логика для отображения информации о пользователе
        echo "User Information: $userInfo\n"; // Пример отображаемой информации
    }
}
?>
