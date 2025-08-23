<?php include_once APPROOT . '/views/inc/admin-header.php'; ?>
<div class="container">
    <h1>Edit Flight</h1>
    <form action="<?php echo URLROOT; ?>/flight/edit/<?php echo $data['id']; ?>" method="post">
        <div class="form-group">
            <label for="flight_code">Flight Code</label>
            <input type="text" name="flight_code" class="form-control <?php echo (!empty($data['flight_code_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['flight_code']; ?>">
            <span class="invalid-feedback"><?php echo $data['flight_code_err']; ?></span>
        </div>
        <div class="form-group">
            <label for="airline">Airline</label>
            <input type="text" name="airline" class="form-control <?php echo (!empty($data['airline_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['airline']; ?>">
            <span class="invalid-feedback"><?php echo $data['airline_err']; ?></span>
        </div>
        <div class="form-group">
            <label for="source">Source</label>
            <input type="text" name="source" class="form-control <?php echo (!empty($data['source_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['source']; ?>">
            <span class="invalid-feedback"><?php echo $data['source_err']; ?></span>
        </div>
        <div class="form-group">
            <label for="destination">Destination</label>
            <input type="text" name="destination" class="form-control <?php echo (!empty($data['destination_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['destination']; ?>">
            <span class="invalid-feedback"><?php echo $data['destination_err']; ?></span>
        </div>
        <div class="form-group">
            <label for="departure">Departure Time</label>
            <input type="text" name="departure" class="form-control <?php echo (!empty($data['departure_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['departure']; ?>">
            <span class="invalid-feedback"><?php echo $data['departure_err']; ?></span>
        </div>
        <div class="form-group">
            <label for="arrival">Arrival Time</label>
            <input type="text" name="arrival" class="form-control <?php echo (!empty($data['arrival_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['arrival']; ?>">
            <span class="invalid-feedback"><?php echo $data['arrival_err']; ?></span>
        </div>
        <div class="form-group">
            <label for="seats">Seats</label>
            <input type="number" name="seats" class="form-control <?php echo (!empty($data['seats_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['seats']; ?>">
            <span class="invalid-feedback"><?php echo $data['seats_err']; ?></span>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" name="price" class="form-control <?php echo (!empty($data['price_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['price']; ?>">
            <span class="invalid-feedback"><?php echo $data['price_err']; ?></span>
        </div>
        <input type="submit" value="Submit" class="btn btn-success">
    </form>
</div>
<?php include_once APPROOT . '/views/inc/admin-footer.php'; ?>
