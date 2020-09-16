<?php
include "common.php";

$page->which = "submissions";
$page->title = "Submissions";
$page->strapline = "<h2>How to submit your paper</h2>";
$page->content = $page->load("submissions","md");


include "template.php";

?>