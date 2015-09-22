<script type="text/javascript">
var baseURL = "<?php echo base_url(); ?>";
</script>
<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box yellow">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-user"></i>جدول عرض الدفعات المالية
							</div>
							<div class="actions">
								<a href="addbooking" class="btn btn-default btn-sm">
								<i class="fa fa-pencil"></i>إضافة حجز جديد </a>
											</div>
						</div>
						<div class="portlet-body">
							<table class="table table-striped table-bordered table-hover" id="sample_2">
							<thead>
							<tr>
								
								<th>
									#
								</th>
								<th>
									 الصالة
								</th>
								<th>
									 تاريخ الحجز
								</th>
								<th>
									 اسم العريس
								</th>
                                <th>
									 تلفون
								</th>
                                <th>
									 جوال
								</th>
                                <th>
									 عنوان
								</th>
                                <th>
									 كود الحجز
								</th>
                                <th>
                                       
                                </th>
							</tr>
							</thead>
							<tbody  >
							
								
								<?php
								$i=1;
  							foreach($payments as $row)
  							{
								echo '<tr class="odd gradeX">';
								echo '<td>'.$i++.'</td>';
								echo '<td>'.$row->w_name.'</td>';
								echo '<td>'.$row->booking_date.'</td>';
								echo '<td>'.$row->name.'</td>';
								echo '<td>'.$row->tel.'</td>';
								echo '<td>'.$row->mobile.'</td>';
								echo '<td>'.$row->address.'</td>';
								echo '<td>'.$row->booking_code.'</td>';
								echo '<td>
								<a href="pages/view/addpayments/'.$row->booking_code.'" class="btn default btn-xs purple">
										<i class="fa fa-edit"></i> تعديل </a>
								<a href="pages/view/addpayments/'.$row->booking_code.'" class="btn default btn-xs blue">
										<i class="fa fa-edit"></i> اضافة دفعه مالية </a>';
								echo '</td>';
								echo '</tr>';
							}
							?>
                              
							</tbody>
							</table>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
				</div>