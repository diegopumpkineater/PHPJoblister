<?php
include_once './inc/header.php'; ?>

<div class="jumbotron">
    <h1>Find a Job</h1>
    <form method="GET" action="index.php">
        <select name="category" class="form-control">
            <option value="0">Choose Category</option>
            <?php foreach ($categories as $category) { ?>
                <option value="<?php echo htmlspecialchars($category->id) ?>"><?php echo htmlspecialchars($category->name) ?></option>
            <?php } ?>
        </select>
        <br>
        <input type="submit" class="btn btn-lg btn-success" value="FIND">
    </form>
</div>
<h3><?php echo htmlspecialchars($title) ?></h3>
<?php foreach ($jobs as $job) { ?>
    <div class="row marketing">
        <div class="col-md-10">
            <h4><?php echo htmlspecialchars($job->job_title) ?></h4>
            <p><?php echo htmlspecialchars($job->description) ?></p>
        </div>
        <div class="col-md-2">
            <a class="btn btn-default" href="job.php?id=<?php echo htmlspecialchars($job->id) ?>">View</a>
        </div>
    </div>
<?php } ?>
<?php include_once './inc/footer.php'; ?>