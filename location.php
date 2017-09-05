<?php
include "common.php";

$page->which = "location";
$page->title = "Location";
$page->strapline = $page->load("locationstrap","html");
$page->content = $page->load("locationmap","html");
$page->content .= $page->load("location","md");
$page->extraJS = $page->load("locationmap","js");

include "template.php";

?>