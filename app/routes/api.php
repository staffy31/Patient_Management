<?php
require_once __DIR__ . '/../controllers/PatientController.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json");

$patientController = new PatientController();
$patientController->registerPatient();
?>
