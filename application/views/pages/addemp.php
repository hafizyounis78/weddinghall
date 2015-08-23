<div class="row">
				<div class="col-md-12">
					<!-- BEGIN VALIDATION STATES-->
					<div class="portlet box green">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i>Advance Validation
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="#portlet-config" data-toggle="modal" class="config">
								</a>
								<a href="javascript:;" class="reload">
								</a>
								<a href="javascript:;" class="remove">
								</a>
							</div>
						</div>
						<div class="portlet-body form">
							<!-- BEGIN FORM-->
							<form action="#" id="form_sample_3" class="form-horizontal">
								<div class="form-body">
									<h3 class="form-section">Advance validation. <small>Custom radio buttons, checkboxes and Select2 dropdowns</small></h3>
									<div class="alert alert-danger display-hide">
										<button class="close" data-close="alert"></button>
										You have some form errors. Please check below.
									</div>
									<div class="alert alert-success display-hide">
										<button class="close" data-close="alert"></button>
										Your form validation is successful!
									</div>
                                    <div class="form-group">
										<label class="control-label col-md-3">رقم الهوية <span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<input type="text" name="emp_id" data-required="1" class="form-control"/>
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-md-3">الاسم<span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<input type="text" name="name" data-required="1" class="form-control"/>
										</div>
									</div>
                                    									<div class="form-group">
										<label class="control-label col-md-3">الجنس <span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<div class="radio-list" data-error-container="#form_2_membership_error">
												<label>
												<input type="radio" name="sex" value="1"/>
												ذكر </label>
												<label>
												<input type="radio" name="sex" value="2"/>
												أنتى </label>
											</div>
											<div id="form_2_membership_error">
											</div>
										</div>
									</div>
	<div class="form-group">
										<label class="control-label col-md-3">تاريخ الميلاد</label>
										<div class="col-md-4">
											<div class="input-group date date-picker" data-date-format="dd-mm-yyyy">
												<input type="text" class="form-control" readonly name="dob">
												<span class="input-group-btn">
												<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
												</span>
											</div>
											<!-- /input-group -->
											<span class="help-block">
											select a date </span>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3">تلفون</label>
										<div class="col-md-4">
											<input name="tel" type="text" class="form-control"/>
										</div>
                                     </div>
                                     <div class="form-group">
										<label class="control-label col-md-3">جوال</label>
										<div class="col-md-4">
											<input name="mobile" type="text" class="form-control"/>
										</div>
                                     </div>
                                     <div class="form-group">
										<label class="control-label col-md-3">عنوان</label>
										<div class="col-md-4">
											<input name="address" type="text" class="form-control"/>
										</div>
                                     </div>
									
									<div class="form-group">
										<label class="control-label col-md-3">الوظيفة<span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<select class="form-control select2me" name="job">
												<option value="">Select...</option>
												<option value="Option 1">مضيف</option>
                                                <option value="Option 3">محاسب مالي</option>
												<option value="Option 2">مصور</option>
												<option value="Option 3">عامل</option>
                                                <option value="Option 3">نظام صالة</option>
                                                <option value="Option 3">حارس</option>
                                                
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3">نوع العقد<span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<select class="form-control select2me" name="contract_code">
												<option value="">Select...</option>
												<option value="Option 1">عقد دائم</option>
												<option value="Option 2">عقد مؤقت</option>
												<option value="Option 3">متطوع</option>
											</select>
										</div>
									</div>
								<div class="form-group">
										<label class="control-label col-md-3">الراتب</label>
										<div class="col-md-4">
											<input name="salary" type="text" class="form-control"/>
										</div>
                                     </div>
                                  </div>
								<div class="form-actions">
									<div class="row">
										<div class="col-md-offset-3 col-md-9">
											<button type="submit" class="btn green">Submit</button>
											<button type="button" class="btn default">Cancel</button>
										</div>
									</div>
								</div>
							</form>
							<!-- END FORM-->
						</div>
						<!-- END VALIDATION STATES-->
					</div>
				</div>
			</div>
            
      <script>
       $('.sav_sec1').click(function() {
		
		if ($("#centername").val().trim() =='')
		{
			alert('الرجاء ادخال البيات الاساسية');
			 return 0; 
		}
		alert($("#form_sample_3").serialize());
		var input = $("#form_sample_3").serialize();
		$.ajax({
		url: "pages/addemp/",
		type: "POST",
		data:  $("#form_sample_3").serialize(),
		error: function(){},
		beforeSend: function(){ },
		complete: function(){ },
		success: function(strData){
			//alert(strData);
			back_lingth=strData.length;
		$('#emp_code').val(strData);
		if (strData>0){
		alert('تمت عملية حفظ  البيانات العامة');
		 /* document.getElementById("save5").style.visibility="visible";
		 document.getElementById("saveb").style.visibility="hidden";
		  document.getElementById("save7").style.visibility="visible";
		  document.getElementById("updateb").style.visibility="visible";
		  document.getElementById("updated").style.visibility="visible";
		 document.getElementById("savec").style.visibility="visible";
		  //document.getElementById("saved").style.visibility="visible";
		  // document.getElementById("saveg").style.visibility="visible";
		  document.getElementById("savef").style.visibility="visible";
		 document.getElementById("savek").style.visibility="visible";*/
		}else
		{
			alert('لم تتم عملية الحفظ حاول مرة اخرى');
		}
		//	$("#savek").show();
			 
		}
	});//$.ajax
		})
	</script>