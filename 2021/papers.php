<?php

$papers=array(

    
    array(
        'time' => '1a',
        'authors' => array(
            array('firstName' => 'Stephen',
            'lastName' => 'Murphy',
            'institution' => ''
            ),
            array('firstName' => 'Liam',
            'lastName' => 'Matthews-Dibbins',
            'institution' => ''
            ),
            array('firstName' => 'Chris',
            'lastName' => 'Maguire',
            'institution' => ''
            ),
            array('firstName' => 'Paul',
            'lastName' => 'Shemmell',
            'institution' => 'Birmingham City University'
            ),
	    ),
        'title' => 'Automating Feedback for Computing Vivas and Presentations - A Journey',
        'abstract' => "",
    ),

    
    array(
        'time' => '1b',
        'authors' => array(
            array('firstName' => 'Ryan',
            'lastName' => 'Crosby',
            'institution' => 'Newcastle University'
            ),
	    ),
        'title' => 'Student Perceptions of Assessment and Feedback - are they valid?',
        'abstract' => "",
    ),

    
    array(
        'time' => '1c',
        'authors' => array(
            array('firstName' => 'James',
            'lastName' => 'Paterson',
            'institution' => 'Glasgow Caledonian University'
            ),
            array('firstName' => 'Joshua',
            'lastName' => 'Adams',
            'institution' => 'Donald R. Tapia College of Business'
            ),
            array('firstName' => 'Brian',
            'lastName' => 'Hainey',
            'institution' => 'Glasgow Caledonian University'
            ),
            array('firstName' => 'Sajid',
            'lastName' => 'Nazir',
            'institution' => 'Glasgow Caledonian University'
            ),
	    ),
        'title' => 'A Repository of Resources and Exemplars for the Cloud Curriculum',
        'abstract' => "",
    ),
    
    array(
        'time' => '2a',
        'authors' => array(
            array('firstName' => 'Lloyd',
            'lastName' => 'Williams',
            'institution' => ''
            ),
            array('firstName' => 'Kim',
            'lastName' => 'Titus',
            'institution' => ''
            ),
            array('firstName' => 'Jason',
            'lastName' => 'Pittman',
            'institution' => 'High Point University'
            ),
	    ),
        'title' => 'How Early is Early Enough: Correlating Student Performance with Final Grades',
        'abstract' => "",
    ),

    
    array(
        'time' => '2b',
        'authors' => array(
            array('firstName' => 'Emlyn',
            'lastName' => 'Hegarty',
            'institution' => ''
            ),
            array('firstName' => 'Aidan',
            'lastName' => 'Mooney',
            'institution' => 'Maynooth University'
            ),
	    ),
        'title' => 'Analysis of an automatic grading system within first year Computer Science programming modules',
        'abstract' => "",
    ),

    
    array(
        'time' => '2c',
        'authors' => array(
            array('firstName' => 'Becky',
            'lastName' => 'Allen',
            'institution' => ''
            ),
            array('firstName' => 'Marie',
            'lastName' => 'Devlin',
            'institution' => ''
            ),
            array('firstName' => 'Stephen',
            'lastName' => 'McGough',
            'institution' => 'Newcastle University'
            ),
	    ),
        'title' => 'Using the One Minute Paper to Gain Insight into Potential Threshold Concepts in Artificial Intelligence Courses',
        'abstract' => "",
    ),

    
    array(
        'time' => '3a',
        'authors' => array(
            array('firstName' => 'Helen',
            'lastName' => 'Phillips',
            'institution' => ''
            ),
            array('firstName' => 'Wendy',
            'lastName' => 'Ivins',
            'institution' => 'Cardiff University'
            ),
            array('firstName' => 'Tom',
            'lastName' => 'Prickett',
            'institution' => ''
            ),
            array('firstName' => 'Julie',
            'lastName' => 'Walters',
            'institution' => ''
            ),
            array('firstName' => 'Rebecca',
            'lastName' => 'Strachan',
            'institution' => 'Northumbria University'
            ),
	    ),
        'title' => 'Using contributing student pedagogy to enhance support for teamworking in computer science projects',
        'abstract' => "",
    ),

    
    array(
        'time' => '3b',
        'authors' => array(
            array('firstName' => 'Tom',
            'lastName' => 'Crick',
            'institution' => 'Swansea University'
            ),
            array('firstName' => 'James H.',
            'lastName' => 'Davenport',
            'institution' => ''
            ),
            array('firstName' => 'Alan',
            'lastName' => 'Hayes',
            'institution' => 'University of Bath'
            ),
            array('firstName' => 'Alastair',
            'lastName' => 'Irons',
            'institution' => 'University of Sunderland'
            ),
            array('firstName' => 'Tom',
            'lastName' => 'Prickett',
            'institution' => 'Northumbria University'
            ),
	    ),
        'title' => 'Supporting Early-Career Academics in the UK Computer Science Community',
        'abstract' => "",
    ),

    
    array(
        'time' => '3c',
        'authors' => array(
            array('firstName' => 'John',
            'lastName' => 'Stratton',
            'institution' => 'Whitman College'
            ),
	    ),
        'title' => 'Enhancing Faculty-Student Interaction in an Undergraduate Algorithms Course Through Group Oral Presentations',
        'abstract' => "",
    ),

);
            

    


function cmp($p1, $p2){
    $n1 = $p1['time'];
    $n2 = $p2['time'];
    $c = ($n1 < $n2) ? -1: 1;
    if($n1 == $n2) return 0;
    return $c;
}

$posters = array(
    // posters

        array(
        'time' => '4a',
        'authors' => array(
            array('firstName' => 'Raj',
            'lastName' => 'Ramachandran',
            'institution' => ''
            ),
            array('firstName' => 'Emmanuel',
            'lastName' => 'Ogunshile',
            'institution' => 'University of West of England'
            ),
	    ),
        'title' => 'Towards a multilingual, cross cultural, student led lectorial in UK Higher Education',
        'abstract' => "",
    ),
    array(
        'time' => '4b',
        'authors' => array(
            array('firstName' => 'Rosanne',
            'lastName' => 'English',
            'institution' => 'University of Strathclyde'
            ),
            array('firstName' => 'Alan',
            'lastName' => 'Hayes',
            'institution' => 'University of Bath'
            ),
            array('firstName' => '',
            'lastName' => '',
            'institution' => ''
            ),
	    ),
        'title' => 'Improving Computer Science Student Graduate Skills Through Assessment',
        'abstract' => "",
    ),

        array(
        'time' => '4c',
        'authors' => array(
            array('firstName' => 'Jason',
            'lastName' => 'Pittman',
            'institution' => 'High Point University'
            ),
	    ),
        'title' => 'DRAT: A Dynamic Resource Allocation Tool for Estimating Compute Power in a Cybersecurity Engineering Learning Facility',
        'abstract' => "",
    ),
);
usort($papers, "cmp");

$paperTimes = array();
foreach($papers as $n => $paper){
    $paperTimes[$paper['time']] = $n;
}


?>
