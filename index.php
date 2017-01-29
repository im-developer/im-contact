<?php

$html = file_get_contents("index-min.html");
$css = file_get_contents("css/style.css");
$css = str_replace('@charset "UTF-8";', "", $css);
$html = str_replace("{style", $css, $html);

file_put_contents("index.html", $html);