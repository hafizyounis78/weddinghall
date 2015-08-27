<?php
if (isset($addhall))
{
	foreach($addhall as $row);
}
?>
<!-- BEGIN VALIDATION STATES-->
					<div class="portlet box green">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-user"></i>اضـافة صالة
							</div>
						</div>
						<div class="portlet-body form">
							<!-- BEGIN FORM-->
                            <form action="#" id="form_sample_3" class="form-horizontal">
								<div class="form-body">
									<h3 class="form-section">Advance validation. <small>Custom radio buttons, checkboxes and Select2 dropdowns</small></h3>
									<div class="alert alert-danger display-hide">
										<button class="close" data-close="alert"></button>
										You have some form errors. Please check below.
									</div>
									<div class="alert alert-success display-hide">
										<button class="close" data-close="alert"></button>
										Your form validation is successful!
									</div>
									<div class="form-group">
										<label class="control-label col-md-3">اسم الصالة <span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<input type="text" name="w_name" data-required="1" class="form-control"
                                            <?php 
												if(isset($row->w_name))
													echo 'value="'.$row->w_name.'"';
											?>
                                            />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3">عنوان <span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<input type="text" name="address" data-required="1" class="form-control"
                                            <?php 
												if(isset($row->address))
													echo 'value="'.$row->address.'"';
											?>
                                            />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3">مشرف الصالة <span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<input type="text" name="w_emp" data-required="1" class="form-control"
                                            <?php 
												if(isset($row->w_emp))
													echo 'value="'.$row->w_emp.'"';
											?>
                                            />
										</div>
									</div>

								</div>
								<div class="form-actions">
									<div class="row">
										<div class="col-md-offset-3 col-md-9">
											<button type="submit" class="btn green" id="btnAddhall" name="btnAddhall">Submit</button>
											<button type="button" class="btn default" >Cancel</button>
										</div>
									</div>
								</div>
							</form>
							
							<!-- END FORM-->
						</div>
						<!-- END VALIDATION STATES-->
<!-- JQUERY
<script type="text/javascript">
$(document).ready(function(){
$('#btnAdduser').click(function() {
	alert('hi');
});
});
</script>--> 
<!-- END JQUERY-->                  