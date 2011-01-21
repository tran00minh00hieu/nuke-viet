<!-- BEGIN: main -->
<!-- BEGIN: header -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible"content="IE=EmulateIE8" />
<title>Management Upload File</title>
<script type="text/javascript" src="{NV_BASE_SITEURL}js/jquery/jquery.min.js"></script>
</head>
<style type="text/css">
    body{
        font-family:Arial;
        font-size:12px; 
		margin:0;
		position:fixed;
		height:100%;
		width:100%;
		padding:0;
		background:#FFFFFF;
    }
</style>
<body>
<!-- END: header -->

<style type="text/css">
	.content{
			font-family:Arial;
			font-size:12px; 
			background:#FFFFFF;
	}
	.error {
		font-size:12px;
		color:#FF0000;
		font-weight:bold;
		padding:5px;
		float:left;
	}
	.filetype {
		background:#EAEAEA;
		padding:5px;
	}
	.imgfolder {
		width:200px;height:330px;overflow:auto;cursor:pointer; background:#FFFFFF; margin:1px
	}
</style>
<link type="text/css" href="{NV_BASE_SITEURL}js/ui/jquery.ui.all.css" rel="stylesheet" />
<link type="text/css" href="{NV_BASE_SITEURL}js/jquery/jquery.treeview.css" rel="stylesheet" />
<script type="text/javascript" src="{NV_BASE_SITEURL}js/jquery/jquery.treeview.min.js"></script>
<script type="text/javascript" src="{NV_BASE_SITEURL}js/ui/jquery.ui.core.min.js"></script>
<script type="text/javascript" src="{NV_BASE_SITEURL}js/ui/jquery.ui.dialog.min.js"></script>
<script type="text/javascript" src="{NV_BASE_SITEURL}js/contextmenu/jquery.contextmenu.r2.js"></script>
<div class="content">
    <table width="100%" cellpadding="0" cellspacing="0">
        <tbody>
                <tr>
                    <td valign="top" width="200" bgcolor="#EAEAEA">
                    	<div class="filetype">
                            <select name="imgtype" id="imgtype">
                                <option value="file" {sfile}>{LANG.type_file}</option>
                                <option value="image" {simage}>{LANG.type_image}</option>
                                <option value="flash" {sflash}>{LANG.type_flash}</option>
                            </select>
                        </div>
                    	<div id="imgfolder" class="imgfolder"></div>
                    </td>
                    <td valign="top" bgcolor="#EAEAEA">
                        <div id="imglist">
                        	<p style="padding:20px; text-align:center"><img src="{NV_BASE_SITEURL}images/load_bar.gif"/> please wait...</p>
                        </div>
                    </td>
                </tr>
        </tbody>
    </table>
    <div class="filetype">
    	<!-- BEGIN: error -->
        <div class="error">
            {error}
        </div>
        <!-- END: error -->
        <form enctype="multipart/form-data" action="" name="uploadimg" id="uploadimg" method="post" style="float:right;">
            <input type="hidden" name="path" value="{currentpath}"/>
            File : 
            <input type="file" name="fileupload"/> {LANG.upload_otherurl}
            <input type="text" name="imgurl"/> 
            <input type="submit" value="Upload" name="confirm"/>
        </form>
        <div style="clear:both"></div>
    </div>
