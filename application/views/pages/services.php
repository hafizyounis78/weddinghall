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

								echo '<td align="center"><a href="pages/view/addservices/'.$row->sev_code.'" class="btn default btn-xs purple">
										<i class="fa fa-edit"></i> تعديل </a>
									  <button id="btndelemp" name="btndelemp" type="button" class="btn default btn-xs black" onclick="deleteservice(\''.$row->sev_code.'\')">
										<i class="fa fa-trash-o"></i> حذف </button>
								  </td>';
							echo '</tr>';
							
							}
							?>
							</tbody>
							</table>
					  </div>
					</div>