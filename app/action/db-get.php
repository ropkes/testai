<?php

USE RedBean_Facade as R;

$post = R::dispense('post');
$post->text = '<b>Hello World From DB</b>';

$id = R::store($post);
$post = R::load('post', $id);
echo $post->text;
R::trash($post);