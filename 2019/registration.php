<?php
include "common.php";

$page->which = "registration";
$page->title = "Registration";
$page->strapline = "<h2>Registration</h2>";

$page->content = $page->load("registrationclosed","md");


include "template.php";

?>