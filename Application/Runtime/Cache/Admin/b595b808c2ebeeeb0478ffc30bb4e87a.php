<?php if (!defined('THINK_PATH')) exit();?><frameset rows="180,*" name="btFrame" id="btFrame" frameborder="NO" border="0" framespacing="0">
	<frame src="<?php echo U('Admin/Index/top');?>" name="topFrame" id="topFrame" scrolling="no">
	<frameset cols="180,*" name="btFrame" id="btFrame" frameborder="NO" border="0" framespacing="0">
		<frame src="<?php echo U('Admin/Index/left');?>" id="leftbar" noresize name="menu" scrolling="yes">
		<frame src="<?php echo U('Admin/Index/main');?>" id="rightbar" noresize name="main" scrolling="yes">
	</frameset>
</frameset>