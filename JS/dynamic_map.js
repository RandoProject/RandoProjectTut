jQuery(function($){
	$('.map').append('<div class="overlay">').append('<div class="tooltip"></div>')
	$('.map .tooltip').hide();
	var regions = [
		{name : 'Nord Pas de Calais', slug: '17'},
		{name : 'Picardie', slug: '19'},
		{name : 'Haute Normandie', slug: '11'},
		{name : 'Basse Normandie', slug: '4'},
		{name : 'Bretagne', slug: '6'},
		{name : 'Ile de France', slug: '12'},
		{name : 'Champagne Ardenne', slug: '8'},
		{name : 'Lorraine', slug: '15'},
		{name : 'Alsace', slug: '1'},
		{name : 'Pays de la Loire', slug: '18'},
		{name : 'Centre', slug: '7'},
		{name : 'Bourgogne', slug: '5'},
		{name : 'Franche Comte', slug: '10'},
		{name : 'Poitou Charente', slug: '20'},
		{name : 'Limousin', slug: '14'},
		{name : 'Auvergne', slug: '3'},
		{name : 'Rhône Alpes', slug: '22'},
		{name : 'Aquitaine', slug: '2'},
		{name : 'Midi-Pyrénées', slug: '16'},
		{name : 'Languedoc Roussillon', slug: '13'},
		{name : 'Provence Alpes Côte d\'Azur', slug: '21'},
		{name : 'Corse', slug: '9'}
	]
	
	// Info-Bulle
	$(document).mousemove(function(e){
		$('.map .tooltip').css({
			top:e.screenY-$('.map .tooltip').height()-110,
			left:e.screenX-$('.map .tooltip').width()/2-10
		});
	});
	
	// Liens
	$('.map area').each(function(){
		var index = $(this).index();
		$(this).attr('href', 'index.php?page=recherche&region='+regions[index].slug);
	});
	
	// Passage sur une région
	$('.map area').mouseover(function(){
		var index = $(this).index();
		var left = -index * 650 - 650;
		$('.map .tooltip').html(regions[index].name).stop().fadeTo(0, 1);
		$('.map .overlay').css({
			backgroundPosition : left+"px 0px"
		});
	});
	
	// Sortie de la map
	$('.map').mouseout(function(){
		$('.map .overlay').css({
			backgroundPosition : "650px 0px"
		});
		$('.map .tooltip').stop().fadeTo(0, 0);				
	});
});