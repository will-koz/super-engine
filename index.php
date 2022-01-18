<?php
ini_set('display_errors', 1);
$JSON_CONFIG = json_decode(file_get_contents("conf.json"));

include "html.php";
include "pass.php";

echo get_html_header($JSON_CONFIG->header->styles, $JSON_CONFIG->header->icon, $JSON_CONFIG->header->title);

include "render.php";

echo get_html_footer();
?>
