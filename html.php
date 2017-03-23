<?php
	
	include("includes/header.php");
	$data = file_get_contents('http://learndarlic.darlic.com/test-api/');
	$data_array = json_decode($data);
	//echo "<pre>";print_r($data_array);echo "</pre>";
?>
<!------------------ MAIN STARTS ------------------>
<div id="jsondata" style="display:none;"></div>
<div id="main" class="main">
	<!------------------ SIDEBAR STARTS ------------------>
	<script>
	var options = {
		valueNames: [ 'aione-list-entity', 'entity-weight' ]
	};

	var hackerList = new List('aione_list', options);
	</script>
	<aside id="sidebar" class="sidebar">
		<div id="aione_list">
			<h3>HTML Tags</h3>
			<input class="search" placeholder="Search HTML Tags" />
			<button class="sort" data-sort="aione-list-entity">
			Sort by Name
			</button>
			<button class="sort" data-sort="entity-weight">
			Sort by Weight
			</button>
			<ul class="aione-list list">
			<?php
				foreach($data_array as $data_key => $data_value){
					echo '<li class="aione-list-item ">
					<a href="#'.$data_value->slug.'tag" class="'.$data_value->slug.'tag">
					<span class="aione-list-entity">'.$data_value->slug.'</span>
					<span class="entity-weight">'.$data_value->rank.'</span>
					</a></li>';
					
				}
				
			?>
			</ul>
		</div>
	</aside>
	<!------------------ SIDEBAR ENDS ------------------>
	<!------------------ CONTENT STARTS ------------------>
	<div id="content" class="content">
		<div id="main_content" class="main_content" >
		<?php 
		
			$before_tag = "&lt;";
			$after_tag = "&gt;";
			foreach($data_array as $data_key => $data_value) { 
				echo '<div class="feature-block" id="'.$data_value->slug.'tag" style="display: none;">';
				echo '<h1 class="feature-block-title">HTML '.$before_tag.$data_value->slug.$after_tag.' Tag</h1>';
				echo '<div class="feature-block-content">';
				echo '<div class="feature-block-desc">';
				echo $data_value->description;
				echo '</div>'; //feature-block-desc
						
				echo '<div class="keynotes">';
				echo '<h2>Key Notes</h2>';
				echo $data_value->keynotes;
				echo '</div>';
				
				echo '<div class="examples-tabs">';
				echo '<div class="tab-list">
						<ul>';
				foreach($data_value->examples as $datakeys => $datavalues){
					$datakeys_inc = $datakeys + 1;
					echo '<li><a class="" href="#" id="example_'.$datakeys_inc.'">Example '.$datakeys_inc.'</a></li>';
				}		
				echo '</ul>
					</div>'; 
				foreach($data_value->examples as $datakeys => $datavalues){
					$html = $datavalues[0];
					$css = $datavalues[1];
					$js = $datavalues[2];
					
					//echo $html."<br/>";
					//echo $css."<br/>";
					//echo $js."<br/>";
				}
				//echo "<pre>";print_r($data_value->examples);echo "</pre>";
				echo '</div>'; //examples-tabs
				
				echo '</div>'; //feature-block-content
				echo '</div>'; //feature-block
				
				
			}
			
			
		?>
		<section id="editor_section" class=""> 
			<div id="darlic_live_editor" class="darlic-live-editor">
				<div class="dle-header">
					<ul>
						<li><a href="#htmldiv" id="htmldiv_link">HTML</a></li>
						<li><a href="#cssdiv" id="cssdiv_link">CSS</a></li>
						<li><a href="#jsdiv" id="jsdiv_link">JS</a></li>
					</ul>
				</div> <!--dle-header-->
				<div class="dle-content">
				<div class="dle-header-left">
					<div id="htmldiv" class="postbox">
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
					<div id="cssdiv" class="postbox">
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
					<div id="jsdiv" class="postbox">
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

				</div><!---- dle-header-left ------>
				
				<div class="dle-header-right">
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
				</div><!---- dle-header-right ------>
				
				</div> <!--dle-content-->
			</div> <!--darlic_live_editor-->
		</section>
		<div class="feature-block" id="tag" style="display: block;"><h1 class="feature-block-title">HTML &lt;a&gt; Tag</h1><div class="feature-block-content"><div class="feature-block-desc"><h4><b>Definition and Usage</b></h4>
<p>
The &lt;a&gt;tag defines a hyperlink, which is used to link from one page to another.<br>

The most important attribute of the &lt;a&gt; element is the href attribute, which indicates the link's destination.<br>

By default, links will appear as follows in all browsers:<br>

