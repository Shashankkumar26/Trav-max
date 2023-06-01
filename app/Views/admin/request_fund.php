<hr>
<div class="page-heading">
  <h2>Payment Proof</h2>
</div>
<?php
//flash messages
$session = session();
if ($session->flashdata('flash_message')) {
  if ($session->flashdata('flash_message') == 'updated') {
    echo '<div class="alert alert-success">';
    echo '<a class="close" data-dismiss="alert">×</a>';
    echo '<strong>Well done!</strong> Requested Sent successfully.';
    echo '</div>';
  } else {
    echo '<div class="alert alert-danger">';
    echo '<a class="close" data-dismiss="alert">×</a>';
    echo '<strong>Oh snap!</strong> change a few things up and try submitting again.';
    echo '</div>';
  }
}
?>

<?php
helper('form');
//form data
$attributes = array('class' => 'form', 'id' => '');

//form validation
echo validation_errors();
//print_r($editor);

echo form_open_multipart('admin/request-fund', $attributes);
?>

<div class="pin-box">
  <div class="col-sm-8">
    <fieldset>

      <div class="form-group col-sm-12">
        <label> Amount</label>
        <?php if (!empty($payment_amount)) {
          echo '<input type="number" class="form-control" name="amount" value="' . $payment_amount . '" readonly>';
          echo '<input type="hidden" name="subject" value="installment">';
        }else{
          echo '<input type="number" class="form-control" name="amount">';
          echo '<input type="hidden" name="subject" value="fund">';
        } ?>
      </div>

      <div class="form-group col-sm-12">
        <label> Payment Mode </label>
        <select class='form-control cash' name="mode" class="form-control" id="sel1">
          <option value="NEFT">NEFT</option>
          <option value="RTGS">RTGS</option>
          <option value="IMPS">IMPS</option>
          <option value="Cash Deposit">Cash Deposit</option>
          <option value="ByCash"> ByCash</option>
          <option value="Other">Other</option>
        </select>
      </div>

      <div class="form-group col-sm-12 utr">
        <label class='name'> Bank Name</label>
        <input type="text" class="form-control" name="bank_name" value="<?php if ($this->input->post('bank_name') != '') {
                                                                          echo $this->input->post('bank_name');
                                                                        }  ?>">
      </div>
      <!--<div class="form-group col-sm-12">
            <label>Bank branch</label>
              <input type="text" class="form-control"  name="bank_branch" value="<?php if ($this->input->post('bank_branch') != '') {
                                                                                    echo $this->input->post('bank_branch');
                                                                                  }  ?>" >
          </div>-->
      <div class="form-group col-sm-12 utr">
        <label class='one'> UTR No.</label>
        <input type="text" class="form-control" name="neft">
      </div>
      <div class="form-group col-sm-12 utr">
        <label class='two'>Image</label>
        <input type="file" name="image" value="<?php if ($this->input->post('file') != '') {
                                                  echo $this->input->post('file');
                                                }  ?>">
      </div>


      <!--<div class="form-group col-sm-12">
            <label> IFSC Code</label>
              <input type="text" class="form-control"  name="ifsc" value="<?php if ($this->input->post('ifsc') != '') {
                                                                            echo $this->input->post('ifsc');
                                                                          }  ?>" >
          </div>
       <div class="form-group col-sm-12">
            <label> NEFT / RTGS</label>
              <input type="text" class="form-control"  name="neft" value="<?php if ($this->input->post('neft') != '') {
                                                                            echo $this->input->post('neft');
                                                                          }  ?>" >
          </div>-->

      <!--<div class="form-group col-lg-6 col-mg-6 col-sm-6">
            <label>Bank Name</label>
              <input type="file" class="form-control"  name="image" value="<?php if ($this->input->post('image') != '') {
                                                                              echo $this->input->post('image');
                                                                            }  ?>" >
          </div> -->

      <div class="form-group col-sm-12">
        <label>Description</label>
        <textarea class="form-control" required="required" name="description" value="<?php if ($this->input->post('description') != '') {
                                                                                        echo $this->input->post('description');
                                                                                      } ?>"></textarea>
      </div>

      <div class="col-lg-12 col-md-12">
        <div class="form-group">
          <button class="btn btn-primary" type="submit">Request</button> &nbsp;
        </div>
      </div>
    </fieldset>



  </div>

</div>

<?php echo form_close(); ?>
<script src="http://cdn.tinymce.com/4/tinymce.min.js"></script>


<script>
  tinymce.init({
    selector: '.textarea-editor',
    browser_spellcheck: true
  });
  jQuery('.cash').change(function() {

    var cash = jQuery(this).val();
    if (cash == 'ByCash') {
      jQuery('.utr').hide();

    } else {

      jQuery('.utr').show();
    }

  });
</script>