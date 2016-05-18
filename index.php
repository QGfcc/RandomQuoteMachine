<!DOCTYPE html>
<html>
    <head>
        <!--<meta http-equiv="refresh" content="2">-->
        <meta charset="utf-8"> 
        <meta name="viewport" content="width=device-width, initial-scale=1">    
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        
        <!--when offline-->
<!--        <link href="local CDN/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="local CDN/js/jquery-1.12.3.js" type="text/javascript"></script>
        <script src="local CDN/js/bootstrap.min.js" type="text/javascript"></script>-->
        <title>Random Quote Machine</title>
        <style>
            body, .thumbnail{
                transition: all  0.5s;
            }
            body {
                padding: 150px 0;
            }
            blockquote {
                border: none;
            }
            .thumbnail , .btn.btn-default {
                border:none;
            }
            .thumbnail {
                padding: 30px;
            }
            body footer {
                color: black;
            }
            body footer a {
                /*font-weight: bold;*/
                text-decoration: underline;
                color: black;
            }
            @media screen and (max-width: 480px) {
                body {
                    padding: 50px 0;
                }
            }
        </style>
        <script src="quoteDic.js"></script>
        <script>
            function onNext(){
                var randomQuote = Math.floor(Math.random()*quoteDic.length);
                var randomColor = Math.floor(Math.random()*255)+","+Math.floor(Math.random()*255)
                        +","+Math.floor(Math.random()*255);
//                $("blockquote h1").text("Quote n°"+(counter+1)+" : "+quoteDic[randomQuote].quote);
                $("blockquote #quote").text(quoteDic[randomQuote].quote);
//                $("blockquote footer").text("Source n°"+(counter+1)+" : "+quoteDic[randomQuote].source);
                $("blockquote footer").text(quoteDic[randomQuote].source);
                $("body").css("background-color","rgba("+randomColor+",0.7)");
                $(".btn.btn-default").css("background-color","rgba("+randomColor+",0.3)");
                $(".thumbnail").css("background-color","rgba("+"255,255,255"+",0.3)");
//                counter++;
                updateTwitBtn(quoteDic[randomQuote].quote,quoteDic[randomQuote].source);
            }
            $(document).ready(function(){
                $("#nextQuote").click(function(){
                    onNext();
                });
                onNext();
            });
        </script>
        <script src="https://platform.twitter.com/widgets.js"></script>
        <script>
            function addTwitBtn(quote,source){
                twttr.widgets.createShareButton(
                    'http://localhost/randomQuoteMachine/',
                    document.getElementById('twitterButton'),
                    {
                        text: "\""+quote+"\" "+source+"\n",
                        size:"large",
                        hashtag:"quote"
                    }
                );
            }
            function updateTwitBtn(quote,source){
                $("#twitterButton").text("");
                addTwitBtn(quote,source);
            }
        </script>
        
    </head>
    <body>
        <div class="container">
            <div class="row"> 
                <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                    <div class="thumbnail">
                        <blockquote >
                            <h3 id="quote">Default Quote</h3>
                            <footer>
                                Default Source
                            </footer>
                        </blockquote>
                        <div class="row text-center"> 
                        <div class="col-xs-6 col-sm-4 col-sm-offset-2 col-md-3 col-md-offset-3">
                            <div id="twitterButton">                
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-4 col-md-3 ">
                            <button class="btn btn-default" id="nextQuote"> Next Quote </button>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="text-center">
            quotes <a href="http://www.brightquotes.com/humr_fr.html" >source</a>
             - 
            Coded by <a href="https://github.com/QGfcc/learning">QG</a>
        </footer>
    </body>
</html>
