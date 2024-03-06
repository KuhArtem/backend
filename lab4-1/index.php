<?php
require_once 'autoload.php';

use Models\UserModel;
use Controllers\UserController;
use Views\UserView;

// Створення об'єктів класів
$userModel = new UserModel();
$userController = new UserController();
$userView = new UserView();

// Використання функціоналу класів
$userInfo = $userModel->getUserInfo();
echo "User Info: $userInfo\n";

$updateResult = $userController->updateUser();
echo "Update Result: $updateResult\n";

$userView->displayUser($userInfo);
?>
