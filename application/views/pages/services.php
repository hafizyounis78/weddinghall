					<div class="portlet box blue-madison">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-user"></i>جدول الخدمات
							</div>
							<div class="actions">
								<a href="addservices" class="btn btn-default btn-sm">
								<i class="fa fa-plus"></i> إضافة خدمة </a>
							</div>
						</div>
						<div class="portlet-body">
							<table class="table table-striped table-bordered table-hover" id="sample_3">
							<thead>
							<tr>
								<th>
									#
								</th>
								<th>
									 اسم الخدمة
								</th>
								<th>
									  السعر
								</th>
                                <th>
									  حالة الخدمة
								</th>
                                
							    <th>&nbsp;
                                
                                </th>
							</tr>
							</thead>
							<tbody>
                            <?php
							$i = 1;
  							foreach($services as $row)
  							{
								echo '<tr class="odd gradeX">';
								echo '<td>'.$i++.'</td>';
								echo '<td>'.$row->sev_desc.'</td>';
								echo '<td>'.$row->sev_price.'</td>';
								if ($row->sev_status == 1)
								echo '<td><span class="label label-sm label-success">
									فعال</span>
									</td>';
								else if ($row->sev_status == 0)
								echo '<td><span class="label label-sm label-warning">
									غير فعال</span>
									</td>';


								echo '<td align="center"><a href="http://localhost/weddinghall/addservices/'.$row->sev_code.'" class="btn default btn-xs purple">
										<i class="fa fa-edit"></i> تعديل </a>
									 
								  </td>';
							echo '</tr>';
							
							}
							?>
							</tbody>
							</table>
					  </div>
					</div>