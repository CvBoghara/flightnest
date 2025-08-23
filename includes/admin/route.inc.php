<?php
if(isset($_POST['route_but'])) {
    require '../../helpers/init_conn_db.php';
    $source = $_POST['source'];
    $destination = $_POST['destination'];
    $sql = "INSERT INTO routes (source, destination) VALUES (?, ?)";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../../admin/route_management.php?error=sqlerror");
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "ss", $source, $destination);
        mysqli_stmt_execute($stmt);
        header("Location: ../../admin/route_management.php?success=routeadded");
        exit();
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else if(isset($_POST['edit_route_but'])) {
    require '../../helpers/init_conn_db.php';
    $route_id = $_POST['route_id'];
    $source = $_POST['source'];
    $destination = $_POST['destination'];
    $sql = "UPDATE routes SET source = ?, destination = ? WHERE route_id = ?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../../admin/route_management.php?error=sqlerror");
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "ssi", $source, $destination, $route_id);
        mysqli_stmt_execute($stmt);
        header("Location: ../../admin/route_management.php?success=routeupdated");
        exit();
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else if(isset($_GET['delete'])) {
    require '../../helpers/init_conn_db.php';
    $route_id = $_GET['delete'];
    $sql = "DELETE FROM routes WHERE route_id = ?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../../admin/route_management.php?error=sqlerror");
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "i", $route_id);
        mysqli_stmt_execute($stmt);
        header("Location: ../../admin/route_management.php?success=routedeleted");
        exit();
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    header("Location: ../../admin/route_management.php");
    exit();
}
?>
