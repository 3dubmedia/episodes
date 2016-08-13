var myID = localStorage.getItem('myID');
var Shows = Backbone.Collection.extend({
    model: Show,
    url: '/apps/episodes/episodes.php?uid='+myID
});
var shows = new Shows();