An unvisited link is underlined and blue<br>
A visited link is underlined and purple<br>
An active link is underlined and red<br>
</p></div><div class="feature-block-example feature-box closed"><h1 class="feature-box-title">Live Example for HTML &lt;a&gt; Tag</h1><div class="feature-box-content"><textarea disabled="true" class="codebox"> &lt;a href="http://www.darlic.com"&gt;Visit darlic.com!&lt;/a&gt; </textarea></div></div><div class="feature-block-tabs"></div></div></div>
		
		
				
				<div style="width:99%;border:1px solid grey;padding:3px;margin:0px;background-color:#fff" class="feature-block" id="page">&lt;html&gt;
				<div style="width:90%;border:1px solid grey;padding:3px;margin:20px">&lt;head&gt;
				<div style="width:90%;border:1px solid grey;padding:5px;margin:20px">&lt;title&gt;Page title&lt;/title&gt;
				</div>
				&lt;/head&gt;
				</div>
				<div style="width:90%;border:1px solid grey;padding:3px;margin:20px;background-color:#fff">&lt;body&gt;
				<div style="width:90%;border:1px solid grey;padding:5px;margin:20px">&lt;h1&gt;This is a heading&lt;/h1&gt;</div>
				<div style="width:90%;border:1px solid grey;padding:5px;margin:20px">&lt;p&gt;This is a paragraph.&lt;/p&gt;</div>
				<div style="width:90%;border:1px solid grey;padding:5px;margin:20px">&lt;p&gt;This is another paragraph.&lt;/p&gt;</div>
				&lt;/body&gt;
				</div>
				&lt;/html&gt;
				</div>
				
				
				
				
				<section style="display: block; color:black;" class="secondary-content  section__index  clearfix js-section-index">
			<div class="heading">
				<h3 class="ciu-section-heading">What is HTML?</h3>
				<p class="">
			   
				HTML is a markup language for describing web documents (web pages).
				<br/>
				HTML stands for Hyper Text Markup Language
				<br/>
				A markup language is a set of markup tags<br/>
				HTML documents are described by HTML tags<br/>
				Each HTML tag describes different document content<br/>
				<a href="#page"class="page">HTML Page Structure</a>


				</p>
				</div>
			
				<div class="col">
				
				
				<div id="cat_JS_API">
				<h3>HTML Forms</h3>
				<ol>
				<li> <a href="#form" class="form">HTML Forms</a></li>
				<li> <a href="#FormElements" class="FormElements">HTML Form Elements</a></li>
				<li> <a href="#inputTypes" class="inputTypes">HTML Input Types</a>
				<ul id="inputTypes1" class="feature-block1">
				<li><a href="#text" class="text">Input Type: text</a></li>
				<li><a href="#password" class="password">Input Type: password</a></li>
				<li><a href="#submit" class="submit">Input Type: submit</a></li>
				<li><a href="#radio" class="radio">Input Type: radio</a></li>
				<li><a href="#checkbox" class="checkbox">Input Type: checkbox</a></li>
				<li><a href="#button" class="button">Input Type: button</a></li>
				<li><a href="#number" class="number">Input Type: number</a></li>
				<li><a href="#date" class="date">Input Type: date</a></li>
				<li><a href="#color" class="color">Input Type: color</a></li>
				<li><a href="#range" class="range">Input Type: range</a></li>
				<li><a href="#month" class="month">Input Type: month</a></li>
				<li><a href="#week" class="week">Input Type: week</a></li>
				<li><a href="#time" class="time">Input Type: time</a></li>
				<li><a href="#datetime" class="datetime">Input Type: datetime</a></li>
				<li><a href="#email" class="email">Input Type: email</a></li>
				<li><a href="#search" class="search">Input Type: search</a></li>
				<li><a href="#tel" class="tel">Input Type: tel</a></li>
				<li><a href="#url" class="url">Input Type: url</a></li>
				</ul>
				</li>
				<li> <a href="#InputAttributes" class="InputAttributes">HTML Input Attributes</a>
				<ul id="inputTypes1" class="feature-block1">
				<li><a href="#value" class="value">The value Attribute</a></li>
				<li><a href="#disabled" class="disabled">The disabled Attribute</a></li>
				<li><a href="#size" class="size">The size Attribute</a></li>
				<li><a href="#maxlength" class="maxlength">The maxlength Attribute</a></li>
				<li><a href="#autocomplete" class="autocomplete">The autocomplete Attribute</a></li>
				
				<li><a href="#autofocus" class="autofocus">The autofocus Attribute</a></li>
				<li><a href="#formAttribute" class="formAttribute">The form Attribute</a></li>
				<li><a href="#formaction" class="formaction">The formaction Attribute</a></li>
				<li><a href="#formenctype" class="formenctype">The formenctype Attribute</a></li>
				<li><a href="#formmethod" class="formmethod">The formmethod Attribute</a></li>
				<li><a href="#formnovalidate" class="formnovalidate">The formnovalidate Attribute</a></li>
				<li><a href="#formtarget" class="formtarget">The formtarget Attribute</a></li>
				<li><a href="#heightandwidth" class="heightandwidth">The height and width Attributes</a></li>
				<li><a href="#list" class="list">The list Attribute</a></li>
				<li><a href="#minandmax" class="minandmax">The min and max Attributes</a></li>
				<li><a href="#multiple" class="multiple">The multiple Attribute</a></li>
				<li><a href="#pattern" class="pattern">The pattern Attribute</a></li>
				<li><a href="#placeholder" class="placeholder">The placeholder Attribute</a></li>
				<li><a href="#required" class="required">The required Attribute</a></li>
				<li><a href="#step" class="step">The step Attribute</a></li>
				</ul>
				</li>
				</ol>
				
				
	            </div>
				
				<div id="cat_JS_API">
				<h3>HTML Styles</h3>
				<ol>
				<li><a href="#StyleAttributes" class="StyleAttributes">HTML Style Attributes</a></li>
				<li><a href="#TextColor" class="TextColor">HTML Text Color</a></li>
				<li><a href="#HTMLFonts" class="HTMLFonts">HTML Fonts</a></li>
				<li><a href="#TextSize" class="TextSize">HTML Text Size</a></li>
				<li><a href="#TextAlignment" class="TextAlignment">HTML Text Alignment</a></li>
				</ol>
				
				<h3>HTML Lists</h3>
				<ol>
				<li><a href="#UnorderedLists" class="UnorderedLists">Unordered HTML Lists</a></li>
				<li><a href="#OrderedLists" class="OrderedLists">Ordered HTML Lists</a></li>
				<li><a href="#Description" class="Description">HTML Description Lists</a></li>
				<li><a href="#NestedLists" class="NestedLists">Nested HTML Lists</a></li>
				<li><a href="#HorizontalLists" class="HorizontalLists">Horizontal Lists</a></li>
				</ol>
				
				<h3>HTML Comments</h3>
				<ol>
				<li><a href="#CommentTags" class="CommentTags">HTML Comment Tags</a></li>
				<li><a href="#Conditional" class="Conditional">Conditional Comments</a></li>
	            </ol>
				<h3>HTML Attributes</h3>
				<ol>
				<li> <a href="#langAttributes" class="langAttributes">lang Attribute</a></li>
				<li> <a href="#titleAttributes" class="titleAttributes">title Attribute</a></li>
				<li> <a href="#hrefAttributes" class="hrefAttributes">href Attribute</a></li>
				<li> <a href="#SizeAttributes" class="SizeAttributes">Size Attributes</a></li>
				<li> <a href="#altAttribute" class="altAttribute">alt Attribute</a></li>
				
				</ol>
				
		        </div>
				
				<div id="cat_JS_API">
				<h3>HTML Images</h3>
				<ol>
				<li><a href="#ImagesSyntax" class="ImagesSyntax">HTML Images Syntax</a></li>
				<li><a href="#alt" class="alt">The alt Attribute</a></li>
				<li><a href="#WidthandHeight" class="WidthandHeight">Image Size - Width and Height</a></li>
				<li><a href="#AnimatedImages" class="AnimatedImages">Animated Images</a></li>
				<li><a href="#Link" class="Link">Using an Image as a Link</a></li>
				<li><a href="#Floating" class="Floating">Image Floating</a></li>
				<li><a href="#Maps" class="Maps">Image Maps</a></li>
				</ol>
				
				<h3>HTML Tables</h3>
				<ol>
				<li><a href="#HTMLTables" class="HTMLTables">Defining HTML Tables</a></li>
				<li><a href="#TableAttribute" class="TableAttribute">An HTML Table with a Border Attribute</a></li>
				<li><a href="#TableBorders" class="TableBorders">An HTML Table with Collapsed Borders</a></li>
				<li><a href="#TablePadding" class="TablePadding">An HTML Table with Cell Padding</a></li>
				<li><a href="#TableHeadings" class="TableHeadings">HTML Table Headings</a></li>
				<li><a href="#TableSpacing" class="TableSpacing">An HTML Table with Border Spacing</a></li>
				<li><a href="#TableColumns" class="TableColumns">Table Cells that Span Many Columns</a></li>
				<li><a href="#TableRows" class="TableRows">Table Cells that Span Many Rows</a></li>
				<li><a href="#TableCaption" class="TableCaption">An HTML Table With a Caption</a></li>
				<li><a href="#StyleTable" class="StyleTable">A Special Style for One Table</a></li>
				</ol>
				
				<h3>HTML Formatting</h3>
				<ol>
				<li><a href="#Formatting" class="Formatting">HTML Formatting Elements</a></li>
				<li><a href="#BoldandStrong" class="BoldandStrong">HTML Bold and Strong Formatting</a></li>
				<li><a href="#Italic" class="Italic">HTML Italic and Emphasized Formatting</a></li>
				<li><a href="#Small" class="Small">HTML Small Formatting</a></li>
				<li><a href="#Marked" class="Marked">HTML Marked Formatting</a></li>
				<li><a href="#Deleted" class="Deleted">HTML Deleted Formatting</a></li>
				<li><a href="#Inserted" class="Inserted">HTML Inserted Formatting</a></li>
				<li><a href="#Subscript" class="Subscript">HTML Subscript Formatting</a></li>
				<li><a href="#Superscript" class="Superscript">HTML Superscript Formatting</a></li>
				
				</ol>
			
		        </div>
            	</div>	
                </section>
		</div>
	</div>
	<div class="oxo-clearfix"></div>
	<!------------------ CONTENT ENDS ------------------>
</div>
<!------------------ MAIN ENDS ------------------>

<?php 
//include('play.php');
include("includes/footer.php");
?>