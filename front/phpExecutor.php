<?php
// header('Content-Type: application/json');
//    echo '<script>console.log("After Connection to DB")</script>';
    // $tmp_sql = "SELECT GUID, productName, stockAmount, sellPrice, purchasePrice  FROM Vegetables";
function getTable($tableName)
{
    $conn = makeConnectionToDB();

    $sql = "SELECT * FROM $tableName";
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
?>
