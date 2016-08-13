var ShowsView = Backbone.View.extend({

	el: '#content',
    template: _.template($("#showsTemplate").html()),
    initialize: function() {
        this.collection.on('change reset add remove', this.render, this);
    },
    events: {
        'click #new-show' : 'showAdd',
        'click .btn-delete': 'showRemove',
        'click .season-plus': 'seasonPlus',
        'click .season-minus': 'seasonMinus',
        'click .episode-plus': 'episodePlus',
        'click .episode-minus': 'episodeMinus'
    },
    showAdd: function(){
        var title = prompt("Show:")
        var show = new Show;
        show.set('title', title);
        var myID = localStorage.getItem('myID');
        show.set('uid', myID);
        console.log(show);
        if (show.isValid()){
        	shows.add(show);
        	show.save(); 
        }
        
    },
    showRemove: function(e){
        e.preventDefault();
        var id = $(e.currentTarget).data("id");
        var model = shows.get(id);
        model.destroy();
    },
    seasonPlus: function(e){
        e.preventDefault();
        var id = $(e.currentTarget).data("id");
        var model = shows.get(id);
        var thisSeason = model.get('season');
        var newSeason = +thisSeason + 1;
        model.set('season', newSeason);
        model.save();
    },
    seasonMinus: function(e){
        e.preventDefault();
        var id = $(e.currentTarget).data("id");
        var model = shows.get(id);
        var thisSeason = model.get('season');

        if (thisSeason > 1){
            var newSeason = +thisSeason - 1;
            model.set('season', newSeason);
            model.save();
        }
    },
    episodePlus: function(e){
        e.preventDefault();
        var id = $(e.currentTarget).data("id");
        var model = shows.get(id);
        var thisEp = model.get('episode');
        var newEp = +thisEp + 1;
        model.set('episode', newEp);
        model.save();
    },
    episodeMinus: function(e){
        e.preventDefault();
        var id = $(e.currentTarget).data("id");
        var model = shows.get(id);
        var thisEp = model.get('episode');

        if (thisEp > 1){
            var newEp = +thisEp - 1;
            model.set('episode', newEp);
            model.save();
        }
    },
    render: function() {
        this.$el.html(this.template({ shows: shows.toJSON() }));
	}

}); 