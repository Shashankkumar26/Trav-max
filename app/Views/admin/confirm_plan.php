<?php
$package = $package_data[0];
?>
<div class="row" id="wrapper">
    <div id="content_box">
        <p class="text_1">
            <span>You've selected</span>
            <span class="heading_1"><?php echo $package["name"]; ?></span><br>
            <span>7 Nights 3 Days</span>
            <br>
            <br>
            <span>The Plan you have selected is <span class="heading_1"><?php echo $_GET["plan"]; ?></span></span>
            <br>
            <br>
            <span>You need to make a payment of <span class="heading_1">Rs <?php echo $payment_amount; ?></span></span>
        </p>
        <br>
    </div>
    <?php
    helper('form');
    $user = $profile[0];
    $attributes = array('class' => 'form');
    echo form_open_multipart(base_url('admin/confirm_plan'), $attributes);
    ?>
    <input type="hidden" name="package_id" value="<?= $package['id']; ?>">
    <input type="hidden" name="payment_type" value="<?php echo $_GET["plan"]; ?>">
    <div class="text-center">
        <button class="primary_btn my-3" id="book_package_btn" type="submit">Confirm</button>
        <a href="/admin/select_plan?package=<?php echo $_GET["package"]; ?>" class="primary_btn">Change Plan</a>
    </div>
    <?= form_close(); ?>

</div>