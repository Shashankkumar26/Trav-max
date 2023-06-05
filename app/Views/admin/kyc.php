<style>
.smry4 {
    background: url(../images/edit-ing.jpg) no-repeat scroll center;
  
}
.smry {
    font-size: 45px;
}
.smry {
    padding: 10px 0;
    line-height: normal;
	color: #fff;
}
.col-sm-10 {
    
    padding: 0 !important;
}




</style>

<div class="smry smry4  text-center"><h2>Payment Details</h2>
</div>
<div class="col-sm-12">
<?php 
$user = $profile[0]; 
?>




</div>
<div class="col-sm-12 right-bar">

<?php
helper('form');
      //flash messages
      $session = session();
      if($session->getFlashdata('flash_message')){
        if($session->getFlashdata('flash_message') == 'updated')
        {
          echo '<div class="alert alert-success">';
            echo '<a class="close" data-dismiss="alert">×</a>';
            echo 'Kyc updated successfully.';
          echo '</div>';       
        } 
      }
	  
	  if($user['var_status']=='no') { 
              echo '<div class="alert alert-danger">';
            echo '<a class="close" data-dismiss="alert">×</a>';
            echo 'Your profile is under review please wait 2 working days';
          echo '</div>';
           }
	  
// echo validation_errors(); 

	   $attributes = array('class' => 'form');
      echo form_open_multipart(base_url().'admin/kyc', $attributes);
      ?>
	  
		<input type="hidden" value="<?php echo $user['id']; ?>" name="cid">
		<input type="hidden" value="<?php echo $user['var_status']; ?>" name="var_status">

		<p>&nbsp;</p>
<!--p>Reference URL: <strong><?php echo base_url().'reference/'.$user['customer_id'];?></strong></p-->
<p>&nbsp;</p>

	<!--	 <div class="form-group col-sm-6">
            <label>RD Code</label>
              <input type="text" class="form-control" readonly  name="bsacode" value="<?php echo $user['customer_id'];?>" >
          </div>
		  
		<div class="form-group col-sm-3">
            <label>Image</label>
              <input style="padding:0px;"  type="file" class="form-control"  name="image" >
<input type="hidden" value="<?php echo $user['image']; ?>" name="image_old">
          </div>  
		  <div class="form-group col-sm-3">
