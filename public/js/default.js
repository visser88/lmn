$(document).ready(function(){
	$('#update').hover(
		function(){
			$(this).find('i').addClass('icon-white');
		},
		function(){
			$(this).find('i').removeClass('icon-white');
	});

	$('.product-item').fadeIn();

	$('.update').click(function(){
		update();
	});

	$('#container').on('click', '.pagination a', function(e){
		e.preventDefault();
		getProducts($(this).attr('href').split('page=')[1]);
	});
});

function getProducts(page){
	$.ajax({
		url: '?page='+page,
		dataType: 'json',
		success: function(response){
			location.hash = page;
			$('#product-list').html(response);
		},
		error: function(){
			createMessage('bad', 'Error: Could not fetch products.');
		}
	});
}

function update(){
	$.ajax({
		url: '/update',
		dataType: 'json',
		beforeSend: function(){
			$('#product-list').children().animate({
				'opacity':'.2'
			}, 'slow');
			if($('#product-list').length){
				$('#product-list').append('<img src="/img/load.gif" class="loading" />');
			}
		},
		success: function(response){
			if(response.success){
				createMessage('good', response.msg);
			}
			else createMessage('bad', response.msg);
		},
		error: function(){
			createMessage('bad', 'Error: Could not update data.');
		},
		complete: function(){
			$('.loading').remove();
			$('#product-list').children().animate({
				'opacity':'1'
			}, 'slow');
		}
	})
}

function createMessage(type, msg){
	$('.message').remove();
	message = '<div class="message '+type+'" >'+msg+'</div>';
	$('#container').append(message);
	$('.message').fadeIn('slow');

	$('html, body').one('click', '#container', function(){
		$('.message').fadeOut('slow', function(){
			$(this).remove();
		})
	});
	setTimeout(function(){
		$('.message').fadeOut('slow', function(){
			$(this).remove();
		});
	}, 5000);
}