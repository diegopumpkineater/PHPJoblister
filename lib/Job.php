<?php

class Job
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getalljobs()
    {
        $this->db->query("SELECT jobs.*, categories.name AS cname
        FROM jobs
        INNER JOIN categories
        ON jobs.category_id = categories.id
        ORDER BY post_date DESC");

        //assign resulset
        $results = $this->db->resultSet();

        return $results;
    }

    public function getcategories()
    {
        $this->db->query("SELECT * FROM categories");

        //assign resulset
        $results = $this->db->resultSet();

        return $results;
    }

    public function getbycategory($category)
    {
        $this->db->query("SELECT jobs.*, categories.name AS cname
        FROM jobs
        INNER JOIN categories
        ON jobs.category_id = categories.id
        WHERE jobs.category_id = $category
        ORDER BY post_date DESC");

        //assign resulset
        $results = $this->db->resultSet();

        return $results;
    }

    public function getcategory($category_id)
    {
        $this->db->query("SELECT * FROM categories where id= :category_id");

        $this->db->bind(":category_id", $category_id);

        $row = $this->db->single();

        return $row;
    }

    public function getjob($id)
    {
        $this->db->query("SELECT * FROM jobs where id= :job_id");

        $this->db->bind(":job_id", $id);

        $row = $this->db->single();

        return $row;
    }

    //create Job

    public function create($data)
    {
        //Insert Query
        $this->db->query("INSERT INTO jobs (category_id, job_title, company, description, salary, location, contact_user, contact_email) VALUES 
        (:category_id, :job_title, :company, :description, :salary, :location, :contact_user, :contact_email)");

        $this->db->bind(":category_id", $data["category_id"]);
        $this->db->bind(":job_title", $data["job_title"]);
        $this->db->bind(":company", $data["company"]);
        $this->db->bind(":description", $data["description"]);
        $this->db->bind(":salary", $data["salary"]);
        $this->db->bind(":location", $data["location"]);
        $this->db->bind(":contact_user", $data["contact_user"]);
        $this->db->bind(":contact_email", $data["contact_email"]);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($id)
    {
        $this->db->query("DELETE FROM jobs WHERE id=$id");

        if ($this->db->execute()) {
            return true;
        } else {
            return true;
        }
    }

    //Update job
    public function update($id, $data)
    {
        //Insert Query
        $this->db->query("UPDATE jobs
        SET
        category_id =:category_id,
        job_title = :job_title,
        company = :company,
        description = :description,
        salary = :salary,
        location = :location,
        contact_user = :contact_user,
        contact_email = :contact_email 
        WHERE id = $id
        ");

        $this->db->bind(":category_id", $data["category_id"]);
        $this->db->bind(":job_title", $data["job_title"]);
        $this->db->bind(":company", $data["company"]);
        $this->db->bind(":description", $data["description"]);
        $this->db->bind(":salary", $data["salary"]);
        $this->db->bind(":location", $data["location"]);
        $this->db->bind(":contact_user", $data["contact_user"]);
        $this->db->bind(":contact_email", $data["contact_email"]);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
