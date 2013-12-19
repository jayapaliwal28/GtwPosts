<?php
Router::connect('/posts', array('plugin' => 'gtw_posts', 'controller' => 'posts'));
Router::connect('/posts/index/*', array('plugin' => 'gtw_posts', 'controller' => 'posts'));
Router::connect('/posts/admin/*', array('plugin' => 'gtw_posts', 'controller' => 'posts', 'action' => 'admin_index'));
Router::connect('/posts/edit/*', array('plugin' => 'gtw_posts', 'controller' => 'posts', 'action' => 'edit'));
Router::connect('/posts/add/*', array('plugin' => 'gtw_posts', 'controller' => 'posts', 'action' => 'add'));
Router::connect('/posts/delete/*', array('plugin' => 'gtw_posts', 'controller' => 'posts', 'action' => 'delete'));
Router::connect('/posts/view/*', array('plugin' => 'gtw_posts', 'controller' => 'posts', 'action' => 'view'));
Router::connect('/posts/*', array('plugin' => 'gtw_posts', 'controller' => 'posts', 'action' => 'display'));
