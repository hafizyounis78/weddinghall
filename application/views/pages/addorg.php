<script type="text/javascript">
var baseURL = "<?php echo base_url(); ?>";
</script>
<?php
if (isset($addorg))
{
	foreach($addorg as $row);
}
?>
<!-- BEGIN VALIDATION STATES-->
					<div class="portlet box green">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-user"></i>اضـافة جمعية					</div>
						</div>
						<div class="portlet-body form">
							<!-- BEGIN FORM-->
                            <form action="#" id="org_form" class="form-horizontal">
								<div class="form-body">
									<h3 class="form-section"></h3>
									<input id="org_id" name="org_id" type="hidden" 
                                    <?php 
										if (isset($row->org_id))
											echo 'value="'.$row->org_id.'"';
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
										<label class="control-label col-md-3">اسم الجمعية <span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<input type="text" name="org_desc" data-required="1" class="form-control"
                                            <?php 
												if(isset($row->org_desc))
													echo 'value="'.$row->org_desc.'"';
											?>
                                            />
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-md-3">تلفون <span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<input type="text" name="tel" data-required="1" class="form-control"
                                            <?php 
												if(isset($row->tel))
													echo 'value="'.$row->tel.'"';
											?>
                                            />
										</div>
									</div>
                                    <div class="form-group">
										<label class="control-label col-md-3">جوال <span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<input type="text" name="mobile" data-required="1" class="form-control"
                                            <?php 
												if(isset($row->mobile))
													echo 'value="'.$row->mobile.'"';
											?>
                                            />
										</div>
									</div>
								
									<div class="form-group">
										<label class="control-label col-md-3">مشرف الجمعية <span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<input type="text" name="contact_person" data-required="1" class="form-control"
                                            <?php 
												if(isset($row->contact_person))
													echo 'value="'.$row->contact_person.'"';
											?>
                                            />
										</div>
									</div>
                                    <div class="form-group">
										<label class="control-label col-md-3">فعال
										</label>
										<div class="col-md-4">
												<label>
												<input type="checkbox" value="1" name="org_status"
                                                 <?php 
												if(isset($row->org_status) && $row->org_status == 0)
													echo '';
												else
													echo 'checked="checked"';
												?>
                                                /> </label>
										</div>
									</div>


								</div>
								<div class="form-actions">
									<div class="row">
										<div class="col-md-offset-3 col-md-9">
											<button type="submit" class="btn green" id="btnAddorg" name="btnAddorg">حفظ</button>
										<button type="button" class="btn default" value="Cancel" onclick="window.location='<?php echo base_url()?>organization/';">عودة</button>
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

