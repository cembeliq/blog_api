<?php

/*
|--------------------------------------------------------------------------
| routerlication Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an routerlication.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->router->version();
});

$router->get('/key', function () use ($router) {
	return str_random(32);
});

$router->get('/test', ['middleware' => 'auth.basic', function(){
	return 'Hello world';
}]);

$router->group([
        'middleware' => 'auth.basic',
    ], function ($router) {
    	$router->post('checklists/templates', 'TemplatesController@createChecklistsTemplates');
		/**
		 * Routes for resource templates
		 */
		$router->get('templates', 'TemplatesController@all');
		$router->get('templates/{id}', 'TemplatesController@get');
		$router->post('templates', 'TemplatesController@add');
		$router->put('templates/{id}', 'TemplatesController@put');
		$router->delete('templates/{id}', 'TemplatesController@remove');

		/**
		 * Routes for resource checklists
		 */
		$router->get('checklists', 'ChecklistsController@all');
		$router->get('checklists/{id}', 'ChecklistsController@get');
		$router->post('checklists', 'ChecklistsController@add');
		$router->put('checklists/{id}', 'ChecklistsController@put');
		$router->delete('checklists/{id}', 'ChecklistsController@remove');


		/**
		 * Routes for resource items
		 */
		$router->get('items', 'ItemsController@all');
		$router->get('items/{id}', 'ItemsController@get');
		$router->post('items', 'ItemsController@add');
		$router->put('items/{id}', 'ItemsController@put');
		$router->delete('items/{id}', 'ItemsController@remove');
});