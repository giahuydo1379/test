<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Phalcon PHP Framework</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <style type="text/css" media="screen">
            form
            {
               box-sizing: border-box;
               width: 400px;
               border-radius: 5px;
               padding: 10px;
               box-shadow: 2px 2px 5px 1px rgba(0, 0, 0, 0.2);
               margin-left: 400px;

            }
            form h1
            {
                color: #B52828;
                box-sizing: border-box;
                margin-left: 100px;
                font-family: Crafty Girls;
            }
            input
            {
                margin: 30px 20px;
                width: 300px;
                border: none;
                 background: linear-gradient(to bottom, rgba(255, 255, 255, 0) 96%, #1abc9c 4%);
                  /* background-position: -200px 0; */
                  display: block;
                  padding: 5px 0;

            }
            button
            {
                background: #B93F3F;
                color: white;
                width: 200px;
                height: 30px;
                margin-left: 150px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            {{ content() }}
        </div>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </body>
</html>
