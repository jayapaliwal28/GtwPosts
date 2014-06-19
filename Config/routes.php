<?php
Router::parseExtensions('rss');

Router::connect('/posts', array('plugin' => 'gtw_posts', 'controller' => 'posts'));
Router::connect('/posts/*', array('plugin' => 'gtw_posts', 'controller' => 'posts'));

Router::connect('/categories', array('plugin' => 'gtw_posts', 'controller' => 'post_categories'));
Router::connect('/categories/*', array('plugin' => 'gtw_posts', 'controller' => 'post_categories'));
