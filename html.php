<?php
function get_html_footer () {
	return "</body></html>";
}

function get_html_header ($styles) {
	$return_text = "<!DOCTYPE html>\n<html><head>";
	foreach ($styles as $style) {
		$return_text .= "<link rel=\"stylesheet\" href=\"$style\" type=\"text/css\" />";
	}
	$return_text .= "</head><body>";
	return $return_text;
}
?>
