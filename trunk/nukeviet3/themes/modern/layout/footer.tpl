﻿<div id="choose-color-lang" class="clearfix">
	<div class="fr cl">
			<!-- BEGIN: color_select -->
			<div class="fl">
				<a href="#" rel="styles1" class="styleswitch red">&nbsp;</a>
				<a href="#" rel="styles2" class="styleswitch blue">&nbsp;</a>
			</div>
			<!-- END: color_select -->
			<!-- BEGIN: language -->
			<div class="fl" style="margin-top:3px;">
				<a href="#" rel="styles1" class="styleswitch red">&nbsp;</a>
				<a href="#" rel="styles2" class="styleswitch blue">&nbsp;</a>
			</div>
			<form class="select_lang" name="select_language" action="" method="get">
				<p>
					<select class="fl" name="language" onchange="location.href=select_language.language.options[selectedIndex].value">
						<!-- BEGIN: langitem -->
						<option value="{LANGSITEURL}"{SELECTED}>{LANGSITENAME}</option>
						<!-- END: langitem -->
					</select>
				</p>
			</form>
			<!-- END: language -->
	</div>
</div>
<div class="main">
    [FOOTER]	
</div>
</div>
<div id="footer" class="clearfix">
    <div class="fl div2">
        Power by <a title="Nukeviet Cms" href="http://nukeviet.vn/">Nukeviet Cms</a>. Design by <a title="Vinades Jsc" href="http://vinades.vn/">Vinades Jsc</a><br />
		{THEME_CONTACT_EMAIL}
    </div>
    <div class="fr div2 aright">
        <!-- BEGIN: bottom_menu --><a title="{TOP_MENU.title}" href="{TOP_MENU.link}">{TOP_MENU.title}</a>
        <!-- BEGIN: spector --><span class="spector">&nbsp;</span>
        <!-- END: spector --><!-- END: bottom_menu -->
		<br />
		<a href="http://nukeviet.vn">NukeViet</a> is registered trademark of <a href="http://vinades.vn">VINADES., JSC</a>
    </div>
	<div class="clear"></div>
	<!-- BEGIN: for_admin -->
    <p class="show_query">
        {CLICK_SHOW_QUERIES}
    </p>
    <div id="div_hide" style="visibility: hidden; display: none;">
        {SHOW_QUERIES_FOR_ADMIN}
    </div>
    <!-- END: for_admin -->
    <div id="run_cronjobs" style="visibility: hidden; display: none;">
        <img alt="Cronjob" src="{THEME_IMG_CRONJOBS}" width="1" height="1" />
    </div>
</div>{THEME_ADMIN_MENU}{THEME_FOOTER_JS}
</body>
</html>
