<?php
$isUpdate=0;
if (isset($adduser))
{
	foreach($adduser as $row);
	$isUpdate = 1;
}
?>
<style>
 	.day:hover
	{
		background-color:#c0c0c0;
	}
 </style>
<!-- BEGIN VALIDATION STATES-->
					<div class="portlet box green">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-user"></i>اضـافة مستــخدم
							</div>
						</div>
						<div class="portlet-body form">
							<!-- BEGIN FORM-->
                            <form action="#" id="user_form" class="form-horizontal">
								<div class="form-body">
									<h3 class="form-section"></h3>
									<input id="hdnAction" name="hdnAction" type="hidden" value="<?php echo $isUpdate;?>" />
                                    <div class="alert alert-danger display-hide">
										<button class="close" data-close="alert"></button>
										يـوجد خطأ في ادخال الحقول ... الرجــاء التأكد من الادخال بشـكل صحيـح
									</div>
									<div class="alert alert-success display-hide">
										<button class="close" data-close="alert"></button>
										تمت عملية التحقق بنجاح!
									</div>
									<div class="form-group">
										<label class="control-label col-md-3">الاســم <span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<input type="text" name="name" data-required="1" class="form-control"
                                            <?php 
												if(isset($row->name))
													echo 'value="'.$row->name.'"';
											?>
                                            />
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">البريد الإلكتروني <span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<div class="input-group">
												<span class="input-group-addon">
												<i class="fa fa-envelope"></i>
												</span>
												<input type="email" name="email" class="form-control" placeholder="البريد الإلكتروني"
                                                 <?php 
												if(isset($row->email))
													echo 'value="'.$row->email.'"';
												?>
                                                />
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3">اسم المستخدم <span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<input type="text" name="username" data-required="1" class="form-control" 
                                            <?php 
												if(isset($row->username))
												{
													echo 'value="'.$row->username.'" ';
													echo 'readonly="readonly"';
												}
											?>
                                            />
										</div>
									</div>
                                    <div class="form-group">
										<label class="control-label col-md-3">كلمة المرور <span class="required">
										* </span></label>
										<div class="col-md-4">
											<input id="password" name="password" type="password" class="form-control" 
                                            <?php 
												if(isset($row->password))
													echo 'value="'.$row->password.'"';
											?>
                                            />
										</div>
									</div>
                                    <div class="form-group">
										<label class="control-label col-md-3">تأكيد كلمة المرور <span class="required">
										* </span></label>
										<div class="col-md-4">
											<input name="confpassword" type="password" class="form-control"
                                            <?php 
												if(isset($row->password))
													echo 'value="'.$row->password.'"';
											?>
                                            />
										</div>
									</div>
                                    <div class="form-group">
										<label class="control-label col-md-3">حساب فعال
										</label>
										<div class="col-md-4">
												<label>
												<input type="checkbox" value="1" name="status"
                                                 <?php 
												if(isset($row->status) && $row->status == 0)
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
											<button type="submit" class="btn green" id="btnAdduser" name="btnAdduser">حــفـظ</button>
											<button type="button" class="btn default" value="Cancel" onclick="window.location='http://localhost/weddinghall/users/';">عودة</button>
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
