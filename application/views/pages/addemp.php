<?php
$isUpdate=0;
$emp_code='';
if (isset($addemp))
{
foreach($addemp as $row);
if (isset($row->emp_code)) 
{
	$emp_code=$row->emp_code;
}
$isUpdate = 1;
}

?>
<style>
 	.day:hover
	{
		background-color:#c0c0c0;
	}
 </style>
<div class="row">
				<div class="col-md-12">
					<!-- BEGIN VALIDATION STATES-->
              
					<div class="portlet box green">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i>إضافة موظف
							</div>
							
						</div>
						<div class="portlet-body form">
							<!-- BEGIN FORM-->
							<form action="#" id="employee_form" class="form-horizontal">
								<div class="form-body">
									<h3 class="form-section"></h3>
									<input id="hdnAction" name="hdnAction" type="hidden" value="<?php echo $isUpdate;?>" />
                                    <input id="emp_code" name="emp_code" type="hidden" value="<?php echo $emp_code;?>" />
                                    <div class="alert alert-danger display-hide">
										<button class="close" data-close="alert"></button>
										يـوجد خطأ في ادخال الحقول ... الرجــاء التأكد من الادخال بشـكل صحيـح
									</div>
									<div class="alert alert-success display-hide">
										<button class="close" data-close="alert"></button>
										تمت عملية التحقق بنجاح!
									</div>
                                    <div class="form-group">
										<label class="control-label col-md-3">رقم الهوية <span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<input type="text" id="emp_id" name="emp_id" <?php if (isset($row->emp_id)) {echo 'value="'.$row->emp_id.'"';}?>  data-required="1" class="form-control"/>
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-md-3">الاسم<span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<input type="text" id="name" name="name" data-required="1"  <?php if (isset($row->name)) {echo 'value="'.$row->name.'"';}?> class="form-control"/>
										</div>
									</div>
                                    									<div class="form-group">
										<label class="control-label col-md-3">الجنس <span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<div class="radio-list" data-error-container="#form_2_membership_error">
												<label>
												<input type="radio" name="sex" value="1" 
                                                <?php if (isset($row->sex)) {if ($row->sex==1) echo 'checked=checked';}?>
                                                />
												ذكر </label>
												<label>
												<input type="radio" name="sex" value="2"
                                                <?php if (isset($row->sex)) {if ($row->sex==2) echo 'checked=checked';}?>
                                                />
												أنتى </label>
											</div>
											<div id="form_2_membership_error">
											</div>
										</div>
									</div>
	<div class="form-group">
										<label class="control-label col-md-3">تاريخ الميلاد</label>
										<div class="col-md-4">
											<div class="input-group date date-picker" data-date-format="yyyy/mm/dd">
												<input type="text" class="form-control" readonly id="dob" name="dob"
                                                  <?php if (isset($row->dob)) {echo 'value="'.$row->dob.'"';}?>/>
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
										<label class="control-label col-md-3">تلفون</label>
										<div class="col-md-4">
											<input id="tel" name="tel" type="text" class="form-control"
                                              <?php if (isset($row->tel)) {echo 'value="'.$row->tel.'"';}?>/>
										</div>
                                     </div>
                                     <div class="form-group">
										<label class="control-label col-md-3">جوال <span class="required">
										* </span>
                                        </label>
										<div class="col-md-4">
											<input id="mobile" name="mobile" type="text" class="form-control"
                                            <?php if (isset($row->mobile)) {echo 'value="'.$row->mobile.'"';}?>/>
										</div>
                                     </div>
                                     <div class="form-group">
										<label class="control-label col-md-3">عنوان</label>
										<div class="col-md-4">
											<input id="address" name="address" type="text" class="form-control"
                                             <?php if (isset($row->address)) {echo 'value="'.$row->address.'"';}?>/>
										</div>
                                     </div>
									
									<div class="form-group">
										<label class="control-label col-md-3">الوظيفة<span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<select class="form-control select2me" name="job" 
                                             <option value="">Select...</option>
											 <?php
												$selected;
												foreach($jobs as $row2)
												{
													$selected = "";
													if (isset($addemp))
													{
														if ($row->job==$row2->job_code)	
															$selected = 'selected="selected"';
													}
													
												?>
							                     <option value="<?php echo $row2->job_code;?>" <?php echo $selected;?> > <?php echo $row2->job_title;?></option>

                                                <?php
												}
												?>
                                                
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3">نوع العقد<span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<select class="form-control select2me" id="contract_code" name="contract_code">
												<option value="">Select...</option>
											<?php
												$selected;
												foreach($contract as $row2)
												{
													$selected = "";
													if (isset($addemp))
													{
														if ($row->contract_code==$row2->contract_code)	
															$selected = 'selected="selected"';
													}
													
												?>
							                     <option value="<?php echo $row2->contract_code;?>" <?php echo $selected;?> > <?php echo $row2->contract_type;?></option>

                                                <?php
												}
												?>
                                            
											</select>
										</div>
									</div>
								<div class="form-group">
										<label class="control-label col-md-3">الراتب<span class="required">
										* </span>
                                        </label>
										<div class="col-md-4">
											<input id="salary" name="salary" type="text" class="form-control"
                                            <?php if (isset($row->salary)) {echo 'value="'.$row->salary.'"';}?>
                                            />
										</div>
                                     </div>
                                  </div>
								<div class="form-actions">
									<div class="row">
										<div class="col-md-offset-3 col-md-9">
											<button id="btnAddemp" name="btnAddemp" type="submit"  class="btn green">حـفـظ</button>
											<button type="button" class="btn default" value="Cancel" onclick="window.location='http://localhost/weddinghall/employee/';">عودة</button>
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
            
								