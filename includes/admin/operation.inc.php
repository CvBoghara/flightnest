<?php
if(isset($_POST['op_but'])) {
    require '../../helpers/init_conn_db.php';
    $flight_id = $_POST['flight_id'];
    $baggage_revenue = $_POST['baggage_revenue'];
    $passenger_revenue = $_POST['passenger_revenue'];
    $flight_cost = $_POST['flight_cost'];
    $food_cost = $_POST['food_cost'];
    $fuel_cost = $_POST['fuel_cost'];
    $cancellation_ticket_loss = $_POST['cancellation_ticket_loss'];
    $technical_issues_cost = $_POST['technical_issues_cost'];
    $sql = "INSERT INTO airline_operations (flight_id, baggage_revenue, passenger_revenue, flight_cost, food_cost, fuel_cost, cancellation_ticket_loss, technical_issues_cost) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../../admin/airline_operations.php?error=sqlerror");
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "iiiiiiii", $flight_id, $baggage_revenue, $passenger_revenue, $flight_cost, $food_cost, $fuel_cost, $cancellation_ticket_loss, $technical_issues_cost);
        mysqli_stmt_execute($stmt);
        header("Location: ../../admin/airline_operations.php?success=opadded&flight_id=".$flight_id);
        exit();
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else if(isset($_POST['edit_op_but'])) {
    require '../../helpers/init_conn_db.php';
    $flight_id = $_POST['flight_id'];
    $operation_id = $_POST['operation_id'];
    $baggage_revenue = $_POST['baggage_revenue'];
    $passenger_revenue = $_POST['passenger_revenue'];
    $flight_cost = $_POST['flight_cost'];
    $food_cost = $_POST['food_cost'];
    $fuel_cost = $_POST['fuel_cost'];
    $cancellation_ticket_loss = $_POST['cancellation_ticket_loss'];
    $technical_issues_cost = $_POST['technical_issues_cost'];
    $sql = "UPDATE airline_operations SET baggage_revenue = ?, passenger_revenue = ?, flight_cost = ?, food_cost = ?, fuel_cost = ?, cancellation_ticket_loss = ?, technical_issues_cost = ? WHERE operation_id = ?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../../admin/airline_operations.php?error=sqlerror&flight_id=".$flight_id);
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "iiiiiiii", $baggage_revenue, $passenger_revenue, $flight_cost, $food_cost, $fuel_cost, $cancellation_ticket_loss, $technical_issues_cost, $operation_id);
        mysqli_stmt_execute($stmt);
        header("Location: ../../admin/airline_operations.php?success=opupdated&flight_id=".$flight_id);
        exit();
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else if(isset($_GET['delete'])) {
    require '../../helpers/init_conn_db.php';
    $operation_id = $_GET['delete'];
    $flight_id = $_GET['flight_id'];
    $sql = "DELETE FROM airline_operations WHERE operation_id = ?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../../admin/airline_operations.php?error=sqlerror&flight_id=".$flight_id);
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "i", $operation_id);
        mysqli_stmt_execute($stmt);
        header("Location: ../../admin/airline_operations.php?success=opdeleted&flight_id=".$flight_id);
        exit();
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    header("Location: ../../admin/airline_operations.php");
    exit();
}
?>
