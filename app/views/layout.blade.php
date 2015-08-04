<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Sayantan Saha">
   
    <title>Home - Land Sale Automation</title>

    <!-- Bootstrap Core CSS -->
    <link href="/css/materialize.min.css" rel="stylesheet">
	<link href="/css/main.css" rel="stylesheet">
	<style>
		body {
			
			font-family: 'Roboto';
			font-size:1.5em;

		}
	</style>
	@section('style')
		
	@show
    

   

   

    
	
	
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper" >

        <!-- Navigation -->
	
        <nav>
			<div class="nav-wrapper container">
			  <a href="#!" class="brand-logo">Land Sale Automation</a>
			  <ul class="right hide-on-med-and-down">
				<li><form action="/api/v1/search/application/list" method="post">
        <div class="input-field">
          <input id="search" type="text" placeholder="Search with file no." required name="searchString">
          <label for="search"><i class="mdi-action-search"></i></label>
        </div>
      </form></li>
				
				<li><a href="/home"><i class="mdi-action-view-module"></i></a></li>
				<li><a href="/user/profile">Profile</a></li>
				<!--<li><a href="#"><i class="mdi-navigation-more-vert"></i></a></li>-->
				<!--<li><a class="dropdown-button" href="#!" data-activates="dropdown1">Select Language<i class="mdi-navigation-arrow-drop-down right"></i></a></li>-->
				<li><a href="/logout">Logout</a></li>
			  </ul>
			</div>
		  </nav>

            
        

        
        <!-- /#page-wrapper -->
		<div class="container">
            
             @yield('content')
        </div>
		
		<footer class="page-footer">
          <div class="container">
            <div class="row">
              <div class="col s4">
				<span class="grey-text text-lighten-4">Data provided by:</span>
                <h5 class="white-text">Nagaon District Administration</h5>
                <p class="grey-text text-lighten-4">Government of Assam</p>
              </div>
			  <div class="col s4">
				<span class="grey-text text-lighten-4">Designed, Developed and Maintained by:</span>
                <h5 class="white-text">National Informatics Centre</h5>
                <p class="grey-text text-lighten-4">Department of Electronics and Information Technology<br/>Ministry of Communication and Information Technology<br/>Government of India</p>
              </div>
              <div class="col s4" style="text-align:right;">
                <h5 class="white-text">Links</h5>
                <ul>
                  <li><a class="grey-text text-lighten-3" href="http://www.nic.in">National Informatics Centre</a></li>
                  <li><a class="grey-text text-lighten-3" href="http://www.india.gov.in">Portal of Govt. of India </a></li>
                  <li><a class="grey-text text-lighten-3" href="http://nagaon.nic.in">Portal of Nagaon District Administration</a></li>
                  <li><a class="grey-text text-lighten-3" href="http://assam.gov.in">Portal of Govt. of Assam</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            © 2015 National Informatics Centre, Nagaon District Unit
            <span class="grey-text text-lighten-4 right" href="#!">Updated at 19th March,2015</span>
            </div>
          </div>
        </footer>

    </div>
    <!-- /#wrapper -->

    <!-- jQuery Version 1.11.0 -->
    <script src="/js/jquery-1.11.0.js"></script>

    
    <script src="/js/materialize.min.js"></script>
    
	@section('script')
		
	@show
</body>

</html>
