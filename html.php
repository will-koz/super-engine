<?php
function get_first_image_from_subreddit ($subreddit) {
	$subjson = json_decode(file_get_contents("https://reddit.com/r/$subreddit[0].json"));
	foreach ($subjson->data->children as $child) if (isset($child->data->post_hint) && $child->data->post_hint == "image") return $child->data->url;
}

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

function get_html_image_style ($location) {
	$return_text = "style=\"background-image: linear-gradient( rgba(0, 0, 0, 0.6), rgba(0, 0, 0, .8) ), ";
	$return_text .= "url('$location'); background-position: center; color: white\"";
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

function section_link ($data) {
	$return_text = "<div class=\"section\">";
	$return_text .= "<a href=\"$data[0]\">$data[1]</a>";
	$return_text .= "</div>";
	return $return_text;
}

function section_person ($person) {
	$return_text = "<div class=\"section\"";
	if (isset($person[1]->img)) $return_text .= " " . get_html_image_style($person[1]->img) . " >";
	else if (isset($person[1]->reddit)) $return_text .= " " . get_html_image_style(get_first_image_from_subreddit(array($person[1]->reddit))) . " >";
	else $return_text .= ">";
	$return_text .= "<h2>$person[0]</h2>";
	if (isset($person[1]->insta)) $return_text .= "<a href=\"https://www.instagram.com/" . $person[1]->insta . "\">Instagram: " . $person[1]->insta . "</a><br>";
	if (isset($person[1]->reddit)) $return_text .= "<a href=\"https://www.reddit.com/r/" . $person[1]->reddit . "\">Reddit: " . $person[1]->reddit . "</a><br>";
	if (isset($person[1]->twitter)) $return_text .= "<a href=\"https://www.twitter.com/" . $person[1]->twitter . "\">Twitter: " . $person[1]->twitter . "</a><br>";
	$return_text .= "</div>";
	return $return_text;
}

function section_search ($data) {
	$return_text = "<div class=\"section\">";
	$return_text .= get_search_section($data);
	$return_text .= "</div>";
	return $return_text;
}

function section_subreddit ($subreddit) {
	$return_text = "<div class=\"section img-background\" " . get_html_image_style(get_first_image_from_subreddit($subreddit)) . ">";
	$return_text .= "<h2><a href=\"https://reddit.com/r/$subreddit[0]\">r/$subreddit[0]</a></h2>";
	if ($subreddit[1]) {
		$return_text .= "<a href=\"https://reddit.com/r/$subreddit[0]/new\">r/$subreddit[0]/new</a> ";
		$return_text .= "<a href=\"https://reddit.com/r/$subreddit[0]/top?t=week\">r/$subreddit[0]/top</a><br>";
		$return_text .= "<a href=\"https://old.reddit.com/r/$subreddit[0]\">old/r/$subreddit[0]</a> ";
		$return_text .= "<a href=\"https://old.reddit.com/r/$subreddit[0]/new\">old/r/$subreddit[0]/new</a> ";
		$return_text .= "<a href=\"https://old.reddit.com/r/$subreddit[0]/top?t=week\">old/r/$subreddit[0]/top</a>";
	}
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
