<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Ratchet Development Environment</title>
    
    <link rel="stylesheet" href="assets/css/style.css">
    
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script>
		function goGet(){
			$.ajax({
				url: "assets/call.php",
				data:{'startNode':$('#in').val()}
			}).done(function(d) {
			  $( '#test' ).html( d );
			});
		}
	</script>
</head>
<body>

    <header>
        <nav>
            <ul>
                <li class="active"><a href="#">Generate Attack Tree</a></li>
                <li><a href="display_tree.html">View Attack Tree</a></li>
                <li><a href="#">Search Attack Trees</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Forums</a></li>
            </ul>
        </nav>
    </header>

	
    <div class="get_input_wrap">
        <label for="root_node">Enter the root node for the tree : </label>
	    <input name="root_node" type="text" id="in"/>
	    <button onclick="goGet()">get it</button>
    </div>
    
    <div id="test"></div>
</body>
</html>
