<?php
$user = $profile[0];
$full_name = $user['f_name'] . " " . $user['l_name'];
?>
<div class="modal fade" id="start_journey_popup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center p-0">
                <!-- <h2 class="modal-title" id="exampleModalLabel">Hi <?php echo $full_name; ?></h2> -->
                <!-- <h3>Start your travel journey now.</h3>
                <h4>Please select a tour package and a payment plan to continue.</h4> -->
                <img src="/images/select_package_popup.jpg" class="img-fluid" alt="">
            </div>
            <div class="modal-footer text-center" style="background-color: #54578e;">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Continue</button>
            </div>
        </div>
    </div>
</div>
<div class="row d-flex align-items-center justify-content-center flex-wrap" id="select_package_section">
    <h1 class="text-center">Please select a package from the following and continue.</h1>
    <?php foreach ($all_packages as $package) { ?>
        <div class="col-md-4 d-flex justify-content-center p-3">
            <div class="package_card">
                <a href="/admin/package?package=<?php echo $package['id']; ?>">
                    <img class="img-fluid select_package_id" src="/images/<?php echo $package['name']; ?>.jpg" alt="" title="<?php echo $package['id']; ?>">
                </a>
                <input type="hidden" name="package_information" class="package_information" value='<?php echo json_encode($package); ?>'>
                <p class="package_title"><?php echo $package['name']; ?></p>
                <a href="/terms_of_use">Terms And Conditions</a>
            </div>
        </div>
    <?php } ?>
</div>