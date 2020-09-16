<?php
include "markdown.php";

class Page{
    public $title = "";
    public $header = "";
    public $menuItems = array();
    public $content =  "";
    public $extraJS = "";


    function load($fname, $type){
        $content = file_get_contents("media/${type}/${fname}.${type}");
        if($type == "md"){
            $content = Markdown($content);
        }
        return $content;
    }
    
    function logo(){
        print "<a href='index.php'><span class='logotext'>CEP</span></a>";
    }
    
    function menuLinks(){
        foreach($this->menuItems as $base=>$title){
            print "<a class='item' href='${base}.php'>$title</a>\n";
        }
    }
}
$page = new Page();

$page->menuItems = array(
    "submissions" =>"Submissions",
    "dates" => "Dates",
    "programme" => "Programme",
    "registration" => "Registration",
    "organisation" => "Organisation"
);

$page->submissionFields = array(
    "firstName",
    "lastName",
    "email",
    "department",
    "institution",
    "title",
    "abstract"
);

?>