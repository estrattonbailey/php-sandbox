<?php

require '../../oss/h/index.php';
require 'lib/cx.php';

$styles = [
  'display' => 'block',
  'backgroundColor' => 'tomato',
  'padding' => '1em'
];

$content = h('h1')([ 'class' => cx::create($styles) ])(
  "I'm a styled functional component in PHP!"
);

echo h('html')([
  h('head')(
    h('style')(
      cx::getCss()
    )
  ),
  h('body')(
    $content
  )
]);
