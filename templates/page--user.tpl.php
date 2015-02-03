<?php
if($logged_in):
	// Show normal page template
	include("page.tpl.php");
else:
	//show login custom template
	include("inc/login.php");
endif;