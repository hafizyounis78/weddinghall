<script type="text/javascript">
var baseURL = "<?php echo base_url(); ?>";
</script>
<div class="row">
				<div class="col-md-12">
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
  							foreach($searchemppayments as $row)
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
