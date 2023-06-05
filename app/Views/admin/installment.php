<div class="page-heading">
  <h2>Installments</h2>
</div>

<?php
helper('form');
//flash messages
$session = session();
if ($session->getFlashdata('flash_message')) {
  if ($session->getFlashdata('flash_message') == 'updated') {
    echo '<div class="alert alert-success">';
    echo '<a class="close" data-dismiss="alert">×</a>';
    echo '<strong>Installment Paid</strong>.';
    echo '</div>';
  } else {
    echo '<div class="alert alert-danger">';
    echo '<a class="close" data-dismiss="alert">×</a>';
    echo '<strong>Oh snap!</strong> change a few things up and try submitting again.';
    echo '</div>';
  }
}
//print_r($restaurants);
?>
<?php
//form data
$attributes = array('class' => 'form form-inline', 'id' => '');

//form validation
// echo validation_errors();
//print_r($editor);

//echo form_open('admin/category/', $attributes);



?>

<style>
  td {
    text-align: center;
  }
</style>
<div class="table-responsive">
  <table id="example" class="table table-bordered table-hover category-table">

    <thead>
      <tr>
        <th>Sr. No.</th>
        <th>Amount</th>
        <th>Due Date </th>
        <th>Status</th>
        <th>Pay</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $i = 1;
      $pay = 'yes';
      foreach ($pin as $con) {

        $due_date = date('Y-m-d H:i:s', strtotime($con['pay_date']));
        echo '<tr><td>' . $i . '</td>
	<td>' . $con['amount'] . '</td>
	<td>' . date('d M Y', strtotime($con['pay_date'])) . '</td>
	<td>' . $con['status'] . '</td> 
	<td>';

        //if($con['status']=='Active' && $due_date < date('Y-m-d H:i:s') || 1==1) { echo '<a class="btn btn-success btn-sm" href="'.base_url().'admin/installments/'.$con['id'].'">Pay Now</a>'; }

        if ($con['status'] == 'Paid') {
          echo date('d-m-Y', strtotime($con['pay_date']));
        }
        if ($con['status'] == 'Active' && $pay == 'yes') {
          $pay = 'no';
          echo '<a href="/admin/request-fund?type=installment">Upload Proof</a>';
          // echo' <form class="form club-form" method="post" action="#">
          //         <input type="hidden" name="how_to_pay" value="razorpay">
          //         <input type="hidden" name="amount" value="' . $con['amount'] . '">
          //         <input type="hidden" name="id" value="' . $con['id'] . '">
          //         <input type="submit" name="sub" value="Pay Now">
          //       </form>';
        }
        echo '</td>
	</tr>';
        $i++;
      }

      ?>

    </tbody>
  </table>
</div>