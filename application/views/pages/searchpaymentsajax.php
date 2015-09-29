<script type="text/javascript">
var baseURL = "<?php echo base_url(); ?>";
</script>
<style>
 	.day:hover
	{
		background-color:#c0c0c0;
	}
 </style>
	<!-- Begin: life time stats -->
					<div class="portlet">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-search"></i>استعلام عام على الدفعات المالية
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
									<button type="button" class="btn default" value="Cancel" onclick="window.location='<?php echo base_url()?>';"><i class="fa fa-times"></i>    عودة     </button>
								</div>
								<table class="table table-striped table-bordered table-hover" id="payments_datatable">
								<thead>
								<tr role="row" class="heading">
									
									<th width="5%">
										 &nbsp;#
									</th>
									<th width="10%">
									رقم الهوية
									</th>
                                    <th width="14%">
									 الاسم
									</th>
									<th width="10%">
									 الصالة
									</th>
									<th width="10%">
									تاريخ الحجز
									</th>
									<th width="10%">
									المبلغ المطلوب
                                    </th>
                                    <th width="10%">
                                    قيمة الدفعة
									</th>
									<th width="10%">
									تاريخ الدفعة
                					</th>
									<th width="10%">
									رقم الفاتورة
									</th>
									<th width="10%">
										 Actions
									</th>
								</tr>
								<tr role="row" class="filter">
									<td>
									
                                    </td>
                                    <td>
										<input type="text" class="form-control form-filter input-sm" name="cut_id">
									</td>
                                    <td>
										<input type="text" class="form-control form-filter input-sm" name="name">
									</td>
									<td>
										<select id="w_code" name="w_code" class="form-control form-filter input-sm">
											<option value="">Select...</option>
											<?php
												
												foreach($hall as $row)
												{
												?>
							                     <option value="<?php echo $row->w_code;?>" > <?php echo $row->w_name;?></option>

                                                <?php
												}
												?>
											
										</select>
									</td>
									<td>
										<div class="input-group date date-picker margin-bottom-5" data-date-format="yyyy/mm/dd">
											<input type="text" class="form-control form-filter input-sm dp" readonly name="booking_date_from" placeholder="From">
											<span class="input-group-btn">
											<button class="btn btn-sm default" type="button"><i class="fa fa-calendar"></i></button>
											</span>
										</div>
										<div class="input-group date date-picker" data-date-format="yyyy/mm/dd">
											<input type="text" class="form-control form-filter input-sm dp" readonly name="booking_date_to" placeholder="To">
											<span class="input-group-btn">
											<button class="btn btn-sm default" type="button"><i class="fa fa-calendar"></i></button>
											</span>
										</div>
									</td>
									
                                    <td>
										<input type="text" class="form-control form-filter input-sm" name="final_price">
									</td>
                                    <td>
										<input type="text" class="form-control form-filter input-sm" name="payment_amount">
									</td>
									<td>
										<div class="input-group date date-picker margin-bottom-5" data-date-format="yyyy/mm/dd">
											<input type="text" class="form-control form-filter input-sm dp" readonly name="payment_date_from" placeholder="From">
											<span class="input-group-btn">
											<button class="btn btn-sm default" type="button"><i class="fa fa-calendar"></i></button>
											</span>
										</div>
										<div class="input-group date date-picker" data-date-format="yyyy/mm/dd">
											<input type="text" class="form-control form-filter input-sm dp" readonly name="payment_date_to" placeholder="To">
											<span class="input-group-btn">
											<button class="btn btn-sm default" type="button"><i class="fa fa-calendar"></i></button>
											</span>
										</div>
									</td>
                                    <td>
											<input type="text" class="form-control form-filter input-sm" name="invoice_no">
									</td>
	                               	<td>
										<div class="margin-bottom-5">
											<button type="submit" class="btn btn-sm yellow filter-submit margin-bottom"><i class="fa fa-search"></i>   بحث</button>
										</div>
										<button class="btn btn-sm red filter-cancel"><i class="fa fa-times"></i> بحث جديد</button>
									</td>
								</tr>
								</thead>
								<tbody>
                                          					</tbody>
								</table>
							</div>
						</div>
					</div>
					<!-- End: life time stats -->
				</div>
			</div>
			<!-- END PAGE CONTENT-->
		<script src="<?php echo base_url();?>assets/admin/pages/scripts/payments_table_ajax.js"></script>