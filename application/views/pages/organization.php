<script type="text/javascript">
var baseURL = "<?php echo base_url(); ?>";
</script>
					<div class="portlet box blue-madison">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-user"></i>جدول الجمعيات
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
									 اسم الجمعية
								</th>
								<th>
									  تلفون
								</th>
                                <th>
									  جوال
								</th>
                                
								<th>
									  مشرف الجمعية
								</th>
                                 <th>
									  حالة الجمعية
								</th>
                                <th>&nbsp;
                                
                                </th>
							</tr>
							</thead>
							<tbody>
                            <?php
							$i = 1;
  							foreach($organization as $row)
  							{
								echo '<tr class="odd gradeX">';
								echo '<td>'.$i++.'</td>';
								echo '<td>'.$row->org_desc.'</td>';
								echo '<td>'.$row->tel.'</td>';
								echo '<td>'.$row->mobile.'</td>';
								echo '<td>'.$row->contact_person.'</td>';
								if ($row->org_status == 1)
								echo '<td><span class="label label-sm label-success">
									فعال</span>
									</td>';
								else if ($row->org_status == 0)
								echo '<td><span class="label label-sm label-warning">
									غير فعال</span>
									</td>';
								echo '<td align="center">';
								?>
                                <a href="<?php echo base_url()?>addorg/<?php echo $row->org_id?>" class="btn default btn-xs purple">
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