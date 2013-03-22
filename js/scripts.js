jQuery(function($){
//Switch the background image

$.backstretch("http://localhost:8888/ceplocal2121/wp-content/themes/ceplocal2121/images/atlantic-ocean.png");


 //No margin on the last nav list item
 $('.main-navigation li').last().addClass('last');

// var $articles = $('article');
// for(var i = 0, l = $articles.length; i < l; i += 3) {
//     $articles.slice(i, i+3).wrapAll('<div class="row group"></div>');
// }

// Add body class if page has sidebar
if ( $('#secondary').length !== 0  ) {
	$('body').addClass('sidebar');
};



}); //Last