<?php if (isset($_SESSION['success'])){?>
    <div class="alert alert-success d-inline mx-auto rounded-pill">
        <h6><?php echo $_SESSION['success'];?></h6>
        <?php unset($_SESSION['success']);?>
    </div>
<?php }?>
<?php if (isset($_SESSION['warning'])){?>
    <div class="alert alert-warning d-inline mx-auto rounded-pill">
        <h6><?php echo $_SESSION['warning'];?></h6>
        <?php unset($_SESSION['warning']);?>
    </div>
<?php }?>
<?php if (isset($_SESSION['error'])){?>
    <div class="alert alert-danger d-inline mx-auto rounded-pill">
        <h6><?php echo $_SESSION['error'];?></h6>
        <?php unset($_SESSION['error']);?>
    </div>
<?php }?>