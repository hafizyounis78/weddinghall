<script type="text/javascript">
var baseURL = "<?php echo base_url(); ?>";
</script>
<?php
$disabled = "";
$isUpdate=0;
if (isset($addpayments))
{
foreach($addpayments as $row);
/*if (!isset($row->final_price))
{
$property='disabled="disabled"'	;
}
else
{$property='disabled="disabled"';
}*/
}
if (isset($row->booking_status) && $row->booking_status == 4)
	{
		$disabled = 'disabled="disabled"';
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
								<i class="fa fa-gift"></i>اضافة دفعات مالية
							</div>
					
						</div>
						<div class="portlet-body form">
							<!-- BEGIN FORM-->
							<form action="#" id="payments_form" class="form-horizontal">
								<div class="form-body">
									<h3 class="form-section"></h3>
									
                                   <input id="hdnAction" name="hdnAction" type="hidden" value="<?php echo $isUpdate;?>" /> 
                                    <div class="alert alert-danger display-hide">
										<button class="close" data-close="alert"></button>
										يـوجد خطأ في ادخال الحقول ... الرجــاء التأكد من الادخال بشـكل صحيـح
									</div>
									<div class="alert alert-success display-hide">
										<button class="close" data-close="alert"></button>
                                        <input id="booking_status" name="booking_status" type="hidden" value="<?php if (isset($row->booking_status)) echo $row->booking_status;?>" />
										
										تمت العملية بنجاح!
									</div>
                                    <div class="form-group">
										<label class="control-label col-md-3">كود الحجز <span class="required">
										</span>
										</label>
										<div class="col-md-4">
											<input type="text" id="booking_code" name="booking_code" readonly  <?php if (isset($row->booking_code)) {echo 'value="'.$row->booking_code.'"';}?>  data-required="1" class="form-control"/>
										</div>
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
										<label class="control-label col-md-3">المبلغ المطلوب<span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<input type="text" id="final_price" name="final_price"  readonly <?php if (isset($row->final_price)) {echo 'value="'.$row->final_price.'"';}?> class="form-control"/>
										</div>
									</div>

                                    <div class="form-group">
										<label class="control-label col-md-3">اسم الصالة <span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<input type="text" name="w_name" readonly <?php if (isset($row->w_name)) {echo 'value="'.$row->w_name.'"';}?>  data-required="1" class="form-control"/>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3">تاريخ الحجز</label>
										<div class="col-md-4">
											
												<input type="text" class="form-control" readonly name="booking_date" <?php if (isset($row->booking_date)) {echo 'value="'.$row->booking_date.'"';}?>/>
												<span class="input-group-btn">
												
												</span>
											
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
											<input type="text" name="cut_id" readonly <?php if (isset($row->cut_id)) {echo 'value="'.$row->cut_id.'"';}?>  data-required="1" class="form-control"/>
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-md-3">الاسم<span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<input type="text" name="name"  readonly <?php if (isset($row->name)) {echo 'value="'.$row->name.'"';}?> class="form-control"/>
										</div>
									</div>
                                   <div class="form-group">
										<label class="control-label col-md-3">تاريخ الدفعة</label>
										<div class="col-md-4">
											<div class="input-group date date-picker" data-date-format="yyyy/mm/dd" >
												<input type="text" class="form-control dp" data-required="1" readonly name="payment_date" id="payment_date" <?php echo $disabled;?>/>
												<span class="input-group-btn">
												<button class="btn default" type="button" <?php echo $disabled;?>><i class="fa fa-calendar"></i></button>
												</span>
											</div>
											<!-- /input-group -->
											<span class="help-block">
											select a date </span>
										</div>
									</div>
                                     <input id="p_code" name="p_code" type="hidden"  /> 
									<div class="form-group">
										<label class="control-label col-md-3">قيمة الدفعة</label>
										<div class="col-md-4">
											<input id="payment_amount" name="payment_amount" type="text" data-required="1" class="form-control" <?php echo $disabled;?>/>
										</div>
                                     </div>
                                     
											<input id="payment_amount_old" name="payment_amount_old" type="hidden" data-required="1" class="form-control"/>
										
                                    									
                                     <div class="form-group">
										<label class="control-label col-md-3">رقم الوصل المالي</label>
										<div class="col-md-4">
											<input id="invoice_no" name="invoice_no" type="text" data-required="1" class="form-control" <?php echo $disabled;?>/>
                                            
										</div>
                                     </div>
                              <!--      <div class="form-group">
										<label class="control-label col-md-3">ملاحظات</label>
										<div class="col-md-4">
											<input id="notes" name="notes" type="text" data-required="1" class="form-control"/>
                                            
										</div>
                                     </div>
                                  -->  
								<div class="form-actions">
									<div class="row">
										<div class="col-md-offset-3 col-md-9">
											<button id="btnAddpayments" name="btnAddpayments" type="submit"  class="btn green" <?php echo $disabled;?>>حفظ</button>
											<button type="button" class="btn default" value="Cancel" onclick="window.location='<?php echo base_url()?>searchpaymentsajax/';">عودة</button>
                                          <a href="<?php if (isset($row->booking_code)) {echo base_url().'addbooking/'.$row->booking_code;}?>" class="btn red">
								<i class="fa fa-edit"></i> عرض بيانات الحجز </a>
									
                                        </div>
									</div>
								</div>
							</form>
							<!-- END FORM-->
						</div>
						<!-- END VALIDATION STATES-->
					</div>
				
                </div>
                <div class="portlet box green">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i>عرض الدفعات المالية
							</div>
					
						</div>
                 <div class="portlet-body">
							<table class="table table-striped table-bordered table-hover" id="payments_table">
							<thead>
							<tr>
								<th >
									*
								</th>
								<th>
									كود العملية
								</th>
                                <th>
									رقم الهوية
								</th>
								<th>
									 الاسم
								</th>
                                <th>
									 جوال
								</th>
								<th>
									 تاريخ الحجز
								</th>
                                <th>
									 اسم الصالة
								</th>
                                <th>
									 المبلغ المطلوب
								</th>
                                 <th>
									 تاريخ الدفعة 
								</th>
                                <th>
									 رقم الوصل
								</th>
                                <th>
									 قيمة الدفعة
								</th>
                                <th>
									 
								</th>
							</tr>
                            
							</thead>
							<tbody id="payments_body" >
							
								
								<?php
								$i=1;
								$total = 0;
								$remaining = 0;
								$required=0;
  							foreach($payment_view as $row)
  							{
								if ($row->payment_status<>4)
								$total = $total + $row->payment_amount;
								
								$required=$row->final_price;
								echo '<tr class="odd gradeX">';
								echo '<td>'.$i++.'</td>';
								echo '<td id="p_code_td'.$i.'">'.$row->p_code.'</td>';
								echo '<td>'.$row->cut_id.'</td>';
								echo '<td>'.$row->name.'</td>';
								echo '<td>'.$row->mobile.'</td>';
								echo '<td>'.$row->booking_date.'</td>';
								echo '<td>'.$row->w_name.'</td>';
								echo '<td id="final_price_td">'.$row->final_price.'</td>';
								echo '<td id="payment_date_td'.$i.'">'.$row->payment_date.'</td>';
								echo '<td id="invoice_no_td'.$i.'">'.$row->invoice_no.'</td>';
								echo '<td id="payment_amount_td'.$i.'">'.$row->payment_amount.'</td>';
								//echo '<td id="note_td'.$i.'style="display:none;">'.$row->notes.'</td>';
						if ($disabled == "")
						{
								echo '<td>
								<button id="btnupdatepayemnts" name="btnupdatepayemnts" type="button" class="btn default btn-xs purple"  onclick="updatepayemnts('.$i.')">
										<i class="fa fa-edit"></i> تعديل </button>
										<button id="btndelpayments" name="btndelpayments" type="submit" value="Delete" class="btn default btn-xs black" onclick="deletepayments('.$row->p_code.','.$i.')"><i class="fa fa-trash-o"></i> حذف</button>
';
								echo '</td>';
						}
						else
						echo '<td></td>';
								echo '</tr>';
								
							}
							
								$remaining =$required-$total;
					
							?>
                              
						<!--	</tbody>
                            <tfoot id="payments_footer"> -->
                            <?php
							echo '<tr align="center" class="odd gradeX">';
								echo '<td colspan="10"><b>المجموع</td>';
								echo '<td id="tdTotal">'.$total.'</td>';
								echo '<td> </td>';
								echo '</tr>';
								echo '<tr align="center" class="odd gradeX">';
								echo '<td colspan="10"><b>المبلغ المتبقي</td>';
								echo '<td id="tdTotal">'.$remaining.'</td>';
								echo '<td> </td>';
								echo '</tr>';
							?>
                           <!-- </tfoot> -->
                          </tbody>
							</table>
    </div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
			</div>
            
