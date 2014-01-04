<?php

$this->set('channelData', array(
    'title' => Configure::read('Gtw.Title'),
    'link' => $this->Html->url('/', true),
    'description' => Configure::read('Gtw.Description'),
    'language' => 'en-us'
));

foreach ($posts as $post) {
    $postTime = strtotime($post['Post']['created']);

    $postLink = Router::url('/', true). 'posts/' . $post['Post']['slug'];

    // Remove & escape any HTML to make sure the feed content will validate.
    $bodyText = h(strip_tags($post['Post']['body']));
    $bodyText = $this->Text->truncate($bodyText, 400, array(
        'ending' => '...',
        'exact'  => true,
        'html'   => true,
    ));

    echo  $this->Rss->item(array(), array(
        'title' => $post['Post']['title'],
        'link' => $postLink,
        'guid' => array('url' => $postLink, 'isPermaLink' => 'true'),
        'description' => $bodyText,
        'pubDate' => $post['Post']['created']
    ));
}