<?php
require_once __DIR__ . '/../config/Database.php';

class Patient
{
  private $conn;
  private $table = "patients";

  public function __construct()
  {
    $database = new Database();
    $this->conn = $database->connect();
  }

  public function create($data)
  {
    try {
      $this->conn->beginTransaction();

      // Insert into insurance_patients
      $query = "INSERT INTO insurance_patients (num_affiliation, insu_id, created_at, updated_at) 
                      VALUES (:num_affiliation, :insu_id, NOW(), NOW())";
      $stmt = $this->conn->prepare($query);
      $stmt->execute([
        ":num_affiliation" => $data["insu_client_id"],
        ":insu_id" => $data["insurance_id"]
      ]);
      $insurance_patient_id = $this->conn->lastInsertId();

      // Insert into patients
      $query = "INSERT INTO patients (nida, insurance_code, famille, chef, beneficiary, age, sex, tel, section, created_at, updated_at, user_id, insurance_id) 
                      VALUES (:nida, :insurance_code, :famille, :chef, :beneficiary, :age, :sex, :tel, :section, NOW(), NOW(), :user_id, :insurance_id)";
      $stmt = $this->conn->prepare($query);
      $stmt->execute([
        ":nida" => $data["nida"],
        ":insurance_code" => $data["nida"],
        ":famille" => $data["nida"],
        ":chef" => $data["beneficiary"],
        ":beneficiary" => $data["beneficiary"],
        ":age" => $data["age"],
        ":sex" => $data["sex"],
        ":tel" => $data["tel"],
        ":section" => 23,
        ":user_id" => 1,
        ":insurance_id" => $insurance_patient_id
      ]);
      $patient_id = $this->conn->lastInsertId();

      // Insert into clientts
      $query = "INSERT INTO clientts (patient_id, service_id, district, sector, cellule, village, time, prisoner, disability, user_id) 
                      VALUES (:patient_id, :service_id, :district, :sector, :cellule, :village, NOW(), :prisoner, :disability, :user_id)";
      $stmt = $this->conn->prepare($query);
      $stmt->execute([
        ":patient_id" => $patient_id,
        ":service_id" => $data["service_id"],
        ":district" => $data["district"],
        ":sector" => $data["sector"],
        ":cellule" => $data["cellule"],
        ":village" => $data["village"],
        ":prisoner" => $data["prisoner"],
        ":disability" => $data["disability"],
        ":user_id" => 1
      ]);

      $this->conn->commit();
      return ["status" => "success", "message" => "Patient registered successfully."];
    } catch (Exception $e) {
      $this->conn->rollback();
      return ["status" => "error", "message" => $e->getMessage()];
    }
  }
}
