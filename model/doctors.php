<?php
# Create  Doctor
function createDoctor ($connect, $data)
{
    $query = 'INSERT INTO doctors SET
    id       = :id, 
    drname    = :drname,
    drimgpath    = :drimgpath,
    drspecialty    = :drspecialty,
    dravailable    = :dravailable,
    drhospital    = :drhospital,
    created_at    = :created_at';

    $statement = $connect->prepare($query);

    $statement->bindValue(':id', $data['id']);
    $statement->bindValue(':drname', $data['drname']);
    $statement->bindValue(':drimgpath', $data['drimgpath']);
    $statement->bindValue(':drspecialty', $data['drspecialty']);
    $statement->bindValue(':drsavailable', $data['drsavailable']);
    $statement->bindValue(':drhostpital', $data['drhostpital']);
    $statement->bindValue(':created_at', $data['created_at']);

    try {
        $statement->execute();

    } catch (PDOException $e) {
        print "Error Message: " . $e->getMessage();
        exit();
    }

    return json_encode([
        'message' => 'Doctor Recorded.'
    ]);
}

# Read all Doctors
function readDoctors ($connect)
{
    $query = "SELECT * FROM doctors";

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

# Read a single Doctor
function singleDoctor ($connect, $id)
{
    $query = "SELECT * FROM Doctors WHERE id = :id";

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

# Edit Doctor
function updateDoctor ($connect, $data)
{
    $query = 'UPDATE doctors SET
    id       = :id, 
    drname    = :drname,
    drimgpath    = :drimgpath,
    drspecialty    = :drspecialty,
    dravailable    = :dravailable,
    drhospital    = :drhospital,
    created_at    = :created_at';

    $statement = $connect->prepare($query);

    $statement->bindValue(':id', $data['id']);
    $statement->bindValue(':drname', $data['drname']);
    $statement->bindValue(':drimgpath', $data['drimgpath']);
    $statement->bindValue(':drspecialty', $data['drspecialty']);
    $statement->bindValue(':drsavailable', $data['drsavailable']);
    $statement->bindValue(':drhostpital', $data['drhostpital']);
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

# Delete Doctor
function deleteDoctor ($connect, $id)
{
    $query = "DELETE FROM doctors WHERE id = :id LIMIT 1";

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