<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="refresh" content="5; URL=<?php echo site_url('/');?>">
        <style>
        .center {
            text-align: center;
        }
        </style>
    </head>
    <body oncontextmenu="return false;">
    <div class="center">
        <img src="<?php echo site_url('resources/img/js.gif');?>" alt="Google" />
    </div>
<script>
    document.onkeydown = function(e) {
    if(event.keyCode == 123) {
    return false;
    }
    if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)){
    return false;
    }
    if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)){
    return false;
    }
    if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)){
    return false;
    }
    }
</script>
    </body>
</html>