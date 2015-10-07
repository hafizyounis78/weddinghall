<script type="text/javascript">
var baseURL = "<?php echo base_url(); ?>";
</script>
<?php
$isUpdate=0;
if (isset($addemppayments))
{
foreach($addemppayments as $row);

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
								<i class="fa fa-gift"></i>دفعات الموظفين
							</div>
							
						</div>
						<div class="portlet-body form">
							<!-- BEGIN FORM-->
							<form action="#" id="emppayments_form" class="form-horizontal">
								<div class="form-body">
									<h3 class="form-section"></h3>
	
                                     <input id="hdnAction" name="hdnAction" type="hidden" value="<?php echo $isUpdate;?>" /> 
                                      <input id="ep_code" name="ep_code" type="hidden" /> 
 
                                    <div class="alert alert-danger display-hide">
										<button class="close" data-close="alert"></button>
										يـوجد خطأ في ادخال الحقول ... الرجــاء التأكد من الادخال بشـكل صحيـح
									
									</div>
									<div class="alert alert-success display-hide">
										<button class="close" data-close="alert"></button>
										تمت عملية التحقق بنجاح!
									</div>
                                    <div class="form-group">
																				<div class="col-md-4">
											<input type="hidden" id="emp_code" name="emp_code" readonly <?php if (isset($row->emp_code)) {echo 'value="'.$row->emp_code.'"';}?>  data-required="1" class="form-control"/>
										</div>
									</div>

                                    <div class="form-group">
										<label class="control-label col-md-3">رقم الهوية <span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<input type="text" name="emp_id" readonly <?php if (isset($row->emp_id)) {echo 'value="'.$row->emp_id.'"';}?>  data-required="1" class="form-control"/>
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-md-3">الاسم<span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<input type="text" name="name" readonly   <?php if (isset($row->name)) {echo 'value="'.$row->name.'"';}?> class="form-control"/>
										</div>
									</div>
                              		<div class="form-group">
                   				<label class="control-label col-md-3">نوع الدفع<span class="required">*</span>
										</label>
										<div class="col-md-4">
											<select class="form-control select2me" data-required="1" id="payment_type" name="payment_type">
												<option value="0">Select...</option>
												<option value="1">راتب شهري</option>
                                                <option value="2">سلفة مالية</option>
						                        
											</select>
										</div>
									</div>
                                    <div class="form-group">
										<label class="control-label col-md-3">تاريخ الدفعة</label>
										<div class="col-md-4">
											<div class="input-group date date-picker" data-date-format="yyyy/mm/dd">
												<input type="text" class="form-control dp" data-required="1" readonly id="payment_date" name="payment_date"/>
												<span class="input-group-btn">
												<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
												</span>
											</div>
											<!-- /input-group -->
											<span class="help-block">
											 </span>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3">قيمة الدفعة</label>
										<div class="col-md-4">
											<input id="payment_amount" name="payment_amount" type="text" data-required="1" class="form-control"/>
										</div>
                                     </div>
                                     <div class="form-group">
										<label class="control-label col-md-3">رقم الوصل المالي</label>
										<div class="col-md-4">
											<input id="invoice_no" name="invoice_no" type="text" data-required="1" class="form-control"/>
                                            
										</div>
                                     </div>
                                     
						
                                     
								<div class="form-actions">
									<div class="row">
										<div class="col-md-offset-3 col-md-9">
											<button id="btnAddemppayments" name="btnAddemppayments" type="submit"  class="btn green">Submit</button>
											<button type="button" class="btn default" value="Cancel" onclick="window.location='<?php echo base_url()?>searchemppaymentsajax/';">عودة</button>
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
							<table class="table table-striped table-bordered table-hover" id="sample_2">
							<thead >
							<tr >
								<th>
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
									 الوظيفه
								</th>
                                <th>
									 نوع الدفعة 
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
							<tbody id="emppayments_body" >
							
								
								<?php
								$i=1;
								$total = 0;
  							foreach($employee_view as $row)
  							{	$total = $total + $row->payment_amount;
								echo '<tr align="center" class="odd gradeX">';
								echo '<td>'.$i++.'</td>';
								echo '<td id="ep_code_td'.$i.'">'.$row->ep_code.'</td>';
								echo '<td>'.$row->emp_id.'</td>';
								echo '<td>'.$row->name.'</td>';
								echo '<td>'.$row->job_title.'</td>';
								if($row->payment_type==1)
								echo '<td id="payment_type_td'.$i.'"> راتب شهري </td>';
								else if($row->payment_type==2)
								echo '<td id="payment_type_td'.$i.'"> سلفة </td>';
								echo '<td id="payment_date_td'.$i.'">'.$row->payment_date.'</td>';
								echo '<td id="invoice_no_td'.$i.'">'.$row->invoice_no.'</td>';
								echo '<td id="payment_amount_td'.$i.'">'.$row->payment_amount.'</td>';
								echo '<td>
								<button id="btnupdateemppayemnts" name="btnupdateemppayemnts" type="button" class="btn default btn-xs purple" onclick="updatempepayemnts('.$i.')">
										<i class="fa fa-edit"></i> تعديل </button>
										<button id="btndelemppayments" name="btndelemppayments" type="submit" value="Delete" class="btn default btn-xs black" onclick="deletempepayments('.$row->ep_code.')"><i class="fa fa-trash-o"></i> حذف</button>';
								echo '</td>';
								echo '</tr>';
							}
							?>
                            </tbody>
							
							
                          <!--
                            <tfoot id="emppayments_footer">  
							echo '<tr align="center" class="odd gradeX">';
								echo '<td colspan="8"><b>المجموع</td>';
								echo '<td id="tdTotal">'.$total.'</td>';
								echo '<td > </td>';
														
								echo '</tr>';
								
						
                             </tfoot>--> 

							
							</table>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
			</div>
         </div>            
								
