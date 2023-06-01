<?php
$package = $package_data[0];
$amount_with_tax = $package["total"] + ($package["total"] * 0.05) + ($package["total"] * 0.05);
?>
<div class="row" id="wrapper">
    <div id="content_box">
        <p>
            <span class="heading_1"><?php echo $package["name"]; ?></span><br>
            <span id="package_locations">Singapore, Malaysia</span>
            <br>
            <span id="package_days">7 Nights 3 Days</span>
        </p>
        <br>
        <p>
            <span class="text_2 text-center">Price: Rs. <?php echo $package["total"]; ?></span>
            <span class="price_below_info">+ GST 5% and TCS 5%</span>
        </p>
        <p>
            <span class="text_2 text-center">Price: Rs. <?php echo $amount_with_tax; ?></span>
            <span class="price_below_info">Inclusive of TAX and TCS</span>
        </p>
        <br>
    </div>
    <p id="package_inclusions">
        Inclusions: Ex Delhi <br>
        Flight, Hotels, Transfers, Breakfast, Sightseeing
    </p>
    <a id="package_terms" href="/terms_of_use" class="text-center">Terms & Conditions</as>
    <a href="/admin/select_plan?package=<?php echo $_GET["package"]; ?>" class="primary_btn">Continue</a>
    <a href="/admin/select_package" class="secondary_btn">Back</a>
</div>