<?php

// List routes
$this->router->add('dashboard', '/admin/', "DashboardController::index");
$this->router->add('login', '/admin/login', "LoginController::form");
