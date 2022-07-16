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


    <script>
        $(function() {
            $("#nav-placeholder").load("../components/navbar/navbar.html");
            $("#footer-placeholder").load("../components/footer/footer.html");
        });

        function saveCart() {
            const vegetablesTable = document.getElementById("Vegetables");
            const fruitsTable = document.getElementById("Fruits");
            let tmpRow = [];
            const result = [];
            for (let i = 1, row; row = vegetablesTable.rows[i]; i++) {
                for (let j = 0, col; col = row.cells[j]; j++) {
                    const inputElement = col.querySelector('input');
                    if (inputElement !== null) {
                        const value = inputElement.value;
                        //console.log(value);
                        tmpRow.push(value);
                    } else {
                        //console.log(col.innerHTML);
                        tmpRow.push(col.innerHTML)
                    }
                }
                if (tmpRow[5] != 0) {
                    tmpRow.push("Vegetables");
                    result.push(tmpRow);
                }
                tmpRow = [];
            }
            for (let i = 1, row; row = fruitsTable.rows[i]; i++) {
                for (let j = 0, col; col = row.cells[j]; j++) {
                    const inputElement = col.querySelector('input');
                    if (inputElement !== null) {
                        const value = inputElement.value;
                        //console.log(value);
                        tmpRow.push(value);
                    } else {
                        //console.log(col.innerHTML);
                        tmpRow.push(col.innerHTML);
                    }
                }
                if (tmpRow[5] != 0) {
                    tmpRow.push("Fruits");
                    result.push(tmpRow);
                }
                tmpRow = [];
            }
            //console.log(result);
            localStorage.removeItem('tmpCart');
            localStorage.setItem('tmpCart', JSON.stringify(result));
        }
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

        .pad {
            padding-bottom: 5%;
        }

        @media (max-width:700px) {
            .pad {
                padding-bottom: 15%;
            }

        }
    </style>
</head>

<body style="padding-bottom: 15%;">
    <?php
    include "../../phpExecutor.php";
    ?>

    <div id="nav-placeholder"></div>
    <div class="pad">
        <div class="container">
            </br>
            <h2>Vegetables Table</h2>
            <div class="vegetables">
                <?php
                $veg_tbl = getTable('Vegetables');
                echo '</br>';
                echo '<table id="Vegetables" class="table table-striped" style="margin-bottom: 10px;"><thead><tr><th>GUID</th><th>productName</th><th>stockAmount</th><th>sellPrice</th><th>Selection</th></tr></thead>';
                foreach ($veg_tbl as $row) {
                    echo '<tr id="' . $row[0] . '">
                        <td>' . $row[0] . '</td>
                        <td>' . $row[1] . '</td>
                        <td>' . $row[2] . ' KG</td>
                        <td>' . $row[3] . '$</td>
                        <td hidden>' . $row[4] . '</td>
                        <td><input type="number" name="selection" step="0.1" min="0" max=' . $row[2] . ' value="0"></input></td>
                    </tr>';
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
                $fruit_tbl = getTable('Fruits');
                echo '<table id="Fruits" class="table table-striped" style="margin-bottom: 10px;"><thead><tr><th>GUID</th><th>productName</th><th>stockAmount</th><th>sellPrice</th><th>Selection</th></tr></thead>';
                foreach ($fruit_tbl as $row) {
                    echo '<tr id="' . $row[0] . '">
                        <td>' . $row[0] . '</td>
                        <td>' . $row[1] . '</td>
                        <td>' . $row[2] . ' KG</td>
                        <td>' . $row[3] . '$</td>
                        <td hidden>' . $row[4] . '</td>
                        <td><input type="number" name="selection" step="0.1" min="0" max=' . $row[2] . ' value="0"></input></td>
                    </tr>';
                }
                ?>
                </table>
                </br>
            </div>
        </div>
    </div>
    </br>
    <div class="container">
        <a href="../cart/cart.html"><button class="btn btn-primary" value="Continue To Cart" onClick="saveCart()">Continue To Cart</button></a>
    </div>

    </br>
    <div id="footer-placeholder"></div>
</body>

</html>