<?php

if (isset($_GET['error'])){
    $error_message = urldecode($_GET['error']);
}
if (isset($_GET['success'])){
    $success_message = urldecode($_GET['success']);
}

$page_header = "Quiz Score Board";

include "controller/session.php";

$page_header = "Score Board";

include "base.php";

// Function to play music based on score change
function play_music($old_score, $new_score) {
    if ($new_score > $old_score) {
        // Play music indicating score increase
        echo '<audio autoplay><source src="score_increase_music.mp3" type="audio/mpeg"></audio>';
    } elseif ($new_score < $old_score) {
        // Play music indicating score decrease
        echo '<audio autoplay><source src="score_decrease_music.mp3" type="audio/mpeg"></audio>';
    }
}

function get_quiz_id_array($user_id){
	$query = "select id from quiz where user_id=" . $user_id . " order by id desc;" ;
	$query_result = run_select_query($query);
	$quiz_id_array = array();
	foreach ($query_result as $res){
		array_push($quiz_id_array, $res["id"]);
	}
	return $quiz_id_array;
}

function get_score_from_quiz($user_id, $quiz_id){
	$query = "select created_on, score from quiz where id=" . $quiz_id . ";";
	$query_result = run_select_query($query, $single=true);
	if ($query_result["score"] == null){
		$score_sum_query = "select SUM(score) as total_score from asked_question where quiz_id=" .$quiz_id . " and user_id=" . $user_id . ";";
		$sum_query_result = run_select_query($score_sum_query, $single=true);
		$score = $sum_query_result["total_score"];

		$update_quiz_query = "update quiz set score=" . $score . " where id=" . $quiz_id . ";";
		run_query($update_quiz_query);
	}else{
		$score = $query_result["score"];
	}
	
	return $score;
}

$quiz_id_array = get_quiz_id_array($user["id"]);
$last_quiz_id = $quiz_id_array[0];

// Get previous score
$prev_score = get_score_from_quiz($user["id"], $last_quiz_id);

// Get current score
$score = get_score_from_quiz($user["id"], $last_quiz_id);

// Play music based on score change
play_music($prev_score, $score);

?>
<a href="home.php" > Back to Home</a>

<div class="main-content">
	
	<div class="score-board">
		Your score is <span class="score-number"> <?php echo $score ?> </span>	

	</div>

</div>