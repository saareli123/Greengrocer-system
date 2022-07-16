<!DOCTYPE html>
<html lang="en">

<head>
    <title>Greengrocer-system</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <!-- css -->
    <link rel="stylesheet" href="inventory.css">

    <!-- js -->
    <script src="inventory.js"></script>
    <script>
        $(function() {
            $("#nav-placeholder").load("../components/navbar/navbar.html");
            $("#footer-placeholder").load("../components/footer/footer.html");
        });
    </script>

    <style>
        .vegetables {
            max-height: 300px;
            overflow: scroll;
            margin-top: 10px;
        }

        .fruit {
            max-height: 300px;
            overflow: scroll;
            margin-top: 10px;
        }

        }
    </style>
</head>

<body style="padding-bottom: 10%;">
    <?php
    include "../../phpExecutor.php";

    function editPopUp($fileds)
    {

        echo "<div class='modal fade' id='modalLoginForm' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>";
        echo "<div class='modal-dialog' role='document'>";
        echo "<div class='modal-content'>";
        echo "<div class='modal-header text-center'>";
        echo "<h4 class='modal-title w-100 font-weight-bold'>Edit Row</h4>";
        echo "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
        echo "<span aria-hidden='true'>&times;</span>";
        echo "</button>";
        echo "</div>";
        echo "<div class='modal-body mx-3'>";

        echo "<form name='form' action='' method='post'>";

        echo "<div class='md-form mb-5'>";
        echo "<label>GUID:</label>";
        echo "<input readonly name='GUID' id='GUID' type='text' class='form-control' value=" . $fileds[0] . ">";
        echo "</div>";

        echo "<div class='md-form mb-5'>";
        echo "<label>productName:</label>";
        echo "<input readonly name='productName' id='productName' type='text' class='form-control' value=" . $fileds[1] . ">";
        echo "</div>";

        echo "<div class='md-form mb-5'>";
        echo "<label>stockAmount:</label>";
        echo "<input name='stockAmount' id='stockAmount' type='text' class='form-control' value=" . $fileds[2] . ">";
        echo "</div>";

        echo "<div class='md-form mb-5'>";
        echo "<label>sellPrice:</label>";
        echo "<input name='sellPrice' id='sellPrice' type='text' class='form-control' value=" . $fileds[3] . ">";
        echo "</div>";

        echo "<div class='md-form mb-5'>";
        echo "<input readonly name='purchasePrice' id='purchasePrice' visibility: hidden type='text' class='form-control' value=" . $fileds[4] . ">";
        echo "</div>";

        echo "<div class='md-form mb-5'>";
        echo "<input name='table' id='table' type='text' visibility: hidden class='form-control' value=" . $fileds[6] . ">";
        echo "</div>";

        echo "<div class='modal-footer d-flex justify-content-center'>";
        echo "<input class='btn btn-default' name='submitEdit' type='submit' value='Submit Edit'/>";
        echo "</div>";

        echo "</form>";

        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "<div class='text-center'>";
        echo "<a href='' id='popup' class='btn btn-default btn-rounded mb-4' data-toggle='modal' data-target='#modalLoginForm' visibility: hidden></a>";
        echo "</div>";
        echo "<script>";
        echo "document.getElementById('popup').click();";
        echo "</script>";
    }

    function addPopUp()
    {

        echo "<div class='modal fade' id='modalLoginForm' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>";
        echo "<div class='modal-dialog' role='document'>";
        echo "<div class='modal-content'>";
        echo "<div class='modal-header text-center'>";
        echo "<h4 class='modal-title w-100 font-weight-bold'>Add Row</h4>";
        echo "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
        echo "<span aria-hidden='true'>&times;</span>";
        echo "</button>";
        echo "</div>";
        echo "<div class='modal-body mx-3'>";

        echo "<form name='form' action='' method='post'>";

        // echo "<div class='md-form mb-5'>";
        // echo "<label>GUID:</label>";
        // echo "<input readonly name='GUID' id='GUID' type='text' class='form-control' value=" . $fileds[0] . ">";
        // echo "</div>";

        echo "<div class='md-form mb-5'>";
        echo "<label>productName:</label>";
        echo "<input name='productName' id='productName' type='text' class='form-control'>";
        echo "</div>";

        echo "<div class='md-form mb-5'>";
        echo "<label>stockAmount:</label>";
        echo "<input name='stockAmount' id='stockAmount' type='text' class='form-control'>";
        echo "</div>";

        echo "<div class='md-form mb-5'>";
        echo "<label>sellPrice:</label>";
        echo "<input name='sellPrice' id='sellPrice' type='text' class='form-control'>";
        echo "</div>";

        echo "<div class='md-form mb-5'>";
        echo "<label>purchasePrice:</label>";
        echo "<input name='purchasePrice' id='purchasePrice' type='text' class='form-control'>";
        echo "</div>";

        echo "<div class='md-form mb-5'>";
        echo "<label>imageURL:</label>";
        echo "<input name='imageURL' id='imageURL' type='text' class='form-control'>";
        echo "</div>";

        echo "<div class='md-form mb-5'>";
        echo "<select name='table' id='table' type='text' class='form-control' value='ff'>";
        echo "<option value='Vegetables'>Vegetables</option>";
        echo "<option value='Fruits'>Fruits</option>";
        echo "</select>";
        echo "</div>";

        echo "<div class='modal-footer d-flex justify-content-center'>";
        echo "<input class='btn btn-default' name='submitRow' type='submit' value='Submit Add'/>";
        echo "</div>";

        echo "</form>";

        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "<div class='text-center'>";
        echo "<a href='' id='popup_add' class='btn btn-default btn-rounded mb-4' data-toggle='modal' data-target='#modalLoginForm' visibility: hidden></a>";
        echo "</div>";
        echo "<script>";
        echo "document.getElementById('popup_add').click();";
        echo "</script>";
    }

    if (isset($_POST['edit'])) {
        $fileds = [(int)$_POST['GUID'], $_POST['productName'], (float)$_POST['stockAmount'], (float)$_POST['sellPrice'], (float)$_POST['purchasePrice'], $_POST['imageURL'], $_POST['table']];
        editPopUp($fileds);
    }

    if (isset($_POST['submitEdit'])) {
        $fileds = [(int)$_POST['GUID'], $_POST['productName'], (float)$_POST['stockAmount'], (float)$_POST['sellPrice'], (float)$_POST['purchasePrice'], $_POST['imageURL']];
        $numOfRowsAffected = editRowInTable($_POST['table'], $fileds);
        header("Refresh:0");
    }

    if (isset($_POST['row'])) {
        addPopUp();
    }

    if (isset($_POST['submitRow'])) {
        $fileds = ['', $_POST['productName'], (float)$_POST['stockAmount'], (float)$_POST['sellPrice'], (float)$_POST['purchasePrice'], $_POST['imageURL']];
        addItemToTable($_POST['table'], $fileds);
        header("Refresh:0");
        //echo $_POST['GUID'] . "," . $_POST['productName'] . "," . $_POST['stockAmount'] . "," . $_POST['sellPrice'] . "," . $_POST['purchasePrice'] . "," . $_POST['imageURL'];
    }

    if (isset($_POST['delete'])) {
        //include "../../phpExecutor.php";
        deleteItemFromTable($_POST['table'], (int)$_POST['GUID']);
        header("Refresh:0");
        echo "<script>";
        echo "alert('GUID: " . (int)$_POST['GUID'] . " deleted from table (table: " . $_POST['table'] . ").')";
        echo "</script>";
    }
    ?>

    <div id="nav-placeholder"></div>
    <div class="pad">
        <div class="container">
            </br>
            <h2>Vegetable Table</h2>
            <div class="vegetables">
                <?php
                $veg_tbl = getTable('Vegetables');
                echo '</br>';
                echo '<table id="Vegetables" class="table table-striped" style="margin-bottom: 10px;"><thead><tr><th>GUID</th><th>productName</th><th>stockAmount</th><th>sellPrice</th><th></th></tr></thead>';
                foreach ($veg_tbl as $row) {
                    echo '<form method="post">';
                    echo '<tr id="' . $row[0] . '">
                        <input type="hidden" name="table" value="Vegetables">
                        <input type="hidden" name="GUID" value="' . $row[0] . '">
                        <input type="hidden" name="productName" value="' . $row[1] . '">
                        <input type="hidden" name="stockAmount" value="' . $row[2] . '">
                        <input type="hidden" name="sellPrice" value="' . $row[3] . '">
                        <input type="hidden" name="purchasePrice" value="' . $row[4] . '">
                        <input type="hidden" name="imageURL" value="' . $row[5] . '">
                        <td>' . $row[0] . '</td>
                        <td>' . $row[1] . '</td>
                        <td>' . $row[2] . '</td>
                        <td>' . $row[3] . '</td>
                        <td>
                            <input class="btn btn-primary" type="submit" name="edit" value="Edit"/>                
                            <input class="btn btn-danger" type="submit" name="delete" value="Delete"/>
                        </td>
                    </tr>';
                    echo '</form>';
                }
                echo "</table>";
                echo '</br>';
                ?>
            </div>
        </div>


        <div class="container">
            </br>
            <h2>Fruit Table</h2>
            </br>
            <div class="fruit">
                <?php
                // need to fix - getTable('Vegetables') -> getTable('Fruit');
                $fruit_tbl = getTable('Fruits');
                echo '<table id="Fruits" class="table table-striped" style="margin-bottom: 10px;"><thead><tr><th>GUID</th><th>productName</th><th>stockAmount</th><th>sellPrice</th><th></th></tr></thead>';
                foreach ($fruit_tbl as $row) {
                    echo '<form method="post">';
                    echo '<tr id="' . $row[0] . '">
                        <input type="hidden" name="table" value="Fruits">
                        <input type="hidden" name="GUID" value="' . $row[0] . '">
                        <input type="hidden" name="productName" value="' . $row[1] . '">
                        <input type="hidden" name="stockAmount" value="' . $row[2] . '">
                        <input type="hidden" name="sellPrice" value="' . $row[3] . '">
                        <input type="hidden" name="purchasePrice" value="' . $row[4] . '">
                        <input type="hidden" name="imageURL" value="' . $row[5] . '">
                        <td>' . $row[0] . '</td>
                        <td>' . $row[1] . '</td>
                        <td>' . $row[2] . '</td>
                        <td>' . $row[3] . '</td>
                        <td>
                            <input class="btn btn-primary" type="submit" name="edit" value="Edit""/>                
                            <input class="btn btn-danger" type="submit" name="delete" value="Delete"/>
                        </td>
                    </tr>';
                    echo '</form>';
                }
                //echo "</table>";
                //echo '</br>';
                ?>
                </table>
                </br>
            </div>
        </div>
    </div>
    </br>
    <div class="container">
        <form name='addForm' action='' method='post'>
            <input class="btn btn-primary" type="submit" name="row" value="Add New Item""/> 
        </form>
    </div>

    </br>
    <div id=" footer-placeholder">
    </div>
</body>

</html>