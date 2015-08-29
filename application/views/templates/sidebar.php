
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
							<a href="home">
							<i class="icon-bar-chart"></i>
							الصفحة الرئيسية</a>
						</li>
						<li>
							<a href="index_2.html">
							<i class="icon-bulb"></i>
							New Dashboard #1</a>
						</li>
						<li>
							<a href="index_3.html">
							<i class="icon-graph"></i>
							New Dashboard #2</a>
						</li>
					</ul>
				</li>
				<li <?php if($title == 'booking' || $title == 'addbooking') echo 'class="active open"'; ?>>
					<a href="javascript:;">
					<i class="icon-basket"></i>
					<span class="title">الحجوزات</span>
                    <?php if($title == 'booking' || $title == 'addbooking') echo'<span class="selected"></span>';?>
					<span class="<?php if($title == 'booking' || $title == 'addbooking') echo'arrow open'; else echo'arrow'; ?>"></span>
					</a>
					<ul class="sub-menu">
						<li <?php if($title == 'addbooking') echo 'class="active"'; ?>>
							<a href="<?php echo base_url();?>addbooking">
							<i class="icon-home"></i>
							اضافة حجز</a>
						</li>
						<li <?php if($title == 'booking') echo 'class="active"'; ?>>
							<a href="<?php echo base_url();?>booking">
							<i class="icon-basket"></i>
							عرض الحجوزات</a>
						</li>
						<li>
							<a href="ecommerce_orders_view.html">
							<i class="icon-tag"></i>
							Order View</a>
						</li>
						<li>
							<a href="ecommerce_products.html">
							<i class="icon-handbag"></i>
							Products</a>
						</li>
						<li>
							<a href="ecommerce_products_edit.html">
							<i class="icon-pencil"></i>
							Product Edit</a>
						</li>
					</ul>
				</li>
                <li <?php if($title == 'payments' || $title == 'emppayments') echo 'class="active open"'; ?>>
					<a href="javascript:;">
					<i class="icon-basket"></i>
					<span class="title">المالية</span>
					<?php if($title == 'payments' || $title == 'emppayments') echo'<span class="selected"></span>';?>
					<span class="<?php if($title == 'payments' || $title == 'emppayments') echo'arrow open'; else echo'arrow'; ?>">
                    </span>
					</a>
					<ul class="sub-menu">
						<li <?php if($title == 'payments') echo 'class="active"'; ?>>
							<a href="<?php echo base_url();?>payments">
							<i class="icon-home"></i>
						دفعات مالية</a>
						</li>
						<li <?php if($title == 'emppayments') echo 'class="active"'; ?>>
							<a href="<?php echo base_url();?>emppayments">
							<i class="icon-basket"></i>
							دفعات الموظفين</a>
						</li>
						<li <?php if($title == 'searchpayments') echo 'class="active"'; ?>>
							<a href="<?php echo base_url();?>searchpayments">
							<i class="icon-tag"></i>
							استعلام على الدفعات المالية</a>
						</li>
						<li <?php if($title == 'searchemppayments') echo 'class="active"'; ?>>
							<a href="<?php echo base_url();?>searchemppayments">
							<i class="icon-handbag"></i>
							استعلام على دفعات الموظفين</a>
						</li>
						<li>
							<a href="ecommerce_products_edit.html">
							<i class="icon-pencil"></i>
							Product Edit</a>
						</li>
					</ul>
				</li>
                <li <?php if($title == 'users') echo 'class="active open"';?>>
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
						<li <?php if($title == 'users') echo 'class="active"'; ?>>
							<a href="<?php echo base_url();?>users">
							عرض المستخدمين</a>
						</li>
						<li>
							<a href="login_2.html">
							Login Form 2</a>
						</li>
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
						<li <?php if($title == 'employee') echo 'class="active"'; ?>>
							<a href="<?php echo base_url();?>employee">
							عرض الموظفين</a>
						</li>
						<li <?php if($title == 'addemp') echo 'class="active"'; ?>>
							<a href="<?php echo base_url();?>addemp">
							اضافة موظف</a>
						</li>
						<li>
							<a href="layout_language_bar.html">
							Language Switch Bar</a>
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
						<li <?php if($title == 'addhall') echo 'class="active"'; ?>>
							<a href="<?php echo base_url();?>addhall">
							إضافة صالة</a>
						</li>
						<li <?php if($title == 'hall') echo 'class="active"'; ?>>
							<a href="<?php echo base_url();?>hall">
							عرض الصالات</a>
						</li>
						<li>
							<a href="ui_nestable.html">
							Nestable List</a>
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
		</div>
	</div>
	<!-- END SIDEBAR -->