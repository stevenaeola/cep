<?php

include "common.php";

$page->which = "programme";
$page->title = "Programme";
$page->strapline = "<h2>CEP programme</h2>";
$page->content = $page->load("programmeholding","md");

include "template.php";


?>
