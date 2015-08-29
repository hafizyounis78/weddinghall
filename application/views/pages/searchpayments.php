<div class="row">
				<div class="col-md-12">
					<!-- BEGIN VALIDATION STATES-->
              
					
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
									 جوال
								</th>
								<th>
									 تاريخ الحجز
								</th>
                                <th>
									 اسم الصالة
								</th>
                                <th>
									 المبلغ الإجمالي
								</th>
                                 <th>
									 تاريخ الدفعة 
								</th>
                                <th>
									 قيمة الدفعة
								</th>
                                <th>
									 رقم اللإيصال المالي
								</th>
                                
							</tr>
							</thead>
							<tbody  >
							
								
								<?php
								$i=1;
  							foreach($searchpayments as $row)
  							{
								echo '<tr class="odd gradeX">';
								echo '<td>'.$i++.'</td>';
								echo '<td>'.$row->cut_id.'</td>';
								echo '<td>'.$row->name.'</td>';
								echo '<td>'.$row->mobile.'</td>';
								echo '<td>'.$row->booking_date.'</td>';
								echo '<td>'.$row->w_name.'</td>';
								echo '<td>'.$row->total_price.'</td>';
								echo '<td>'.$row->payment_date.'</td>';
								echo '<td>'.$row->payment_amount.'</td>';
								echo '<td>'.$row->invoice_no.'</td>';
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