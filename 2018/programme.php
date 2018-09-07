<?php
include "common.php";
include "papers.php";

$sessions=array(
array (
    "1a" => "13:05",
    "1b" => "13:25",
//    "1c" => "13:45",
),
array(
    "2a" => "14:15",
    "2b" => "14:35",
    "2c" => "14:55",
),
array(
    "3a" => "15:55",
    "3b" => "16:15",
    "3c" => "16:35"),
array (
    "4a" => "17:20",
    "4b" => "17:40",
),
array (
    "5a" => "9:00",
    "5b" => "9:20",
    "5c" => "9:40",
),
array (
    "6a" => "11:10",
    "6b" => "11:30"),
array (
    "7a" => "12:00",
    "7b" => "12:20",
    "7c" => "12:40"),

);

$page->which = "programme";
$page->title = "Programme";
$page->strapline = "<h2>Timings and topics</h2>";
$page->content .= sessions($sessions);
//$page->content .= $page->load("keynotes","html");
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
<p>* Presenting authors are marked with an asterisk.</p>
<h1 class='logotext'>Thursday 11th January</h1>
<table class='ui celled table'>
<tbody>
<tr><td></td><td class='active'>Pre-conference workshop</td></td></tr>
    <tr><td class='active'>10:30</td><td> What's happening in CompEd? Members of research groups to give a short
summary (no more than five minutes) of computing education research
activity that is taking place at their institution.<br/>
This may include, but is not limited to:
<ul>
<li>an ongoing programme work;</li>
<li>work of colleagues you wish to recognise;</li>
<li>PhD projects;</li>
<li>projects for which partners are sought (or requests for data
contributions);</li>
<li>ideas to further activity in computing education research in the UK.</li>
</ul>

After the presentations, there will be time for more general discussion
about current work, the funding landscape and potential future directions. If you would like to join this session, please submit a short summary (2-3 sentences) to this form: <a href='https://goo.gl/forms/e4Jdm2ef2vavaFzm2'>https://goo.gl/forms/e4Jdm2ef2vavaFzm2</a> by mid-day Friday 22nd December.</td><td class='active'>E102 Christopherson building</td></tr>
<tr><td></td><td class='active'>Main conference</td><td></td></tr>
    <tr><td class='active'>12:00</td><td>Arrival and registration</td><td class='active'>Christopherson building entrance</td></tr>
    <tr><td class='active'>12:00</td><td>Lunch</td><td class='active'>Atrium</td></tr>
    <tr><td class='active'>13:00</td><td>Welcome <div class='person'>Sarah Drummond and Steven Bradley <div class='inst'>Durham University</div></div></td><td class='active'>E102 Christopherson</td></tr>
    <tr><td class='two wide'></td><td class='active ten wide'>Session 1: Curriculum</td><td class='active two wide'>E102 </td></tr>";

        $ret.= session($sessions[0]);
        $ret .= "<tr><td></td><td class='active'>Session 2: Ethics and Identity</td><td class='active'>E102 </td></tr>\n";
        $ret.= session($sessions[1]);
        $ret .= "<tr><td>15:25</td><td class='active'>Poster Session 1</td></tr>\n";
        $ret .= "<tr><td></td><td class='active'>Session 3: Programming</td><td class='active'>E102 </td></tr>\n";
        $ret.= session($sessions[2]);

        
        $ret .= "<tr><td>16:55</td><td class='active'>Refreshment Break</td></tr>\n";

        $ret .= "<tr><td></td><td class='active'>Session 4: Pedagogy</td><td class='active'>E102 </td></tr>\n";
        $ret.= session($sessions[3]);
        
        $ret .="</tbody></table>";

        $ret .= "<h1 class='logotext'>Friday 12th January</h1><table class='ui celled table'><tbody>";

        $ret .= "<tr><td class='two wide'></td><td class='active ten wide'>Session 5: Transitions and outreach</td><td class='active two wide'>E102 </td></tr>\n";
        $ret.= session($sessions[4]);
        
        $ret .= "<tr><td>10:00</td><td class='active'>Poster Session 2</td></tr>\n";
        $ret .= "<tr><td>10:45</td><td class='active'>Refreshment Break</td></tr>\n";

        $ret .= "<tr><td></td><td class='active'>Session 6: Assessment I</td><td class='active'>E102 </td></tr>\n";
        $ret.= session($sessions[5]);

        $ret .= "<tr><td></td><td class='active'>Session 7: Assessment II</td><td class='active'>E102 </td></tr>\n";
        $ret.= session($sessions[6]);

        $ret.= "<tr><td class='active'>13:00</td><td>Lunch</td><td class='active'>Atrium</td></tr>";
        $ret.= "<tr><td class='active'>14:00</td><td>Conference close</td><td class='active'></td></tr>";

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
