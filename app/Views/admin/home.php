<div class="row gap-5 mb-5">
    <div class="col-md-5 py-4 px-0">
        <div class="row mx-0 mx-md-auto mb-md-2">
            <div class="col-md-auto border-end" id="hero_total_sales">
                <span class="big_number"><?php echo $total_sales; ?></span>
                <span class="big_number_title">Total Sales</span>
            </div>
            <div class="col" id="hero_total_income">
                <span class="big_number">₹ <?php echo $total_income; ?></span>
                <span class="big_number_title">Total Income</span>
            </div>
        </div>
        <hr>
        <div class="row container align-items-center mt-md-2">
            <div class="col">
                <span id="total_partners_number"><i class="bi-people-fill me-2"></i><?php echo $total_partners; ?></span>
            </div>
            <div class="col text-end">
                <a href="/admin/DistributorLevelInformation" class="my_partners_hero_link">MY PARTNERS<i class="bi-arrow-right-circle-fill ms-2"></i></a>
            </div>
        </div>
    </div>
    <div class="col-md">
        <div class="row mb-4 gradient_parent">
            <div class="col text-center py-4">
                <h3>TRAVMONEY</h3>
                <span class="box_number_data"><?php echo $travmoney; ?></span>
            </div>
            <div class="col text-center py-4">
                <h3>TRAVPROFIT</h3>
                <span class="box_number_data"><?php echo $travprofit; ?></span>
            </div>
        </div>
        <div class="row gradient_parent">
            <div class="col text-center py-4">
                <h3>MY SALES</h3>
                <span class="box_number_data"><?php echo $my_sales; ?></span>
            </div>
            <div class="col text-center py-4">
                <h3>TEAM SALES</h3>
                <span class="box_number_data"><?php echo $team_sales; ?></span>
            </div>
        </div>
    </div>
</div>
<div class="row gap-5">
    <div class="col-md-5 grey_bg px-4 py-4">
        <p class="text_1">My Package</p>
        <hr>
        <div class="box_content">
            <p class="text_2">Name: <span><?php echo $package_data[0]['name']; ?></p>
            <p class="text_2">Price: <span>₹ <?php echo $package_data[0]['mrp']; ?></p>
            <p class="text_2">Offered Price: <span>₹ <?php echo $package_data[0]['total']; ?></p>
            <p class="text_2">Payment Plan: <span><?php echo $package_information[0]['payment_type']; ?></p>
            <p class="text_2">Amount Paid: <span>₹ <?php echo $amount_paid; ?></p>
            <p class="text_2">Amount Remaining: <span>₹ <?php echo $amount_remaining; ?></p>
            <p class="text_2">Installments: <span><?php echo $installments_paid . '/' . $installments_total; ?></p>
        </div>
    </div>
    <div class="col-md grey_bg px-4 py-4">
        <p class="text_1">My Income</p>
        <hr>
        <div class="box_content">
            <p class="text_3">Total: <span>₹ <?php echo $total_income; ?></p>
            <p class="text_3">Pending: <span>₹ <?php echo $pending_income; ?></p>
            <p class="text_3">Approved: <span>₹ <?php echo $approved_income; ?></p>
            <p class="text_3">Redemmed: <span>₹ <?php echo $redeemed_income; ?></p>
            <p class="text_3">Active: <span>₹ <?php echo $active_income; ?></p>
            <p class="text_3">Team: <span>₹ <?php echo $team_income; ?></p>
        </div>
    </div>
</div>