<?php
namespace App\Models;

use App\config\Database;

require __DIR__ . '/../../config/Database.php';

class Job {
    private $pdo;

    public function __construct() {
        $this->pdo = Database::getInstance()->getConnection();
    }

    public function getJobLists($search)
    {
        $sql = "SELECT TOP 20
                ID, OurReference, VehicleRegoNo
                FROM aiJob
                WHERE CompanyID = 13 AND (ID LIKE ? OR OurReference LIKE ? OR VehicleRegoNo LIKE ?)
                ORDER BY ID DESC";
        $params = ["%$search%", "%$search%", "%$search%"];

        $smtp = sqlsrv_query($this->pdo, $sql, $params);

        if ($smtp) {
            $rows = [];

            while($row = sqlsrv_fetch_array($smtp, SQLSRV_FETCH_ASSOC)) {
                $rows[] = $row;
            }

            return $rows;
        }
    }
}
