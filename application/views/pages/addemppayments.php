<?php
$emp_code='';

if (isset($addemppayments))
{
foreach($addemppayments as $row);

}

?>

<div class="row">
				<div class="col-md-12">
					<!-- BEGIN VALIDATION STATES-->
              
					<div class="portlet box green">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i>Advance Validation
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="#portlet-config" data-toggle="modal" class="config">
								</a>
								<a href="javascript:;" class="reload">
								</a>
								<a href="javascript:;" class="remove">
								</a>
							</div>
						</div>
						<div class="portlet-body form">
							<!-- BEGIN FORM-->
							<form action="#" id="emppayments_form" class="form-horizontal">
								<div class="form-body">
									<h3 class="form-section">Advance validation. <small>Custom radio buttons, checkboxes and Select2 dropdowns</small></h3>
									 <input id="emp_code" name="emp_code" type="hidden" value="<?php echo $emp_code;?>" />
                                    
                                    <div class="alert alert-danger display-hide">
										<button class="close" data-close="alert"></button>
										You have some form errors. Please check below.
									</div>
									<div class="alert alert-success display-hide">
										<button class="close" data-close="alert"></button>
										Your form validation is successful!
									</div>
                                    <div class="form-group">
										<label class="control-label col-md-3">رقم الهوية <span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<input type="text" name="cut_id" <?php if (isset($row->emp_id)) {echo 'value="'.$row->emp_id.'"';}?>  data-required="1" class="form-control"/>
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-md-3">الاسم<span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<input type="text" name="name" data-required="1"  <?php if (isset($row->name)) {echo 'value="'.$row->name.'"';}?> class="form-control"/>
										</div>
									</div>
                              		<div class="form-group">
										<label class="control-label col-md-3">تاريخ الدفعة</label>
										<div class="col-md-4">
											<div class="input-group date date-picker" data-date-format="yyyy/mm/dd">
												<input type="text" class="form-control" readonly name="payment_date"/>
												<span class="input-group-btn">
												<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
												</span>
											</div>
											<!-- /input-group -->
											<span class="help-block">
											select a date </span>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3">قيمة الدفعة</label>
										<div class="col-md-4">
											<input name="payment_amount" type="text" class="form-control"/>
										</div>
                                     </div>
                                     <div class="form-group">
                   				<label class="control-label col-md-3">نوع الدفع<span class="required">*</span>
										</label>
										<div class="col-md-4">
											<select class="form-control select2me" name="payment_type">
												<option value="0">Select...</option>
												<option value="1">راتب شهري</option>
                                                <option value="2">سلفة مالية</option>
						                        
											</select>
										</div>
									</div>
						
                                     
								<div class="form-actions">
									<div class="row">
										<div class="col-md-offset-3 col-md-9">
											<button id="btnAddemppayments" name="btnAddemppayments" type="submit"  class="btn green">Submit</button>
											<button type="button" class="btn default">Cancel</button>
										</div>
									</div>
								</div>
							</form>
							<!-- END FORM-->
						</div>
						<!-- END VALIDATION STATES-->
					</div>
				</div>
			</div>
            
								