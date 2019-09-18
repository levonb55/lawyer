let messages = {
    history: $('.msg_history'),
    months: [
        "January", "February", "March", "April", "May", "June",
        "July", "August", "September", "October", "November", "December"
    ],
    scrollNumber: 0
};

//listens to the new message broadcasting
Echo.private('messages.' +  $('#user').val())
    .listen('NewMessage', (message) => {
        if($('#contact').val() == message.sender_id) {
            messages.history.append(incomingMessage(message.image, message.content, new Date(message.created_at)));
            scrollToBottom('.msg_history');
        } else {
            let sender = $('.unread-'+message.sender_id);
            sender.text(+sender.text() + 1);
        }
    });

//Gets a conversation
$('.chat_list').on('click', function () {

    messages.scrollNumber = 0;

    //Removes an unsent message from the message field when switching to another contact
    $('#content').val('');

    //Stops sending duplicate request from the same contact in a row
    if($(this).hasClass('active_chat')) {
        return;
    }

    messages.history.html('<div class="spinner text-center mt-4"><i class="fa fa-spinner fa-spin"></i></div>');

    //Adds background color to a selected contact on click
    $(".chat_list").removeClass('active_chat');
    $(this).addClass("active_chat");

    //Component to put messages data into
    let messagesComponent = messagesData => {
        messages.history.data('messages', messagesData.messagesCount);

        let messagesFeed = messagesData.messages.slice(0).reverse().map(message => {
            if(message.sender_id == contactId) {
                return incomingMessage(message.image, message.content, new Date(message.created_at));
            } else {
                return outgoingMessage(message.image, message.content, new Date(message.created_at));
            }
        });

        messages.history.html(messagesFeed);
        scrollToBottom('.msg_history');
    }

    //Gets contact id
    let contactId = $(this).data('contact');

    $('.type_msg').show();
    $('#contact').val(contactId);
    $(this).find('.unread').text('');

    message.show(contactId, messagesComponent, messages.scrollNumber);
});

//Stores messages
$('#message-form').on('submit', function (e) {
    e.preventDefault();

    //Makes message field required
    if(!$('#content').val()) {
        return;
    }

    //Component for the sent message
    let sentMessage = messageData => {
        $('#content').val('');
        messages.history.append(outgoingMessage(messageData.image, messageData.content, new Date(messageData.created_at)));
        scrollToBottom('.msg_history');
    };

    message.store($(this).serialize(), sentMessage);
});

//Scrolls the element to the bottom
function scrollToBottom(el) {
    document.querySelector(el).scrollTo(0, document.querySelector(el).scrollHeight);
}

function outgoingMessage(image, content, createdAt) {
    return `
        <div class="outgoing_msg messages">
            <div class="incoming_msg_img">
                <img src="${appUrl}/assets/images/profile/${image}" alt="sunil">
            </div>
            <div class="sent_msg">
                <div class="received_withd_msg">
                    <p>${content}</p>
                    <span class="time_date">
                        ${createdAt.getHours() + ':' + createdAt.getMinutes() + ' | ' + messages.months[createdAt.getMonth()] + ' ' + createdAt.getDate()}
                    </span>
                </div>
            </div>
        </div>
    `;
}

function incomingMessage(image, content, createdAt) {
    return `
        <div class="incoming_msg messages">
            <div class="incoming_msg_img">
                <img src="${appUrl}/assets/images/profile/${image}" + ${image} alt="sunil">
            </div>
            <div class="received_msg">
                <div class="received_withd_msg">
                    <p>${content}</p>
                    <span class="time_date">
                        ${createdAt.getHours() + ':' + createdAt.getMinutes() + ' | ' + messages.months[createdAt.getMonth()] + ' ' + createdAt.getDate()}
                    </span>
                </div>
            </div>
        </div>
    `;
}

messages.history.on('scroll', function () {
   if($(this).scrollTop() == 0) {
       if(messages.scrollNumber * 10 < messages.history.data('messages')) {
           $('.load-messages').css('visibility', 'visible');

           //Component to put messages data into
           let messagesComponent = messagesData => {
               let messagesFeed = messagesData.messages.slice(0).reverse().map(message => {
                   if(message.sender_id == $('.active_chat').data('contact')) {
                       return incomingMessage(message.image, message.content, new Date(message.created_at));
                   } else {
                       return outgoingMessage(message.image, message.content, new Date(message.created_at));
                   }
               });

               messages.history.prepend(messagesFeed);
               $('.load-messages').css('visibility', 'hidden');
               if($('.messages')[10]) {
                   $('.messages')[10].scrollIntoView({behavior: "smooth", block: "center", inline: "nearest"});
               }
           }

           message.show(+$('#contact').val(), messagesComponent, ++messages.scrollNumber);
       }
   }
});
