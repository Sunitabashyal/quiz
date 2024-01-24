<?php

$last_question = 0;
function get_question_details($last_question){
    $question_item = array(
        "question" => "How old are you ?", 
        "options" => ["I am 20", "I am 25", "I am 26", "I am 27"],
        "quiz_id" => "abcdfdf"
    );
    return $question_item;
}

$response = get_question_details($last_question);
$json_response = json_encode($response);
// send question number to if the question number is max_num return to score page;

function check_answer($submitted_answer){
    // check with db query the right answer is;
}


if ($_SERVER["REQUEST_METHOD"] == "POST"){
    echo "post method is accepted";
    $answer_submitted = isset($_POST['selected_option']) ? $_POST['selected_option'] : '';
    check_answer();
}

?>