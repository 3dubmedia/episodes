var RegistrationView = Backbone.View.extend({

	el: '#content',
    template: _.template($("#registrationTemplate").html()),
    initialize: function() {
     
    },
    events: {
    	'click #register' : 'registerUser',
    },
    render: function() {
        this.$el.html(this.template({}));
	},
    registerUser: function(e){
    	e.preventDefault();
        var user = new User;
        user.set('username', $('#username').val());
        user.set('password', $('#password').val());

        if (user.isValid()){
        	user.save(user.attributes,{
				success: function(model, response, options){
					window.location = '/apps/episodes/';
				},
				error: function(model, xhr, options){
					console.log('Failed to save model');
				}
			}); 
        }
    }


}); 