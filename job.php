<?php include_once './config/init.php'; ?>

<?php
$job  = new Job;

if (isset($_POST["del_id"])) {
    $del_id = $_POST["del_id"];
    if ($job->delete($del_id)) {
        header("Location: index.php?message=Job Deleted&type=success");
    } else {
        header("Location: index.php?message=Job Not Deleted&type=failure");
    }
}




$template = new Template("templates/job-single.php");

$job_id = isset($_GET["id"]) ? $_GET["id"] : null;
if (is_null($job->getjob($job_id))) {
    header("Location: index.php");
}
$template->job = $job->getjob($job_id);

echo $template;
