<?php
if (isset($_POST['city_but'])) {
    require '../../helpers/init_conn_db.php'; 

    $city = trim($_POST['city']);

    if (empty($city)) {
        header('Location: ../../admin/index.php?error=emptycity');
        exit();
    }

    $sql = 'INSERT INTO cities (city) VALUES (?)';
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header('Location: ../../admin/index.php?error=sqlerror');
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, 's', $city);
        if (!mysqli_stmt_execute($stmt)) {
            // Check for duplicate entry error (error code 1062)
            if (mysqli_errno($conn) == 1062) {
                header('Location: ../../admin/index.php?error=cityexists');
            } else {
                header('Location: ../../admin/index.php?error=unknown');
            }
            exit();
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        header('Location: ../../admin/index.php?city=added');
        exit();
    }
} else {
    header('Location: ../../admin/index.php');
    exit();
}