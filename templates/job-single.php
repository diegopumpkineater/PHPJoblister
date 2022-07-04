<?php
include_once './inc/header.php'; ?>
<h2 class="page-header"><?php echo htmlspecialchars($job->job_title) ?> (<?php echo htmlspecialchars($job->location) ?>)</h2>
<small>Posted By <?php echo htmlspecialchars($job->contact_user) ?> on <?php echo htmlspecialchars($job->post_date) ?></small>
<hr>
<p class="lead"><?php echo htmlspecialchars($job->description) ?></p>
<ul class="list-group">
    <li class="list-group-item"><strong>Company:</strong><?php echo htmlspecialchars($job->company) ?></li>
    <li class="list-group-item"><strong>Salary:</strong><?php echo htmlspecialchars($job->salary) ?></li>
    <li class="list-group-item"><strong>Contact Email:</strong><?php echo htmlspecialchars($job->contact_email) ?></li>
</ul>
<br><br>
<a href="index.php">Go Back</a>
<br><br>
<div class="well">
    <a href="edit.php?id=<?php echo htmlspecialchars($job->id) ?>" class="btn btn-default">Edit</a>

    <form style="display:inline" method="POST" action="job.php">
        <input type="hidden" name="del_id" value="<?php echo htmlspecialchars($job->id) ?>">
        <input type="submit" class="btn btn-danger" value="Delete">
    </form>

</div>



<?php include_once './inc/footer.php'; ?>