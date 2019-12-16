<?php
include "common.php";
include "papers.php";

$sessions=array(
array (
    "1a" => "9:35", 
    "1b" => "9:50",  
    "1c" => "10:05", 
    "1d" => "10:20"), 
array(
    "2a" => "11:05", 
    "2b" => "11:20", 
    "2c" => "11:35", 
),
array(
    "3a" => "11:55", 
    "3b" => "12:10", 
    "3c" => "12:25"), 

array (
    "4a" => "13:40", 
    "4b" => "13:55", 
    "4c" => "14:10", 
),

array (
    "5a" => "14:55", 
    "5b" => "15:10", 
    "5c" => "15:25" 
),
array (
    "6a" => "15:45" //AGM
)
);

$page->which = "programme";
$page->title = "Programme";


$page->strapline = "<h2>Timings</h2>";
$page->content .= "<p>The proceedings will be published in the ACM Digital Library</p>";
$page->content .= sessions($sessions);
$page->content .= abstracts();

//$times is an array with keys as session numbers and values as session times 
function session($times){
    global $papers, $paperTimes;
    $ret = "";
    foreach($times as $slot => $time){
        $ret .= "<tr><td class='active'>$time</td>\n";

            $paperTime = $slot;
            $papern = $paperTimes[$paperTime];
            $paper = $papers[$papern];
            $ret .= "<td colspan='2'><a class='plainlink' href='#abstract$papern'>" ;
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
<h1 class='logotext'>Wednesday 8th January 2020</h1>
<table class='ui celled table'>
<tbody>
<tr><td class='two wide'></td><td class='active'>Pre-conference workshop</td><td></td></tr>
    <tr><td class='active'>14:30-17:00</td><td> 

Research speed dating: 1 hour of one-to-one discussion about Computer Science Education research interests.<br>
From these discussion we will then form discussion groups around potential collaborative projects.
</td><td class='active'>E240 in Computer Science/Engineering building</td></tr>


<tr><td></td><td class='active'>Conference dinner (separate booking required)</td><td></td></tr>
    <tr><td class='active'>19:00</td><td> 
Pre-dinner drinks 
</td><td class=' four wide active'>Undercroft Bar, Durham Castle (University College)</td></tr>

    <tr><td class='active'>19:30</td><td> 
Conference dinner
</td><td class='active'>Bishop's Dining Room, Durham Castle</td></tr>


</tbody>
</table>

<h1 class='logotext'>Thursday 9th January 2020</h1>

<p>All talks in room TLC033 of the new Durham University Teaching and Learning Centre, South Road Durham, opposite the South Road entrance to the univerity science site, and next to St Mary's college. See <a href='location.php'>location</a> for maps and directions.</p>
<table class='ui celled table'>
<tbody>
<tr><td></td><td class='active'>Main conference</td><td></td></tr>
    <tr><td class='active'>9:00</td><td>Arrival and registration</td><td class='active'>TLC entrance</td></tr>
    <tr><td class='active'>9:30</td><td>Welcome <div class='person'>Marie Devlin
<div class='inst'>Newcastle University</div> Steven Bradley <div class='inst'>Durham University</div></div></td><td class='active'>TLC033</td></tr>
";

        $ret .=     "
    <tr><td class='two wide'></td><td class='active ten wide'>Session 1: BCS</td><td class='active two wide'>TLC033 </td></tr>";

        $ret.= session($sessions[0]);

                $ret .=     "
    <tr><td class='two wide'>10:35</td><td class='active ten wide'>Coffee break</td><td class='active two wide'>TLC101 </td></tr>";

        $ret .=     "
    <tr><td class='two wide'></td><td class='active ten wide'>Session 2</td><td class='active two wide'>TLC033 </td></tr>";

        $ret.= session($sessions[1]);
        
        $ret .=     "
    <tr><td class='two wide'></td><td class='active ten wide'>Session 3</td><td class='active two wide'>TLC033 </td></tr>";

        $ret.= session($sessions[2]);
        
        $ret .="
    <tr><td>12:40</td><td class='active'>Lunch</td><td class='active'>TCL101</td></tr>

";
        $ret .=     "
    <tr><td class='two wide'></td><td class='active ten wide'>Session 4</td><td class='active two wide'>TLC033 </td></tr>";

        $ret.= session($sessions[3]);
        
                $ret .=     "
    <tr><td class='two wide'>14:25</td><td class='active ten wide'>Coffee break</td><td class='active two wide'>TLC101 </td></tr>";

        $ret .=     "
    <tr><td class='two wide'></td><td class='active ten wide'>Session 5</td><td class='active two wide'>TLC033 </td></tr>";

        $ret.= session($sessions[4]);
        
        $ret .="
    <tr><td class='active'>15:45</td><td>ACM UK  SIGCSE Annual General Meeting</td><td class='active'>TLC033</td></tr>

";
        $ret.= "<tr><td>16:00</td><td  class='active' colspan='2'>Conference close</td></tr>";

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
