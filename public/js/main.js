$(document).ready(function(){

	$('.responsive').slick({
	dots: false,
	infinite: true,
	speed: 1500,
	autoplay:true,
	autoplaySpeed:1200,
	slidesToShow: 4,
	slidesToScroll: 4,
	responsive: [
		{
		  breakpoint: 736,
		  settings: {
			slidesToShow: 2,
			slidesToScroll: 2,
			infinite: true,
		  }
		},
		{
		  breakpoint: 465,
		  settings: {
			slidesToShow: 1,
			slidesToScroll: 1
		  }
		}
		]
	});

	/**
	*
	*
	**/

	$('#demo3').skdslider({
		delay:2000,
		animationSpeed: 1000,
		showNextPrev:true,
		showPlayButton:true,
		autoSlide:true,
		animationType:'fading'
	});

	/**
	*
	*
	**/

	$('#stars li').on('mouseover', function(){
		var onStar = parseInt($(this).data('value'), 10); 
	   
		$(this).parent().children('li.star').each(function(e){
		  if (e < onStar) {
			$(this).addClass('hover');
		  }
		  else {
			$(this).removeClass('hover');
		  }
		});
	  }).on('mouseout', function(){
		$(this).parent().children('li.star').each(function(e){
		  $(this).removeClass('hover');
		});
	  });
	  
	$('#stars li').on('click', function(){
		var onStar = parseInt($(this).data('value'), 10); 
		var stars = $(this).parent().children('li.star');
		
		for (i = 0; i < stars.length; i++) {
		  $(stars[i]).removeClass('selected');
		}
		for (i = 0; i < onStar; i++) {
		  $(stars[i]).addClass('selected');
		}
		var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);

		$('#defaultone').val(ratingValue);
	});		

	/**
	*
	**/

	$(".btn-outline-primary").on("click", function(){
		var dataId = $(this).attr("data-id");
		$("#"+dataId).fadeToggle("slow").toggleClass('d-none d-block');
	});

});
/*==========*/
$(window).on('load', function() {
    $('.pre_loader').fadeOut('slow');
    $('.pre_loader').remove('slow');
}); 


function addToCart(obj){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    }); 

    $.ajax({
        type: "POST",
        url: "/cart",
        data: {'id': obj.getAttribute('data-id'), 'name': obj.getAttribute('data-name'), 'price': obj.getAttribute('data-price'), 'img': obj.getAttribute('data-img')},
        success: function(response) {
			if(response['success'] == 1){
				Swal.fire({
				  type: 'success',
				  title: 'Cart Added',
				  showConfirmButton: false,
				  timer: 1500
				});
				
				$("#totalcartItems").html(response['total_cart']);
			}
			else {
				Swal.fire({
				  type: 'info',
				  title: 'Already Added',
				  showConfirmButton: false,
				  timer: 1500
				});
			}
        },
        error: function(error) {
            console.log(error);
        }
	}); 
}


(function () {

	  var client = algoliasearch('KA5XUSLH36', 'f2e8cf852883df25b47a4d7b2996d43c');
	  var index = client.initIndex('books');
	  autocomplete('#search-input', { hint: false }, [
	    {
	      source: autocomplete.sources.hits(index, { hitsPerPage: 5 }),
	      displayKey: 'name',
	      templates: {
	        suggestion: function(suggestion) {
	        	const markup = `
	        		<div class="algolia-result">
	        			<span>${suggestion._highlightResult.name.value}</span>
	        		</div>
	        	`;
	          return markup;
	        }
	      }	
	    }
	  ]).on('autocomplete:selected', function(event, suggestion, dataset) {
	    window.location.href = window.location.origin + '/search/' + suggestion.slug;
	  });
})();
