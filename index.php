<?php

// Include files
require('config.php');

// Classes
require('classes/Bootstrap.php');
require('classes/Controller.php');

// Controllers
require('controllers/home.php');
require('controllers/shares.php');
require('controllers/users.php');

// Instantiate the Bootstrap class
$bootstrap = new Bootstrap($_GET);
$controller = $bootstrap->createController();

// Check Controller
if ($controller) {
    $controller->executeAction();
}