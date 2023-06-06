<?php 
$user = $profile[0]; 
?>
<div class="container">
<div class="content">
 <div class="content-container">
	 <div class="page-heading">
        <!--h2>Apply Contest</h2-->
      </div>
<?php
$productinfo = 'Order ID #'.$order_id;
$txnid = time();
$surl = base_url().$returnuri;
if($contst=='Installment'){$furl = base_url().$returnuri;}else{$furl = base_url().'vc_site_admin/profile/payment'; }
      
$key_id = RAZOR_KEY_ID;
$currency_code = 'INR';            
$total = ($order_amt * 100); 
$amount = $total;
$merchant_order_id = $order_id;
$card_holder_name = $oname;
$email = $email;
$phone = $phone;
$name = 'Travelmax';
$return_url = base_url().'vc_site_admin/profile/callback';
?>   
  <form name="razorpay-form" id="razorpay-form" action="<?php echo $return_url; ?>" method="POST">
  <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id" />
  <input type="hidden" name="merchant_order_id" id="merchant_order_id" value="<?php echo $merchant_order_id; ?>"/>
  <input type="hidden" name="merchant_trans_id" id="merchant_trans_id" value="<?php echo $txnid; ?>"/>
  <input type="hidden" name="merchant_product_info_id" id="merchant_product_info_id" value="<?php echo $productinfo; ?>"/>
  <input type="hidden" name="merchant_surl_id" id="merchant_surl_id" value="<?php echo $surl; ?>"/>
  <input type="hidden" name="merchant_furl_id" id="merchant_furl_id" value="<?php echo $furl; ?>"/>
  <input type="hidden" name="card_holder_name_id" id="card_holder_name_id" value="<?php echo $card_holder_name; ?>"/>
  <input type="hidden" name="merchant_total" id="merchant_total" value="<?php echo $total; ?>"/>
  <input type="hidden" name="merchant_amount" id="merchant_amount" value="<?php echo $amount; ?>"/>
  <input type="hidden" name="merchant_phone" id="merchant_phone" value="<?php echo $phone; ?>"/>
  <input type="hidden" name="merchant_email" id="merchant_email" value="<?php echo $email; ?>"/>
</form>
 <div class="row submit_butn">
        <div class="col-lg-12 text-center">
         
            <input  id="submit-pay" type="submit" onclick="razorpaySubmit(this);" value="Pay Now" class="btn btn-primary" />
            <a class="btn btn-primary" href="<?php echo base_url().$returnuri;?>">Cancel</a>
            <p>&nbsp;</p>
        </div>
    </div>
    <?php //echo '<pre>';print_r($_POST);echo '</pre>'; ?>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
  var razorpay_options = {
    key: "<?php echo $key_id; ?>",
    amount: "<?php echo $total; ?>",
    name: "<?php echo $name; ?>",
    description: "Order # <?php echo $merchant_order_id; ?>",
    netbanking: true,
    currency: "<?php echo $currency_code; ?>",
    prefill: {
      name:"<?php echo $card_holder_name; ?>",
      email: "<?php echo $email; ?>",
      contact: "<?php echo $phone; ?>"
    },
    notes: {
      soolegal_order_id: "<?php echo $merchant_order_id; ?>",
    },
    handler: function (transaction) {
        document.getElementById('razorpay_payment_id').value = transaction.razorpay_payment_id;
        document.getElementById('razorpay-form').submit();
    },
    "modal": {
        "ondismiss": function(){
            window.location.href="<?php echo base_url().$returnuri;?>";
        }
    }
  };
  var razorpay_submit_btn, razorpay_instance;
 
  function razorpaySubmit(el){
    if(typeof Razorpay == 'undefined'){
      setTimeout(razorpaySubmit, 200);
      if(!razorpay_submit_btn && el){
        razorpay_submit_btn = el;
        el.disabled = true;
        el.value = 'Please wait...';  
      }
    } else {
      if(!razorpay_instance){
        razorpay_instance = new Razorpay(razorpay_options);
        if(razorpay_submit_btn){
          razorpay_submit_btn.disabled = false;
          razorpay_submit_btn.value = "Pay Now";
        }
      }
      razorpay_instance.open();
    }
  }  
  if(!razorpay_instance){
        razorpay_instance = new Razorpay(razorpay_options);
        if(razorpay_submit_btn){
          razorpay_submit_btn.disabled = false;
          razorpay_submit_btn.value = "Pay Now";
        }
      }
      razorpay_instance.open();
  //document.getElementById('razorpay-form').submit();
</script>
<script>
    jQuery('window').load(function(){
        //jQuery( "#submit-pay" ).trigger( "click" );
        //jQuery( "#razorpay-form" ).submit();
		
    });
</script>

	
</div>
</div>
</div>
