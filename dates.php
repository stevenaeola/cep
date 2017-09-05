<?php
include "common.php";

$page->which = "dates";
$page->title = "Dates";
$page->strapline = "<h2>Important dates for the CEP 2017 conference</h2>";
$page->content = $page->load("dates","md");
$page->content .= $page->load("dates","html");

include "template.php";

?>