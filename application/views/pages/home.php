<script type="text/javascript">
var baseURL = "<?php echo base_url(); ?>";
</script>
			<div class="portlet box green-meadow calendar">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i>Calendar
							</div>
						</div>
						<div class="portlet-body">
							<div class="row">
								<div class="col-md-3 col-sm-12">
									<!-- BEGIN DRAGGABLE EVENTS PORTLET-->
                                    <label id="errLable" style="color:#F00;display:none"> الرجاء اختر الصالة</label>
									<h3 class="event-form-title">الصالـة</h3>
									<div id="external-events">
										<form class="inline-form">
                                        	<select class="form-control select2me" id="w_code" name="w_code">
												<option value="0">Select...</option>
                                                <?php
                                                foreach($hall as $row)
												{
													echo '<option value="'.$row->w_code.'" >'.$row->w_name.'</option>';
												}
												?>
                                             </select>
										</form>
										<hr/>
										<div id="event_box">
										</div>
										<hr class="visible-xs"/>
									</div>
									<!-- END DRAGGABLE EVENTS PORTLET-->
								</div>
								<div class="col-md-9 col-sm-12">
									<div id="calendar" class="has-toolbar">
									</div>
								</div>
							</div>
							<!-- END CALENDAR PORTLET-->
						</div>

					</div>
<script type="text/javascript">
var baseURL = "<?php echo base_url(); ?>";
</script>