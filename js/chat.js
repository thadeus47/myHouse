var chat = {}

chat.fetchMessages = function () {
	$.ajax({
		url: 'ajax/chat.php',
		type: 'post',
		data: { method: 'fetch'},
		success: function(data) {
			$('.chat .messages') .html(data);
		}
	});
}


chat.throwMessage = function (){
	if ($.trim(message).length ! = 0){
		$.ajax({
		url: 'ajax/chat.php',
		type: 'post',
		data: { method: 'fetch', message: message},
		success: function(data) {
			chat.fetchMessages();
			chat.entry.val('');
		
		}
});

	}
}



chat.entry = $('.chat .entry');
chat.entry.bind('keydown', function(e){

	if (e.keyCode === 13 && e.shiftKey === false){
		//throw message
		chat.throwMessage($(this).val());

		e.preventDefault();
	}
});


chat.interval = setInterval(chat.fetchMessages, 2000);
chat.fetchMessages();