<?php include_once './config/init.php'; ?>

<?php
$job  = new Job;
$template = new Template("templates/frontpage.php");

$category = isset($_GET["category"]) ? $_GET["category"] : null;

$message = isset($_GET["message"]) ? $_GET["message"] : null;
$type = isset($_GET["type"]) ? $_GET["type"] : null;
if ($category) {
    $template->jobs = $job->getbycategory($category);
    $template->title = "Jobs in " . $job->getcategory($category)->name;
} else {
    $template->title = "Latest Jobs";
    $template->jobs = $job->getalljobs();
}

if ($message && $type) {
    if ($type == "failure") {
        echo "<div class='alert alert-danger'>" . $message . "</div>";
    } else {
        echo "<div class='alert alert-success'>" . $message . "</div>";
    }
}

$template->categories = $job->getcategories();
echo $template;
