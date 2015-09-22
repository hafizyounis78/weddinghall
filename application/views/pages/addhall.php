<script type="text/javascript">
var baseURL = "<?php echo base_url(); ?>";
</script>
<?php
if (isset($addhall))
{
	foreach($addhall as $row);
}
?>
<!-- BEGIN VALIDATION STATES-->
					<div class="portlet box green">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-user"></i>اضـافة صالة
							</div>
						</div>
						<div class="portlet-body form">
							<!-- BEGIN FORM-->
                            <form action="#" id="hall_form" class="form-horizontal">
								<div class="form-body">
									<h3 class="form-section"></h3>
									<input id="w_code" name="w_code" type="hidden" 
                                    <?php 
										if (isset($row->w_code))
											echo 'value="'.$row->w_code.'"';
										else
											echo 'value=""';
									?> />
                                    <div class="alert alert-danger display-hide">
										<button class="close" data-close="alert"></button>
										يـوجد خطأ في ادخال الحقول ... الرجــاء التأكد من الادخال بشـكل صحيـح
									</div>
									<div class="alert alert-success display-hide">
										<button class="close" data-close="alert"></button>
										تمت عملية التحقق بنجاح!
									</div>
									<div class="form-group">
										<label class="control-label col-md-3">اسم الصالة <span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<input type="text" name="w_name" data-required="1" class="form-control"
                                            <?php 
												if(isset($row->w_name))
													echo 'value="'.$row->w_name.'"';
											?>
                                            />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3">عنوان <span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<input type="text" name="address" data-required="1" class="form-control"
                                            <?php 
												if(isset($row->address))
													echo 'value="'.$row->address.'"';
											?>
                                            />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3">مشرف الصالة <span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<input type="text" name="w_emp" data-required="1" class="form-control"
                                            <?php 
												if(isset($row->w_emp))
													echo 'value="'.$row->w_emp.'"';
											?>
                                            />
										</div>
									</div>

								</div>
								<div class="form-actions">
									<div class="row">
										<div class="col-md-offset-3 col-md-9">
											<button type="submit" class="btn green" id="btnAddhall" name="btnAddhall">حفظ</button>
										<button type="button" class="btn default" value="Cancel" onclick="window.location='<?php echo base_url()?>hall/';">عودة</button>
										</div>
									</div>
								</div>
							</form>
							
							<!-- END FORM-->
						</div>
						<!-- END VALIDATION STATES-->
<!-- JQUERY
<script type="text/javascript">
$(document).ready(function(){
$('#btnAdduser').click(function() {
	alert('hi');
});
});
</script>--> 
<!-- END JQUERY-->                  