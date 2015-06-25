<?php

$con = mysqli_connect("educatrium.cdadrkamvahb.us-west-2.rds.amazonaws.com","benjiang","Halov321","Educatrium");

$q = $_REQUEST["q"];

$sql = "SELECT Answer1, Answer2, Answer3, Answer4, Answer5, QTextSeg1, QTextSeg2, QTextSeg3, QTextSeg4, QTextSeg5, QTextSeg6, QTextSeg7, 
QTextSeg8, QTextSeg9, QTextSeg10 FROM WRQTextDisplayData WHERE QuestionID = $q;";
$arr = "".
$category = "SELECT Category FROM QSourceData WHERE QuestionID = $q;";



$catresult = mysqli_query($con, $category);

$result = mysqli_query($con, $sql);





$row = mysqli_fetch_assoc($result);




$row2 = mysqli_fetch_assoc($catresult);


if ($row2["Category"] == 'IS') {
	$arr = array("type" => $row2["Category"], 'qseg1' => $row["QTextSeg1"], 'qseg2' => $row["QTextSeg2"], 'qseg3' => $row["QTextSeg3"], 'answer_a' => $row["Answer1"], 'answer_b' => $row["Answer2"], 'answer_c' => $row["Answer3"], 'answer_d' => $row["Answer4"], 'answer_e' => $row["Answer5"]);
	echo json_encode($arr);
}
if ($row2["Category"] == 'IE') {
	$arr = array("type" => $row2["Category"], 'qseg1' => $row["QTextSeg1"], 'qseg2' => $row["QTextSeg2"], 'qseg3' => $row["QTextSeg3"], 'qseg4' => $row["QTextSeg4"], 'qseg5' => $row["QTextSeg5"], 'qseg6' => $row["QTextSeg6"], 'qseg7' => $row["QTextSeg7"], 'qseg8' => $row["QTextSeg8"], 'qseg9' => $row["QTextSeg9"], 'qseg10' => $row["QTextSeg10"]);
	echo json_encode($arr);
}
 
if ($row2["Category"] == 'IP') {
		$qpass = "SELECT QPassageID FROM WRQTextDisplayData WHERE QuestionID = $q;";
			$qpassresult = mysqli_query($con, $qpass);
			$row3 = mysqli_fetch_assoc($qpassresult);
		$sqlqpass = "SELECT COUNT(QuestionID) FROM WRQTextDisplayData WHERE QPassageID = $q;";
			$qpassresult2 = mysqli_query($con, $sqlqpass);
			$row6 = mysqli_fetch_assoc($qpassresult2);
							
			$yolo = "SELECT PassageParagraph1, PassageParagraph2, PassageParagraph3 FROM QPassageDisplayData WHERE QPassageID = $q;";
			
			$results = mysqli_query($con, $yolo);
			
			$row4 = mysqli_fetch_assoc($results);
			
			$passage_segs = array($row4["PassageParagraph1"], $row4["PassageParagraph2"], $row4["PassageParagraph3"]);
			$arr = "";	
			$arr[] = array(passage_segs => $passage_segs);
			$number = (int)implode("",$row6);
			//echo $passage_segs;
			//uhhhhhhhhhhhhhhhh
			for ($i = 1; $i <= $number; $i++){

				
			$sql = "SELECT Answer1, Answer2, Answer3, Answer4, Answer5, QTextSeg1, QTextSeg2, QTextSeg3, QTextSeg4, QTextSeg5, QTextSeg6, QTextSeg7, 
			QTextSeg8, QTextSeg9, QTextSeg10 FROM WRQTextDisplayData WHERE QuestionID = $q;";
			
			$result = mysqli_query($con, $sql);

			/*<?php
$my_array = array("Dog","Cat","Horse");

list($a, , $c) = $my_array;
echo "Here I only use the $a and $c variables.";
?> */


			$row = mysqli_fetch_assoc($result);
				//$add = array("type" => $row2["Category"], 'question_prompt' => $row["QPrompt1"], 'qseg1' => $row["QTextSeg1"], 'qseg2' => $row["QTextSeg2"], 'qseg3' => $row["QTextSeg3"], 'answer_a' => $row["Answer1"], 'answer_b' => $row["Answer2"], 'answer_c' => $row["Answer3"], 'answer_d' => $row["Answer4"], 'answer_e' => $row["Answer5"]);
		/*	$passage_segs = array($row4["PassageParagraph1"], $row4["PassageParagraph2"], 	$row4["PassageParagraph3"]);
			$haha = array("this", "should", "work");
			$arr = array(passage_segs => $passage_segs, "type" => 'IP');
*/

				$troll = array("type" => $row2["Category"], 'question_prompt' => $row["QPrompt1"], 'qseg1' => $row["QTextSeg1"], 'qseg2' => $row["QTextSeg2"], 'qseg3' => $row["QTextSeg3"], 'answer_a' => $row["Answer1"], 'answer_b' => $row["Answer2"], 'answer_c' => $row["Answer3"], 'answer_d' => $row["Answer4"], 'answer_e' => $row["Answer5"]);

				$quest[] = $troll;
				$q = $q + 1;
			}
			$questlove = array('questions' => $quest);
		$arr[] = $questlove;
		
		echo json_encode($arr);
} 


/*echo("Errorcode: " . mysqli_errno($con));*/

mysqli_close($con);

?>