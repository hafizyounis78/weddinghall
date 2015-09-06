	<!-- Begin: life time stats -->
					<div class="portlet">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-search"></i>استعلام عام على الحجوزات
							</div>
							<div class="actions">
								<a href="addbooking" class="btn default yellow-stripe">
								<i class="fa fa-plus"></i>
								<span class="hidden-480">
								حجز جديد</span>
								</a>
								<div class="btn-group">
									<a class="btn default yellow-stripe" href="#" data-toggle="dropdown">
									<i class="fa fa-share"></i>
									<span class="hidden-480">
									Tools </span>
									<i class="fa fa-angle-down"></i>
									</a>
									<ul class="dropdown-menu pull-right">
										<li>
											<a href="#">
											Export to Excel </a>
										</li>
										<li>
											<a href="#">
											Export to CSV </a>
										</li>
										<li>
											<a href="#">
											Export to XML </a>
										</li>
										<li class="divider">
										</li>
										<li>
											<a href="#">
											Print Invoices </a>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="portlet-body">
							<div class="table-container">
								<div class="table-actions-wrapper">
									<span>
									</span>
									<select class="table-group-action-input form-control input-inline input-small input-sm">
										<option value="">Select...</option>
										<option value="Cancel">Cancel</option>
										<option value="Cancel">Hold</option>
										<option value="Cancel">On Hold</option>
										<option value="Close">Close</option>
									</select>
									<button class="btn btn-sm yellow table-group-action-submit"><i class="fa fa-check"></i> Submit</button>
								</div>
								<table class="table table-striped table-bordered table-hover" id="datatable_ajax">
								<thead>
								<tr role="row" class="heading">
									
									<th width="5%">
										 &nbsp;#
									</th>
									<th width="10%">
										 الصالة
									</th>
                                    <th width="14%">
										 تاريخ الحجز
									</th>
									<th width="10%">
									رقم الهوية
									</th>
									<th width="20%">
										 الاسم
									</th>
									<th width="10%">
										 تلفون
									</th>
									<th width="10%">
										 جوال
									</th>
									<th width="10%">
										 حالة الحجز
									</th>
									<th width="10%">
										 Actions
									</th>
								</tr>
								<tr role="row" class="filter">
									<td>
									
                                    </td>
                                    
									<td>
										<input type="text" class="form-control form-filter input-sm" name="w_name">
									</td>
									<td>
										<div class="input-group date date-picker margin-bottom-5" data-date-format="yyyy/mm/dd">
											<input type="text" class="form-control form-filter input-sm" readonly name="booking_date_from" placeholder="From">
											<span class="input-group-btn">
											<button class="btn btn-sm default" type="button"><i class="fa fa-calendar"></i></button>
											</span>
										</div>
										<div class="input-group date date-picker" data-date-format="yyyy/mm/dd">
											<input type="text" class="form-control form-filter input-sm" readonly name="booking_date_to" placeholder="To">
											<span class="input-group-btn">
											<button class="btn btn-sm default" type="button"><i class="fa fa-calendar"></i></button>
											</span>
										</div>
									</td>
									<td>
										<input type="text" class="form-control form-filter input-sm" name="cut_id">
									</td>
									<td>
										<input type="text" class="form-control form-filter input-sm" name="name">
									</td>
									<td>
											<input type="text" class="form-control form-filter input-sm" name="tel">
									</td>
									<td>
											<input type="text" class="form-control form-filter input-sm" name="mobile">
									</td>
									<td>
										<select name="booking_status" class="form-control form-filter input-sm">
											<option value="0">Select...</option>
											<option value="1">حجز فقط</option>
											<option value="2">حجز عليه دفعات مالية</option>
   											<option value="3">حجز مسسدد كامل الدفعات</option>
                                            <option value="4">ملغي</option>
											
										</select>
									</td>
									<td>
										<div class="margin-bottom-5">
											<button class="btn btn-sm yellow filter-submit margin-bottom"><i class="fa fa-search"></i> بحث</button>
										</div>
										<button class="btn btn-sm red filter-cancel"><i class="fa fa-times"></i> بحث جديد</button>
									</td>
								</tr>
								</thead>
								<tbody>
                                		<?php
								$i=1;
								$x='';
  							foreach($searchbooking as $row)
  							{ 
							
								
								echo '<tr class="odd gradeX">';
								echo '<td>'.$i++.'</td>';
								echo '<td>'.$row->w_name.'</td>';
								echo '<td>'.$row->booking_date.'</td>';
								echo '<td>'.$row->cut_id.'</td>';
								echo '<td>'.$row->name.'</td>';
								echo '<td>'.$row->tel.'</td>';
								echo '<td>'.$row->mobile.'</td>';
								if ($row->booking_status == 1)
								echo '<td><span class="label label-sm label-success">
									حجز فقط</span>
									</td>';
								else if ($row->booking_status == 2)
								echo '<td><span class="label label-sm label-warning">
							حجز عليه دفعات مالية </span>
									</td>';
									else if ($row->booking_status == 4)
								echo '<td><span class="label label-sm label-warning">
							حجز مسسدد كامل الدفعات </span>
									</td>';
								else if ($row->booking_status == 4)
								echo '<td><span class="label label-sm label-warning">
							ملغي </span>
									</td>';
			
								echo '<td>
                               
      <a href="javascript:;" class="btn btn-xs default"><i class="fa fa-search"></i> View</a>
								</td>';
							}
							?>
			                    
								</tr>
            					</tbody>
								</table>
							</div>
						</div>
					</div>
					<!-- End: life time stats -->
				</div>
			</div>
			<!-- END PAGE CONTENT-->
		