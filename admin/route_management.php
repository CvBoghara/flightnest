<?php include_once 'header.php'; 
require '../helpers/init_conn_db.php';?>

<main>
    <div class="container mt-5">
        <h1>Route Management</h1>
        <?php
        if (isset($_GET['edit'])) {
            $route_id = $_GET['edit'];
            $sql = "SELECT * FROM routes WHERE route_id = ?";
            $stmt = mysqli_stmt_init($conn);
            mysqli_stmt_prepare($stmt, $sql);
            mysqli_stmt_bind_param($stmt, "i", $route_id);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) {
        ?>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Edit Route</h5>
                <form action="../includes/admin/route.inc.php" method="post">
                    <input type="hidden" name="route_id" value="<?php echo $row['route_id']; ?>">
                    <div class="form-row">
                        <div class="col">
                            <input type="text" class="form-control" name="source" placeholder="Source" value="<?php echo $row['source']; ?>">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" name="destination" placeholder="Destination" value="<?php echo $row['destination']; ?>">
                        </div>
                        <div class="col">
                            <button type="submit" name="edit_route_but" class="btn btn-primary">Update Route</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php
            }
        } else {
        ?>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Add New Route</h5>
                <form action="../includes/admin/route.inc.php" method="post">
                    <div class="form-row">
                        <div class="col">
                            <input type="text" class="form-control" name="source" placeholder="Source">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" name="destination" placeholder="Destination">
                        </div>
                        <div class="col">
                            <button type="submit" name="route_but" class="btn btn-primary">Add Route</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php
        }
        ?>

        <div class="card mt-4">
            <div class="card-body">
                <h5 class="card-title">Existing Routes</h5>
                <table class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Source</th>
                            <th scope="col">Destination</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM routes";
                        $stmt = mysqli_stmt_init($conn);
                        mysqli_stmt_prepare($stmt,$sql);
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '
                            <tr>
                                <th scope="row">'.$row['route_id'].'</th>
                                <td>'.$row['source'].'</td>
                                <td>'.$row['destination'].'</td>
                                <td>
                                    <a href="route_management.php?edit='.$row['route_id'].'" class="btn btn-sm btn-primary">Edit</a>
                                    <a href="../includes/admin/route.inc.php?delete='.$row['route_id'].'" class="btn btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>
                            ';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<?php include_once 'footer.php'; ?>
