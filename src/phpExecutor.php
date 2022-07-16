<?php

function getTable($tableName)
{
    $conn = makeConnectionToDB();
    $sql = "SELECT * FROM $tableName";
    $result = queryDB($conn, $sql);
    closeConnectionDB($conn);
    return $result;
}

function updateStock($tableName, $guid, $stockAmount) {
    $conn = makeConnectionToDB();
    $sql = "UPDATE $tableName SET stockAmount= $stockAmount WHERE GUID =$guid"; 
    $result = queryDB($conn, $sql);
    closeConnectionDB($conn);
    return $result;
}

function getProfitInsights() {
    $conn = makeConnectionToDB();
    $sql = "SELECT productName, PUID, productTable, sum(profit) FROM `Transactions`
        GROUP BY productName, PUID, productTable    
        ORDER BY sum(profit) DESC ;"; 
    $result = queryDB($conn, $sql);
    closeConnectionDB($conn);
    return $result;
} 

function getSellsInsights() {
    $conn = makeConnectionToDB();
    $sql = "SELECT productName, PUID, productTable, count(*), sum(sellAmount) FROM `Transactions`
        GROUP BY productName, PUID, productTable
        ORDER BY COUNT(*) DESC;"; 
    $result = queryDB($conn, $sql);
    closeConnectionDB($conn);
    return $result;
} 

function getUnsoldInsights() {
    $conn = makeConnectionToDB();
    $sql = "SELECT * FROM `Vegetables`
        WHERE GUID in(
        SELECT *
        FROM (SELECT GUID FROM `Vegetables`
        UNION
        SELECT GUID FROM `Fruits`) AS `Fruits_Vegetables`
        WHERE GUID NOT IN (SELECT PUID from `Transactions` GROUP BY PUID, productName, productTable))
        UNION 
        SELECT * FROM `Fruits`
        WHERE GUID in(
        SELECT *
        FROM (SELECT GUID FROM `Vegetables`
        UNION
        SELECT GUID FROM `Fruits`) AS `Fruits_Vegetables`
        WHERE GUID NOT IN (SELECT PUID from `Transactions` GROUP BY PUID, productName, productTable))"; 
    $result = queryDB($conn, $sql);
    closeConnectionDB($conn);
    return $result;
}
function updateTransactions($PUID, $productName, $productTable, $sellAmount, $profit) {
    $conn = makeConnectionToDB();
    $sql = "INSERT INTO Transactions (TUID, PUID, productName, productTable, sellAmount, profit)
            VALUES ('', $PUID, '$productName', '$productTable', $sellAmount, $profit)";
    $result = queryDB($conn, $sql);
    closeConnectionDB($conn);
    return $result;
}


function deleteItemFromTable($tableName, $id) {
    $conn = makeConnectionToDB();
    $sql = "DELETE FROM $tableName WHERE GUID = $id";
    $result = queryDB($conn, $sql);
    closeConnectionDB($conn);
    return $result;
}

function addItemToTable($tableName, $fileds) {
    $conn = makeConnectionToDB();
    $sql = "INSERT INTO $tableName (GUID, productName, stockAmount, sellPrice, purchasePrice, imageURL)
            VALUES ('', '$fileds[1]', $fileds[2], $fileds[3], $fileds[4], '$fileds[5]')";
    $result = queryDB($conn, $sql);
    closeConnectionDB($conn);
    return $result;
}

function editRowInTable($tableName, $fileds)
{
    $conn = makeConnectionToDB();
    $sql = "UPDATE $tableName
            SET 
            productName = '$fileds[1]',
            stockAmount = $fileds[2],
            sellPrice = $fileds[3],
            purchasePrice = $fileds[4],
            imageURL = '$fileds[5]' 
            WHERE 
            GUID = $fileds[0]";
    // $sql2="INSERT INTO MyGuests (id, firstname, lastname) VALUES('".$iid."','".$fname."','".$lname."');";
    $result = queryDB($conn, $sql);
    closeConnectionDB($conn);
    return $result;

}

function makeConnectionToDB()
{
    $servername = "sql303.byethost14.com";
    $username = "b14_31831483";
    $password = "nf1584c6";
    $dbname = "b14_31831483_Greengrocer_db";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        return $conn;
    }
}

function queryDB($conn, $sql)
{
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        return $result->fetch_all();
    } else {
        return null;
    }
}

function closeConnectionDB($conn)
{
    $conn->close();
}
