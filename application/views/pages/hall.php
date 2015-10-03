<script type="text/javascript">
var baseURL = "<?php echo base_url(); ?>";
</script>
					<div class="portlet box blue-madison">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-user"></i>جدول الصالات
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
								echo '<td align="center">';
								?>
                                <a href="<?php echo base_url()?>addhall/<?php echo $row->w_code?>" class="btn default btn-xs purple">
										<i class="fa fa-edit"></i> تعديل </a>
							<?php
							echo  '</td>';
							echo '</tr>';
							
							}
							?>
							</tbody>
							</table>
					  </div>
					</div>