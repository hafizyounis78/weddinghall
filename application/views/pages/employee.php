<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box yellow">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-user"></i>جدول عرض الموظفين
							</div>
							<div class="actions">
								<a href="addemp" class="btn btn-default btn-sm">
								<i class="fa fa-pencil"></i>إضافة موظف </a>
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
									رقم الهوية
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
                                <th>
                                       
                                </th>
							</tr>
							</thead>
							<tbody  >
							
								
								<?php
								$i=1;
  							foreach($employee as $row)
  							{
								echo '<tr class="odd gradeX">';
								echo '<td>'.$i++.'</td>';
								echo '<td>'.$row->emp_id.'</td>';
								echo '<td>'.$row->name.'</td>';
								echo '<td>'.$row->job.'</td>';
								echo '<td>'.$row->mobile.'</td>';
								echo '<td>'.$row->address.'</td>';
								echo '<td align="center"><a href="'.base_url().'addemp/'.$row->emp_code.'" class="btn default btn-xs purple">
										<i class="fa fa-edit"></i> تعديل </a>

								<button id="btndelemp" name="btndelemp" type="submit" value="Delete" class="btn default btn-xs black" onclick="deleteEmp('.$row->emp_code.')"><i class="fa fa-trash-o"></i> Delete</button>
';
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