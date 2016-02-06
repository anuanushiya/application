<?php

/**
 * Test: Nette\Application\Routers\Route with WithUserClassAndUserPattern
 */

use Nette\Application\Routers\Route;
use Tester\Assert;


require __DIR__ . '/../bootstrap.php';

require __DIR__ . '/Route.php';


Route::addStyle('#numeric');
Route::setStyleProperty('#numeric', Route::PATTERN, '\d{1,3}');

$route = new Route('<presenter>/<id [\d.]+#numeric>', array());

testRouteIn($route, '/presenter/12.34/', 'Presenter', array(
	'id' => '12.34',
	'test' => 'testvalue',
), '/presenter/12.34?test=testvalue');

testRouteIn($route, '/presenter/123x');

testRouteIn($route, '/presenter/');