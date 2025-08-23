<?php include_once 'header.php';
require '../helpers/init_conn_db.php';?>

<main>
    <div class="container mt-5">
        <h1>Manifest Viewer</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">View Flight Manifest</h5>
                <form action="manifest_viewer.php" method="post">
                    <div class="form-row">
                        <div class="col">
                            <input type="number" class="form-control" name="flight_id" placeholder="Flight ID">
                        </div>
                        <div class="col">
                            <button type="submit" name="manifest_but" class="btn btn-primary">View Manifest</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <?php
        if(isset($_POST['manifest_but'])) {
            $flight_id = $_POST['flight_id'];
            $sql = "SELECT p.f_name, p.l_name, t.seat_no FROM passenger_profile p JOIN ticket t ON p.passenger_id = t.passenger_id WHERE t.flight_id = ?";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt, $sql)) {
                echo '<div class="alert alert-danger mt-4" role="alert">SQL Error</div>';
            } else {
                mysqli_stmt_bind_param($stmt, "i", $flight_id);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
        ?>
        <div class="card mt-4">
            <div class="card-body">
                <h5 class="card-title">Flight Manifest for Flight No <?php echo $flight_id; ?></h5>
                <table class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Seat No</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '
                            <tr>
                                <td>'.$row['f_name'].'</td>
                                <td>'.$row['l_name'].'</td>
                                <td>'.$row['seat_no'].'</td>
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
        }
        ?>
    </div>
</main>

<?php include_once 'footer.php'; ?>
