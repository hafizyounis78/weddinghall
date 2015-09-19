<?php
if (isset($addservices))
{
	foreach($addservices as $row);
}
?>
<!-- BEGIN VALIDATION STATES-->
					<div class="portlet box green">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-user"></i>اضـافة خدمة
							</div>
						</div>
						<div class="portlet-body form">
							<!-- BEGIN FORM-->
                            <form action="#" id="serv_form" class="form-horizontal">
								<div class="form-body">
									<h3 class="form-section"></h3>
									<input id="sev_code" name="sev_code" type="hidden" 
                                    <?php 
										if (isset($row->sev_code))
											echo 'value="'.$row->sev_code.'"';
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
										<label class="control-label col-md-3">اسم الخدمة <span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<input type="text" name="sev_desc" data-required="1" class="form-control"
                                            <?php 
												if(isset($row->sev_desc))
													echo 'value="'.$row->sev_desc.'"';
											?>
                                            />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3">سعر الخدمة <span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<input type="text" name="sev_price" data-required="1" class="form-control"
                                            <?php 
												if(isset($row->sev_price))
													echo 'value="'.$row->sev_price.'"';
											?>
                                            />
										</div>
									</div>
                                    <div class="form-group">
										<label class="control-label col-md-3">فعال
										</label>
										<div class="col-md-4">
												<label>
												<input type="checkbox" value="1" name="sev_status"
                                                 <?php 
												if(isset($row->sev_status) && $row->sev_status == 0)
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
											<button type="submit" class="btn green" id="btnAddservice" name="btnAddservice">حـفـظ</button>
											<button type="button" class="btn default" value="Cancel" onclick="window.location='http://localhost/weddinghall/services/';">عودة</button>
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