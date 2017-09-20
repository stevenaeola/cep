<?php
include "common.php";

$page->which = "submissions";
$page->title = "Submissions";
$page->strapline = "<h2>We welcome abstracts for presentations, posters or other session proposals</h2>";
$page->content = $page->load("submissions","md");


include "template.php";

?>