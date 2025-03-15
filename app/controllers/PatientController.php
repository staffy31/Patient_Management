<?php
require_once __DIR__ . '/../models/Patient.php';

class PatientController
{
  public function registerPatient()
  {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $data = json_decode(file_get_contents("php://input"), true);

      if (!isset($data["beneficiary"], $data["nida"], $data["age"], $data["sex"])) {
        echo json_encode(["status" => "error", "message" => "Missing required fields"]);
        return;
      }

      $patient = new Patient();
      $result = $patient->create($data);

      echo json_encode($result);
    }
  }
}
