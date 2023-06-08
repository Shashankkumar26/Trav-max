<style>
    .plan_box{
        max-width: 360px;
    }
</style>
<div class="row" id="pick_a_plan_section">
    <h1 class="text-center my-5">You have selected <span id="pick_a_plan_selected_package_name"><?php echo $package_data[0]["name"]; ?></span> package. Please select a payment plan.</h1>
    <div class="card-group text-center justify-content-center">
        <div class="card plan_box" id="travnow_plan">
            <div class="card-body">
                <h5 class="card-title">trav<span style="color: #ea664f;">now</h5>
                <p>Travel Now</p>
                <p>Pay in Full</p>
                <p>Get Franchise</p>
                <p>Earn Free Holidays</p>
            </div>
            <div class="card-footer">
                <?php if ($booking_packages_number == 1) {
                    echo '<h2>₹<span id="travnow_price">' . $package_data[0]['total'] . '</span></h2>';
                } else {
                    echo '<h2>₹<span id="travnow_price">' . $package_data[0]['total'] . ' * ' . $booking_packages_number . '</span></h2>';
                } ?>
            </div>
        </div>
        <div class="card plan_box" id="travlater_plan">
            <div class="card-body">
                <h5 class="card-title">trav<span style="color: #ca3813;">later</h5>
                <p>Book Now</p>
                <p>Pay booking amount</p>
                <p>Pay the rest in 90 Days</p>
                <p>Get Franchise</p>
                <p>Earn Free Holidays</p>
            </div>
            <div class="card-footer">
                <?php if ($booking_packages_number == 1) {
                    echo '<h2 id="travlater_price">₹11000</h2>';
                } else {
                    echo '<h2 id="travlater_price">₹11000 * ' . $booking_packages_number . '</h2>';
                } ?>
                
            </div>
        </div>
        <!-- <div class="card plan_box" id="traveasy_plan">
            <div class="card-body">
                <h5 class="card-title">trav<span style="color: #97030f;">easy</span></h5>
                <p>Book Now</p>
                <p>Pay in Installments</p>
                <p>Pay down payment</p>
                <p>Rest in Installments</p>
                <p>Get Franchise</p>
                <p>Earn Free Holidays</p>
            </div>
            <div class="card-footer">
                <h2 id="traveasy_price">Rs.6600</h2>
            </div>
        </div> -->
    </div>
    <div class="w-100 mt-5 text-center">
        <a disabled href="/admin/confirm_plan?package=<?php echo $_GET["package"]; ?>&plan=" id="confirm_btn" class="primary_btn">Continue</a>
        <a href="/admin/package?package=<?php echo $_GET["package"]; ?>" class="secondary_btn">Back</a>
    </div>
    <?php
    helper('form');
    $user = $profile[0];
    $attributes = ['class' => 'form'];
    echo form_open_multipart(base_url('admin/select_package'), $attributes);
    ?>
    <input type="hidden" name="package_id" value="<?= $package_data[0]['id'] ?>">
    <input type="hidden" name="payment_type">
    <!-- <button class="btn btn-lg btn-primary my-3" id="book_package_btn" type="submit" disabled>Book</button> -->
    <?= form_close() ?>

</div>