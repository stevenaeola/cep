<?php
include "common.php";

$page->which = "index";
$page->title = "Computing Education Practice";
$page->strapline = $page->load("indexstrap","html");
$page->content = $page->load("index","md");

include "template.php";

?>