<?php
include "common.php";

$page->which = "organisation";
$page->title = "Organisation";
$page->strapline = "<h2>Get in touch with us</h2>";
$page->content = $page->load("contacts","html");
$page->content .= $page->load("pc","md");

include "template.php";

?>