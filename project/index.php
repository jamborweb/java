<!DOCTYPE html>
<html lang="pl">
<head>
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>jScore - Baza rozgrywek</title>
    <link href="css/bootstrap.css" type="text/css" rel="stylesheet">
    <link href="css/custom.css" type="text/css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
</head>
<body>
    <?php
    require_once('functions/connect.php');
?>
<?php include('includes/header.php'); ?>

<div class="container container-main">
    <div class="row row-nav-custom">
        
        <div class="tabbable">
<ul class="nav nav-tabs" id="navtabs">
      <li><a href="kluby.php" data-target="#kluby" class="media_node active span" id="kluby_tab" data-toggle="tabajax" rel="tooltip"> Kluby </a></li>
</ul>

    
<div class="tab-content">
<div class="tab-pane" id="kluby">
    
</div>
    
</div>
</div> 
</div>
</div>
    
    
    
<script> 
$('[data-toggle="tabajax"]').click(function(e) {
    var $this = $(this),
        loadurl = $this.attr('href'),
        targ = $this.attr('data-target');

    $.get(loadurl, function(data) {
        $(targ).html(data);
    });

    $this.tab('show');
    return false;
});
</script>
  

            
<?php include('includes/footer.php'); ?>  
</body>
</html>

