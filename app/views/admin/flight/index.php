<?php include_once APPROOT . '/views/inc/admin-header.php'; ?>
<div class="container">
    <h1>Flights</h1>
    <a href="<?php echo URLROOT; ?>/flight/add" class="btn btn-primary">Add Flight</a>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Flight Code</th>
                <th>Airline</th>
                <th>Source</th>
                <th>Destination</th>
                <th>Departure</th>
                <th>Arrival</th>
                <th>Seats</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($data['flights'] as $flight) : ?>
                <tr>
                    <td><?php echo $flight->flight_code; ?></td>
                    <td><?php echo $flight->airline; ?></td>
                    <td><?php echo $flight->source; ?></td>
                    <td><?php echo $flight->Destination; ?></td>
                    <td><?php echo $flight->departure; ?></td>
                    <td><?php echo $flight->arrivale; ?></td>
                    <td><?php echo $flight->Seats; ?></td>
                    <td><?php echo $flight->Price; ?></td>
                    <td>
                        <a href="<?php echo URLROOT; ?>/flight/edit/<?php echo $flight->flight_id; ?>" class="btn btn-secondary">Edit</a>
                        <a href="<?php echo URLROOT; ?>/flight/delete/<?php echo $flight->flight_id; ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php include_once APPROOT . '/views/inc/admin-footer.php'; ?>
