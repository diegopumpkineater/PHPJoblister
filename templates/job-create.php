<?php
include_once './inc/header.php'; ?>
<h2 class="page-header">Create Job Listing</h2>
<form method="POST" action="create.php">
    <div class="form-group">
        <label>Company</label>
        <input type="text" class="form-control" name="company" required>
    </div>
    <div class="form-group">
        <label>Category</label>
        <select class="form-control" name="category" required>
            <option value="0">Choose Category</option>
            <?php foreach ($categories as $category) { ?>
                <option value="<?php echo htmlspecialchars($category->id) ?>"><?php echo htmlspecialchars($category->name) ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <label>Job Title</label>
        <input type="text" class="form-control" name="job_title" required>
    </div>
    <div class="form-group">
        <label>Description</label>
        <textarea class="form-control" name="description" required></textarea>
    </div>
    <div class="form-group">
        <label>Location</label>
        <input type="text" class="form-control" name="location" required>
    </div>
    <div class="form-group">
        <label>Salary</label>
        <input type="text" class="form-control" name="salary" required>
    </div>
    <div class="form-group">
        <label>Contact User</label>
        <input type="text" class="form-control" name="contact_user" required>
    </div>
    <div class="form-group">
        <label>Contact Email</label>
        <input type="text" class="form-control" name="contact_email" required>
    </div>
    <input type="submit" class="btn btn-default" value="submit" name="submit">
    <br>
</form>
<?php include_once './inc/footer.php'; ?>