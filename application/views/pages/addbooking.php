<?php
if (isset($addbooking))
{
foreach($addbooking as $row);
}


?>

<div class="row">
				<div class="col-md-12">
					<!-- BEGIN VALIDATION STATES-->
              
					<div class="portlet box green">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i>حجز موعد
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
										<label class="control-label col-md-3">الصالة <span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<input type="text" name="w_code" <?php if (isset($row->w_code)) {echo 'value="'.$row->w_code.'"';}?>"  data-required="1" class="form-control"/>
										</div>
									</div>

                                    <div class="form-group">
										<label class="control-label col-md-3">تاريخ الحجز</label>
										<div class="col-md-4">
											<div class="input-group date date-picker" data-date-format="yyyy-mm-dd">
												<input type="text" class="form-control" readonly name="booking_date"
                                                  <?php if (isset($row->booking_date)) {echo 'value="'.$row->booking_date.'"';}?>/>
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
										<label class="control-label col-md-3">رقم الهوية <span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<input type="text" name="cut_id" <?php if (isset($row->cut_id)) {echo 'value="'.$row->cut_id.'"';}?>"  data-required="1" class="form-control"/>
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-md-3">الاسم<span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<input type="text" name="name" data-required="1"  <?php if (isset($row->name)) {echo 'value="'.$row->name.'"';}?>" class="form-control"/>
										</div>
									</div>
                                    
                                  
									<div class="form-group">
										<label class="control-label col-md-3">تلفون</label>
										<div class="col-md-4">
											<input name="tel" type="text" class="form-control"
                                              <?php if (isset($row->tel)) {echo 'value="'.$row->tel.'"';}?>/>
										</div>
                                     </div>
                                    
                                     <div class="form-group">
										<label class="control-label col-md-3">جوال</label>
										<div class="col-md-4">
											<input name="mobile" type="text" class="form-control"
                                            <?php if (isset($row->mobile)) {echo 'value="'.$row->mobile.'"';}?>/>
										</div>
                                     </div>
                                    
                                     <div class="form-group">
										<label class="control-label col-md-3">عنوان</label>
										<div class="col-md-4">
											<input name="address" type="text" class="form-control"
                                             <?php if (isset($row->address)) {echo 'value="'.$row->address.'"';}?>/>
										</div>
                                     </div>
									
								  <div class="form-group">
										<label class="control-label col-md-3">التكلفة</label>
										<div class="col-md-4">
											<input name="total_price" type="text" class="form-control"
                                            <?php if (isset($row->total_price)) {echo 'value="'.$row->total_price.'"';}?>
                                            />
										</div>
                                     </div>
                                  </div>
								<div class="form-actions">
									<div class="row">
										<div class="col-md-offset-3 col-md-9">
											<button id="btnAddbooking" name="btnAddbooking" type="submit"  class="btn green">Submit</button>
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
<!--------------------------------------------------- service form------------------------------------------------------>
				<div class="col-md-12">
					<!-- BEGIN VALIDATION STATES-->
              
					<div class="portlet box green">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i>اضافة الخدمات
							</div>
							
						</div>
						<div class="portlet-body form">
							<!-- BEGIN FORM-->
							<form action="#" id="service_form" class="form-horizontal">
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
										<label class="control-label col-md-3">نوع الخدمة<span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<select class="form-control select2me" name="sev_desc">
												<option value="0">Select...</option>
												<?php
												$selected;
												foreach($sev as $row)
												{	 
												?>
							                     <option value="<?php echo $row->sev_code;?>"> <?php echo $row->sev_desc;?></option>

                                                <?php
												}
												?>
											</select>
										</div>
									</div>
								<div class="form-group">
										<label class="control-label col-md-3">تكلفة الخدمة</label>
										<div class="col-md-4">
											<input name="sev_price" type="text" class="form-control"
                                           <?php if (isset($row->sev_price)) {echo 'value="'.$row->sev_price.'"';}?>/>
                                            />
										</div>
                                     </div>
                                  </div>
								<div class="form-actions">
									<div class="row">
										<div class="col-md-offset-3 col-md-9">
											<button id="btnAddbooking_details" name="btnAddbooking_details" type="submit"  class="btn green">Submit</button>
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


<!--------------------------------------------------- service table------------------------------------------------------>
                
                <div class="col-md-6">
					<!-- BEGIN BORDERED TABLE PORTLET-->
					<div class="portlet box yellow">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-coffee"></i>جدول الخدمات 
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
						<div class="portlet-body">
							<div class="table-scrollable">
								<table class="table table-bordered table-hover">
								<thead>
								<tr>
									<th>
										 #
									</th>
									<th>
										 كود الحدمة
									</th>
									<th>
										 اسم الخدمة
									</th>
									<th>
										 تكلفه الخدمة
									</th>
									
								</tr>
								</thead>
								<tbody>
								<tr>
									<td rowspan="2">
										 1
									</td>
									<td>
										 Mark
									</td>
									<td>
										 Otto
									</td>
									<td>
										 makr124
									</td>
									
								</tr>
								
								</tbody>
								</table>
							</div>
						</div>
					</div>
					<!-- END BORDERED TABLE PORTLET-->
				</div>
			</div>
            
								