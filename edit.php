<?php include_once './config/init.php'; ?>

<?php
$job  = new Job;

$job_id = isset($_GET["id"]) ? $_GET["id"] : null;



if (isset($_POST["submit"])) {
    //Create Data Array
    $data = array();
    $data["job_title"] = $_POST["job_title"];
    $data["company"] = $_POST["company"];
    $data["category_id"] = $_POST["category"];
    $data["description"] = $_POST["description"];
    $data["location"] = $_POST["location"];
    $data["salary"] = $_POST["salary"];
    $data["contact_user"] = $_POST["contact_user"];
    $data["contact_email"] = $_POST["contact_email"];

    if ($job->update($job_id, $data)) {
        $Message = urlencode("Your Job has been updated, success");
        header("Location: index.php?message=" . $Message . "&type=success");
    } else {
        $Message = urlencode("Something went wrong");
        header("Location: index.php?message=" . $Message . "&type=failure");
    }
}

$template = new Template("templates/job-edit.php");
$template->job = $job->getjob($job_id);
$template->categories = $job->getcategories();
echo $template;
