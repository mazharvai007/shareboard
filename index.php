<?php

// Start Session
session_start();

// Include files
require('config.php');

// Classes
require('classes/Messages.php');
require('classes/Bootstrap.php');
require('classes/Controller.php');
require('classes/Model.php');

// Controllers
require('controllers/home.php');
require('controllers/shares.php');
require('controllers/users.php');

// Models
require('models/home.php');
require('models/share.php');
require('models/user.php');

// Instantiate the Bootstrap class
$bootstrap = new Bootstrap($_GET);
$controller = $bootstrap->createController();

// Check Controller
if ($controller) {
    $controller->executeAction();
}