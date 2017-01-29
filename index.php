<?php

$html = file_get_contents("index-min.html");
$css = file_get_contents("css/style.css");
$script = file_get_contents("js/app.js");
$css = str_replace('@charset "UTF-8";', "", $css);
$html = str_replace("{style}", $css, $html);
$html = str_replace("{script}", $script, $html);
echo $html;
file_put_contents("index.html", $html);
/*
sass scss/style.scss:scss/style.css
grunt

server

git add -A
git commit -m "Oki"
git push

*/