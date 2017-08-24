<?php

// List routes

$this->router->add('dashboard', '/admin/', "DashboardController::index");
$this->router->add('login', '/admin/login', "LoginController::form");
$this->router->add('logout', '/admin/logout', "AdminController::logout");
$this->router->add('admin-auth', '/admin/auth', "LoginController::authAdmin",'POST');

// PAGE ROUTES
$this->router->add('pages', '/admin/pages', "PageController::listing");
$this->router->add('page-create', '/admin/pages/create', "PageController::create");
$this->router->add('page-add', '/admin/pages/add', "PageController::add","POST");
$this->router->add('page-update', '/admin/pages/edit/{id:int}', "PageController::update");

// POST ROUTES
$this->router->add('posts', '/admin/posts', "PostController::listing");
$this->router->add('post-create', '/admin/posts/create', "PostController::create");
$this->router->add('post-add', '/admin/posts/add', "PostController::add","POST");
$this->router->add('post-update', '/admin/posts/edit/{id:int}', "PostController::update");


