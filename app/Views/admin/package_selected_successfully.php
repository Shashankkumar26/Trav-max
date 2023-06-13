<div class="row d-flex justify-content-center flex-wrap">
    <h1 class="text-center">Congratulations</h1>
    <h2 class="text-center">You have selected <?php echo $package_data[0]['name']; ?>Package for Rs. <?php echo $package_data[0]['total']; ?> <?php if ($booking_packages_number > 1) {echo 'per person for ' . $booking_packages_number . ' persons';} ?> and have taken the <?php echo $package_information[0]['payment_type']; ?>. Please make a payment of Rs. <?php echo $payment_amount * $booking_packages_number . '(' . $payment_amount . '*' . $booking_packages_number . ')'; ?> and share the proof with us</h2>
    <div class="col-md-6 p-5 border-end text-center">
        <h2 class="">QR Code</h2>
        <img src="/images/travmax_qr.jpeg" alt="" width="300px" style="background-color: grey;">
    </div>
    <div class="col-md-6 p-5 text-center">
        <h2>Bank Information</h2>
        <br>
        <h5>Travmax Holidays (Current Account)</h5>
        <h5>Account No: 2221238344613985</h5>
        <h5>Bank Name: AU Small Finance Bank</h5>
        <h5>IFSC: AUBL0002383</h5>
        <h5>Branch: Sector 8, Chandigarh</h5>
    </div>
    <div class="d-flex flex-column flex-md-row justify-content-center gap-2 my-3">
        <a class="btn btn-primary" href="/admin">Dashboard</a>
        <a class="btn btn-primary" href="/admin/request-fund">Upload Proof</a>
        <a class="btn btn-success" href="https://wa.me/9216003333"><i class="bi-whatsapp me-2"></i>WhatsApp</a>
    </div>
</div>