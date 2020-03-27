<?php

// Include files
require('config.php');
require('classes/Bootstrap.php');

// Instantiate the Bootstrap class
$bootstrap = new Bootstrap($_GET);
$controller = $bootstrap->createController();