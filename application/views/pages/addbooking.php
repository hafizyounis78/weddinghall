<script type="text/javascript">
var baseURL = "<?php echo base_url(); ?>";
</script>
<?php
$isUpdate=0;
$isnew=1;
$selected='';
$booking_code='';
$final_price='';
$dvService='style="display:none"';
if (isset($addbooking))
{
	foreach($addbooking as $row);
	$booking_code=$row->booking_code;
	$final_price = $row->final_price;
	$isUpdate = 1;
	$isnew=0;
	$dvService='style="display:block"';
}

?>
 <style>
 	.day:hover
	{
		background-color:#c0c0c0;
	}
	#b_desc {
    text-align: center;
    color: red;
	 font-size: 20px;
	 background-color:#FF0;
}

 </style>
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
							<form action="#" id="booking_form" class="form-horizontal">
								<div class="form-body">
									<h3 class="form-section"></h3>
							<input id="hdnAction" name="hdnAction" type="hidden" value="<?php echo $isUpdate;?>" />
                            <input id="isnew" name="isnew" type="hidden" value="<?php echo $isnew;?>" />
                            <input id="booking_status" name="booking_status" type="hidden" <?php if (isset($row->booking_status)) {echo 'value="'.$row->booking_status.'"';}?> />
            						<div class="alert alert-danger display-hide">
										<button class="close" data-close="alert"></button>
										يـوجد خطأ في ادخال الحقول ... الرجــاء التأكد من الادخال بشـكل صحيـح
									</div>
									<div class="alert alert-success display-hide">
										<button class="close" data-close="alert"></button>
										تمت العملية بنجاح!
									</div>
                                    <div class="form-group">
										<label class="control-label col-md-3">حالة الحجز <span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<input type="text" id="b_desc" name="b_desc" readonly <?php if (isset($row->b_desc)) {echo 'value="'.$row->b_desc.'"';}?>  data-required="1" class="form-control"/>
										</div>
									</div>
                                       <div class="form-group">
										<label class="control-label col-md-3">الصالة<span class="required">
										* </span>
										</label>
									
                                    	<div class="col-md-4">
                                        	
											<select class="form-control select2me" id="w_code" name="w_code" onchange="checkdate()">
												<option value="0">Select...</option>
												<?php
												
												$selected;
												foreach($hall as $row2)
												{
													$selected = "";
													if (isset($addbooking))
													{
														if ($row->w_code==$row2->w_code)	
															$selected = 'selected="selected"';
													}
													else if (isset($calenderhall))
													{
														if ($row2->w_code == $calenderhall)	
															$selected = 'selected="selected"';
													}
													
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
											<input id="hdnBooking_code" name="hdnBooking_code" type="hidden"  class="form-control" 
                                            value="<?php echo $booking_code; ?>"
                                            />
                                         
										</div>
                                </div>
                                    <div class="form-group">
										<label class="control-label col-md-3">تاريخ الحجز</label>
										<div class="col-md-4">
											<div class="input-group date date-picker" data-date-format="yyyy-mm-dd">
												<input type="text" class="form-control dp" readonly id="booking_date" name="booking_date"
                                                  <?php if (isset($row->booking_date)) {echo 'value="'.$row->booking_date.'"';}
												  	else if(isset($calenderdate)) {echo 'value="'.$calenderdate.'"';};
												  ?>/>
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
											<input type="text" id="cut_id_no" name="cut_id_no" <?php if (isset($row->cut_id_no)) {echo 'value="'.$row->cut_id_no.'"';}?>  data-required="1" class="form-control"/>
<input type="hidden" id="cut_id" name="cut_id" <?php if (isset($row->cut_id)) {echo 'value="'.$row->cut_id.'"';}?>  data-required="1" class="form-control"/>

										</div>
									</div>
                                    <div class="form-group">
										  <input id="hdnOldcust" name="hdnOldcust" type="hidden" readonly="readonly" value="0" />

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
										<label class="control-label col-md-3">تلفون</label>
										<div class="col-md-4">
											<input id="tel" name="tel" type="text" class="form-control"
                                              <?php if (isset($row->tel)) {echo 'value="'.$row->tel.'"';}?>/>
										</div>
                                     </div>
                                    
                                     <div class="form-group">
										<label class="control-label col-md-3">جوال</label>
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
										<label class="control-label col-md-3">ملاحظات</label>
										<div class="col-md-4">
											<input id="notes" name="notes" type="text" class="form-control"
                                             <?php if (isset($row->notes)) {echo 'value="'.$row->notes.'"';}?>/>
										</div>
                                     </div>
                                   
								<div class="form-actions">
									<div class="row">
										<div class="col-md-offset-3 col-md-9">
											<button id="btnAddbooking" name="btnAddbooking" type="submit"  class="btn green">حـفـظ</button>
											<button type="button" class="btn default" value="Cancel" onclick="window.location='<?php echo base_url()?>';">عودة</button>
                       <a href="<?php if (isset($row->booking_code)) {echo base_url().'addpayments/'.$row->booking_code;}?>" class="btn blue">
										<i class="fa fa-edit"></i>عرض الدفعات المالية</a>
                                        <button id="btnisnew" name="btnisnew" type="button" class="btn red" >استبدال الزبون</button>
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
				<div id="dvServices" class="col-md-12" <?php echo $dvService;?>>
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
										يـوجد خطأ في ادخال الحقول ... الرجــاء التأكد من الادخال بشـكل صحيـح
									</div>
									<div class="alert alert-success display-hide">
										<button class="close" data-close="alert"></button>
										تمت العملية بنجاح!
									</div>
                                    <div class="form-group">
										<label class="control-label col-md-3">نوع الخدمة<span class="required">
										* </span>
										</label>
										<div class="col-md-4">
                                        	
											<select id="sev_code" class="form-control select2me" onchange="sev_code_change()" name="sev_code">
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
											<input id="sev_price" name="sev_price" type="text" class="form-control" />
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
										يـوجد خطأ في ادخال الحقول ... الرجــاء التأكد من الادخال بشـكل صحيـح
									</div>
									<div class="alert alert-success display-hide">
										<button class="close" data-close="alert"></button>
										تمت العملية بنجاح!
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
										<button type="button" class="btn default" value="Cancel" onclick="window.location='<?php echo base_url()?>';">عودة</button>

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
            

