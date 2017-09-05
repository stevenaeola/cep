<?php
include "common.php";
include "papersdev.php";

$sessions=array(
array (
    "1" => "11:00",
    "2" => "11:20",
    "3" => "11:40",
    "4" => "12:00",
    "5" => "12:20"),

array (
    "6" => "13:55",
    "7" => "14:15",
    "8" => "14:35",
    "9" => "14:55"),

array (
    "10" => "15:30",
    "11" => "15:50"
/*    ,
      "12" => "16:10" */
)
);

$page->which = "programme";
$page->title = "Programme";
$page->strapline = "<h2>Timings and topics</h2>";
$page->content = $page->load("programme","md");
$page->content .= sessions($sessions);
$page->content .= $page->load("keynotes","html");
$page->content .= abstracts();


//$times is an array with keys as session numbers and values as session times 
function session($times){
    global $papers, $paperTimes;
    $ret = "";
    foreach($times as $slot => $time){
        $ret .= "<tr><td class='active'>$time</td>\n";
        foreach(array("a","b","c") as $room){
            $paperTime = $slot.$room;
            $papern = $paperTimes[$paperTime];
            $paper = $papers[$papern];
            $ret .= "<td><a class='plainlink' href='#abstract$papern'>" ;
            $ret .= Markdown($paper['title']) . "</a>";
            $authors = $paper['authors'];
            $ret .= "<div class='small'>".authors($authors). "</div>";
            $ret .= "</td>\n";
        }
        $ret .= "</tr>\n";
    }
    return $ret;
}

function authors($authors){
        
    $ret = "";
    if(!is_array($authors)){
        return $ret;
    }
    foreach($authors as $author){
        $ret .= "<div class='person'>";
        $ret .= $author['firstName'] . " " ;
        $ret .= $author['lastName'];
        $ret .= "<div class='inst'>";
                $ret .= $author['institution'];
                $ret .= "</div>";
                $ret .= "</div>";
    }
    return $ret;
}
function sessions($sessions){
    $ret="
<p>* Presenting authors are marked with an asterisk.</p>
<h1 class='logotext'>Morning Programme</h1>
<table class='ui celled table'>
<tbody>
    <tr><td class='active'>10:00</td><td>Arrival and registration</td><td class='active'>Christopherson building entrance</td><td>Coffee in atrium</td></tr>
    <tr><td class='active'>10:30</td><td colspan='2'>Welcome <div class='person'>Sarah Drummond and Steven Bradley <div class='inst'>Durham University</div></div></td><td class='active'>E005 Christopherson</td></tr>
    <tr><td class='active'>10:35</td><td colspan='2'>Keynote address <div class='person'>Prof Sally Fincher<div class='inst'>University of Kent</div></div></td><td class='active'>E005</td></tr>
    <tr><td class='one wide'>Session 1</td><td class='active five wide'>Session 1A<br/> E005 <br/>Chair: Steven Bradley</td><td class='active five wide'>Session 1B<br/> E101 <br/>Chair: Stuart Charters</td><td class='active five wide'>Session 1C<br/>E102 <br/>Chair: Kay Hack</td></tr>";

        $ret.= session($sessions[0]);
        $ret .= "<tr class='active'><td>12:40</td><td colspan='2'>Lunch</td><td>Atrium, Higginson Building</td></tr>\n";
        $ret .="</tbody></table>";
    
        $ret .= "<h1 class='logotext'>Afternoon Programme</h1>
<table class='ui celled table'>
<tbody>
    <tr><td class='active'>13:30</td><td colspan='2'>Keynote address <div class='person'>Dr Kay Hack<div class='inst'>HEA</div></div></td><td class='active'>E005</td></tr>
    <tr><td class='one wide'>Session 2</td><td class='active five wide'>Session 2A<br/> E005 <br/>Chair: Helen Donelan</td><td class='active five wide'>Session 2B<br/> E101 <br/>Chair: Sally Fincher</td><td class='active five wide'>Session 2C<br/> E102 <br/>Chair: Su White</td></tr>";
    
    $ret.= session($sessions[1]);

    $ret .= "<tr class='active'><td colspan='4'>Refreshment Break</td></tr>\n";

    $ret.= "<tr><td>Session 3</td><td class='active'>Session 3A<br/> E005 <br/>Chair: Steve Doswell</td><td class='active'>Session 3B<br/> E101 <br/>Chair: Sally Smith</td><td class='active'>Session 3C<br/> E102 <br/>Chair: Lindsay Marshall</td></tr>\n";
    $ret.= session($sessions[2]);
    $ret .= "<tr><td class='active'>16:30</td><td colspan='2'>Final Remarks</td><td class='active'>E005</td></tr>\n";
    
    $ret .="</tbody></table>";
    
    return $ret;
}

function abstracts(){
    global $papers;
    $ret = "";
    foreach($papers as $n => $paper){
        $ret .= "<h1 id = 'abstract$n'>". $paper['title'] ."</h1>";
        $ret .= authors($paper['authors']);
//    print "<h3>" . $paper['authors' => array('firstName']. " " . $paper['lastName']."</h3>\n";
        $ret .= Markdown($paper['abstract']);
    }
    return $ret;
}

include "template.php";


?>
