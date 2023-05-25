<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "disease";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


function query($conn, $sql)
{
    return mysqli_query($conn, $sql);
}

function create($conn, $table, $data)
{
    $columns = implode(', ', array_keys($data));
    $values = "'" . implode("', '", array_values($data)) . "'";
    $sql = "INSERT INTO $table ($columns) VALUES ($values)";
    return query($conn, $sql);
}

function read($conn, $table, $condition = "")
{
    $sql = "SELECT * FROM $table";
    if ($condition) {
        $sql .= " WHERE $condition";
    }
    return query($conn, $sql);
}

function update($conn, $table, $data, $condition = "")
{
    $updates = [];
    foreach ($data as $column => $value) {
        $updates[] = "$column = '$value'";
    }
    $updates = implode(', ', $updates);
    $sql = "UPDATE $table SET $updates";
    if ($condition) {
        $sql .= " WHERE $condition";
    }
    return query($conn, $sql);
}

function delete($conn, $table, $condition = "")
{
    $sql = "DELETE FROM $table";
    if ($condition) {
        $sql .= " WHERE $condition";
    }
    return query($conn, $sql);
}

function getPatientName($conn, $id)
{
    $patient = read($conn, "user", "id=$id");
    $patient = mysqli_fetch_assoc($patient);
    return $patient['name'];
}

function getDoctorName($conn, $id)
{
    $doctor = read($conn, "user", "id=$id");
    $doctor = mysqli_fetch_assoc($doctor);
    return $doctor['name'];
}
