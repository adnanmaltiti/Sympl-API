<?php
# Login User
function loginUser($connect, $data)
{
    $query = "SELECT * FROM users WHERE email = :email";

    $statement = $connect->prepare($query);
    $statement->bindValue(':email', $data['email']);

    try {

        $statement->execute();
        $row = $statement->fetch(PDO::FETCH_OBJ);

        if ($row){
            $hashedPassword = $row->password;
        } else {
            $hashedPassword = '';
        }

        if (password_verify($data['password'], $hashedPassword)) {
            $resp = True;
        } else {
            $resp = False;
        }

    } catch (PDOException $e) {
        print "Error Message: " . $e->getMessage();
        exit();
    }

    return json_encode([
        'message' => $resp,
        'data' => $row
    ]);
}

# Create  User
function createUser ($connect, $data)
{
    $query = 'INSERT INTO users SET
    full_name   = :full_name, 
    email       = :email, 
    password    = :password';

    $statement = $connect->prepare($query);

    $statement->bindValue(':full_name', $data['full_name']);
    $statement->bindValue(':email', $data['email']);
    $statement->bindValue(':password', $data['password']);

    try {
        $statement->execute();

    } catch (PDOException $e) {
        print "Error Message: " . $e->getMessage();
        exit();
    }

    return json_encode([
        'message' => 'User Recorded.'
    ]);
}

# Read all Users
function readUsers ($connect)
{
    $query = "SELECT * FROM users";

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

# Read a single User
function singleUser ($connect, $id)
{
    $query = "SELECT * FROM users WHERE id = :id";

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

# Edit User
function updateUser ($connect, $data)
{
    $query = "UPDATE users SET 
    full_name   = :full_name, 
    email       = :email, 
    password    = :password WHERE id = :id";

    $statement = $connect->prepare($query);

    $statement->bindValue(':id', $data['id']);
    $statement->bindValue(':full_name', $data['full_name']);
    $statement->bindValue(':email', $data['email']);
    $statement->bindValue(':password', $data['password']);

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

# Delete User
function deleteUser ($connect, $id)
{
    $query = "DELETE FROM users WHERE id = :id LIMIT 1";

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