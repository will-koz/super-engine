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

function get_html_heading ($has_page_switcher, $search_engine) {
	$return_text = "<div id=\"heading\">";
	if ($has_page_switcher) $return_text .= get_page_switcher_section();
	else $return_text .= get_search_section($search_engine);
	$return_text .= "</div>";
	return $return_text;
}

function get_html_column_head () {
	$return_text = "<div class=\"column\">";
	return $return_text;
}

function get_html_column_foot () {
	$return_text = "</div>";
	return $return_text;
}

function get_html_content_head () {
	$return_text = "<div id=\"content\">";
	return $return_text;
}

function get_html_content_foot () {
	$return_text = "</div>";
	return $return_text;
}

function get_page_switcher_section () {
	$return_text = "<form action=\"index.php\" method=\"post\">";
	$return_text .= "<input type=\"text\" name=\"page\" placeholder=\"Page...\" />";
	$return_text .= "<input type=\"password\" name=\"password\" placeholder=\"Password...\" />";
	$return_text .= "<input type=\"submit\" value=\"Submit\" />";
	$return_text .= "</form>";
	return $return_text;
}

function get_search_section ($search_engine) {
	$return_text = "<form action=\"$search_engine[1]\" method=\"get\">";
	$return_text .= "<input type=\"text\" name=\"$search_engine[2]\" placeholder=\"Search $search_engine[0]\" />";
	$return_text .= "<input type=\"submit\" value=\"Search\" />";
	$return_text .= "</form>";
	return $return_text;
}

function section_img ($data) {
	$return_text = "<div class=\"section\" style=\"padding: 0px; visibility: hidden\">";
	$return_text .= "<img src=\"$data[0]\" style=\"visibility: visible; width: 100%\">";
	$return_text .= "</div>";
	return $return_text;
}

function section_search ($data) {
	$return_text = "<div class=\"section\">";
	$return_text .= get_search_section($data);
	$return_text .= "</div>";
	return $return_text;
}

function section_text ($data) {
	$return_text = "<div class=\"section\">";
	foreach ($data as $datum) $return_text .= $datum;
	$return_text .= "</div>";
	return $return_text;
}
?>
