var Show = Backbone.Model.extend({
	initialize: function(){
		this.on("invalid", function(model, error){
			alert(error);
		});

	},
    url: function (){               
        return this.id ? "/apps/episodes/episodes.php?id=" + this.id : "/apps/episodes/episodes.php";
    },   
	defaults: {
		title:'',
        season:1,
        episode:1,
        uid:0
	},
	validate: function(attrs){
		if(!attrs.title){         
			return 'Title is required!';
		}
	}

})