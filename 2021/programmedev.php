<?php
include "common.php";
include "papers.php";

$sessions=array(
array (
    "1a" => "9:35", 
    "1b" => "9:55",  
    "1c" => "10:15", 
), 
array(
    "2a" => "11:00", 
    "2b" => "11:20", 
    "2c" => "11:40", 
),
array(
    "3a" => "15:30", 
    "3b" => "15:50", 
    "3c" => "16:10"), 

array (
    "4a" => "13:40", 
    "4b" => "13:55", 
    "4c" => "14:10", 
),
);

$page->which = "programme";
$page->title = "Programme";


$page->strapline = "<h2>Timings</h2>";
$page->content .= "<p>The proceedings will be published in the ACM Digital Library</p>";
$page->content .= sessions($sessions);
//$page->content .= abstracts();

//$times is an array with keys as session numbers and values as session times 
function session($times){
    global $papers, $paperTimes;
    $ret = "";
    foreach($times as $slot => $time){
        $ret .= "<tr><td class='active'>$time</td>\n";

            $paperTime = $slot;
            $papern = $paperTimes[$paperTime];
            $paper = $papers[$papern];
            $ret .= "<td><a class='plainlink' href='#abstract$papern'>" ;
            $ret .= Markdown($paper['title']) . "</a>";
            $authors = $paper['authors'];
            $ret .= "<div class='small'>".authors($authors). "</div>";
            $ret .= "</td>\n";

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
<h1 class='logotext'>Thursday 7th January 2021</h1>
<table class='ui celled table'>
<tbody>

<tr><td></td><td class='active'>Main conference</td><td></td></tr>
    <tr><td class='active'>9:30</td><td>Opening and welcome <br>
<div class='person'>Michel Wermelinger
<div class='inst'>Open University</div></div> <div class='person'>Steven Bradley <div class='inst'>Durham University</div></div></td></tr>
";

        $ret .=     "
    <tr><td class='two wide'></td><td class='active twelve wide'>Session 1</td></tr>";

        $ret.= session($sessions[0]);

                $ret .=     "
    <tr><td class='two wide'>10:35</td><td class='active twelve wide'>Posters (see <a href='#posters'>below</a>) and coffee break</td></tr>";

//        $ret .= sessions($sessions[3]);

        $ret .=     "
    <tr><td class='two wide'></td><td class='active twelve wide'>Session 2</td></tr>";

        $ret.= session($sessions[1]);
        
        $ret .=     "
    <tr><td>12:00</td><td class='active'>Lunch</td></tr>

";
        $ret .=     "
    <tr><td>13:00</td></td><td class='twelve wide'>Engaging and Active Security Education (EASE) workshop <a href='http://www.ease.ws'>http://www.ease.ws</a>
<br>
<div class='person'>Joseph Maguire
<div class='inst'>University of Glasgow</div></div> <div class='person'>Rosanne English <div class='inst'>University of Strathclyde</div></div>
</td></tr>";

            $ret .= "   <tr><td class='two wide'>15:00</td><td class='active twelve wide'>Posters (see <a href='#posters'>below</a>) and coffee break</td></tr>";

        $ret .=     "
    <tr><td class='two wide'></td><td class='active twelve wide'>Session 3</td></tr>";

        $ret.= session($sessions[2]);
        
        $ret .="
    <tr><td class='active'>16:30</td><td>ACM UK SIGCSE Annual General Meeting and closing remarks</td></tr>

";
        $ret.= "<tr><td>17:00</td><td  class='active'>Conference close</td></tr>";

        
        $ret .="</tbody></table>";

        $ret .= "<h3 id='posters'>Posters</h3>";
        global $posters;
        foreach($posters as $poster){
            $ret .= "<h4>" . $poster['title'] . "</h4>\n";
            $ret .= authors($poster['authors']);
        }
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
