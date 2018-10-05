<!DOCTYPE html>
<!--
Created using JS Bin
http://jsbin.com

Copyright (c) 2018 by RubaXa (http://jsbin.com/videzob/1/edit)

Released under the MIT license: http://jsbin.mit-license.org
-->
<meta name="robots" content="noindex">
<html>
    <head>
        <meta charset="utf-8">
        <title>JS Bin</title>
        <style id="jsbin-css">
            body {
                padding: 20px;
            }

            .list-group-item {
                cursor: move;
                cursor: -webkit-grabbing;
            }

            .list-group {
                width: 200px;
            }
        </style>
    </head>
    <body>


        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css"/>


        <!-- Latest Sortable -->
        <script src="http://rubaxa.github.io/Sortable/Sortable.js"></script>


        <!-- sort: true -->
        Portieri
        <div id="portieri" class="list-group">
            <div class="list-group-item"><input type="hidden" name="portieri" value="Portiere 1" >Portiere 1</div>
            <div class="list-group-item"><input type="hidden" name="portieri" value="Portiere 2" >Portiere 2</div>
            <div class="list-group-item"><input type="hidden" name="portieri" value="Portiere 3" >Portiere 3</div>
        </div>
        
        Difensori
        <div id="difensori" class="list-group">
            <div class="list-group-item"><input type="hidden" name="gioca" value="Marco" >Marco</div>
            <div class="list-group-item"><input type="hidden" name="gioca" value="Franco" >Franco</div>
        </div>

        <!-- sort: false -->
        Centrocampisti
        <div id="centrocampisti" class="list-group">
            <div class="list-group-item">Bettina</div>
            <div class="list-group-item">Giorgina</div>
            <div class="list-group-item"><input type="hidden" name="gioca" value="Marco" >Marco</div>
            <div class="list-group-item"><input type="hidden" name="gioca" value="Franco" >Franco</div>
        </div>
        
        <!-- sort: false -->
        Attaccanti
        <div id="attaccanti" class="list-group">
            <div class="list-group-item">Bettina</div>
            <div class="list-group-item">Giorgina</div>
            <div class="list-group-item"><input type="hidden" name="gioca" value="Marco" >Marco</div>
            <div class="list-group-item"><input type="hidden" name="gioca" value="Franco" >Franco</div>
        </div>


        <script id="jsbin-javascript">
// sort: true
    Sortable.create(portieri, {
        group: "Portieri",
        sort: true
    });
    
    // sort: false
    Sortable.create(difensori, {
        group: "Difensori",
        sort: true
    });
    
    Sortable.create(centrocampisti, {
        group: "Centrocampisti",
        sort: true
    });
    
    Sortable.create(attaccanti, {
        group: "Attaccanti",
        sort: true
    });



        </script>
    </body>
</html>