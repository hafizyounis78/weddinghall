<?php

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
								<i class="fa fa-gift"></i>دفعات الموظفين
							</div>
							
						</div>
						<div class="portlet-body form">
							<!-- BEGIN FORM-->
							<form action="#" id="emppayments_form" class="form-horizontal">
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
										<label class="control-label col-md-3">كود الموظف<span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<input type="text" name="emp_code" readonly <?php if (isset($row->emp_id)) {echo 'value="'.$row->emp_code.'"';}?>  data-required="1" class="form-control"/>
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
										<label class="control-label col-md-3">تاريخ الدفعة</label>
										<div class="col-md-4">
											<div class="input-group date date-picker" data-date-format="yyyy/mm/dd">
												<input type="text" class="form-control" data-required="1" readonly name="payment_date"/>
												<span class="input-group-btn">
												<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
												</span>
											</div>
											<!-- /input-group -->
											<span class="help-block">
											ex.:2015/08/01 </span>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3">قيمة الدفعة</label>
										<div class="col-md-4">
											<input name="payment_amount" type="text" data-required="1" class="form-control"/>
										</div>
                                     </div>
                                     <div class="form-group">
                   				<label class="control-label col-md-3">نوع الدفع<span class="required">*</span>
										</label>
										<div class="col-md-4">
											<select class="form-control select2me" data-required="1" name="payment_type">
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
                <div class="portlet box green">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i>عرض الدفعات المالية
							</div>
					
						</div>
                <div class="portlet-body">
							<table class="table table-striped table-bordered table-hover" id="sample_2">
							<thead>
							<tr>
								<th >
									*
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
									 قيمة الدفعة
								</th>
                                
							</tr>
							</thead>
							<tbody  >
							
								
								<?php
								$i=1;
  							foreach($employee_view as $row)
  							{
								echo '<tr class="odd gradeX">';
								echo '<td>'.$i++.'</td>';
								echo '<td>'.$row->emp_id.'</td>';
								echo '<td>'.$row->name.'</td>';
								echo '<td>'.$row->job.'</td>';
								echo '<td>'.$row->payment_type.'</td>';
								echo '<td>'.$row->payment_date.'</td>';
								echo '<td>'.$row->payment_amount.'</td>';
								echo '</tr>';
							}
							?>
                              
							</tbody>
							</table>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
			</div>
         </div>            
								