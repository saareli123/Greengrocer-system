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

    <!-- css -->
    <link rel="stylesheet" href="insights.css">

    <!-- js -->
    <script src="insights.js"></script>
    <script>
        $(function() {
            $("#nav-placeholder").load("../components/navbar/navbar.html");
            // $("#login-placeholder").load("../components/login/login.html");
            $("#footer-placeholder").load("../components/footer/footer.html");
        });
    </script>

    <style>
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

<body>
    <div id="nav-placeholder"></div>

    <div class="container pad">
        </br>
        <h2>Total Profit per Product</h2>
        <?php
        include "../../phpExecutor.php";
        $ProfitInsights = getProfitInsights();
        echo '</br>';
        echo '<table id="" class="table table-striped" style="margin-bottom: 10px;"><thead><tr><th>GUID</th><th>productName</th><th>Total Profit</th></tr></thead>';
        foreach ($ProfitInsights as $row) {
            echo '<form method="post">';
            echo '<tr">
                        <td>' . $row[1] . '</td>
                        <td>' . $row[0] . '</td>
                        <td>' . number_format($row[3], 2) . '$</td>
                    </tr>';
            echo '</form>';
        }
        echo "</table>";
        echo '</br>';
        ?>

        </br>
        <h2>Total Sells & KG per Product</h2>
        <?php
        $ProfitInsights = getSellsInsights();
        echo '</br>';
        echo '<table id="" class="table table-striped" style="margin-bottom: 10px;"><thead><tr><th>GUID</th><th>productName</th><th>Total Number of Sells</th><th>Total KG sold</th></tr></thead>';
        foreach ($ProfitInsights as $row) {
            echo '<form method="post">';
            echo '<tr">
                        <td>' . $row[1] . '</td>
                        <td>' . $row[0] . '</td>
                        <td>' . $row[3] . '</td>
                        <td>' . number_format($row[4], 2) . '</td>
                    </tr>';
            echo '</form>';
        }
        echo "</table>";
        echo '</br>';
        ?>

        </br>
        <h2>Unsold Products</h2>
        <?php
        $ProfitInsights = getUnsoldInsights();
        echo '</br>';
        echo '<table id="" class="table table-striped" style="margin-bottom: 10px;"><thead><tr><th>GUID</th><th>productName</th><th>Stock Amount</th></tr></thead>';
        foreach ($ProfitInsights as $row) {
            echo '<form method="post">';
            echo '<tr">
                        <td>' . $row[0] . '</td>
                        <td>' . $row[1] . '</td>
                        <td>' . $row[2] . '</td>
                    </tr>';
            echo '</form>';
        }
        echo "</table>";
        echo '</br>';
        ?>

    </div>
    <div id="footer-placeholder"></div>
</body>

</html>