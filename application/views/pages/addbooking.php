<?php
$isUpdate=0;
$selected='';
$booking_code='';
$final_price='';
if (isset($addbooking))
{
	foreach($addbooking as $row);
	$booking_code=$row->booking_code;
	$final_price = $row->final_price;
	$isUpdate = 1;
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
									<h3 class="form-section"></h3>
							<input id="hdnAction" name="hdnAction" type="hidden" value="<?php echo $isUpdate;?>" />
            						<div class="alert alert-danger display-hide">
										<button class="close" data-close="alert"></button>
										You have some form errors. Please check below.
									</div>
									<div class="alert alert-success display-hide">
										<button class="close" data-close="alert"></button>
										Your form validation is successful!
									</div>
                                       <div class="form-group">
										<label class="control-label col-md-3">الصالة<span class="required">
										* </span>
										</label>
									
                                    	<div class="col-md-4">
                                        	
											<select class="form-control select2me" id="w_code" name="w_code">
												<option value="0">Select...</option>
												<?php
												$selected;
												foreach($hall as $row2)
												{$selected = "";
													if (isset($addbooking))
													if ($row->w_code==$row2->w_code)	
													$selected = 'selected="selected"'; 
												?>
							                     <option value="<?php echo $row2->w_code;?>" <?php echo $selected;?> > <?php echo $row2->w_name;?></option>

                                                <?php
												}
												?>
											</select>
										</div>
									</div>
                                    <div class="form-group">
										
										<div class="col-md-4">
											<input id="hdnBooking_code" name="hdnBooking_code" type="hidden" class="form-control" 
                                            value="<?php echo $booking_code; ?>"
                                            />
                                         
										</div>
                                </div>
                                    <div class="form-group">
										<label class="control-label col-md-3">تاريخ الحجز</label>
										<div class="col-md-4">
											<div class="input-group date date-picker" data-date-format="yyyy-mm-dd">
												<input type="text" class="form-control" readonly id="booking_date" name="booking_date"
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
										<label class="control-label col-md-3">رقم الهوية </label>
										<div class="col-md-4">
											<input type="text" name="cut_id" <?php if (isset($row->cut_id)) {echo 'value="'.$row->cut_id.'"';}?>  data-required="1" class="form-control"/>
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
										<label class="control-label col-md-3">ملاحظات</label>
										<div class="col-md-4">
											<input name="notes" type="text" class="form-control"
                                             <?php if (isset($row->notes)) {echo 'value="'.$row->notes.'"';}?>/>
										</div>
                                     </div>
                                   
								<div class="form-actions">
									<div class="row">
										<div class="col-md-offset-3 col-md-9">
											<button id="btnAddbooking" name="btnAddbooking" type="submit"  class="btn green">حفظ</button>
											<button type="button" class="btn default" value="Cancel" onclick="window.location='http://localhost/weddinghall/';">عودة</button>
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
									<h3 class="form-section"></h3>
									
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
                                        	
											<select id="sev_code" class="form-control select2me" name="sev_code">
												<option value="0">Select...</option>
												<?php
												$selected;
												foreach($sev as $row)
												{	 
												?>
							                     <option value="<?php echo $row->sev_code;?>"> 
												 	<?php echo '['.$row->sev_code.']  '.$row->sev_desc;?></option>

                                                <?php
												}
												?>
											</select>
										</div>
									</div>
								<div class="form-group">
										<label class="control-label col-md-3">تكلفة الخدمة</label>
										<div class="col-md-4">
											<input id="sev_price" id="sev_price" name="sev_price" type="text" class="form-control" readonly/>
										</div>
                                </div>
                                <div class="form-group">
										
										<div class="col-md-4">
											<input id="hdnBookingcode" name="hdnBookingcode" type="hidden" class="form-control" 
                                            value="<?php echo $booking_code; ?>"
                                            />
                                         
										</div>
                                </div>
                                  
								<div class="form-actions">
									<div class="row">
										<div class="col-md-offset-3 col-md-9">
											<button id="btnAddbooking_details" name="btnAddbooking_details" type="submit"  class="btn green">Submit</button>
											
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
							
						</div>
						<div  class="portlet-body">
							<div  class="table-scrollable">
								<table  id="service_table" class="table table-bordered table-hover">
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
									<th>
									
									</th>
									
								</tr>
								</thead>
								<tbody id="serv_body">
									
								<?php
								$i=1;
								$total = 0;
								if (isset($booking_sev))
								{
									foreach($booking_sev as $row)
									{
										$total = $total + $row->sev_price;
										
										echo '<tr class="odd gradeX">';
										echo '<td>'.$i.'</td>';
										echo '<td id="sev_code_td'.$i++.'">'.$row->sev_code.'</td>';
										echo '<td>'.$row->sev_desc.'</td>';
										echo '<td>'.$row->sev_price.'</td>';
										echo '<td> 
									  <button id="btndelservice" name="btndelservice" type="button" class="btn default btn-xs black" onclick="deleteselectedservice('.$row->sev_code.')">
									  
										<i class="fa fa-trash-o"></i> حذف </button>
								  </td>';
			
										echo '</tr>';
										
									}
								}
								else
								{
									echo '<tr class="odd gradeX">';
									echo '<td>&nbsp;</td>';
									echo '<td>&nbsp;</td>';
									echo '<td>&nbsp;</td>';
									echo '<td>&nbsp;</td>';
									echo '<td> 
									  <button id="btndelservice" name="btndelservice" type="button" class="btn default btn-xs black" onclick="deleteselectedservice('.$row->sev_code.')">
									  
										<i class="fa fa-trash-o"></i> حذف </button>
								  </td>';
			
									echo '</tr>';
								}
								echo '<tr align="center" class="odd gradeX">';
									echo '<td colspan="4">المجمــوع</td>';
									echo '<td>'.$total.'</td>';
									echo '</tr>';
							?>
                           
								</tbody>
								</table>
							</div>
						</div>
					</div>
					<!-- END BORDERED TABLE PORTLET-->
				</div>
<!--------------------------------------------------- Price form------------------------------------------------------>
				<div class="col-md-12">
					<!-- BEGIN VALIDATION STATES-->
              
					<div class="portlet box green">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i>سـعر الحجز النهائي
							</div>
							
						</div>
						<div class="portlet-body form">
							<!-- BEGIN FORM-->
							<form action="#" id="price_form" class="form-horizontal">
								<div class="form-body">
									<h3 class="form-section"></h3>
									
                                    <div class="alert alert-danger display-hide">
										<button class="close" data-close="alert"></button>
										You have some form errors. Please check below.
									</div>
									<div class="alert alert-success display-hide">
										<button class="close" data-close="alert"></button>
										Your form validation is successful!
									</div>
                                    <div class="form-group">
										<label class="control-label col-md-3">تكلفة الحجز والخدمات<span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<input id="total_price" name="total_price" type="text" class="form-control" readonly
                                            <?php echo 'value="'.$total.'"';?> />
										</div>
									</div>
								<div class="form-group">
										<label class="control-label col-md-3">المبلغ المطلوب</label>
										<div class="col-md-4">
											<input id="final_price" name="final_price" type="text" class="form-control"
                                           value="<?php echo $final_price;?>"/>
										</div>
                                </div>
								<div class="form-actions">
									<div class="row">
										<div class="col-md-offset-3 col-md-9">
											<button id="btnSaveprice" name="btnSaveprice" type="submit"  class="btn green">حفظ</button>
										<button type="button" class="btn default" value="Cancel" onclick="window.location='http://localhost/weddinghall/';">عودة</button>
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
            
								