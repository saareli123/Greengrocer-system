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
        function updatePrice(select_id, price_id, sellPrice, stockAmount){
            //  Dont allow to sell stock that dosnt exsist!
            if(select_id.value > stockAmount) {
                price_id.innerHTML = stockAmount * sellPrice;
                select_id.value = stockAmount;
            } else {
                price_id.innerHTML = select_id.value * sellPrice;
            }

            var totalPrice = 0;
            var veg_rows = document.getElementById("tbl_veg").rows;
            //var fru_rows = document.getElementById("tbl_fru").rows;

            for (var i=1; i<veg_rows.length; i++)
            {
                totalPrice += parseFloat(veg_rows[i].cells[5].innerHTML);
            }
            // for (var i=1; i<fru_rows.length; i++)
            // {
            //     totalPrice += parseFloat(fru_rows[i].cells[5].innerHTML);
            // }

            document.getElementById("totalPrice").innerHTML = totalPrice;
        }
    </script>

    <style>
        .vegtabletable {
            max-height: 500px;
            overflow: scroll;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div id="nav-placeholder"></div>
    <div class="container-fluid vegtabletable">
    <?php 
        include "../../phpExecutor.php";
        $x = getTable('Vegetables');
        $price = "price_";
        $select = "select_";
        echo '<h2>vegtables table</h2><table id="tbl_veg" class="table table-striped" style="margin-bottom: 10px;"><thead><tr><th>GUID</th><th>productName</th><th>stockAmount</th><th>sellPrice</th><th>Select</th><th>Price</th></tr></thead>';
        foreach($x as $row){
        echo '<tr>
            <td>' . $row[0] . '</td>
            <td>' . $row[1] . '</td>
            <td>' . $row[2] . '</td>
            <td>' . $row[3] . '</td>
            <td><input id="'. $select . $row[0] .'" type="number" value="0" min="0" max="'. $row[2] .'" step="0.1" 
            onchange="updatePrice('. $select . $row[0] .', ' . $price . $row[0] .', '. $row[3] .', '. $row[2] .')"></td>
            <td id="price_'. $row[0] .'">0</td>
        </tr>';
        }
        echo "</table>";
     ?>
     </div>
    <div class="container-fluid">
        <h3>Total in ILS: <span id="totalPrice"></span></h3>
    </div>
    <div id="footer-placeholder"></div>
</body>

</html>