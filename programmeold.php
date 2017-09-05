<?php
include "common.php";

$page->which = "programme";
$page->title = "Programme";
$page->strapline = "<h2>Timings and topics</h2>";
$page->content = $page->load("programme","md");
$page->content .= $page->load("keynotes","html");

include "template.php";

?>