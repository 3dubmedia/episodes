var RouterProtected = Backbone.Router.extend({
	routes: {
		'': 'home'
	},
	execute: function () {
		console.log('router'); 
		var url = '../../get-jwt.php';
		var myToken = localStorage.getItem('myToken');
		var formValues = {
			myToken: myToken
		};
		var approved=false;
		$.ajax({
			
			url:url,
			type:'POST',
			dataType:"json",
			data: formValues,
			async: false,
			success:function (data) {
				console.log('route auth success');
				console.log(data);
				approved=true;
			},
			error:function (data) {
				console.log('route auth fail');
				console.log(data);
				//routerProtected.navigate('home', {trigger: true});
				
				approved=false;
			}
		});
		return approved;
	}
});
var routerProtected = new RouterProtected();
routerProtected.on('route:home', function (){
	var showsView = new ShowsView({collection: shows });
    shows.fetch().done(function(){
        showsView.render();
    });
});


var Router = Backbone.Router.extend({
	routes: {
		'login': 'login',
		'register': 'register'
	}
});
var router = new Router();
router.on('route:login', function (){
	var loginView = new LoginView({});
    loginView.render();
});

router.on('route:register', function (){
	var registrationView = new RegistrationView({});
    registrationView.render();
});