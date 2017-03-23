<script type="text/javascript" src="assets/ace/ace.js" ></script>
<script type="text/javascript">
    jQuery(document).ready(function(e){
		//e.preventDefault();
		jQuery( "#htmldiv" ).show();
		$("#htmldiv_link").css({"background":"#fff", "color":"#1d1d1d"});
		jQuery( "#cssdiv" ).hide();
		jQuery( "#jsdiv" ).hide();
		jQuery( "#htmldiv_link" ).click(function() {
			jQuery( "#htmldiv" ).show();
			jQuery("#htmldiv_link").css("background","#fff");
			jQuery("#htmldiv_link").css("color","#1d1d1d");
			jQuery( "#cssdiv" ).hide();
			jQuery( "#jsdiv" ).hide();
		});
		jQuery( "#cssdiv_link" ).click(function() {
			jQuery( "#htmldiv" ).hide();
			jQuery( "#cssdiv" ).show();
			jQuery("#cssdiv_link").css("background","#fff");
			jQuery("#cssdiv_link").css("color","#1d1d1d");
			jQuery( "#jsdiv" ).hide();
		});
		jQuery( "#jsdiv_link" ).click(function() {
			jQuery( "#htmldiv" ).hide();
			jQuery( "#cssdiv" ).hide();
			jQuery( "#jsdiv" ).show();
			jQuery("#jsdiv_link").css("background","#fff");
			jQuery("#jsdiv_link").css("color","#1d1d1d");
		});
	});
</script>
<div id="darlic_live_editor" class="darlic-live-editor">
	<div class="dle-header">
		<div class="dle-header-left">
			<ul>
				<li><a href="#htmldiv" id="htmldiv_link">HTML</a></li>
				<li><a href="#cssdiv" id="cssdiv_link">CSS</a></li>
				<li><a href="#jsdiv" id="jsdiv_link">JS</a></li>
			</ul>
		</div> <!---- dle-header-left ------>
		<div class="dle-header-right">
			
		</div> <!---- dle-header-left ------>
		<div class="clear"></div>
	</div> <!---- dle-header ------>
	<div class="dle-content">
		<div class="dle-editors">
			<div id="htmldiv" class="postbox show">
				<div class="inside">
					<div class="submitbox" id="submitpost">

						<div id="editor-html" style="min-height: 200px;">
							<div id="editorhtml" style="min-height: 200px; width:100%;">
							
							</div>
							

						</div>

						<div id="major-publishing-actions">
							<div id="delete-action">
								<span id="count-characters-html">0</span> Characters / 
								<span id="count-lines-html">0</span> Lines
							</div>

							<div id="publishing-action">
								<span id="cursor-position-html"></span>
							</div>
							<div class="clear"></div>
						</div>
					</div>

				</div>
			</div> <!---- HTML Editor ------>


			<div id="cssdiv" class="postbox hide">
				
				<div class="inside">
					<div class="submitbox" id="submitpost">

						<div id="editor-css" style="min-height: 200px;">
							<div id="editorcss" style="min-height: 200px; width:100%;">
							</div>
						</div>

						<div id="major-publishing-actions">
							<div id="delete-action">
								<span id="count-characters-css">0</span> Characters / 
								<span id="count-lines-css">0</span> Lines
							</div>
							<div id="publishing-action">
								<span id="cursor-position-css"></span>
							</div>
							<div class="clear"></div>
						</div>
					</div>

				</div>
			</div><!---- CSS Editor------>

			<div id="jsdiv" class="postbox hide">
			
				<div class="inside">
					<div class="submitbox" id="submitpost">

						<div id="editor-js" style="min-height: 200px;">
							<div id="editorjs" style="min-height: 200px; width:100%;">
							</div>
						</div>

						<div id="major-publishing-actions">
							<div id="delete-action">
								<span id="count-characters-js">0</span> Characters / 
								<span id="count-lines-js">0</span> Lines
							</div>
							<div id="publishing-action">
								<span id="cursor-position-js"></span>
							</div>
							<div class="clear"></div>
						</div>
					</div>

				</div>
			</div><!---- JS Editor ------>





		</div><!---- dle-editors ------>
		
		<div id="live_preview" class="live-preview">
            <div class="handlediv" title="Click to toggle"><br></div>
            <h3 class="hndle ui-sortable-handle"><span>Preview</span></h3>
            <div class="inside">
                <div id="postcustomstuff">
                    <div id="ajax-response"></div>
                    <iframe id="preview"></iframe>
                </div>
            </div>
        </div> <!---- Preview ------>
		<div class="clear"></div>
	</div> <!---- dle-content ------>
