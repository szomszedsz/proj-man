<?php 
use Pecee\SimpleRouter\SimpleRouter;
use Welover\Controllers\Projects;
use Welover\Controllers\ProjectsController;

SimpleRouter::get('/', [ProjectsController::class, 'index']);

SimpleRouter::group(['prefix' => '/project'], function () {
  SimpleRouter::get('/edit/{id}', [ProjectsController::class, 'edit',function($id){}]);
  SimpleRouter::get('/create', [ProjectsController::class, 'create']);
  SimpleRouter::post('', [ProjectsController::class, 'store']);
  SimpleRouter::put('', [ProjectsController::class, 'update']);
});

SimpleRouter::delete('/api/project/delete/{id}', [ProjectsController::class, 'delete',function($id){}]);
  SimpleRouter::group(['prefix' => '/api'], function () {
    SimpleRouter::group(['prefix' => '/project'], function () {
    SimpleRouter::delete('/delete/{id}', [ProjectsController::class, 'delete',function($id){}]);
  });
});