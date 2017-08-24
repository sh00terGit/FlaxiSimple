<?php

// List routes

$this->router->add('dashboard', '/admin/', "DashboardController::index");
$this->router->add('login', '/admin/login', "LoginController::form");
$this->router->add('logout', '/admin/logout', "AdminController::logout");
$this->router->add('admin-auth', '/admin/auth', "LoginController::authAdmin",'POST');


$this->router->add('pages', '/admin/pages', "PageController::listing");
$this->router->add('page-create', '/admin/pages/create', "PageController::create");
$this->router->add('page-add', '/admin/pages/add', "PageController::add","POST");
$this->router->add('page-update', '/admin/pages/edit/{id:int}', "PageController::update");


$this->router->add('posts', '/admin/posts', "PostController::index");
