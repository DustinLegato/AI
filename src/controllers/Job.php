<?php
namespace App\Controllers;

use App\Models\Job as JobModel;

require 'src/Models/Job.php';

class Job {
    private $job;

    public function __construct()
    {
        $this->job = new JobModel();
    }

    public function getJob($search) {
        try {
            $jobs = $this->job->getJobLists($search);
        } catch (\Exception $exception) {
            throw new \Exception($exception->getMessage());
        }

        require_once __DIR__ . '/../views/job.php';
    }
}
