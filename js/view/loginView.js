var LoginView = Backbone.View.extend({

	el: '#content',
    template: _.template($("#loginTemplate").html()),
    initialize: function() {
     
    },
    events: {
        "click #login": "login"
    },
    render: function() {
        this.$el.html(this.template({}));
	},
	login:function (e) {
		e.preventDefault();
		var url = '../../jwt.php';
		console.log('Loggin in... ');
		var formValues = {
			username: $('#username').val(),
			password: $('#password').val()
		};
		console.log(formValues);
		$.ajax({
			url:url,
			type:'POST',
			dataType:"json",
			data: formValues,
			success:function (data) {
				console.log('success');
				console.log(data);
				var token = data;
				localStorage.setItem('myToken',token.jwt);
				localStorage.setItem('myID',token.id);
				window.location = '/apps/episodes/';
			},
			error:function (data) {
				$('.alert-error').text('Log in attempt failed.').show();
				console.log(data);
			}
		});
	}

}); 