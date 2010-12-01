<!-- BEGIN: main -->
<form action="" method="post">
    <table class="tab1" summary="">
        <tbody class="second">
            <tr>
                <td>
                    <strong>{LANG.lang_multi}</strong>
                </td>
                <td>
                    <input type="checkbox" value="1" name="lang_multi" {DATA.lang_multi} />
                </td>
            </tr>
        </tbody>
        <tbody>
            <tr>
                <td>
                    <strong>{LANG.site_lang}</strong>
                </td>
                <td>
                    <select name="site_lang">
                        <!-- BEGIN: site_lang_option -->
						<option value="{LANGOP}" {SELECTED}>{LANGVALUE}  </option>
                        <!-- END: site_lang_option -->
                    </select>
                </td>
            </tr>
        </tbody>
        <tbody class="second">
            <tr>
                <td>
                    <strong>{LANG.site_keywords}</strong>
                </td>
                <td>
                    <input type="text" name="site_keywords" value="{DATA.site_keywords}" style="width: 450px"/>
                </td>
            </tr>
        </tbody>
        <tbody>
            <tr>
                <td>
                    <strong>{LANG.site_email}</strong>
                </td>
                <td>
                    <input type="text" name="site_email" value="{DATA.site_email}" style="width: 450px"/>
                </td>
            </tr>
        </tbody>
        <tbody class="second">
            <tr>
                <td>
                    <strong>{LANG.error_send_email}</strong>
                </td>
                <td>
                    <input type="text" name="error_send_email" value="{DATA.error_send_email}" style="width: 450px"/>
                </td>
            </tr>
        </tbody>
        <tbody>
            <tr>
                <td>
                    <strong>{LANG.site_phone}</strong>
                </td>
                <td>
                    <input type="text" name="site_phone" value="{DATA.site_phone}" style="width: 450px"/>
                </td>
            </tr>
        </tbody>
        <tbody class="second">
            <tr>
                <td>
                    <strong>{LANG.themeadmin}</strong>
                </td>
                <td>
                    <select name="admin_theme">
                        <!-- BEGIN: admin_theme -->
						<option value="{SITE_THEME_ADMIN}"{SELECTED}>{SITE_THEME_ADMIN}  </option>
                        <!-- END: site_theme -->
                    </select>
                </td>
            </tr>
        </tbody>
        <!-- BEGIN: support_rewrite -->
        <tr>
            <td>
                <strong>{LANG.rewrite}</strong>
            </td>
            <td>
                <input type="checkbox" value="1" name="is_url_rewrite" {CHECKED1} />
            </td>
        </tr>
		<!-- END: support_rewrite -->
		<!-- BEGIN: rewrite_optional -->
        <tr>
            <td>
                <strong>{LANG.rewrite_optional}</strong>
            </td>
            <td>
                <input type="checkbox" value="1" name="rewrite_optional" {CHECKED2} />
            </td>
        </tr>
		<!-- END: rewrite_optional -->
        <tbody class="second">
            <tr>
                <td>
                    <strong>{LANG.captcha}</strong>
                </td>
                <td>
                    <select name="gfx_chk">
                        <!-- BEGIN: opcaptcha -->
						<option value="{GFX_CHK_VALUE}"{GFX_CHK_SELECTED}>{GFX_CHK_TITLE}  </option>
                        <!-- END: opcaptcha -->
                    </select>
                </td>
            </tr>
        </tbody>
        <tbody>
            <tr>
                <td>
                    <strong>{LANG.site_timezone}</strong>
                </td>
                <td>
                    <select name="site_timezone">
                        <!-- BEGIN: opsite_timezone -->
							<option value="{TIMEZONEOP}" {TIMEZONESELECTED}>{TIMEZONELANGVALUE}  </option>
                        <!-- END: opsite_timezone -->
                    </select>
                </td>
            </tr>
        </tbody>
        <tbody class="second">
            <tr>
                <td>
                    <strong>{LANG.date_pattern}</strong>
                </td>
                <td>
                    <input type="text" name="date_pattern" value="{DATA.date_pattern}" style="width: 150px"/>
                </td>
            </tr>
        </tbody>
        <tbody>
            <tr>
                <td>
                    <strong>{LANG.time_pattern}</strong>
                </td>
                <td>
                    <input type="text" name="time_pattern" value="{DATA.time_pattern}" style="width: 150px"/>
                </td>
            </tr>
        </tbody>
        <tbody class="second">
            <tr>
                <td>
                    <strong>{LANG.gzip_method}</strong>
                </td>
                <td>
                    <input type="checkbox" value="1" name="gzip_method" {DATA.gzip_method} />
                </td>
            </tr>
        </tbody>
        <tbody>
            <tr>
                <td>
                    <strong>{LANG.online_upd}</strong>
                </td>
                <td>
                    <input type="checkbox" value="1" name="online_upd" {DATA.online_upd} />
                </td>
            </tr>
        </tbody>
        <tbody class="second">
            <tr>
                <td>
                    <strong>{LANG.statistic}</strong>
                </td>
                <td>
                    <input type="checkbox" value="1" name="statistic" {DATA.statistic} />
                </td>
            </tr>
        </tbody>
        <tbody>
            <tr>
                <td>
                    <strong>{LANG.optActive}</strong>
                </td>
                <td>
                    <input type="checkbox" value="1" name="optActive" {DATA.optActive} />
                </td>
            </tr>
        </tbody>
        <tbody class="second">
            <tr>
                <td>
                    <strong>{LANG.proxy_blocker}</strong>
                </td>
                <td>
                    <select name="proxy_blocker">
                        <!-- BEGIN: proxy_blocker -->
						<option value="{PROXYOP}" {PROXYSELECTED}>{PROXYVALUE}  </option>
                        <!-- END: proxy_blocker -->
                    </select>
                </td>
            </tr>
        </tbody>
        <tbody>
            <tr>
                <td>
                    <strong>{LANG.str_referer_blocker}</strong>
                </td>
                <td>
                    <input type="checkbox" value="1" name="str_referer_blocker" {DATA.str_referer_blocker} />
                </td>
            </tr>
        </tbody>
        <tbody class="second">
            <tr>
                <td>
                    <strong>{LANG.my_domains}</strong>
                </td>
                <td>
                    <input type="text" name="my_domains" value="{DATA.my_domains}" style="width: 450px"/>
                </td>
            </tr>
        </tbody>
        <tbody>
            <tr>
                <td>
                    <strong>{LANG.cookie_prefix}</strong>
                </td>
                <td>
                    <input type="text" name="cookie_prefix" value="{DATA.cookie_prefix}" style="width: 450px"/>
                </td>
            </tr>
        </tbody>
        <tbody class="second">
            <tr>
                <td>
                    <strong>{LANG.session_prefix}</strong>
                </td>
                <td>
                    <input type="text" name="session_prefix" value="{DATA.session_prefix}" style="width: 450px"/>
                </td>
            </tr>
        </tbody>
    </table>
    <div style="width: 200px; margin: 10px auto; text-align: center;">
        <input type="submit" name="submit" value="{LANG.submit}" style="width: 100px;"/>
    </div>
</form><!-- END: main -->
