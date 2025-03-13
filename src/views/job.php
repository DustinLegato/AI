<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Job</title>
    <link rel="stylesheet" href="/public/css/stype.css">
    <script src="/public/js/htmx.min.js"></script>
</head>
<body >
<div id="job-list">
    <div class="container">
        <div class="search-box">
            <input name="search" id="search"
                   hx-get="/index.php?action=job"
                   hx-target="#job-list"
                   hx-vals='{"search": document.getElementById("search").value}'
                   hx-push-url="true"
                   type="text"
                   class="search-input"
                   placeholder="Search..."
                   value="<?php echo htmlspecialchars(isset($_GET['search']) ? $_GET['search'] : ''); ?>">
            <button class="search-button">🔍</button>
        </div>
    </div>
    <br>
    <br>
    <table id="job-table"  border="1">
        <thead>
        <tr>
            <th>ID</th>
            <th>REF</th>
            <th>REGO</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($jobs as $job): ?>
            <tr>
                <td><?php echo htmlspecialchars($job['ID']); ?></td>
                <td><?php echo htmlspecialchars($job['OurReference']); ?></td>
                <td><?php echo htmlspecialchars($job['VehicleRegoNo']); ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>
