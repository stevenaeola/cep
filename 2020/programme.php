<?php
include "common.php";
include "papers.php";

$sessions=array(
array (
//    "1a" => "9:20", // keynote
    "1b" => "9:40",  // 1
    "1c" => "9:55"), // 2
array(
    "2a" => "10:25", // 3
    "2b" => "10:40", // 4
    "2c" => "10:55", // 5
    "2d" => "11:10" // 6
),
array(
    "3a" => "11:55", //7
    "3b" => "12:10", //8
    "3c" => "12:25"), //9

array (
    "4a" => "13:40", //keynote
    "4b" => "14:00", // 10
    "4c" => "14:15", //11
    "4d" => "14:30" //12
),

array (
    "5a" => "15:00", //13
    "5b" => "15:15", //14
    "5c" => "15:30" //15
),
array (
    "6a" => "16:15" //AGM
)
);

$page->which = "programme";
$page->title = "Programme";
$page->strapline = "<h2>Timings and topics</h2>";
$page->content .= "<p>The proceedings are published in the <a href='https://dl.acm.org/citation.cfm?id=3294016'>ACM Digital Library</a>";
$page->content .= sessions($sessions);
$page->content .= $page->load("keynotes","html");
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
<h1 class='logotext'>Tuesday 8th January 2019</h1>
<table class='ui celled table'>
<tbody>
<tr><td></td><td class='active'>Pre-conference workshop</td><td></td></tr>
    <tr><td class='active'>14:30</td><td> What's happening in CompEd? Members of research groups to give a short
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
about current work, the funding landscape and potential future directions. If you would like to join this session, please submit a short summary (2-3 sentences) to this form: <a href='https://goo.gl/forms/zfODQWmQdVxRbspx1'>https://goo.gl/forms/zfODQWmQdVxRbspx1</a> by mid-day Friday 21st December.</td><td class='active'>E240</td></tr>
</tbody>
</table>

<h1 class='logotext'>Wednesday 9th January 2019</h1>

<table class='ui celled table'>
<tbody>
<tr><td></td><td class='active'>Main conference</td><td></td></tr>
    <tr><td class='active'>9:00</td><td>Arrival and registration</td><td class='active'>Christopherson building entrance</td></tr>
    <tr><td class='active'>9:15</td><td>Welcome <div class='person'>Alexandra Cristea and Steven Bradley <div class='inst'>Durham University</div></div></td><td class='active'>E005 Christopherson</td></tr>
    <tr><td class='active'>9:20</td><td><a href='#keynote'>Keynote</a><div class='person'>Andrew McGettrick <div class='inst'>University of Strathclyde</div></div></td><td class='active'>E005 Christopherson</td></tr>";

        $ret .=     "
    <tr><td class='two wide'></td><td class='active ten wide'>Session 1: Projects</td><td class='active two wide'>E005 </td></tr>";

        $ret.= session($sessions[0]);
        
        $ret .=     "
    <tr><td class='two wide'></td><td class='active ten wide'>Session 2: Pedagogy</td><td class='active two wide'>E005 </td></tr>";

        $ret.= session($sessions[1]);
        
        $ret .=     "
    <tr><td class='two wide'></td><td class='active ten wide'>Session 3: Data and data security</td><td class='active two wide'>E005 </td></tr>";

        $ret.= session($sessions[2]);
        
        $ret .="
    <tr><td class='active'>12:40</td><td>Lunch and demonstrations</td><td class='active'>Atrium/E240</td></tr>

";
        $ret .=     "
    <tr><td class='two wide'></td><td class='active ten wide'>Session 4: Engagement</td><td class='active two wide'>E005 </td></tr>";

        $ret.= session($sessions[3]);
        
        $ret .=     "
    <tr><td class='two wide'></td><td class='active ten wide'>Session 5: Programming</td><td class='active two wide'>E005 </td></tr>";

        $ret.= session($sessions[4]);
        
        $ret .="
    <tr><td class='active'>16:00</td><td>ACM UK & Ireland SIGCSE Annual General Meeting</td><td class='active'>E005 Christopherson</td></tr>

";
        $ret.= "<tr><td class='active'>16:30</td><td>Conference close</td><td class='active'></td></tr>";

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
