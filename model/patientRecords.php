<?php
# Create  PatientRecord
function createPatientRecord ($connect, $data)
{
    $query = 'INSERT INTO patientRecords SET
    id       = :id, 
    rcdCode    = :rcdCode,
    rcdPath    = :rcdPath,
    created_at    = :created_at';

    $statement = $connect->prepare($query);

    $statement->bindValue(':id', $data['id']);
    $statement->bindValue(':rcdCode', $data['rcdCode']);
    $statement->bindValue(':rcdPath', $data['rcdPath']);
    $statement->bindValue(':created_at', $data['created_at']);

    try {
        $statement->execute();

    } catch (PDOException $e) {
        print "Error Message: " . $e->getMessage();
        exit();
    }

    return json_encode([
        'message' => 'PatientRecord Recorded.'
    ]);
}

# Read all PatientRecords
function readPatientRecords ($connect)
{
    $query = "SELECT * FROM patientRecords";

    $statement = $connect->prepare($query);

    try {
        $statement->execute();

    } catch (PDOException $e) {
        $error = $e->getMessage();
        exit();
    }

    $response = $statement->fetchAll(PDO::FETCH_OBJ);

    return json_encode($response);

}

# Read a single PatientRecord
function singlePatientRecord ($connect, $id)
{
    $query = "SELECT * FROM patientRecords WHERE id = :id";

    $statement = $connect->prepare($query);

    $statement->bindValue(':id', $id, PDO::PARAM_INT);

    try {
        $statement->execute();

    } catch (PDOException $e) {
        $error = $e->getMessage();
        exit();
    }

    $response = $statement->fetch(PDO::FETCH_OBJ);

    return json_encode($response);

}

# Edit PatientRecord
function updatePatientRecord ($connect, $data)
{
    $query = 'UPDATE patientRecords SET
    id       = :id, 
    rcdCode    = :rcdCode,
    rcdPath    = :rcdPath,
    created_at    = :created_at';

    $statement = $connect->prepare($query);

    $statement->bindValue(':id', $data['id']);
    $statement->bindValue(':rcdCode', $data['rcdCode']);
    $statement->bindValue(':rcdPath', $data['rcdPath']);
    $statement->bindValue(':created_at', $data['created_at']);

    try {
        $statement->execute();
    } catch (PDOException $e) {
        print "Error Message: " . $e->getMessage();
        exit();
    }

    return json_encode([
        'message' => 'Record Update Successful.'
    ]);
}

# Delete PatientRecord
function deletePatientRecord ($connect, $id)
{
    $query = "DELETE FROM patientRecords WHERE id = :id LIMIT 1";

    $statement = $connect->prepare($query);

    $statement->bindValue(':id', $id);

    try {

        $statement->execute();

    } catch (PDOException $e) {
        print "Error Message: " . $e->getMessage();
        exit();
    }

    return json_encode([
        'message' => 'Record(s) Deleted'
    ]);
}