<?php

# This file passes the content of the Readme.md file in the same directory
# through the Markdown filter. You can adapt this sample code in any way
# you like.
# Install PSR-0-compatible class autoloader
spl_autoload_register(function($class){
	require preg_replace('{\\\\|_(?!.*\\\\)}', DIRECTORY_SEPARATOR, ltrim($class, '\\')).'.php';
});

# Get Markdown class
use \Michelf\Markdown;

# Read file and pass content through the Markdown praser
?>
<!DOCTYPE html>
<html>
    <head>
        <title>SCMF - Software Configuration Management Framework Specification</title>
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<script type="text/javascript" src="lib/jquery-1.3.2.min.js"></script>
		<script type="text/javascript" src="lib/toc.js"></script>
		<script type="text/javascript">
		$(document).ready(function() {
			var links = []; 
			$('li a[id]').each(function(index, elem) {
				if($(elem).text()) {
					links.push( '<a href="#' + elem.id + '">' + $(elem).text() + '</a>' ) 
				}
			} ); 
			$('#definitions').html(links.join(', '))
			document.getElementById("toc").innerHTML = generateTOC(document.getElementById("content"));
		})
		</script>
    </head>
    <body>
		<div id="content">
		<?php
			# Put HTML content in the document
			echo Markdown::defaultTransform(file_get_contents('SCMF.md'));
		?>
		</div>
    </body>
</html>
