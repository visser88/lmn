$(document).ready(function(){
	$('#update').hover(
		function(){
			$(this).find('i').addClass('icon-white');
		},
		function(){
			$(this).find('i').removeClass('icon-white');
	});

	$('.update').click(function(){
		update();
	});
});

function update(){
	$.ajax({
		url: '/update',
		dataType: 'json',
		beforeSend: function(){
			$('#product-list').animate({
				'opacity':'.2'
			}, 'slow');
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
			$('#product-list').animate({
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