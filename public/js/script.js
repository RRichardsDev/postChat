$(document).ready(function()
{
	scrollToBottom();
    // $(".message-thumb").click(function(){
    	
    // 	alert($(this).users);
    	
    // })
    $("#send_message").click(function(){
    	event.preventDefault();
      var chat_id = $('#message-chat').val();
      var message = $("#message-text").val();
      var userId = $("#message-user-id").val();
      var messageUser = $("#message-user-name").val();
      var chat_object = $("chat-object");
      console.log($("chat-object"));

    if($("#message-text").val() !== ""){
          reply(userId, message);
          displaySentMessage(message, messageUser, chat_object);
    }

  })
})

function displaySentMessage(message, messageUser){
  
    $("#message-text").val('');
    $( "#messages-container" ).append( 
        '<div class="message-sent-container">' +
            '<div class="message-sent" >' +
                message +
            '</div>' +
            '<div class="message-sent-name">' +
                '<p class="text-muted ">'+ messageUser +'</p>' +
            '</div>' +  
        '</div>'
        );

scrollToBottom();
}

function scrollToBottom(){
    var d = $('#messages-container');
    d.scrollTop(d.prop("scrollHeight"));
}

function reply(userId, message, chat_object){
    
    var chat_id = $("#chat-id").val();
    console.log(chat_id);

    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
    $.ajax({
        url: '/conversations/{'+ chat_id +'}',
        type: 'post',
        dataType: 'json',
        data: {
        "userId" : userId,
        "message-text": message,
        // "conversation" : chat_object,
        "conversation-id" : chat_id,
        },
        success: function(response){
          alert(1);
        }
    });
};