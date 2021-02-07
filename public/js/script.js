$(document).ready(function()
{
    scrollToBottom();
    $("#send_message").click(function(){
        sendMessage()
    })
    $("#message-text").keypress(function(event) {
        if (event.which == 13) {
            sendMessage()
         }
    });
    $("#profilePicture").click(function(){
        event.preventDefault();
        $("#profilePictureUpload").click();
        
    });
})


users = [];
function addUserToList(user){
    if($.inArray(user, users) == -1 ){
        users.push(user)
        if(!$("#userList a").first().length ){
            $( "#userList" ).append('<a href="#" class="suggestion" data-value="'+user.id+'"">'+user.name+'</a>');
        }else{
            $( "#userList" ).append('<a href="#" class="suggestion" data-value="'+user.id+'">, '+user.name+'</a>');
        }
    }else{
        alert('User already added!')
    }
}

$("body").delegate(".suggestion", "click", function(){
    removeUser($(this).data('value'))

});
$("#pushing").click(function(){
    console.log(users)
});
function removeUser(id){
    data: []
    fetch('/api/search/users/id?q='+id)
        .then(response => response.json())
        .then(data => {
            users.splice( $.inArray(data, users), 1 );
            console.log(users)
        })
    $("#userList a[data-value="+id+"]").remove();
}
function sendMessage(){
        event.preventDefault();
        var chat_id = $('#message-chat').val();
        var message = $("#message-text").val();
        var userId = $("#message-user-id").val();
        var messageUser = $("#message-user-name").val();
        var chat_object = $("chat-object");
        
        if($("#message-text").val() !== ""){
          reply(userId, message);
          displaySentMessage(message, messageUser, chat_object);
        }
}


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
