<?php
# Create  Appointment
function createAppointment ($connect, $data)
{
    $query = 'INSERT INTO appointments SET
    aptdesc    = :aptdesc,
    aptdoctor    = :aptdoctor,
    apthospital    = :apthospital,
    aptdate    = :aptdate';

    $statement = $connect->prepare($query);

    $statement->bindValue(':aptdesc', $data['aptdesc']);
    $statement->bindValue(':aptdoctor', $data['aptdoctor']);
    $statement->bindValue(':apthospital', $data['apthospital']);
    $statement->bindValue(':aptdate', $data['aptdate']);

    try {
        $statement->execute();

    } catch (PDOException $e) {
        print "Error Message: " . $e->getMessage();
        exit();
    }

    return json_encode([
        'message' => 'Appointment Recorded.'
    ]);
}

# Read all Appointments
function readAppointments ($connect)
{
    $query = "SELECT * FROM appointments";

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

# Read a single Appointment
function singleAppointment ($connect, $id)
{
    $query = "SELECT * FROM appointments WHERE id = :id";

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

# Edit Appointment
function updateAppointment ($connect, $data)
{
    $query = 'UPDATE appointments SET
    aptdesc    = :aptdesc,
    aptdoctor    = :aptdoctor,
    apthospital    = :apthospital,
    aptdate    = :aptdate WHERE id = :id';

    $statement = $connect->prepare($query);

    $statement->bindValue(':id', $data['id']);
    $statement->bindValue(':aptdesc', $data['aptdesc']);
    $statement->bindValue(':aptdoctor', $data['aptdoctor']);
    $statement->bindValue(':apthostpital', $data['apthostpital']);
    $statement->bindValue(':aptdate', $data['aptdate']);

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

# Delete Appointment
function deleteAppointment ($connect, $id)
{
    $query = "DELETE FROM appointments WHERE id = :id LIMIT 1";

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