</div> <!---- darlic-live-editor ------>


<script type="text/javascript">
    jQuery(document).ready(function(){
		jQuery( "#toggle_fullscreen_preview" ).click(function() {
			/*
			jQuery("#post-body").removeClass("columns-2");
			jQuery("#post-body").addClass("columns-1");
			jQuery("#htmldiv").hide();
			jQuery("#cssdiv").hide();
			jQuery("#jsdiv").hide();
			jQuery("#commentstatusdiv").hide();
			jQuery("#slugdiv").hide();
			jQuery(".editor-header").hide();
			jQuery("#screen-meta-links").hide();
			jQuery("#poststuff {").css('padding-top','0');
			jQuery(".wrap").css('margin','0');
			*/
			
			jQuery(this).parent().toggleClass("fullscreen");
		});
		
		
		
		
		
	
		// Publish output from HTMl, CSS, and JS textareas in the iframe below
		onload=(document).onkeyup=function(){
			(document.getElementById("preview").contentWindow.document).write(
				htmlEditor.getValue()
				+ "<style>" + cssEditor.getValue() + "<\/style>"
				+ "<script>" + jsEditor.getValue() + "<\/script>"
				+ "<script src='" + + "'><\/script>"
			);
			(document.getElementById("preview").contentWindow.document).close();
			
			//Save Browser session storage
			//sessionStorage['html'] = htmlEditor.getValue();
			//sessionStorage['css'] = cssEditor.getValue();
			//sessionStorage['js'] = jsEditor.getValue();
			
			//jQuery("#count-characters-html").html(htmlEditor.getValue().length);
			//jQuery("#count-characters-css").html(cssEditor.getValue().length);
			//jQuery("#count-characters-js").html(jsEditor.getValue().length);
			
			
		};
  
		// Clear textareas with button
		jQuery(".clearLink").click(clearAll);

		function clearAll(){
		
			//clear Editors
			htmlEditor.setValue("");
			cssEditor.setValue("");
			jsEditor.setValue("");
			
			//clear Preview
			(document.getElementById("preview").contentWindow.document).write(
			htmlEditor.getValue()
			+ "<style>" + cssEditor.getValue() + "<\/style>"
			+ "<script>" + jsEditor.getValue() + "<\/script>"
			+ "<script src=''><\/script>"
			);
			(document.getElementById("preview").contentWindow.document).close()

			//clear Browser session storage
			sessionStorage['html'] = "";
			sessionStorage['css'] = "";
			sessionStorage['js'] = "";

			//sessionStorage.clear();
		}
	});

	// Initialize HTML Editor
    var htmlEditor = ace.edit("editorhtml");
    htmlEditor.setTheme("ace/theme/twilight");
    htmlEditor.getSession().setMode("ace/mode/html");
	
	// Initialize CSS Editor
    var cssEditor = ace.edit("editorcss");
    cssEditor.setTheme("ace/theme/twilight");
    cssEditor.getSession().setMode("ace/mode/css");
	
	// Initialize JS Editor
    var jsEditor = ace.edit("editorjs");
    jsEditor.setTheme("ace/theme/twilight");
    jsEditor.getSession().setMode("ace/mode/javascript");
	
	htmlEditor.getSession().on('change', function () {
        //Save Browser session storage
		sessionStorage['html'] = htmlEditor.getValue();
		
		//Save HTML
		jQuery("#bit_html").val(htmlEditor.getValue());
		
		// Count Characters
		jQuery("#count-characters-html").html(htmlEditor.getValue().length);
		// Count Lines
		jQuery("#count-lines-html").html(htmlEditor.session.getLength());
		// Cursor Position
		var curHtml = htmlEditor.selection.getCursor();
		jQuery("#cursor-position-html").html((curHtml["row"] + 1) + ":" + (curHtml["column"] + 1));
    });
	
	cssEditor.getSession().on('change', function () {
        //Save Browser session storage
		sessionStorage['css'] = cssEditor.getValue();
		
		//Save CSS
		jQuery("#bit_css").val(cssEditor.getValue());
		
		// Count Characters
		jQuery("#count-characters-css").html(cssEditor.getValue().length);
		// Count Lines
		jQuery("#count-lines-css").html(cssEditor.session.getLength());
		// Cursor Position
		var curCss = cssEditor.selection.getCursor();
		jQuery("#cursor-position-css").html((curCss["row"] + 1) + ":" + (curCss["column"] + 1));
    });
	
	jsEditor.getSession().on('change', function () {
        //Save Browser session storage
		sessionStorage['js'] = jsEditor.getValue();
		
		//Save JS
		jQuery("#bit_js").val(jsEditor.getValue());
		
		// Count Characters
		jQuery("#count-characters-js").html(jsEditor.getValue().length);
		// Count Lines
		jQuery("#count-lines-js").html(jsEditor.session.getLength());
		// Cursor Position
		var curJs = jsEditor.selection.getCursor();
		jQuery("#cursor-position-js").html((curJs["row"] + 1) + ":" + (curJs["column"] + 1));
    });
	
	function init() {

			if (sessionStorage["html"]) {
				htmlEditor.setValue(sessionStorage["html"]);
			} else{
				htmlEditor.setValue("");	
			}
			if (sessionStorage["css"]) {
				cssEditor.setValue(sessionStorage["css"]);
			} else{
				cssEditor.setValue("");
			}
			if (sessionStorage["js"]) {
				jsEditor.setValue(sessionStorage["js"]);
			} else{
				jsEditor.setValue("");
			}

	};
	init();

