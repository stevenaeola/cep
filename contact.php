<?php
include "common.php";

$page->which = "contact";
$page->title = "Contact";
$page->strapline = "<h2>Get in touch with us</h2>";
$page->content = $page->load("contacts","html");

include "template.php";

?>