</div>
<script type="text/javascript">
$(function(){
	$("#imgfolder").load("{NV_BASE_ADMINURL}index.php?{NV_NAME_VARIABLE}={module_name}&{NV_OP_VARIABLE}=folderlist&path={path}&currentpath={currentpath}");
	$("#imglist").html("<iframe src='{NV_BASE_ADMINURL}index.php?{NV_NAME_VARIABLE}={module_name}&{NV_OP_VARIABLE}=imglist&path={currentpath}&type={type}&imgfile={selectedfile}' width='100%' height='360px'></iframe>");
	$("select[name=imgtype]").change(function(){
		var folder = $("span#foldervalue").attr("title");
		var type = $(this).val();
		$("input[name=path]").val(folder);
		$("#imglist").html("<iframe src='{NV_BASE_ADMINURL}index.php?{NV_NAME_VARIABLE}={module_name}&{NV_OP_VARIABLE}=imglist&path="+folder+"&type="+type+"' width='100%' height='355px'></iframe>");		
	});
});
</script>
<input type="hidden" id="posthidden" value=""/>  
<div id="renamefolder" style="display:none" title="{LANG.renamefolder}">{LANG.rename_newname}<input type="text" name="foldername"/></div>
<div id="createfolder" style="display:none" title="{LANG.createfolder}">{LANG.rename_newname}<input type="text" name="createfoldername"/></div>
<script type="text/javascript">
	function insertvaluetofield(){
		var value = $("#posthidden").val();
		var funcNum = '{funnum}';
		if (funcNum > 0){
			window.opener.CKEDITOR.tools.callFunction(funcNum, value,"");
            return true;
		}
		else{
		  if(typeof( opener ) != 'undefined')
          {
			$("#{area}",opener.document).val(value);
            return true;
          }
		  
		}
        return false;
	}
	$("div#createfolder").dialog({
		autoOpen: false,
		width: 250,
		height: 160,
		modal: true,
		position: "center",
		buttons: {
			Ok: function() {
				var foldervalue = $("span#foldervalue").attr("title");
				var newname = $("input[name=createfoldername]").val();
				if (newname==""){
					alert("{LANG.rename_nonamefolder}");
					$("input[name=foldername]").focus();
					return false;
				}
				$.ajax({
				   type: "POST",
				   url: "{NV_BASE_ADMINURL}index.php?{NV_NAME_VARIABLE}={module_name}&{NV_OP_VARIABLE}=createfolder",
				   data: "path="+foldervalue+"&newname="+newname,
				   success: function(data){
						$("div#imglist").html("<iframe src='{NV_BASE_ADMINURL}index.php?{NV_NAME_VARIABLE}={module_name}&{NV_OP_VARIABLE}=imglist&path={currentpath}&type={type}' width='100%' height='360px'></iframe>");
						$("#imgfolder").load("{NV_BASE_ADMINURL}index.php?{NV_NAME_VARIABLE}={module_name}&{NV_OP_VARIABLE}=folderlist&path={path}&currentpath="+data);
				   }
				 });
				$(this).dialog("close");
			}
		}
	});
	$("div#renamefolder").dialog({
		autoOpen: false,
		width: 250,
		height: 160,
		modal: true,
		position: "center",
		buttons: {
			Ok: function() {
				var foldervalue = $("span#foldervalue").attr("title");
				var newname = $("input[name=foldername]").val();
				if (newname=="" || newname==foldervalue){
					alert("{LANG.rename_nonamefolder}");
					$("input[name=foldername]").focus();
					return false;
				}
				$.ajax({
				   type: "POST",
				   url: "{NV_BASE_ADMINURL}index.php?{NV_NAME_VARIABLE}={module_name}&{NV_OP_VARIABLE}=renamefolder",
				   data: "path="+foldervalue+"&newname="+newname,
				   success: function(data){
						$("div#imglist").html("<iframe src='{NV_BASE_ADMINURL}index.php?{NV_NAME_VARIABLE}={module_name}&{NV_OP_VARIABLE}=imglist&path="+newname+"'  width='100%' height='360px'></iframe>");
						$("#imgfolder").load("{NV_BASE_ADMINURL}index.php?{NV_NAME_VARIABLE}={module_name}&{NV_OP_VARIABLE}=folderlist&currentpath="+data);
				   }
				 });
				$(this).dialog("close");
			}
		}
	});
</script>
<img id="image" src="" name="{area}" title="" style="display:none"/>
<span style="display:none" id="foldervalue" title="{currentpath}"></span>
<div style="display:none" id="folder-menu">
    <ul>
        <!-- BEGIN: allow_create_subdirectories -->
        <li id="createfolder"><img src="{NV_BASE_SITEURL}js/contextmenu/icons/copy.png"/>{LANG.createfolder}</li>
        <!-- END: allow_create_subdirectories -->
        <!-- BEGIN: allow_modify_subdirectories -->
		<li id="renamefolder"><img src="{NV_BASE_SITEURL}js/contextmenu/icons/rename.png"/>{LANG.renamefolder}</li>
        <li id="deletefolder"><img src="{NV_BASE_SITEURL}js/contextmenu/icons/delete.png"/>{LANG.deletefolder}</li>
        <!-- END: allow_modify_subdirectories -->
    </ul>
</div>
<!-- BEGIN: footer -->
</body>
</html>
<!-- END: footer -->
<!--  END: main  -->
<!-- BEGIN: uploadPage -->
<div id="uploadCont"></div>
<script type="text/javascript">
//<![CDATA[
$(document).ready(function() {
  $("#uploadCont").load('{UPLOADPAGE_LINK}&num=' + nv_randomPassword(10))
});
//]]>
</script>
<!-- END: uploadPage -->