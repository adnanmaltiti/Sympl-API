<?php
# Create  Pharmacie
function createPharmacie ($connect, $data)
{
    $query = 'INSERT INTO pharmacies SET
    id       = :id, 
    phname    = :phname,
    phimgpath    = :phimgpath,
    phdelivery    = :phdelivery,
    phlocation    = :phlocation,
    created_at    = :created_at';

    $statement = $connect->prepare($query);

    $statement->bindValue(':id', $data['id']);
    $statement->bindValue(':phname', $data['phname']);
    $statement->bindValue(':phimgpath', $data['phimgpath']);
    $statement->bindValue(':phdelivery', $data['phdelivery']);
    $statement->bindValue(':phlocation', $data['phlocation']);
    $statement->bindValue(':created_at', $data['created_at']);

    try {
        $statement->execute();

    } catch (PDOException $e) {
        print "Error Message: " . $e->getMessage();
        exit();
    }

    return json_encode([
        'message' => 'Pharmacie Recorded.'
    ]);
}

# Read all Pharmacies
function readPharmacies ($connect)
{
    $query = "SELECT * FROM Pharmacies";

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

# Read a single Pharmacie
function singlePharmacie ($connect, $id)
{
    $query = "SELECT * FROM Pharmacies WHERE id = :id";

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

# Edit Pharmacie
function updatePharmacie ($connect, $data)
{
    $query = 'UPDATE Pharmacies SET
    id       = :id, 
    phname    = :phname,
    phimgpath    = :phimgpath,
    phdelivery    = :phdelivery,
    phlocation    = :phlocation,
    created_at    = :created_at';

    $statement = $connect->prepare($query);

    $statement->bindValue(':id', $data['id']);
    $statement->bindValue(':phname', $data['phname']);
    $statement->bindValue(':phimgpath', $data['phimgpath']);
    $statement->bindValue(':phdelivery', $data['phdelivery']);
    $statement->bindValue(':phlocation', $data['phlocation']);
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

# Delete Pharmacie
function deletePharmacie ($connect, $id)
{
    $query = "DELETE FROM Pharmacies WHERE id = :id LIMIT 1";

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