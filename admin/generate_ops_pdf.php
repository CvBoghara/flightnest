<?php
require '../helpers/init_conn_db.php';

if (isset($_GET['flight_id'])) {
    $flight_id = $_GET['flight_id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Airline Operations Report</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            margin-top: 20px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Airline Operations Report for Flight No <?php echo $flight_id; ?></h1>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Baggage Revenue</th>
                    <th>Passenger Revenue</th>
                    <th>Flight Cost</th>
                    <th>Food Cost</th>
                    <th>Fuel Cost</th>
                    <th>Cancellation Loss</th>
                    <th>Technical Cost</th>
                    <th>Total Revenue</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM airline_operations WHERE flight_id = ?";
                $stmt = mysqli_stmt_init($conn);
                mysqli_stmt_prepare($stmt, $sql);
                mysqli_stmt_bind_param($stmt, "i", $flight_id);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                while ($row = mysqli_fetch_assoc($result)) {
                    $total_revenue = $row['baggage_revenue'] + $row['passenger_revenue'] - $row['flight_cost'] - $row['food_cost'] - $row['fuel_cost'] - $row['cancellation_ticket_loss'] - $row['technical_issues_cost'];
                    echo "<tr>
                            <td>{$row['operation_id']}</td>
                            <td>{$row['baggage_revenue']}</td>
                            <td>{$row['passenger_revenue']}</td>
                            <td>{$row['flight_cost']}</td>
                            <td>{$row['food_cost']}</td>
                            <td>{$row['fuel_cost']}</td>
                            <td>{$row['cancellation_ticket_loss']}</td>
                            <td>{$row['technical_issues_cost']}</td>
                            <td>{$total_revenue}</td>
                        </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <script>
        window.print();
    </script>
</body>
</html>
<?php
}
?>
