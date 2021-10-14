<?php
# Create  Hospital
function createHospital ($connect, $data)
{
    $query = 'INSERT INTO hospitals SET
    id       = :id, 
    hsname    = :hsname,
    hsimgpath    = :hsimgpath,
    hsambulance    = :hsambulance,
    hslocation    = :hslocation,
    created_at    = :created_at';

    $statement = $connect->prepare($query);

    $statement->bindValue(':id', $data['id']);
    $statement->bindValue(':hsname', $data['hsname']);
    $statement->bindValue(':hsimgpath', $data['hsimgpath']);
    $statement->bindValue(':hsambulance', $data['hsambulance']);
    $statement->bindValue(':hslocation', $data['hslocation']);
    $statement->bindValue(':created_at', $data['created_at']);

    try {
        $statement->execute();

    } catch (PDOException $e) {
        print "Error Message: " . $e->getMessage();
        exit();
    }

    return json_encode([
        'message' => 'Hospital Recorded.'
    ]);
}

# Read all Hospitals
function readHospitals ($connect)
{
    $query = "SELECT * FROM hospitals";

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

# Read a single Hospital
function singleHospital ($connect, $id)
{
    $query = "SELECT * FROM hospitals WHERE id = :id";

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

# Edit Hospital
function updateHospital ($connect, $data)
{
    $query = 'UPDATE hospitals SET
    id       = :id, 
    hsname    = :hsname,
    hsimgpath    = :hsimgpath,
    hsambulance    = :hsambulance,
    hslocation    = :hslocation,
    created_at    = :created_at';

    $statement = $connect->prepare($query);

    $statement->bindValue(':id', $data['id']);
    $statement->bindValue(':hsname', $data['hsname']);
    $statement->bindValue(':hsimgpath', $data['hsimgpath']);
    $statement->bindValue(':hsambulance', $data['hsambulance']);
    $statement->bindValue(':hslocation', $data['hslocation']);
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

# Delete Hospital
function deleteHospital ($connect, $id)
{
    $query = "DELETE FROM hospitals WHERE id = :id LIMIT 1";

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