<?php
if(isset($_POST['submit'])){
    $query = $_POST['message'];

    $context = stream_context_create(array(
        'http' => array(
        'header'  => "Authorization: Bearer 6c9f1be96e1647eaaf6c8b6e2a3cfcfc"
        )
    ));
    $ch = file_get_contents("https://api.dialogflow.com/v1/query?v=20170712&lang=fr&query=" . $query . "&sessionId=12345", false, $context);
 
    echo $ch;
 
}
?>