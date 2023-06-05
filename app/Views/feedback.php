<div id="contact-page" class="container">
    	<div class="bg" style="background: #fff;padding: 30px 0;margin-bottom: 50px;">
	    	<div class="row">    		
	    	</div>    	
    		<div class="row"> 
			<div class="col-sm-3"></div> 
	    		<div class="col-sm-6">
				
				<?php
      //flash messages
        if(!empty($feedback))
        {
          echo '<div class="alert alert-success">';
            echo '<a class="close" data-dismiss="alert">×</a>';
            echo 'Your Feedback Submitted successfully';
          echo '</div>';       
        } 
	  
 
?>
<div class="contact-form">
	    				<h2 class="title text-center">Feedback</h2>
	    				<div class="status alert alert-success" style="display: none"></div>
				    	<form  id="main-contact-form" class="contact-form row"  method="post">
				            <!--div class="form-group col-md-12">
							<label>What do you think of our website</label>
							<p>&#9785; &#9786; &#9825;</p>
                            </div--> 
							
							<div class="form-group col-md-12">
							<label>Please select a subject</label>
							<select name="subject">
							  <option class="Suggestion" value="Suggestion">Suggestion</option>
				              <option class="Compliment" value="Compliment">Compliment</option>
				              <option class="Bug" value="Bug">Bug</option>
				              <option class="Question" value="Question">Question</option>
							  </select>
				            </div>
							
							<div class="form-group col-md-12">
							<label class="show_Suggestion">What would you like to share with us?</label>
							<label class="show_Compliment" style="display:none">What would you like to share with us?</label>
							<label class="show_Bug" style="display:none">Can you describe the bug you encountered?</label>
							<label class="show_Question" style="display:none">What would you like to ask us ?</label>
				                <textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="Your Message Here"></textarea>
				            </div>  

							<div class="form-group col-md-12">
							<label>E-mail (might be used once for follow-up)</label>
				                <input type="email" name="email" class="form-control" required="required" placeholder="Email">
				            </div>	



							<div class="form-group col-md-12">
							<label>How would you rate the speed of our website?</label>
							</div>
				             <div class="col-sm-4"><input type="radio" name="speed" value="slow"><label>Slow</label></div>
				             <div class="col-sm-4"><input type="radio" name="speed" value="good"><label>Good enough</label></div>
				             <div class="col-sm-4"><input type="radio" name="speed" value="fast"><label>Fast</label></div>
				            	
							
				            <div class="form-group col-md-12">
				                <input type="submit" name="contact" class="btn btn-primary" value="Submit" style="margin-top: 12px;">
				            </div>
				        </form>
	    			</div>
	    		</div>
	    	</div>  
    	</div>	
    </div><!--/#contact-page-->
	<script>
				           jQuery(".Suggestion").click(function(){
							jQuery(".show_Suggestion").show();
                            jQuery(".show_Compliment").hide();
                            jQuery(".show_Bug").hide();
                            jQuery(".show_Question").hide();
                             });
							 
							 jQuery(".Compliment").click(function(){
							jQuery(".show_Suggestion").hide();
                            jQuery(".show_Compliment").show();
                            jQuery(".show_Bug").hide();
                            jQuery(".show_Question").hide();
                             });
							 
							 jQuery(".Bug").click(function(){
							jQuery(".show_Suggestion").hide();
                            jQuery(".show_Compliment").hide();
                            jQuery(".show_Bug").show();
                            jQuery(".show_Question").hide();
                             });
							 
							 jQuery(".Question").click(function(){
							jQuery(".show_Suggestion").hide();
                            jQuery(".show_Compliment").hide();
                            jQuery(".show_Bug").hide();
                            jQuery(".show_Question").show();
                             });
</script>