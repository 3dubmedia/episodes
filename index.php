<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
	<title>Episode Tracker</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="css/episodes.css" />
</head>
<body>

<div class="container">
    <div class="row">   
    	<h1>Episode Tracker</h1>
        <div id="content"></div>
    </div>
</div>   

<script type="text/template" id="loginTemplate">
	<h2>Log in</h2>
	<div class="alert-error"></div>
	<form>
	<div class="user-form">
		<label>username</label>
		<input name="username" id="username">   

		<label>password</label>
		<input name="password" id="password">

		<button id="login">Log in</button>
	</div>
	</form>
	
	<div class="btn custom-btn"><a href="#register">Register</a></div>
	<div id="footer"></div>
</script>

<script type="text/template" id="registrationTemplate">
	<h2>Register</h2>
	<div class="alert-error"></div>
	<form>
	<div class="user-form">
		<label>username</label>
		<input name="username" id="username">   

		<label>password</label>
		<input name="password" id="password">
		<button id="register">Register</button>
	</div>
	</form>
	
	<div class="btn custom-btn"><a href="#login">Log in</a></div>
	<div id="footer"></div>
</script>

<script type="text/template" id="showsTemplate">
	<button type="button" class="btn btn-primary" id="new-show"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> New Show</button>
	<hr>
	
	<table class="table table-striped">
		<thead>
		<tr>
			<th>Show</th>
			<th>Season</th>
			<th></th>
			<th>Episode</th>
			<th></th>
			<th>Remove</th>
		</tr>
		</thead>
		<tbody>
		<% _.each(shows, function(show) { %>
		<tr>
			<td><%=show.title%></td>
			
			<td><span class="showNum"><%=show.season%></span></td>
			
			<td><button type="button" class="btn btn-danger season-minus" data-id="<%=show.id%>"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></button>
			<button type="button" class="btn btn-success season-plus" data-id="<%=show.id%>"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button> </td>
			
			<td><span class="showNum"><%=show.episode%></span></td>
			
			<td><button type="button" class="btn btn-danger episode-minus" data-id="<%=show.id%>"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></button>
			<button type="button" class="btn btn-success episode-plus" data-id="<%=show.id%>"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button> </td>
	
			<td><button type="button" class="btn btn-default btn-delete" data-id="<%=show.id%>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></td>
		</tr>
		<%});%>
		
	</table>
	<div id="footer"></div>
</script>



<script src="js/external/jquery-1.11.3.js"></script>
<script src="js/external/underscore.js"></script>
<script src="js/external/backbone.js"></script>
<script src="js/external/bootstrap.min.js"></script>

<!-- models -->
<script src="js/model/showModel.js"></script>
<script src="js/model/userModel.js"></script>

<!-- collections -->
<script src="js/collection/showsCollection.js"></script>

<!-- views -->
<script src="js/view/showsView.js"></script>
<script src="js/view/loginView.js"></script>
<script src="js/view/registrationView.js"></script>

<!-- router -->
<script src="js/router/router.js"></script>

<script>
$(document).ajaxError(function (event, xhr) {
        if (xhr.status == 401)
            //window.location.replace('/apps/episodes/#login');
            routerProtected.navigate('home', {trigger: true});
    });

$(document).ajaxSend(function(event, xhr) {
   var myToken = localStorage.getItem('myToken');
   console.log(myToken);
   if (myToken) {
      xhr.setRequestHeader("token", myToken);
   }
});

$(document).ajaxError(function (event, xhr) {
	if (xhr.status == 401)
		window.location = '/apps/episodes/#login';
});

Backbone.history.start();
</script>

</body>
</html>