<!-- basic scripts -->

		<!--[if !IE]> -->
		<script type="text/javascript">
			window.jQuery || document.write("<script src='<?php echo _get_cfg_path('admin_js')?>jquery.js'>"+"<"+"/script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='<?php echo _get_cfg_path('admin_js')?>jquery1x.js'>"+"<"+"/script>");
</script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='<?php echo _get_cfg_path('admin_js')?>jquery.mobile.custom.js'>"+"<"+"/script>");
		</script>
		<?php echo _get_html_cssjs('admin_js','bootstrap.js','js');?>

		<!-- page specific plugin scripts -->

		<!-- ace scripts -->
		<?php echo _get_html_cssjs('admin_js','ace/elements.scroller.js,ace/elements.colorpicker.js,ace/elements.fileinput.js,ace/elements.typeahead.js,ace/elements.wysiwyg.js,ace/elements.spinner.js,ace/elements.treeview.js,ace/elements.wizard.js,ace/elements.aside.js,ace/ace.js,ace/ace.ajax-content.js,ace/ace.touch-drag.js,ace/ace.sidebar.js,ace/ace.sidebar-scroll-1.js,ace/ace.submenu-hover.js,ace/ace.widget-box.js,ace/ace.settings.js,ace/ace.settings-rtl.js,ace/ace.settings-skin.js,ace/ace.widget-on-reload.js,ace/ace.searchbox-autocomplete.js','js');?>


		<!-- inline scripts related to this page -->

		<!-- the following scripts are used in demo only for onpage help and you don't need them -->
		<link rel="stylesheet" href="<?php echo _get_cfg_path('admin_css')?>ace.onpage-help.css" />


		<script type="text/javascript"> ace.vars['base'] = '..'; </script>
		<?php echo _get_html_cssjs('admin_js','ace/elements.onpage-help.js,ace/ace.onpage-help.js','js');?>
	
	</body>
</html>