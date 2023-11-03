<?php

use kronion\Router;

// default routes
Router::add('^admin/?$', ['controller' => 'Main', 'action' => 'index', 'prefix' => 'admin']);
Router::add('^admin/(?P<controller>[a-z0-9-]+)/?(?P<action>[a-z0-9-]+)?$', ['prefix' => 'admin']);

Router::add('^$', ['controller' => 'Main', 'action' => 'index']);
Router::add('^(?P<controller>[a-z0-9-]+)/?(?P<action>[a-z0-9-]+)?$');