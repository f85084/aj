
<html>
<head>
<title>MM_openBrWindow事件</title>
    <meta charset="utf-8">
<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.8.3.js"></script>
<script src="http://jqueryui.com/resources/demos/external/jquery.bgiframe-2.1.2.js"></script>
<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
<script>
$(function() {
  $( "#dialog" ).dialog({
    autoOpen: false,
    height:150,
    width:300
  });
  $( "#opener" ).click(function() {
    $( "#dialog" ).dialog( "open" );
    return false;
  });
});
</script>
</head>
<body>
<div id="dialog" title="視窗標題">
  <p>視窗文字</p>
</div>
<button id="opener">OPEN</button> 


<a href="photo_manage.php" data-rel="dialog">Open dialog</a>
</body>
</html>