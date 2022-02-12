<?php 
use Pecee\SimpleRouter\SimpleRouter;
use Welover\Controllers\Projects\ProjectsController;
use Welover\Controllers\Projects\ProjectsApiController;
use Welover\Controllers\Owners\OwnersApiController;

SimpleRouter::get('/', [ProjectsController::class, 'index']);

SimpleRouter::group(['prefix' => '/project'], function () {
  SimpleRouter::get('/edit/{id}', [ProjectsController::class, 'edit',function($id){}]);
  SimpleRouter::get('/create', [ProjectsController::class, 'create']);
  SimpleRouter::post('', [ProjectsController::class, 'store']);
  SimpleRouter::post('/{id}', [ProjectsController::class, 'update',function($id){}]);
});

SimpleRouter::group(['prefix' => '/api'], function () {

  SimpleRouter::group(['prefix' => '/project'], function () {
      SimpleRouter::delete('/delete/{id}', [ProjectsApiController::class, 'delete',function($id){}]);
  });

  SimpleRouter::group(['prefix' => '/owner'], function () {

    SimpleRouter::get('', [OwnersApiController::class, 'index']);
    SimpleRouter::get('/edit/{id}', [OwnersApiController::class, 'edit',function($id){}]);
    SimpleRouter::get('/create', [OwnersApiController::class, 'create']);
    SimpleRouter::post('', [OwnersApiController::class, 'store']);
    SimpleRouter::put('', [OwnersApiController::class, 'update']);
   
  });


});