<!-- BEGIN: main -->
<div class="sea-frame">
    <form action="{DATA.action}" name="form_search" method="get" id="form_search">
        <div class="title">
            {LANG.info_title}
        </div>
        <div class="form">
            <dl class="clearfix" style="margin-bottom:5px">
                <dd class="fl" style="width:100px;text-align:left;">
                    <label>
                        {LANG.key_title}:
                    </label>
                </dd>
                <dt class="fl" style="text-align:left;">
                    <input class="intxt" id="search_query" name="q" value="{DATA.key}" maxlength="{NV_MAX_SEARCH_LENGTH}" />
                </dt>
            </dl>
            <dl class="clearfix" style="margin-bottom:5px">
                <dd class="fl" style="width:100px;text-align:left;">
                    &nbsp;
                </dd>
                <dt class="fl" style="text-align:left;">
                    <input name="l" id="search_logic_and" type="radio"{DATA.andChecked} value="1" />{LANG.logic_and} &nbsp; 
                    <input name="l" id="search_logic_or" type="radio"{DATA.orChecked} value="0" />{LANG.logic_or}
                </dt>
            </dl>            
            <dl class="clearfix">
                <dd class="fl" style="width:100px;text-align:left;">
                    <label>
                        {LANG.type_search}:
                    </label>
                </dd>
                <dt class="fl" style="text-align:left;">
                    <select name="m" id="search_query_mod">
                        <option value="all">{LANG.search_on_site}</option>
                        <!-- BEGIN: select_option -->
                        <option value="{MOD.value}"{MOD.selected}>{MOD.custom_title}</option>
                        <!-- END: select_option -->
                    </select>
                    <input type="submit" id="search_submit" value="{LANG.search_title}" />&nbsp;&nbsp;
                    <a href="advSearch" class="advSearch">{LANG.search_title_adv}</a>
                </dt>
            </dl>
        </div>
    </form>
    <!-- BEGIN: search_engine_unique_ID -->
    <div class="search_adv" style="text-align:center">
        <a href="IntSearch" class="IntSearch">{LANG.search_adv_internet}</a>
    </div>
    <!-- END: search_engine_unique_ID -->
</div>
<script type="text/javascript">
//<![CDATA[
$("a.advSearch").click(function() {
  var b = $("#search_query_mod").val();
  if("all" == b) {
    return alert("{LANG.chooseModule}"), $("#search_query_mod").focus(), !1
  }
  var b = nv_siteroot + "index.php?" + nv_lang_variable + "=" + nv_sitelang + "&" + nv_name_variable + "=" + b + "&" + nv_fc_variable + "=search", a = $("#search_query").val(), a = formatStringAsUriComponent(a);
  {NV_MIN_SEARCH_LENGTH} <= a.length && {NV_MAX_SEARCH_LENGTH} >= a.length && (a = rawurlencode(a), b = b + "&q=" + a);
  window.location.href = b;
  return!1
});
$("a.IntSearch").click(function() {
  var a = $("[name=q]").val();
  if({NV_MIN_SEARCH_LENGTH} <= a.length && {NV_MAX_SEARCH_LENGTH} >= a.length) {
    a = rawurlencode(a), window.open("http://www.google.com/cse?cx={SEARCH_ENGINE_UNIQUE_ID}&ie=UTF-8&q=" + a, "_blank");
    return!1
  }else {
    return a.focus(), !1
  }
});
$("form[name=form_search]").submit(function() {
  var a = $("[name=q]").val(), a = formatStringAsUriComponent(a), b;
  $("[name=q]").val(a);
  if({NV_MIN_SEARCH_LENGTH} > a.length || {NV_MAX_SEARCH_LENGTH} < a.length) {
    return $("[name=q]").select(), !1
  }
  a = $(this).serialize();
  b = $(this).attr("action");
  window.location.href = b + "&" + a;
  return!1
});
//]]>
</script>
<div id="search_result">{SEARCH_RESULT}</div>
<!-- END: main -->
