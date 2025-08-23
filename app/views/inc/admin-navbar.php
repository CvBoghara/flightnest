<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="<?php echo URLROOT; ?>/admin">Admin</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="<?php echo URLROOT; ?>/admin/flights">Flights</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo URLROOT; ?>/admin/airlines">Airlines</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo URLROOT; ?>/admin/routes">Routes</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <?php if(isset($_SESSION['admin_id'])) : ?>
                <li class="nav-item">
                    <a class="nav-link" href="#">Welcome <?php echo $_SESSION['admin_username']; ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URLROOT; ?>/admin/logout">Logout</a>
                </li>
            <?php else : ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URLROOT; ?>/admin/login">Login</a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>
