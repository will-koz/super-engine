<?php
ini_set('display_errors', 1);
$JSON_CONFIG = json_decode(file_get_contents("conf.json"));

$page = "main";
$pass = "";
if (isset($_POST["page"])) $page = $_POST["page"];
if (isset($_GET["page"])) $page = $_GET["page"];
if (isset($_POST["password"])) $pass = hash("sha256", $_POST["password"]);

include "html.php";

echo get_html_header($JSON_CONFIG->header->styles, $JSON_CONFIG->header->icon, $JSON_CONFIG->header->title);

echo get_html_heading(true);

echo get_html_footer();
?>
