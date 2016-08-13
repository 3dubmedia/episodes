var User = Backbone.Model.extend({
	initialize: function(){
		this.on("invalid", function(model, error){
			alert(error);
		});		
	},
    urlRoot: "/apps/episodes/users.php",  
	defaults: {
		username:'',
        password:''
	},
	validate: function(attrs){
		if(!attrs.username){         
			return 'username is required!';
		}
		if(!attrs.password){         
			return 'password is required!';
		}
	}

})