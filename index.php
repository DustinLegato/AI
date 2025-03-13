<?php
header("Content-Security-Policy: default-src 'self'; script-src 'self' 'unsafe-inline' https://example.com;");
require_once 'src/controllers/Job.php';

use App\Controllers\Job;

$job = new Job();

$action = isset($_GET['action']) ? $_GET['action'] : '';
$search = isset($_GET['search']) ? $_GET['search'] : '';
switch ($action) {
    case '':
        $job->getJob($search);
        break;
    case 'job':
        $job->getJob($search);
        break;
}