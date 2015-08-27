<?php
if (isset($addservices))
{
	foreach($addservices as $row);
}
?>
<!-- BEGIN VALIDATION STATES-->
					<div class="portlet box green">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-user"></i>اضـافة خدمة
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
										<label class="control-label col-md-3">اسم الخدمة <span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<input type="text" name="sev_desc" data-required="1" class="form-control"
                                            <?php 
												if(isset($row->sev_desc))
													echo 'value="'.$row->sev_desc.'"';
											?>
                                            />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3">سعر الخدمة <span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<input type="text" name="sev_price" data-required="1" class="form-control"
                                            <?php 
												if(isset($row->sev_price))
													echo 'value="'.$row->sev_price.'"';
											?>
                                            />
										</div>
									</div>

								</div>
								<div class="form-actions">
									<div class="row">
										<div class="col-md-offset-3 col-md-9">
											<button type="submit" class="btn green" id="btnAddservice" name="btnAddservice">Submit</button>
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