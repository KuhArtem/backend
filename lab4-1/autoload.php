<?php
require_once 'autoload.php';

use Models\UserModel;
use Controllers\UserController;
use Views\UserView;

$userModel = new UserModel();
$userController = new UserController();
$userView = new UserView();
?>
