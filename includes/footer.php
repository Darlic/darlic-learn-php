</div>
<footer id="footer">
	<div class="aione-row">
		<div class="copyright-area-content">
			<div class="copyright">
				<div>©2015 All Rights reserved. Darlic™ is a registered trademark of OXO IT SOLUTIONS PVT. LTD.</div>
			</div>
		</div>
	</div>
</footer>


	<script>
		$(document).ready(function(){
			// Optional code to hide all divs
			$(".feature-block").hide();
			$("#editor_section").hide();
			
			var urlHash = $.address.path();
			urlHash = urlHash.substr(1, urlHash.length);
			console.log("111 = "+urlHash);
			if(urlHash != ''){
				$("#" + urlHash ).show();
				$("#editor_section").show();
				$('.' + urlHash ).parent('li').addClass("active").siblings('li').removeClass("active");
			}
			
			
			// Show chosen div, and hide all others
			$("ul.list a").click(function (e) {
				e.preventDefault();
				$("#editor_section").show();
				$(this).parent('li').addClass("active").siblings('li').removeClass("active");
				$("#" + $(this).attr("class")).show().siblings('div').hide();
				$('html, body').animate({scrollTop:160}, 500);
				$.address.value($(this).attr('class'));
			});
			
			$( ".feature-box-content").hide();
			$( ".feature-box .feature-box-title" ).click(function() {
				$( this ).toggleClass( "open" );
				$( this ).parent().toggleClass( "closed" );
				$( this ).next().slideToggle( "slow", function() {
				// Animation complete.
				});
			});
			
			$( "#htmldiv" ).show();
			$("#htmldiv_link").addClass('active-tab');
			$( "#cssdiv" ).hide();
			$( "#jsdiv" ).hide();
			$( "#htmldiv_link" ).click(function(event) {
				event.preventDefault();
				$( "#htmldiv" ).show();
				$("#htmldiv_link").addClass('active-tab');
				$("#cssdiv_link").removeClass('active-tab');
				$("#jsdiv_link").addClass('active-tab');
				$( "#cssdiv" ).hide();
				$( "#jsdiv" ).hide();
			});
			$( "#cssdiv_link" ).click(function(event) {
				event.preventDefault();
				$( "#htmldiv" ).hide();
				$( "#cssdiv" ).show();
				$( "#jsdiv" ).hide();
				$("#htmldiv_link").removeClass('active-tab');
				$("#cssdiv_link").addClass('active-tab');
				$("#jsdiv_link").removeClass('active-tab');
				
			});
			$( "#jsdiv_link" ).click(function(event) {
				event.preventDefault();
				$( "#htmldiv" ).hide();
				$( "#cssdiv" ).hide();
				$( "#jsdiv" ).show();
				$("#htmldiv_link").removeClass('active-tab');
				$("#cssdiv_link").removeClass('active-tab');
				$("#jsdiv_link").addClass('active-tab');
			});	
			
			
		//});
		$.address.change(function(event) {  
			var tagDiv = event.value;
			tagDiv = tagDiv.substr(1, tagDiv.length);
			//alert(tagDiv);
			//console.log("222 = "+tagDiv);
			if(tagDiv != ''){
				$('.' + tagDiv ).parent('li').addClass("active").siblings('li').removeClass("active");
				$("#" + tagDiv ).show().siblings('div').hide();
			}

			
			$('html, body').animate({scrollTop:160}, 500);
			
			
			onload=(document).onkeyup=function(){
				(document.getElementById("preview").contentWindow.document).write(
					htmlEditor.getValue()
					+ "<style>" + cssEditor.getValue() + "<\/style>"
					+ "<script>" + jsEditor.getValue() + "<\/script>"
					+ "<script src='" + + "'><\/script>"
				);
				(document.getElementById("preview").contentWindow.document).close();
			};
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
			//init();
			
			$.ajax({
			  type: 'GET',
			  url: 'http://learndarlic.darlic.com/test-api/',
			   success: function (data) {
				   data = JSON.stringify(data);
					$("#jsondata").text(data);
			  }
			});
			
			
			
			$(".feature-block").each(function(){
			   if($(this).css("display")=="block"){
				  var id = $(this).attr( "id" );
				  id = id.replace("tag", "");
				  
				  var dataset = jQuery( "#jsondata").text();
				  dataset = JSON.parse(dataset);
					jQuery.each(dataset, function(key, val) {
						//console.log(val);
						 if(val.slug == id){
							var examples = val.examples;
							jQuery.each(examples, function(k, v) {
								var htmlText = v[0];
								var cssText = v[1];
								var jsText = v[2];
								var html = $('<div/>').html(htmlText).text();
								var css = $('<div/>').html(cssText).text();
								var js = $('<div/>').html(jsText).text();
								 
								htmlEditor.setValue(html);
								cssEditor.setValue(css);
								jsEditor.setValue(js); 
							});
						} 
					});
				(document.getElementById("preview").contentWindow.document).write(
					htmlEditor.getValue()
					+ "<style>" + cssEditor.getValue() + "<\/style>"
					+ "<script>" + jsEditor.getValue() + "<\/script>"
					+ "<script src='" + + "'><\/script>"
				);	
			   }
			});
		});
	});		
	</script>
	<script>
		var options = {
		  valueNames: [ 'aione-list-entity' ]
		};

		var userList = new List('aione_list', options);

	</script>
	</body>
</html>