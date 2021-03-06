	<!-- topbar starts -->
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				

				<div class="btn-group pull-left" >
					<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="fa fa-user"></i><span class="hidden-phone"> <?php echo $name = $this->session->userdata('logged_in_customer')['username']; ?></span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li class="divider"></li>
						<li><a href="<?php echo site_url("customers/logout"); ?>"><?php echo lang("LogOut");?></a></li>
					</ul>
				</div>
				  <div class="btn-group pull-right" >
						<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
							<i class="fa fa-language"></i><span class="hidden-phone"> <?php echo lang("ChangeLang");?></span>
							<span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
	                    <?php
	                      if($this->setting->getLang($this->session->userdata('admin_lang')) == "arabic"){$ara = "selected";$eng = "";}
	                      else if($this->setting->getLang($this->session->userdata('admin_lang')) == "english"){$ara = "";$eng = "selected";}
	                    ?>
							<li <?php echo $ara;?> ><a href="#" onclick="document.getElementById('arabic_form').submit();">العربية</a></li>
							<li class="divider"></li>
							<li <?php echo $eng;?> ><a href="#" onclick="document.getElementById('english_form').submit();">English</a></li>
						</ul>
					</div>  
				<div class="top-nav nav-collapse">
					<ul class="nav">
						<li><a href="<?php echo site_url("customers/logout"); ?>" ><?php echo lang("LogOut");?></a></li>
					</ul>
				</div>
                <div class="top-nav nav-collapse">
					<ul class="nav">
						<li><a href="#" target="_blank" ><?php echo lang($this->setting->getLang($this->session->userdata('admin_lang'))); ?></a></li>
						<li>
						   &nbsp;
						</li>
					</ul>
				</div>
                <!--/.nav-collapse -->
			</div>
		</div>
	</div>
    <form action="" method="post" id="arabic_form">
    <input type="hidden" name="lang_submit" value="2">
    </form>
    <form action="" method="post" id="english_form">
    <input type="hidden" name="lang_submit" value="1">
    </form>
	<!-- topbar ends -->