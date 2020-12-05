$(document).ready(function()
{
	scrollToBottom();
    $('body').on('click','.message-thumb',function(e) {
         e.preventDefault()
         $("#test-message").text($(this).text());
    });
    // fetchRecords(0);

    // $(".message-thumb").click(function(){
    // 	// event.preventDefault();
    // 	// alert($(this).text())
    	
    // })
    $("#send_message").click(function(){
    	event.preventDefault();
        var message = $("#message-text").val();
    	$("#message-text").val('');
    	$( "#messages-container" ).append( '<div class="message-sent"><div>'+ message+'</div></div>' );
    	scrollToBottom();
    })
    $('#btn_testconvos').click(function(){
        
        
       });


    function scrollToBottom(){
    	var d = $('#messages-container');
		d.scrollTop(d.prop("scrollHeight"));
    }
})

function fetchRecords(id){
       $.ajax({
         url: 'messages/'+id,
         type: 'get',
         dataType: 'json',
         success: function(response){
            
           var len = 0;
           
           if(response['data'] != null){
              len = response['data'].length;
           }

           if(len > 0){
              for(var i=0; i<len; i++){
                 var id = response['data'][i].id;
                 var sender = response['data'][i].sender_id;
                 var reciever = response['data'][i].reciever_id;
                 var message = response['data'][i].message;

                // alert('id= ' + id + " sender_id= " + sender +"reciever_id= " + reciever + "message= " + message);

                var conversationThumb =  '<a href="/" class="message-thumb d-block p-4 mb-2">' +
                                            '<div class="font-weight-bold">' +
                                                sender +
                                            '</div>' +
                                            '<p class="text-muted mb-0 text-truncate d-flex align-items-center">' +
                                                '<span>'+ message +'</span>' +
                                            '</p> ' +
                                        '</a>';

                $('#conversation_container').append(conversationThumb);
                 
              }
           }else{
              var tr_str = "<tr>" +
                  "<td align='center' colspan='4'>No record found.</td>" +
              "</tr>";

              $("#userTable tbody").append(tr_str);
           }

         }

       });
     }

