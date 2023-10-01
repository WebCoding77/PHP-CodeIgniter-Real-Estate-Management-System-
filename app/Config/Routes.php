<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index', ['as' => 'home']);
$routes->get('/about', 'Home::about', ['as' => 'about']);
$routes->get('/contact', 'Home::contact', ['as' => 'contact']);

service('auth')->routes($routes);


$routes->group('props', function($routes) {


    $routes->get('prop-type/(:any)', 'Properties\PropertiesController::getByPropType/$1', ['as' => 'get.prop.type']);
    $routes->get('prop-price-asc', 'Properties\PropertiesController::getByPropPrice', ['as' => 'get.prop.price.asc']);
    $routes->get('prop-price-desc', 'Properties\PropertiesController::getByPropPriceDesc', ['as' => 'get.prop.price.desc']);

    //props details
    $routes->get('prop-single/(:num)', 'Properties\PropertiesController::propSingle/$1', ['as' => 'prop.single']);
    $routes->post('send-request/(:num)', 'Properties\PropertiesController::sendRequest/$1', ['as' => 'send.request']);
    $routes->post('save-prop/(:num)', 'Properties\PropertiesController::saveProperty/$1', ['as' => 'save.prop']);

    $routes->get('props-by-hometype/(:any)', 'Properties\PropertiesController::propsByHomeType/$1', ['as' => 'props.home.type']);
    $routes->post('search', 'Properties\PropertiesController::search', ['as' => 'props.search']);

});



$routes->group('users', function($routes) {

    //users
    $routes->get('props-requests', 'Users\UsersController::propsRequests', ['as' => 'users.props.requests']);
    $routes->get('props-saved', 'Users\UsersController::propsSaved', ['as' => 'users.props.saved']);

});


$routes->get('admins/login', 'Admins\AdminsController::login', ['as' => 'admins.login', 'filter' => 'loginfilter']);
$routes->post('admins/login', 'Admins\AdminsController::checkLogin', ['as' => 'admins.login.check']);


$routes->group('admins', ['filter' => 'authfilter'], function($routes) {

    $routes->get('index', 'Admins\AdminsController::index', ['as' => 'admins.index']);
    $routes->get('logout', 'Admins\AdminsController::logout', ['as' => 'admins.logout']);

    //admins
    $routes->get('all-admins', 'Admins\AdminsController::displayAdmins', ['as' => 'admins.all']);
    $routes->get('create-admins', 'Admins\AdminsController::createAdmins', ['as' => 'admins.create']);
    $routes->post('create-admins', 'Admins\AdminsController::storeAdmins', ['as' => 'admins.store']);



    //hometypes
    $routes->get('all-home-types', 'Admins\AdminsController::displayHomeTypes', ['as' => 'home.types.all']);
    $routes->get('create-home-types', 'Admins\AdminsController::createHomeTypes', ['as' => 'home.types.create']);
    $routes->post('create-home-types', 'Admins\AdminsController::storeHomeTypes', ['as' => 'home.types.store']);
    $routes->get('delete-home-types/(:num)', 'Admins\AdminsController::deleteHomeTypes/$1', ['as' => 'home.types.delete']);
    $routes->get('edit-home-types/(:num)', 'Admins\AdminsController::editHomeTypes/$1', ['as' => 'home.types.edit']);
    $routes->post('edit-home-types/(:num)', 'Admins\AdminsController::updateHomeTypes/$1', ['as' => 'home.types.update']);


    //props
    $routes->get('all-props', 'Admins\AdminsController::displayProps', ['as' => 'props.all']);
    $routes->get('create-props', 'Admins\AdminsController::createProps', ['as' => 'props.create']);
    $routes->post('create-props', 'Admins\AdminsController::storeProps', ['as' => 'props.store']);

    //Gallery
    $routes->get('create-gallery', 'Admins\AdminsController::createGallery', ['as' => 'gallery.create']);
    $routes->post('create-gallery', 'Admins\AdminsController::storeGallery', ['as' => 'gallery.store']);

    $routes->get('delete-props/(:num)', 'Admins\AdminsController::deleteProps/$1', ['as' => 'props.delete']);



    //requests
    $routes->get('all-requests', 'Admins\AdminsController::displayRequests', ['as' => 'requests.all']);


});