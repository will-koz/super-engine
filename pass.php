<?php
$page = "main";
$pass = "";
if (isset($_POST["page"])) $page = $_POST["page"];
if (isset($_GET["page"])) $page = $_GET["page"];
if (isset($_POST["password"])) $pass = hash("sha256", $_POST["password"]);

$page_certified = false;
$page_jc = array(); // page json config

foreach ($JSON_CONFIG->pages as $JSON_PAGE) {
	if ($page == $JSON_PAGE->page and isset($JSON_PAGE->pass) and $pass == $JSON_PAGE->pass) $page_certified = true;
	else if ($page == $JSON_PAGE->page and !isset($JSON_PAGE->pass)) $page_certified = true;
}

if (!$page_certified) $page = "main";

foreach ($JSON_CONFIG->pages as $JSON_PAGE) {
	if ($page == $JSON_PAGE->page) $page_jc = $JSON_PAGE;
}
?>
