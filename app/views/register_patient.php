<?php $title = "Register Patient";
include __DIR__ . '/layouts/header.php'; ?>
<h2>Register Patient</h2>

<form method="POST" action="/register">
  <div class="row g-3">
    <div class="col-md-6">
      <label class="form-label">Beneficiary Name</label>
      <input type="text" name="beneficiary" class="form-control" required>
    </div>
    <div class="col-md-6">
      <label class="form-label">NIDA</label>
      <input type="text" name="nida" class="form-control" required>
    </div>
    <div class="col-md-4">
      <label class="form-label">Age</label>
      <input type="number" name="age" class="form-control" required>
    </div>
    <div class="col-md-4">
      <label class="form-label">Sex</label>
      <select name="sex" class="form-control">
        <option value="1">Male</option>
        <option value="2">Female</option>
      </select>
    </div>
    <div class="col-md-4">
      <label class="form-label">Phone</label>
      <input type="text" name="tel" class="form-control">
    </div>
    <div class="col-md-4">
      <label class="form-label">Insurance</label>
      <select name="insurance_id" class="form-control">
        <?php foreach ($insurances as $insurance): ?>
          <option value="<?= $insurance['id']; ?>"><?= $insurance['insurance']; ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="col-md-4">
      <label class="form-label">Num affil</label>
      <input type="text" name="insu_client_id" class="form-control">
    </div>
    <div class="col-md-4">
      <label class="form-label">Service</label>
      <select name="service_id" class="form-control">
        <?php foreach ($services as $service): ?>
          <option value="<?= $service['id']; ?>"><?= $service['service']; ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="col-md-6">
      <label class="form-label">District</label>
      <input type="number" name="district" class="form-control">
    </div>
    <div class="col-md-6">
      <label class="form-label">Sector</label>
      <input type="number" name="sector" class="form-control">
    </div>
    <div class="col-md-6">
      <label class="form-label">Cellule</label>
      <input type="number" name="cellule" class="form-control">
    </div>
    <div class="col-md-6">
      <label class="form-label">Village</label>
      <input type="number" name="village" class="form-control">
    </div>
    <div class="col-md-6">
      <label class="form-label">Prisoner</label>
      <select name="prisoner" class="form-control">
        <option value="0">No</option>
        <option value="1">Yes</option>
      </select>
    </div>
    <div class="col-md-6">
      <label class="form-label">Disability</label>
      <select name="disability" class="form-control">
        <option value="0">No</option>
        <option value="1">Yes</option>
      </select>
    </div>
    <div class="col-12">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </div>
</form>

<?php include __DIR__ . '/layouts/footer.php'; ?>