<?php

Router::parseExtensions('rss');

Router::connect('/posts', array('plugin' => 'gtw_posts', 'controller' => 'posts'));
Router::connect('/posts/index/*', array('plugin' => 'gtw_posts', 'controller' => 'posts'));
Router::connect('/posts/admin/*', array('plugin' => 'gtw_posts', 'controller' => 'posts', 'action' => 'admin_index'));
Router::connect('/posts/edit/*', array('plugin' => 'gtw_posts', 'controller' => 'posts', 'action' => 'edit'));
Router::connect('/posts/add/*', array('plugin' => 'gtw_posts', 'controller' => 'posts', 'action' => 'add'));
Router::connect('/posts/delete/*', array('plugin' => 'gtw_posts', 'controller' => 'posts', 'action' => 'delete'));
Router::connect('/posts/view/*', array('plugin' => 'gtw_posts', 'controller' => 'posts', 'action' => 'view'));
Router::connect('/posts/*', array('plugin' => 'gtw_posts', 'controller' => 'posts', 'action' => 'display'));

Router::connect('/categories', array('plugin' => 'gtw_posts', 'controller' => 'post_categories'));
Router::connect('/categories/add/*', array('plugin' => 'gtw_posts', 'controller' => 'post_categories', 'action' => 'add'));
Router::connect('/categories/admin/*', array('plugin' => 'gtw_posts', 'controller' => 'post_categories', 'action' => 'admin_index'));
Router::connect('/categories/delete/*', array('plugin' => 'gtw_posts', 'controller' => 'post_categories', 'action' => 'delete'));
Router::connect('/categories/edit/*', array('plugin' => 'gtw_posts', 'controller' => 'post_categories', 'action' => 'edit'));
Router::connect('/categories/feed/*', array('plugin' => 'gtw_posts', 'controller' => 'post_categories', 'action' => 'feed'));
Router::connect('/categories/index/*', array('plugin' => 'gtw_posts', 'controller' => 'post_categories'));
Router::connect('/categories/*', array('plugin' => 'gtw_posts', 'controller' => 'post_categories', 'action' => 'view'));

