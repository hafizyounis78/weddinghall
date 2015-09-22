<script type="text/javascript">
var baseURL = "<?php echo base_url(); ?>";
</script>
<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box yellow">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-user"></i>جدول عرض الحجوزات
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
									 حالة الحجز
								</th>
                                <th>
                                       
                                </th>
							</tr>
							</thead>
							<tbody  >
							
								
								<?php
								$i=1;
								$x='';
  							foreach($booking as $row)
  							{ 
							
								
								echo '<tr class="odd gradeX">';
								echo '<td>'.$i++.'</td>';
								echo '<td>'.$row->w_name.'</td>';
								echo '<td>'.$row->booking_date.'</td>';
								echo '<td>'.$row->name.'</td>';
								echo '<td>'.$row->tel.'</td>';
								echo '<td>'.$row->mobile.'</td>';
								echo '<td>'.$row->address.'</td>';
								if ($row->booking_status == 1)
								echo '<td><span class="label label-sm label-success">
									فعال</span>
									</td>';
								else if ($row->booking_status == 4)
								echo '<td><span class="label label-sm label-warning">
							ملغي </span>
									</td>';
								echo '<td>
								<a href="pages/view/addbooking/'.$row->booking_code.'" class="btn default btn-xs purple">
								<i class="fa fa-edit"></i> تعديل </a>
<button id="btndelbooking" name="btndelbooking" type="button" class="btn default btn-xs black" onclick="deletebooking(\''.$row->booking_code.'\')">
										<i class="fa fa-trash-o"></i> حذف </button>';
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