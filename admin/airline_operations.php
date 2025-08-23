<?php include_once 'header.php';
require '../helpers/init_conn_db.php';?>

<main>
    <div class="container mt-5">
        <h1>Airline Operations</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Select Flight</h5>
                <form action="airline_operations.php" method="post">
                    <div class="form-row">
                        <div class="col">
                            <input type="number" class="form-control" name="flight_id" placeholder="Flight ID">
                        </div>
                        <div class="col">
                            <button type="submit" name="flight_op_but" class="btn btn-primary">View Operations</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php
        if(isset($_GET['edit'])) {
            $operation_id = $_GET['edit'];
            $flight_id = $_GET['flight_id'];
            $sql = "SELECT * FROM airline_operations WHERE operation_id = ?";
            $stmt = mysqli_stmt_init($conn);
            mysqli_stmt_prepare($stmt,$sql);
            mysqli_stmt_bind_param($stmt, "i", $operation_id);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="card mt-4">
                <div class="card-body">
                    <h5 class="card-title">Edit Operation No <?php echo $operation_id; ?> for Flight No <?php echo $flight_id; ?></h5>
                    <form action="../includes/admin/operation.inc.php" method="post">
                        <input type="hidden" name="flight_id" value="<?php echo $flight_id; ?>">
                        <input type="hidden" name="operation_id" value="<?php echo $operation_id; ?>">
                        <div class="form-row">
                        <div class="col">
                            <input type="number" class="form-control" name="baggage_revenue" placeholder="Baggage Revenue" value="<?php echo $row['baggage_revenue']; ?>" required>
                        </div>
                        <div class="col">
                            <input type="number" class="form-control" name="passenger_revenue" placeholder="Passenger Revenue" value="<?php echo $row['passenger_revenue']; ?>" required>
                        </div>
                        <div class="col">
                            <input type="number" class="form-control" name="flight_cost" placeholder="Flight Cost" value="<?php echo $row['flight_cost']; ?>" required>
                        </div>
                        <div class="col">
                            <input type="number" class="form-control" name="food_cost" placeholder="Food Cost" value="<?php echo $row['food_cost'] ?? 0; ?>" required>
                        </div>
                        <div class="col">
                            <input type="number" class="form-control" name="fuel_cost" placeholder="Fuel Cost" value="<?php echo $row['fuel_cost'] ?? 0; ?>" required>
                        </div>
                        <div class="col">
                            <input type="number" class="form-control" name="cancellation_ticket_loss" placeholder="Cancellation Ticket Loss" value="<?php echo $row['cancellation_ticket_loss'] ?? 0; ?>" required>
                        </div>
                        <div class="col">
                            <input type="number" class="form-control" name="technical_issues_cost" placeholder="Technical Issues Cost" value="<?php echo $row['technical_issues_cost'] ?? 0; ?>" required>
                        </div>
                            <div class="col">
                                <button type="submit" name="edit_op_but" class="btn btn-primary">Update Operation</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <?php
            }
        } else if(isset($_POST['flight_op_but'])) {
            $flight_id = $_POST['flight_id'];
        ?>
        <div class="card mt-4">
            <div class="card-body">
                <h5 class="card-title">Add New Operation for Flight No <?php echo $flight_id; ?></h5>
                <form action="../includes/admin/operation.inc.php" method="post">
                    <input type="hidden" name="flight_id" value="<?php echo $flight_id; ?>">
                    <div class="form-row">
                        <div class="col">
                            <input type="number" class="form-control" name="passenger_revenue" placeholder="Passenger Revenue" required>
                        </div>
                        <div class="col">
                            <input type="number" class="form-control" name="baggage_revenue" placeholder="Baggage Revenue" required>
                        </div>
                        <div class="col">
                            <input type="number" class="form-control" name="flight_cost" placeholder="Flight Cost" required>
                        </div>
                        <div class="col">
                            <input type="number" class="form-control" name="food_cost" placeholder="Food Cost" required>
                        </div>
                        <div class="col">
                            <input type="number" class="form-control" name="fuel_cost" placeholder="Fuel Cost" required>
                        </div>
                        <div class="col">
                            <input type="number" class="form-control" name="cancellation_ticket_loss" placeholder="Cancellation Ticket Loss" required>
                        </div>
                        <div class="col">
                            <input type="number" class="form-control" name="technical_issues_cost" placeholder="Technical Issues Cost" required>
                        </div>
                        <div class="col">
                            <button type="submit" name="op_but" class="btn btn-primary">Add Operation</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-body">
                <h5 class="card-title">Existing Operations for Flight No <?php echo $flight_id; ?></h5>
                <a href="generate_ops_pdf.php?flight_id=<?php echo $flight_id; ?>" class="btn btn-secondary mb-3">Download as PDF</a>
                <table class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Baggage Revenue</th>
                            <th scope="col">Passenger Revenue</th>
                            <th scope="col">Flight Cost</th>
                            <th scope="col">Food Cost</th>
                            <th scope="col">Fuel Cost</th>
                            <th scope="col">Cancellation Loss</th>
                            <th scope="col">Technical Cost</th>
                            <th scope="col">Total Revenue</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM airline_operations WHERE flight_id = ?";
                        $stmt = mysqli_stmt_init($conn);
                        mysqli_stmt_prepare($stmt,$sql);
                        mysqli_stmt_bind_param($stmt, "i", $flight_id);
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);
                        while ($row = mysqli_fetch_assoc($result)) {
                            $food_cost = $row['food_cost'] ?? 0;
                            $fuel_cost = $row['fuel_cost'] ?? 0;
                            $cancellation_ticket_loss = $row['cancellation_ticket_loss'] ?? 0;
                            $technical_issues_cost = $row['technical_issues_cost'] ?? 0;
                            $total_revenue = $row['baggage_revenue'] + $row['passenger_revenue'] - $row['flight_cost'] - $food_cost - $fuel_cost - $cancellation_ticket_loss - $technical_issues_cost;
                            echo '
                            <tr>
                                <th scope="row">'.$row['operation_id'].'</th>
                                <td>'.$row['baggage_revenue'].'</td>
                                <td>'.$row['passenger_revenue'].'</td>
                                <td>'.$row['flight_cost'].'</td>
                                <td>'.$food_cost.'</td>
                                <td>'.$fuel_cost.'</td>
                                <td>'.$cancellation_ticket_loss.'</td>
                                <td>'.$technical_issues_cost.'</td>
                                <td>'.$total_revenue.'</td>
                                <td>
                                    <a href="airline_operations.php?edit='.$row['operation_id'].'&flight_id='.$flight_id.'" class="btn btn-sm btn-primary">Edit</a>
                                    <a href="../includes/admin/operation.inc.php?delete='.$row['operation_id'].'&flight_id='.$flight_id.'" class="btn btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>
                            ';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php
        }
        ?>
    </div>
</main>

<?php include_once 'footer.php'; ?>
