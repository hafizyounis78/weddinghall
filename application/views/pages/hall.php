					<div class="portlet box blue-madison">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-user"></i>جدول الصالات
							</div>
							<div class="actions">
								<a href="adduser" class="btn btn-default btn-sm">
								<i class="fa fa-plus"></i> إضافة صالة </a>
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
									 اسم الصالة
								</th>
								<th>
									  عنوان
								</th>
                                
								<th>
									  مشرف الصالة
								</th>
                                <th>&nbsp;
                                
                                </th>
							</tr>
							</thead>
							<tbody>
                            <?php
							$i = 1;
  							foreach($hall as $row)
  							{
								echo '<tr class="odd gradeX">';
								echo '<td>'.$i++.'</td>';
								echo '<td>'.$row->w_name.'</td>';
								echo '<td>'.$row->address.'</td>';
								echo '<td>'.$row->w_emp.'</td>';
								echo '<td align="center"><a href="pages/view/addhall/'.$row->w_code.'" class="btn default btn-xs purple">
										<i class="fa fa-edit"></i> تعديل </a>
									  <button id="btndelemp" name="btndelemp" type="button" class="btn default btn-xs black" onclick="deletehall(\''.$row->w_code.'\')">
										<i class="fa fa-trash-o"></i> حذف </button>
								  </td>';
							echo '</tr>';
							
							}
							?>
							</tbody>
							</table>
					  </div>
					</div>