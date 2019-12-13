<?php
include "common.php";

$page->which = "submissions";
$page->title = "Submissions";
$page->strapline = "<h2>Submissions here!</h2>";
$page->content = $page->load("submissions","md");


include "template.php";

?>