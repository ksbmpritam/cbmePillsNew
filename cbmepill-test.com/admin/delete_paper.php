<?php
require("includes/function.php");

$paperId = isset($_POST['paperId']) ? intval($_POST['paperId']) : 0;

if ($paperId > 0) {
    $paperId = mysqli_real_escape_string($mysqli, $paperId);

    $query = "DELETE FROM one_minute_paper_question WHERE id = $paperId";

    if (mysqli_query($mysqli, $query)) {
        echo "success";
    } else {
        echo false;
    }
} else {
    echo "Invalid id";
}
?>