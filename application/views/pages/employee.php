<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box yellow">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-user"></i>جدول عرض الموظفين
							</div>
							<div class="actions">
								<a href="javascript:;" class="btn btn-default btn-sm">
								<i class="fa fa-pencil"></i> Add </a>
								<div class="btn-group">
									<a class="btn btn-default btn-sm" href="javascript:;" data-toggle="dropdown">
									<i class="fa fa-cogs"></i> Tools <i class="fa fa-angle-down"></i>
									</a>
									<ul class="dropdown-menu pull-right">
										<li>
											<a href="javascript:;">
											<i class="fa fa-pencil"></i> Edit </a>
										</li>
										<li>
											<a href="javascript:;">
											<i class="fa fa-trash-o"></i> Delete </a>
										</li>
										<li>
											<a href="javascript:;">
											<i class="fa fa-ban"></i> Ban </a>
										</li>
										<li class="divider">
										</li>
										<li>
											<a href="javascript:;">
											<i class="i"></i> Make admin </a>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="portlet-body">
							<table class="table table-striped table-bordered table-hover" id="sample_2">
							<thead>
							<tr>
								<th class="table-checkbox">
									<input type="checkbox" class="group-checkable" data-set="#sample_2 .checkboxes"/>
								</th>
								<th>
									كود الموظف
								</th>
								<th>
									 الاسم
								</th>
								<th>
									 الوظيفه
								</th>
                                <th>
									 جوال
								</th>
                                <th>
									 عنوان
								</th>
							</tr>
							</thead>
							<tbody>
							<tr class="odd gradeX">
								
								<?php
  							foreach($employee as $row)
  							{
								echo '<tr class="odd gradeX">';
								echo '<td>							<input type="checkbox" class="checkboxes" value="1"/>
								</td>';
								echo '<td>'.$row->emp_code.'</td>';
								echo '<td>'.$row->name.'</td>';
								echo '<td>'.$row->job.'</td>';
								echo '<td>'.$row->mobile.'</td>';
								echo '<td>'.$row->address.'</td>';
							echo '</tr>';
							}
							?>
                              
							</tbody>
							</table>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
				</div>