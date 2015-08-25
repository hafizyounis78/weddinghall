					<div class="portlet box blue-madison">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-user"></i>جدول المستخدمين
							</div>
							<div class="actions">
								<a href="adduser" class="btn btn-default btn-sm">
								<i class="fa fa-plus"></i> إضافة مستخدم </a>
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
									 اسم المستخدم
								</th>
								<th>
									 الاسم كامل
								</th>
                                <th>
									 البريد الالكتروني
								</th>
								<th>
									 حالة المستخدم
								</th>
                                <th>
                                &nbsp;
                                </th>
							</tr>
							</thead>
							<tbody>
                            <?php
							$i = 1;
  							foreach($users as $row)
  							{
								echo '<tr class="odd gradeX">';
								echo '<td>'.$i++.'</td>';
								echo '<td>'.$row->username.'</td>';
								echo '<td>'.$row->name.'</td>';
								echo '<td>'.$row->email.'</td>';
								if ($row->status == 1)
								echo '<td><span class="label label-sm label-success">
									فعال</span>
									</td>';
								else if ($row->status == 0)
								echo '<td><span class="label label-sm label-warning">
									غير فعال</span>
									</td>';
							echo '<td align="center"><a href="#" class="btn default btn-xs purple">
										<i class="fa fa-edit"></i> تعديل </a>
									  <a href="#" class="btn default btn-xs black">
										<i class="fa fa-trash-o"></i> حذف </a>
								  </td>';
							echo '</tr>';
							
							}
							?>
							</tbody>
							</table>
					  </div>
					</div>