</script>
<style>

.darlic-live-editor{
	background-color:#FFFFFF;
	border:1px solid #e8e8e8;
}
.dle-header{
	background-color:#333334;
	width:50%;
}

.dle-header-left{
	float:left;
	width:50%;
}
.dle-header-left ul{
	padding:0;
	margin:0;
	list-style:none;
}
.dle-header-left ul li{
	padding:0;
	margin:0;
	display:inline-block;
}
.dle-header-left ul li a {
	background: #1d1d1d;
    color: #ffffff;
	text-decoration: none;
    display: inline-block;
    position: relative;
    padding: 8px 16px 8px;
}
.dle-editors{
	width:50%;
	float:left;
}

.live-preview{
	width:50%;
	float:right;
}
#live_preview.fullscreen {
	position: absolute;
    display: block;
    overflow: hidden;
    height: 100%;
    top: 0;
    right: 0;
    bottom: -20px;
    left: -20px;
    z-index: 99;
}
#live_preview.fullscreen #preview{
    height: 100%;
}
#jsdiv.fullscreen {
	position: absolute;
    display: block;
    overflow: hidden;
    height: 100%;
    top: 0;
    right: 0;
    bottom: -20px;
    left: -20px;
    z-index: 99;
}
#jsdiv.fullscreen #editor-js,
#jsdiv.fullscreen #editorjs{
    height: 92%;
}

#live_preview.fullscreen .inside {
    height: 100%;
}

#live_preview.fullscreen #postcustomstuff{
    height: 100%;
}

</style>


  
