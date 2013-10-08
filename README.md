# Posts plugin for CakePHP

Plugin for News/Blog/Posts with cakephp.

## Requirements

CakePHP 2.4.0+   
[GtwUi](https://github.com/Phillaf/GtwUi) and its dependencies properly configured

## Features

* Consistent layout built on [Bootstrap 3] (http://getbootstrap.com/)
* Create Read Update Delete posts
* Posts searchable with [DataTables] (http://datatables.net)

## Installation

Load the plugin by adding this line to app/Config/bootstrap.php

    CakePlugin::load('GtwUi');
    
In the same file, give a title to your Posts page

    Configure::write(array('GtwPosts.MainTitle' => 'Welcome to my blog'));
    
## Copyright and license
Author: Philippe Lafrance    
Copyright 2013 [Gintonic Web](http://gintonicweb.com)    
Licensed under the [Apache 2.0 license](http://www.apache.org/licenses/LICENSE-2.0.html)