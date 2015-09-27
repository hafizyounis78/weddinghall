<!-- BEGIN BODY -->
<!-- DOC: Apply "page-header-fixed-mobile" and "page-footer-fixed-mobile" class to body element to force fixed header or footer in mobile devices -->
<!-- DOC: Apply "page-sidebar-closed" class to the body and "page-sidebar-menu-closed" class to the sidebar menu element to hide the sidebar by default -->
<!-- DOC: Apply "page-sidebar-hide" class to the body to make the sidebar completely hidden on toggle -->
<!-- DOC: Apply "page-sidebar-closed-hide-logo" class to the body element to make the logo hidden on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-hide" class to body element to completely hide the sidebar on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-fixed" class to have fixed sidebar -->
<!-- DOC: Apply "page-footer-fixed" class to the body element to have fixed footer -->
<!-- DOC: Apply "page-sidebar-reversed" class to put the sidebar on the right side -->
<!-- DOC: Apply "page-full-width" class to the body element to have full width page without the sidebar menu -->
<?php
if (isset($notification_count))
 foreach($notification_count as $row2);

if (isset($payments_notification_count))
 foreach($payments_notification_count as $row4);
 
?>
<?php 
			date_default_timezone_set ("Asia/Gaza");
			$day='';
			switch (date("w")) {
				case 0:
					$day = 'الأحد';
					break;
				case 1:
					$day = 'الاثنين';
					break;
				case 2:
					$day = 'الثلاثاء';
					break;
				case 3:
					$day = 'الاربعاء';
					break;
				case 4:
					$day = 'الخميس';
					break;
				case 5:
					$day = 'الجمعة';
					break;
				case 6:
					$day = 'السبت';
					break;
			}
			
?>
<body class="page-header-fixed page-quick-sidebar-over-content">
<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
	<!-- BEGIN HEADER INNER -->

	<div class="page-header-inner" style="color:#FFF" align="right">
<?php echo $day.' '.date("j-m-Y | g:i a"); ?>
		<!-- BEGIN LOGO -->

		<div class="page-logo">
			<a href="home">
			<img src="<?php echo base_url();?>assets/admin/layout/img/eWedding3.png" alt="logo" class="logo-default"/>
			</a>

			<div class="menu-toggler sidebar-toggler hide">
				<!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
			</div>
		</div>
		<!-- END LOGO -->
		<!-- BEGIN RESPONSIVE MENU TOGGLER -->
		<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
		</a>
		<!-- END RESPONSIVE MENU TOGGLER -->
		<!-- BEGIN TOP NAVIGATION MENU -->
		<div class="top-menu">
			<ul class="nav navbar-nav pull-right">
				<!-- BEGIN NOTIFICATION DROPDOWN -->
				<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
				<li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                    
					<i class="icon-bell"></i>
					<?php if (isset($row2->cnt))
					if ( $row2->cnt >=1){
                    echo '<span class="badge badge-default">';
					 echo $row2->cnt ;
					 echo '</span>';
					 echo '</a>';
					}?>
					<ul class="dropdown-menu">
						<li class="external">
							<h3><span class="bold"><?php if (isset($row2->cnt)) {echo '" '.$row2->cnt.' "';}?></span> تنبيهات بقرب حفل زفاف </h3>
							<a href="<?php echo base_url();?>searchbooking">view all</a>
						</li>
						<li>
							<ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">					
							<?php
							if (isset($notification))
                            foreach($notification as $row)
  							{
								echo '<li>';
								echo '<a href="'.base_url().'addbooking/'.$row->booking_code.'">';
								echo '<span class="time"> '.$row->booking_date.' </span>';
								echo '<span class="details">';
								echo '<span class="label label-sm label-icon label-success">';
								echo '<i class="fa fa-plus"></i>';
								echo '</span> '.$row->name.' </span>';
								echo '<br>';
								echo '</span> جوال رقم : '.$row->mobile.' </span>';
								echo '<br>';
								echo '</span> '.$row->w_name.' </span>';
								echo '</a>';
								echo '</li>';
							}
							?>
							</ul>
						</li>
					</ul>
				</li>
				<!-- END NOTIFICATION DROPDOWN -->

				<!-- BEGIN INBOX DROPDOWN -->
				<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
				<li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<i class="icon-envelope-open"></i>
                    <?php if (isset($row4->cnt))
					if ( $row4->cnt >=1){
					echo '<span class="badge badge-default">';
					echo $row4->cnt ; 
					echo '</span>';
					echo '</a>';
					}
					?>
					<ul class="dropdown-menu">
						<li class="external">
							<h3>لديك <span class="bold"><?php if (isset($row4->cnt)) echo $row4->cnt ; ?></span> تنبيهات مالية</h3>
							<a href="<?php echo base_url();?>searchpaymentsajax">view all</a>
						</li>
						<li>
							<ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
								<?php
							if (isset($payments_notification))
                            foreach($payments_notification as $row3)
  							{
								echo '<li>';
								echo '<a href="'.base_url().'addpayments/'.$row3->booking_code.'">';
								echo '<span class="subject">';
								echo '<span class="time">'.$row3->booking_date.' </span>';
								echo '<span class="from">'.$row3->name.'<br> </span>';
								echo '<span class="from">  رقم الجوال :'.$row3->mobile.' </span>';
								
								echo '</span>';
								echo '<span class="message">  في  '.$row->w_name.'<br> علمأ بأن حالة الحجز  ( '.$row3->b_desc.' )</span>';
								echo '</a>';
								echo '</li>';
							}
							?>
							</ul>
						</li>
					</ul>
				</li>
				<!-- END INBOX DROPDOWN -->

				<!-- BEGIN TODO DROPDOWN -->
				<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
				
				<li class="dropdown dropdown-user">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
				<!--	<img alt="" class="img-circle" src="<?php echo base_url();?>assets/admin/layout/img/avatar3_small.jpg"/> -->
					<span class="username username-hide-on-mobile">
					<?php echo $username;?></span>
					<i class="fa fa-angle-down"></i>
					</a>
					<ul class="dropdown-menu dropdown-menu-default">
						
						<li>
							<a href="<?php echo base_url();?>pages/logout">
							<i class="icon-key"></i> Log Out </a>
						</li>
					</ul>
				</li>
				<!-- END USER LOGIN DROPDOWN -->
				
				<!-- BEGIN QUICK SIDEBAR TOGGLER -->
				<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
				
				</li>
				<!-- END QUICK SIDEBAR TOGGLER -->
			</ul>
            
		</div>
		<!-- END TOP NAVIGATION MENU -->
	</div>
	<!-- END HEADER INNER -->
</div>
<!-- END HEADER -->