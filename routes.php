<?php 
use Pecee\SimpleRouter\SimpleRouter;
use Welover\Controllers\Projects;
use Welover\Controllers\ProjectsController;

SimpleRouter::get('/', [ProjectsController::class, 'index']);
SimpleRouter::get('/project/edit/{id}', [ProjectsController::class, 'edit',function($id){}]);
SimpleRouter::get('/project/create', [ProjectsController::class, 'create']);
SimpleRouter::post('/project', [ProjectsController::class, 'store']);
SimpleRouter::put('/project', [ProjectsController::class, 'update']);

SimpleRouter::delete('/api/project/delete', [ProjectsController::class, 'delete']);