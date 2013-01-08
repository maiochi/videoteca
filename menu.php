<html>
    <head>
        <script type='text/javascript' src='http://127.0.0.1/videoteca/application/js/jquery-183.js'></script>
        <script>
            $(document).ready(function() {
                $('ul#menu > li').hover(function(){
                    //$('#drop' , this).css('display','block');
                     $('.drop' , this).delay(20).slideDown(200);
                }, function(){
                 $('.drop' , this).delay(20).slideUp(200);
                });​
            });
            
        </script>
        <style>
            body {
                background-color: #333;
            }
           ul#menu
{
    margin:0;
    padding:0;
}
ul#menu > li
{
    list-style:none;
    float:left;
    margin:0;
    padding:0;
    position:relative;
}
ul#menu a
{
    text-decoration:none;
    color:#fff;
    background:red;
    display:block;
    padding:10px;
}
ul#menu > li ul.drop
{
    margin:0;
    padding:0;
    width:150px;
    position:absolute;
    display:none;
}
ul#menu > li ul.drop ul
{
    margin:0;
    padding:0;
    width:150px;
    position:absolute;
    display:none;
    left:150px;
    top:0;
}
ul#menu > li ul li
{
    margin:0;
    padding:0;
    list-style:none;
    position:relative;
}​
        </style>
    </head>
    <body>
        
            <ul id="menu">
    <li><a href="#">Home</a>
        <ul class="drop">
            <li><a href="#">About us</a></li>
            <li><a href="#">About us</a></li>
            <li><a href="#">About us</a></li>
            <li><a href="#">About us</a></li>
        </ul>
    </li>


    <li><a href="#">about</a>
        <ul class="drop">
            <li><a href="#">Home</a></li>
            <li><a href="#">Home</a></li>
            <li><a href="#">Home</a></li>
            <li><a href="#">Home</a></li>
        </ul>
    </li>

</ul>​
        
    </body>
</html>