<?php
include "common.php";

$page->which = "handlesubmission";

foreach($page->submissionFields as $field){
    if(!$_POST[$field]){
        $page->content .= "<div class='ui negative message'>$field undefined</div>";
    }
}
if($page->content){  // error messages
    $page->title = "Submission incomplete";
    $page->strapline = "<h2>Please try again</h2>";
    
}
else{
    $page->title = "Submission accepted";
    $page->strapline = "<h2>Thanks for your submission ".$_POST['firstName']."</h2>";
    $page->content = $page->load("dates","md");
    $page->content .= $page->load("dates","html");

    mail("s.p.bradley@durham.ac.uk,sarah.drummond@durham.ac.uk","CEP submission",
    "By ".$_POST['firstName']. " " . $_POST['lastName'],
    "From: cep.conference@durham.ac.uk",
    "-fcep.conference@durham.ac.uk");

    mail("cep.conference@durham.ac.uk", "CEP submission", var_export($_POST, true));
}

include "template.php";

?>