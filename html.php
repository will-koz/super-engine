<?php
function get_html_footer () {
	return "</body></html>";
}

function get_html_header ($styles, $icon, $title) {
	$return_text = "<!DOCTYPE html>\n<html><head>";
	$return_text .= "<title>$title</title>";
	$return_text .= "<link rel=\"icon\" href=\"$icon\" type=\"image/x-icon\" />";

	foreach ($styles as $style) {
		$return_text .= "<link rel=\"stylesheet\" href=\"$style\" type=\"text/css\" />";
	}

	$return_text .= "</head><body>";
	return $return_text;
}

function get_html_heading ($has_page_switcher) {
	$return_text = "<div id=\"heading\">";
	if ($has_page_switcher == true) {
		$return_text .= get_page_password_section();
	}
	$return_text .= "</div>";
	return $return_text;
}

function get_page_password_section () {
	$return_text = "<form action=\"index.php\" method=\"post\">";
	$return_text .= "<input type=\"text\" name=\"page\"></input> ";
	$return_text .= "<input type=\"password\" name=\"password\"></input> ";
	$return_text .= "<input type=\"submit\" value=\"Submit\"></input>";
	$return_text .= "</form>";
	return $return_text;
}
?>
