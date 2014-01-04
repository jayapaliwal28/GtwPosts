<?php
$this->set('channelData', array(
    'title' => Configure::read('Gtw.Title'),
    'link' => $this->Html->url('/', true),
    'description' => $posts['PostCategory']['name'],
    'language' => 'en-us'
));

foreach ($posts['Post'] as $post) {
    $postTime = strtotime($post['created']);

    $postLink = Router::url('/', true). 'posts/' . $post['slug'];

    // Remove & escape any HTML to make sure the feed content will validate.
    $bodyText = h(strip_tags($post['body']));
    $bodyText = $this->Text->truncate($bodyText, 400, array(
        'ending' => '...',
        'exact'  => true,
        'html'   => true,
    ));

    echo  $this->Rss->item(array(), array(
        'title' => $post['title'],
        'link' => $postLink,
        'guid' => array('url' => $postLink, 'isPermaLink' => 'true'),
        'description' => $bodyText,
        'pubDate' => $post['created']
    ));
}