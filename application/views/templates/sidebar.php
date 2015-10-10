
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN SIDEBAR -->
	<div class="page-sidebar-wrapper">
		<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
		<!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
		<div class="page-sidebar navbar-collapse collapse">
			<!-- BEGIN SIDEBAR MENU -->
			<!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
			<!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
			<!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
			<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
			<!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
			<!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
			<ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
				<!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
				<li class="sidebar-toggler-wrapper">
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
					<div class="sidebar-toggler">
					</div>
					<!-- END SIDEBAR TOGGLER BUTTON -->
				</li>
				<!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
				<li class="sidebar-search-wrapper">
					<!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
					<!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box -->
					<!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box -->
					<form class="sidebar-search " action="extra_search.html" method="POST">
						<a href="javascript:;" class="remove">
						<i class="icon-close"></i>
						</a>
						<div class="input-group">
							<input type="text" class="form-control" placeholder="Search...">
							<span class="input-group-btn">
							<a href="javascript:;" class="btn submit"><i class="icon-magnifier"></i></a>
							</span>
						</div>
					</form>
					<!-- END RESPONSIVE QUICK SEARCH FORM -->
				</li>
				<li <?php if($title == 'home') echo 'class="start active open"'; else echo 'class="start "';?>>
					<a href="javascript:;">
					<i class="icon-home"></i>
					<span class="title">الصفحة الرئيسية</span>
					<?php if($title == 'home')
					echo '<span class="selected"></span>
						  <span class="arrow open"></span>'; 
					else
						echo '<span class="arrow "></span>';
					?>
					</a>
					<ul class="sub-menu">
						<li <?php if($title == 'home') echo 'class="active"';?> >
							<a href="<?php echo base_url();?>home">
							<i class="icon-bar-chart"></i>
							الصفحة الرئيسية</a>
						</li>
						
					</ul>
				</li>
				<li <?php if($title == 'searchbooking' || $title == 'addbooking') echo 'class="active open"'; ?>>
					<a href="javascript:;">
					<i class="icon-basket"></i>
					<span class="title">الحجوزات</span>
                    <?php if($title == 'searchbooking' || $title == 'addbooking') echo'<span class="selected"></span>';?>
					<span class="<?php if($title == 'searchbooking' || $title == 'addbooking') echo'arrow open'; else echo'arrow'; ?>"></span>
					</a>
					<ul class="sub-menu">
						<li <?php if($title == 'addbooking') echo 'class="active"'; ?>>
							<a href="<?php echo base_url();?>addbooking">
							<i class="icon-home"></i>
							اضافة حجز</a>
						</li>
						<li <?php if($title == 'searchbooking') echo 'class="active"'; ?>>
							<a href="<?php echo base_url();?>searchbooking">
							<i class="icon-tag"></i>
							استعلام على الحجوزات</a>
						</li>
						<li <?php if($title == 'searchdelbooking') echo 'class="active"'; ?>>
							<a href="<?php echo base_url();?>searchdelbooking">
							<i class="icon-tag"></i>
							استعلام على الحجوزات الملغية</a>
						</li>
					</ul>
				</li>
                <li <?php if($title == 'searchpaymentsajax' || $title == 'searchemppaymentsajax') echo 'class="active open"'; ?>>
					<a href="javascript:;">
					<i class="icon-basket"></i>
					<span class="title">المالية</span>
					<?php if($title == 'searchpaymentsajax' || $title == 'searchemppaymentsajax') echo'<span class="selected"></span>';?>
					<span class="<?php if($title == 'searchpaymentsajax' || $title == 'searchemppaymentsajax') echo'arrow open'; else echo'arrow'; ?>">
                    </span>
					</a>
					<ul class="sub-menu">
						<li <?php if($title == 'searchpaymentsajax') echo 'class="active"'; ?>>
							<a href="<?php echo base_url();?>searchpaymentsajax">
							<i class="icon-home"></i>
						دفعات مالية</a>
						</li>
						<li <?php if($title == 'searchemppaymentsajax') echo 'class="active"'; ?>>
							<a href="<?php echo base_url();?>searchemppaymentsajax">
							<i class="icon-basket"></i>
							دفعات الموظفين</a>
						</li>
						
						
					</ul>
				</li>
                <li <?php if($title == 'users' || $title == 'adduser') echo 'class="active open"';?>>
					<a href="javascript:;">
					<i class="icon-user"></i>
					<span class="title">المستخدمين</span>
					<?php if($title == 'users')
					echo '<span class="selected"></span>
						  <span class="arrow open"></span>'; 
					else
						echo '<span class="arrow "></span>';
					?>
					</a>
					<ul class="sub-menu">
						
						<li <?php if($title == 'adduser') echo 'class="active"'; ?>>
							<a href="<?php echo base_url();?>adduser">
							اضافة مستخدم</a>
						</li>
                        <!--<li <?php if($title == 'users') echo 'class="active"'; ?>>
							<a href="<?php echo base_url();?>users"> 
							عرض المستخدمين</a>
						</li>-->
					</ul>
				</li>
				<li <?php if($title == 'employee' || $title == 'addemp') echo 'class="active open"';?>>
					<a href="javascript:;">
					<i class="icon-rocket"></i>
					<span class="title">الموظفين</span>
                    <?php if($title == 'employee' || $title == 'addemp') echo'<span class="selected"></span>';?>
					<span class="<?php if($title == 'employee' || $title == 'addemp') echo'arrow open'; else echo'arrow'; ?>">
					</a>
					<ul class="sub-menu">
						
						<li <?php if($title == 'addemp') echo 'class="active"'; ?>>
							<a href="<?php echo base_url();?>addemp">
							اضافة موظف</a>
						</li>
						<li <?php if($title == 'employee') echo 'class="active"'; ?>>
							<a href="<?php echo base_url();?>employee">
							عرض الموظفين</a>
						</li>
                       
					</ul>
				</li>
				<li <?php if($title == 'hall' || $title == 'addhall') echo 'class="active open"';?>>
					<a href="javascript:;">
					<i class="icon-diamond"></i>
					<span class="title">الصالات</span>
					 <?php if($title == 'hall' || $title == 'addhall') echo'<span class="selected"></span>';?>
					<span class="<?php if($title == 'hall' || $title == 'addhall') echo'arrow open'; else echo'arrow'; ?>">
					
					</a>
					<ul class="sub-menu">
				<!--		<li <?php if($title == 'addhall') echo 'class="active"'; ?>>
						<a href="<?php echo base_url();?>addhall">
							إضافة صالة</a>
						</li>-->
						<li <?php if($title == 'hall') echo 'class="active"'; ?>>
							<a href="<?php echo base_url();?>hall">
							عرض الصالات</a>
						</li>
						
					</ul>
				</li>
				<li <?php if($title == 'services' || $title == 'addservices') echo 'class="active open"';?>>
					<a href="javascript:;">
					<i class="icon-puzzle"></i>
					<span class="title">الخدمات</span>
					<?php if($title == 'services' || $title == 'addservices') echo'<span class="selected"></span>';?>
					<span class="<?php if($title == 'services' || $title == 'addservices') echo'arrow open'; else echo'arrow'; ?>">
					</a>
					<ul class="sub-menu">
						<li <?php if($title == 'addservices') echo 'class="active"'; ?>>
							<a href="<?php echo base_url();?>addservices">
							اضافة خدمة</a>
						</li>
						<li <?php if($title == 'services') echo 'class="active"'; ?>>
							<a href="<?php echo base_url();?>services">
							عرض الخدمات</a>
						</li>
					</ul>
				</li>
                <li <?php if($title == 'organization' || $title == 'addorg') echo 'class="active open"';?>>
					<a href="javascript:;">
					<i class="icon-puzzle"></i>
					<span class="title">الجمعيات</span>
					<?php if($title == 'organization' || $title == 'addorg') echo'<span class="selected"></span>';?>
					<span class="<?php if($title == 'organization' || $title == 'addorg') echo'arrow open'; else echo'arrow'; ?>">
					</a>
					<ul class="sub-menu">
						<li <?php if($title == 'addorg') echo 'class="active"'; ?>>
							<a href="<?php echo base_url();?>addorg">
							اضافة جمعية</a>
						</li>
						<li <?php if($title == 'organization') echo 'class="active"'; ?>>
							<a href="<?php echo base_url();?>organization">
							عرض الجمعيات</a>
						</li>
					</ul>
				</li>
		</div>
	</div>
	<!-- END SIDEBAR -->