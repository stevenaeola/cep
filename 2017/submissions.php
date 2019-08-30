<?php
include "common.php";

$page->which = "submissions";
$page->title = "Submissions";
$page->strapline = "<h2>We welcome abstracts for presentations or other session proposals</h2>";
$page->extraJS = $page->load("submissions","js");
$page->content = $page->load("submissions","md");
$page->content .= $page->load("submissionsclosed","md");
//$page->content .= $page->load("submitform","html");


include "template.php";

?>