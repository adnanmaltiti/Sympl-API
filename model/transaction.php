<?php
# Create  Transaction
function createTransaction ($connect, $data)
{
    $query = 'INSERT INTO transactions SET
    goods       = :goods, 
    quantity    = :quantity';

    $statement = $connect->prepare($query);

    $statement->bindValue(':goods', $data['goods']);
    $statement->bindValue(':quantity', $data['quantity']);

    try {
        $statement->execute();

    } catch (PDOException $e) {
        print "Error Message: " . $e->getMessage();
        exit();
    }

    return json_encode([
        'message' => 'Transaction Recorded.'
    ]);
}

# Read all Transactions
function readTransactions ($connect)
{
    $query = "SELECT * FROM transactions";

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

# Read a single Transaction
function singleTransaction ($connect, $id)
{
    $query = "SELECT * FROM transactions WHERE id = :id";

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

# Edit Transaction
function updateTransaction ($connect, $data)
{
    $query = 'UPDATE transactions SET
    goods       = :goods, 
    quantity    = :quantity WHERE id = :id';

    $statement = $connect->prepare($query);

    $statement->bindValue(':id', $data['id']);
    $statement->bindValue(':goods', $data['goods']);
    $statement->bindValue(':quantity', $data['quantity']);

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

# Delete Transaction
function deleteTransaction ($connect, $id)
{
    $query = "DELETE FROM transactions WHERE id = :id LIMIT 1";

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