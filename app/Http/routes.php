<?php

get('/', 'WelcomeController@index');

resource('/documents', 'DocumentsController', ['except' => 'store']);

get('/auth/logout', ['as' => 'auth.logout', 'uses' => 'Auth\AuthController@logout']);
get('/auth/{provider}', ['as' => 'auth.redirect', 'uses' => 'Auth\AuthController@redirect']);
get('/auth/{provider}/callback', ['as' => 'auth.login', 'uses' => 'Auth\AuthController@login']);

