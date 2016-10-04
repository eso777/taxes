<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
     <head>
          <title>404 error page</title>
          <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
          <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">


          <style>
               /*
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
               */
               /* reset */
               html,body,div,span,applet,object,iframe,h1,h2,h3,h4,h5,h6,p,blockquote,pre,a,abbr,acronym,address,big,cite,code,del,dfn,em,img,ins,kbd,q,s,samp,small,strike,strong,sub,sup,tt,var,b,u,i,dl,dt,dd,ol,nav ul,nav li,fieldset,form,label,legend,table,caption,tbody,tfoot,thead,tr,th,td,article,aside,canvas,details,embed,figure,figcaption,footer,header,hgroup,menu,nav,output,ruby,section,summary,time,mark,audio,video{margin:0;padding:0;border:0;font-size:100%;font:inherit;vertical-align:baseline;}
               article, aside, details, figcaption, figure,footer, header, hgroup, menu, nav, section {display: block;}
               ol,ul{list-style:none;margin:0;padding:0;}
               blockquote,q{quotes:none;}
               blockquote:before,blockquote:after,q:before,q:after{content:'';content:none;}
               table{border-collapse:collapse;border-spacing:0;}
               /* start editing from here */
               a{text-decoration:none;}
               .txt-rt{text-align:right;}/* text align right */
               .txt-lt{text-align:left;}/* text align left */
               .txt-center{text-align:center;}/* text align center */
               .float-rt{float:right;}/* float right */
               .float-lt{float:left;}/* float left */
               .clear{clear:both;}/* clear float */
               .pos-relative{position:relative;}/* Position Relative */
               .pos-absolute{position:absolute;}/* Position Absolute */
               .vertical-base{	vertical-align:baseline;}/* vertical align baseline */
               .vertical-top{	vertical-align:top;}/* vertical align top */
               .underline{	padding-bottom:5px;	border-bottom: 1px solid #eee; margin:0 0 20px 0;}/* Add 5px bottom padding and a underline */
               nav.vertical ul li{	display:block;}/* vertical menu */
               nav.horizontal ul li{	display: inline-block;}/* horizontal menu */
               img{max-width:100%;}
               /*end reset*/
               /*-----light-font----*/

               /*-----regular-font----*/
               /*-----regular-font----*/


               body {
                    background:url("{{Url('/')}}/front/images/bg.jpg") no-repeat 100%;
                    background-size: 100%;
                    font-family: 'open_sanslight';
                    font-size: 100%;
                    background-repeat: no-repeat;
                    background-attachment: fixed;
                    background-size: cover;
               }
               /**-----start-wrap---------**/
               .wrap
               {
                    width:70%;
                    margin:5.2% auto 4% auto;
               }
               /**-----start-logo--------**/
               .logo
               {
                    padding: 1em;
                    text-align: center;
                    padding: 1% 1% 5% 1%;
               }
               .logo h1{
                    display: block;
                    padding: 2em 0em;
               }
               .logo span{
                    font-size: 2em;
                    color:#fff;
               }
               .logo span img{
                    width:40px;
                    height: 40px;
                    vertical-align:bottom;
                    margin: 0px 10px;
               }
               /**-----end-logo---------**/
               /**-----start-search-bar-section------**/
               .buttom
               {
                    background:url("{{Url('/')}}/front/images/bg2.png") no-repeat 100% 0%;
                    background-size: 100%;
                    text-align: center;
                    vertical-align: middle;
                    margin: 0 auto;
                    width: 556px;
               }
               .seach_bar
               {
                    padding:2em;
               }
               .seach_bar p{
                    font-size: 1.5em;
                    color:#fff;
                    font-weight: 300;
                    margin: 2.6em 0em 0.9em 0em;
               }
               .seach_bar span a{
                    font-size: 1em;
                    color:#fff;
                    text-decoration:underline;
                    font-weight: 300;
                    font-family: 'open_sansregular';
               }
               /**********search_box*************/

               /*****copy-right*****/
               .copy_right  {
                    color: #fff;
                    font-size: 0.85em;
                    line-height: 1.8em;
                    padding: 5em 0px 0px 0px;
                    font-family: 'open_sansregular';
                    text-align: center;
               }
               .copy_right a {
                    color:#FF7ED5;
                    -webkit-transition: all 0.3s ease-out;
                    -moz-transition: all 0.3s ease-out;
                    -ms-transition: all 0.3s ease-out;
                    -o-transition: all 0.3s ease-out;
                    transition: all 0.3s ease-out;
               }
               .copy_right a:hover {
                    color:#fff;
               }
               /*********Media Queries************/
               @media only screen and (max-width: 768px)
               {
                    .wrap {
                         width: 80%;
                    }	
                    .logo img {
                         width: 315px;
                    }
               }
               @media only screen and (max-width: 640px)
               {
                    .wrap {
                         width: 85%;
                    }	
                    .logo {
                         padding: 1% 1% 12% 1%;
                    }
                    .buttom {
                         width: 515px;
                    }
                    .logo img {
                         width: 300px;
                    }
               }
               @media only screen and (max-width: 480px)
               {
                    .wrap {
                         width: 90%;
                    }	
                    .logo {
                         padding: 1% 1% 12% 1%;
                    }
                    .buttom {
                         width: 440px;
                    }
                    /***/
                    .logo span {
                         font-size: 1.6em;
                    }
                    .seach_bar p {
                         font-size: 1.2em;
                         margin: 2.6em 0em 0.7em 0em;
                    }
                    .search_box {
                         padding: 3px 10px;
                    }
                    .logo img {
                         width: 270px;
                    }
               }
               @media only screen and (max-width: 320px)
               {
                    .wrap {
                         width: 90%;
                    }	
                    .logo {
                         padding: 1% 1% 12% 1%;
                    }
                    .buttom {
                         width: 290px;
                    }
                    /***/
                    .logo span {
                         font-size: 1.4em;
                    }
                    .seach_bar p {
                         font-size: 1em;
                         margin: 1.5em 0em 2em 0em;
                    }
                    .logo span img {
                         vertical-align: middle;
                    }
                    .logo img {
                         width: 200px;
                    }
                    .copy_right {
                         padding: 2em 0px 0px 0px;
                    }
               }

          </style>

     </head>
     <body>
          <!-----start-wrap--------->
          <div class="wrap">
               <!-----start-content--------->
               <div class="content">
                    <!-----start-logo--------->
                    <div class="logo">
                         <h1><a href="#"><img src="{{Url('/')}}/front/images/logo.png"/></a></h1>
                         <span><img src="{{Url('/')}}/front/images/signal.png"/>Oops! The Page you requested was not found!</span>
                    </div>
                    <!-----end-logo--------->
                    <!-----start-search-bar-section--------->
                    <div class="buttom">
                         <div class="seach_bar">
                              <p>you can go to <span><a href="{{Url('/')}}">Home</a></span> page or search here</p>
                              <!-----start-sear-box--------->

                         </div>
                    </div>
                    <!-----end-sear-bar--------->
               </div>

          </div>

          <!---------end-wrap---------->
     </body>
</html>