<?php if($user['image'] !='') { echo '<img src="'.base_url().'images/user/'.$user['image'].'" width="100">'; } ?>
</div>

        <div class="form-group col-sm-6">
            <label>First Name</label>
              <input type="text" class="form-control" required name="f_name" value="<?php if($_POST['f_name']!='') { echo $_POST['f_name']; } else { echo $user['f_name']; } ?>" >
          </div>
        <div class="form-group col-sm-6">
            <label>Last Name</label>
              <input type="text" class="form-control" required name="l_name" value="<?php if($_POST['l_name']!='') { echo $_POST['l_name']; } else { echo $user['l_name']; } ?>" >
          </div>

		  <div class="form-group col-sm-6">
            <label>Gender</label>
			<select class="form-control"  name="gender">
            <option value="Male">Male</option>
			<option <?php if($user['gender']=='Female') { echo 'selected="selected"'; } ?> value="Female">Female</option>
			</select>
          </div>
        <div class="form-group col-sm-6">
            <label>Date of Birth</label>
              <input type="text" class="form-control" placeholder="DD-MM-YYYY" name="dob" value="<?php if($_POST['dob']!='') { echo $_POST['dob']; } else { echo $user['dob']; } ?>" >
          </div>
		  
		  <div class="form-group col-sm-6">
            <label>Phone</label>
              <input type="number" class="form-control" required name="phone" value="<?php if($_POST['phone']!='') { echo $_POST['phone']; } else { echo $user['phone']; } ?>" >
          </div>
        <div class="form-group col-sm-6">
            <label>Email</label>
              <input type="email" class="form-control" readonly name="email" value="<?php echo $user['email']; ?>" >
          </div>
		  
		  <div class="form-group col-sm-6">
            <label>Address</label>
              <input type="text" class="form-control" required name="address" value="<?php if($_POST['address']!='') { echo $_POST['address']; } else { echo $user['address']; } ?>" >
          </div>
        <div class="form-group col-sm-6 hide">
            <label>City</label>
              <input type="text" class="form-control" readonly="" required name="city" value="<?php if($_POST['city']!='') { echo $_POST['city']; } else { echo $user['city']; } ?>" >
          </div>
		  
		  <div class="form-group col-sm-6 hide">
            <label>State</label>
              <input type="text" class="form-control" readonly="" required name="state" value="<?php if($_POST['state']!='') { echo $_POST['state']; } else { echo $user['state']; } ?>" >
          </div>
        <div class="form-group col-sm-6">
            <label>Pincode</label>
              <input type="number" class="form-control" required name="pincode" value="<?php if($_POST['pincode']!='') { echo $_POST['pincode']; } else { echo $user['pincode']; } ?>" >
          </div>
          
        
		  
		  <div class="form-group col-sm-6">
            <label>PAN Card</label>
              <input type="text" class="form-control"  name="pancard" value="<?php if($_POST['pancard']!='') { echo $_POST['pancard']; } else { echo $user['pancard']; } ?>" >
			  </div>
			  
		  <div class="form-group col-sm-4">
			    <label>PAN Proof</label>
              <input style="padding:0px;"  type="file" class="form-control"  name="panimage" >
			  <input type="hidden" value="<?php echo $user['panimage']; ?>" name="panimage_old">
			   <label><input type="checkbox" name="applied_pan" <?php if($user['applied_pan']=='yes') { echo 'checked="checked"'; } ?> value="yes"> Applied for PAN Card </label>
          </div>
		  <div class="form-group col-sm-2">
           <?php if($user['panimage'] !='') { echo '<a href="'.base_url().'images/user/'.$user['panimage'].'" target="_blank"><img src="'.base_url().'images/user/'.$user['panimage'].'" style="width:auto;max-width:64px;"></a>'; } ?>
          </div>

        <div class="form-group col-sm-6">
            <label>Aadhar</label>
              <input type="text" class="form-control"  name="aadhar" value="<?php if($_POST['aadhar']!='') { echo $_POST['aadhar']; } else { echo $user['aadhar']; } ?>" >
			  </div>
		  <div class="form-group col-sm-4">
			   <label>Aadhar Proof</label>
              <input style="padding:0px;"  type="file" class="form-control"  name="aadharimage">
			  <input type="hidden" value="<?php echo $user['aadharimage']; ?>" name="aadharimage_old">
			   <label><input type="checkbox" name="applied_aadhar" <?php if($user['applied_aadhar']=='yes') { echo 'checked="checked"'; } ?> value="yes"> Applied for Aadhar Card </label>
          </div>
		  
		  <div class="form-group col-sm-2">
           <?php if($user['aadharimage'] !='') { echo '<a href="'.base_url().'images/user/'.$user['aadharimage'].'" target="_blank"><img src="'.base_url().'images/user/'.$user['aadharimage'].'" style="width:auto;max-width:64px;"></a>'; } ?>
          </div>
		  
		   <div class="form-group  col-lg-12">
            <p><input type="checkbox" name="terms" checked required value="yes"> By clicking become an RD, you are agreeing to the privacy policy and the terms & conditions of the Realwater</p>
          </div>   ---> 
		   
        <div class="form-group col-sm-6">
            <label>PAN Card No.</label>
              <input type="text" class="form-control"  name="pancard" value="<?php if($_POST['pancard']!='') { echo $_POST['pancard']; } else { echo $user['pancard']; } ?>" >
        </div>
        
      <div class="form-group col-sm-4">
          <label>PAN Proof</label>
              <input style="padding:0px;"  type="file" class="form-control"  name="panimage" >
        <input type="hidden" value="<?php echo $user['panimage']; ?>" name="panimage_old">
         <label><input type="checkbox" name="applied_pan" <?php if($user['applied_pan']=='yes') { echo 'checked="checked"'; } ?> value="yes"> Applied for PAN Card </label>
          </div>
      <div class="form-group col-sm-2">
           <?php if($user['panimage'] !='') { echo '<a href="'.base_url().'images/user/'.$user['panimage'].'" target="_blank"><img src="'.base_url().'images/user/'.$user['panimage'].'" style="width:auto;max-width:64px;"></a>'; } ?>
          </div>

        <div class="form-group col-sm-6">
            <label>Aadhar No.</label>
              <input type="text" class="form-control"  name="aadhar" value="<?php if($_POST['aadhar']!='') { echo $_POST['aadhar']; } else { echo $user['aadhar']; } ?>" >
        </div>
      <div class="form-group col-sm-4">
         <label>Aadhar Proof</label>
              <input style="padding:0px;"  type="file" class="form-control"  name="aadharimage">
        <input type="hidden" value="<?php echo $user['aadharimage']; ?>" name="aadharimage_old">
         <label><input type="checkbox" name="applied_aadhar" <?php if($user['applied_aadhar']=='yes') { echo 'checked="checked"'; } ?> value="yes"> Applied for Aadhar Card </label>
          </div>
      
      <div class="form-group col-sm-2">
           <?php if($user['aadharimage'] !='') { echo '<a href="'.base_url().'images/user/'.$user['aadharimage'].'" target="_blank"><img src="'.base_url().'images/user/'.$user['aadharimage'].'" style="width:auto;max-width:64px;"></a>'; } ?>
          </div>




      <h4 style="text-align:center;clear:both;padding-top:20px; color:#3999a6;">Enter Bank Details</h4>
		  
		<div class="col-sm-6 form-group"><label>Bank Name</label> <input required type="text" name="bank_name" value="<?php if($_POST['bank_name']!='') { echo $_POST['bank_name']; }else { echo $user['bank_name']; } ?>" class="form-control"></div>
		<!-- <div class="col-sm-6 form-group"><label>Branch</label> <input required type="text" name="branch" value="<?php if($_POST['branch']!='') { echo $_POST['branch']; }else { echo $user['branch']; } ?>" class="form-control"></div>
		<div class="col-sm-6 form-group"><label>City</label> <input required type="text" name="bank_city" value="<?php if($_POST['bank_city']!='') { echo $_POST['bank_city']; }else { echo $user['bank_city']; } ?>" class="form-control"></div>
		<div class="col-sm-6 form-group"><label>State</label> <input required type="text" name="bank_state" value="<?php if($_POST['bank_state']!='') { echo $_POST['bank_state']; }else { echo $user['bank_state']; } ?>" class="form-control"></div> -->
		<div class="col-sm-6 form-group"><label>Account Name</label> <input required type="text" name="account_name" value="<?php if($_POST['account_name']!='') { echo $_POST['account_name']; }else { echo $user['account_name']; } ?>" class="form-control"></div>
		<!-- <div class="col-sm-6 form-group"><label>Account Type</label> <input required type="text" name="account_type" value="<?php if($_POST['acoount_type']!='') { echo $_POST['account_type']; }else { echo $user['account_type']; } ?>" class="form-control"></div> -->
		<div class="col-sm-6 form-group"><label>Account No.</label> <input required type="number" name="account_no" value="<?php if($_POST['account_no']!='') { echo $_POST['account_no']; }else { echo $user['account_no']; } ?>" class="form-control"></div>
		<div class="col-sm-6 form-group"><label>IFSC Code</label> <input required type="text" name="ifsc" value="<?php if($_POST['ifcs']!='') { echo $_POST['ifcs']; }else { echo $user['ifsc']; } ?>" class="form-control"></div>


        <div class="form-group col-sm-4">
         <label>Cancel Cheque image</label>
              <input style="padding:0px;"  type="file" class="form-control"  name="cheque_img">
        <input type="hidden" value="<?php echo $user['cheque_img']; ?>" name="cheque_img_old">
         
          </div>
      
      <div class="form-group col-sm-2">
           <?php if($user['cheque_img'] !='') { echo '<a href="'.base_url().'images/user/'.$user['cheque_img'].'" target="_blank"><img src="'.base_url().'images/user/'.$user['cheque_img'].'" style="width:auto;max-width:64px;"></a>'; } ?>
          </div>


		<div class="col-sm-12 form-group"><label style="font-weight:normal"><input required type="checkbox" name="declare" value="1"> I hereby declared that the details furnished above correct to the best of my knowledge and belief. </label></div>
		  
		  
		  
		  
          <div class="form-group  col-lg-12">
              <?php if($user['var_status']!='yes'){?>
            <button class="btn btn-primary" type="submit">Update</button> &nbsp; 
            <?php }else { ?>
            
            <h2>if you want to changes in your profile <a href="https://www.realwater.in/contact_us">click here</a> to contact us.</h2>
            
          <?php  } ?>
          </div>
		  
		  <?php echo form_close(); ?>
		  
</div>
