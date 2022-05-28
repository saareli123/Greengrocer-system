<?php
header('Content-Type: application/json');

$aResult = array();

if (!isset($_POST['functionname'])) {
    $aResult['error'] = 'No function name!';
}

if (!isset($aResult['error'])) {

    switch ($_POST['functionname']) {
        case 'getTable':
            if (!is_array($_POST['arguments'])) {
                $aResult['error'] = 'Error in arguments! Table name is missing.';
            } else {
                makeConnectionToDB();
                $aResult['result'] = getTable($_POST['arguments'][0]);
                echo json_encode($aResult);
                break;
            }
        default:
            $aResult['error'] = 'Not found function ' . $_POST['functionname'] . '!';
            break;
    }
}



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
        // output data of each row
        return $result;
    } else {
        echo "0 results";
    }
    // $sql = "SELECT GUID, productName, stockAmount, sellPrice, purchasePrice  FROM Vegetables";
    // $result = $conn->query($sql);
    // if ($result->num_rows > 0) {
    //     // output data of each row
    //     while ($row = $result->fetch_assoc()) {
    //         echo  "GUID:" . $row["GUID"] . "," . "productName:" . $row["productName"] . "," . "stockAmount:" . $row["stockAmount"] . "," . "sellPrice:" . $row["sellPrice"] . "," . "purchasePrice:" . $row["purchasePrice"] . "\r\n";
    //     }
    // } else {
    //     echo "0 results";
    // }
}

function closeConnectionDB($conn)
{
    $conn->close();
}
