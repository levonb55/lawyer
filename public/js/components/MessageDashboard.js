let messages = {
    history: $('.msg_history'),
    activeContact: '',
    scrollNumber: 0,
    failedMessage: function (errorMessage) {
        messages.history.after(`<div class="text-danger mb-3">${errorMessage}</div>`);
    },
    //Component for the sent message
    sentMessage: function (messageData) {
        $('#content').val('');
        messages.history.append(outgoingMessage(messageData.image, messageData.content, new Date(messageData.created_at), messageData.file_original_name, messageData.file_new_name));
        app.scrollToBottom('.msg_history');
    }
};

let messageClone = message;

//Listens to the new message broadcasting
Echo.private('messages.' +  $('#user').val())
    .listen('NewMessage', (message) => {
        let contactList = $(".chat_list").map(function() {
            return $(this).data("contact");
        }).get();

        //Adds contact to the list if doesn't exist on incoming messaging
        if(!contactList.find(function (contactId) {
            return contactId === message.sender_id;
        })) {
            $('.no-contact').remove();
            $('.inbox_chat').prepend(getContactComponent(message.sender_id, message.name, message.image));
        }

        if(messages.activeContact == message.sender_id) {
            messages.history.append(incomingMessage(message.image, message.content, new Date(message.created_at), message.file_original_name, message.file_new_name));
            app.scrollToBottom('.msg_history');
            messageClone.markAsRead(message.id);

        } else {
            let sender = $('.unread-'+message.sender_id);
            sender.text(+sender.text() + 1);
        }
    });

//Gets a conversation
$(document).on('click','.chat_list', function () {

    messages.scrollNumber = 0;
    messages.activeContact = $(this).data('contact');

    //Removes an unsent message from the message field when switching to another contact
    $('#content').val('');

    //Stops sending duplicate request from the same contact in a row
    if($(this).hasClass('active_chat')) { return; }

    messages.history.html('<div class="spinner text-center mt-4"><i class="fa fa-spinner fa-spin"></i></div>');

    //Adds background color to a selected contact on click
    $(".chat_list").removeClass('active_chat');
    $(this).addClass("active_chat");

    //Component to put messages data into
    let messagesComponent = messagesData => {
        messages.history.data('messages', messagesData.messagesCount);

        let messagesFeed = messagesData.messages.reverse().map(message => {
            if(message.sender_id == messages.activeContact) {
                return incomingMessage(message.image, message.content, new Date(message.created_at), message.file_original_name, message.file_new_name);
            } else {
                return outgoingMessage(message.image, message.content, new Date(message.created_at), message.file_original_name, message.file_new_name);
            }
        });

        messages.history.html(messagesFeed);
        app.scrollToBottom('.msg_history');
    }

    $('.type_msg').show();
    $('#contact').val(messages.activeContact);
    $(this).find('.unread').text('');

    message.show(messages.activeContact, messagesComponent, messages.scrollNumber);
});

//Stores messages
$('#message-form').on('submit', function (e) {
    e.preventDefault();

    //Makes message field required
    if(!$('#content').val()) { return; }

    message.store($(this).serialize(), messages.sentMessage, messages.failedMessage);
});

//Makes a file attachment
$('.message-file').on('change', function () {
    let contactId = $('#contact').val();
    let file = $(this)[0].files[0];
    let formData = new FormData();
    formData.set("file", file);
    formData.set("contact", contactId);

    message.store(formData, messages.sentMessage, messages.failedMessage, false, false);
    $('#message-form')[0].reset();
});

function outgoingMessage(image, content, createdAt, file_original_name =  '', file_new_name = '') {

    return `
        <div class="outgoing_msg messages">
            <div class="incoming_msg_img">
                <img src="${appUrl}/assets/images/profile/${image}" alt="sunil">
            </div>
            <div class="sent_msg">
                <div class="received_withd_msg">
                    <p>${message.checkMessageContent(content, file_original_name, file_new_name)}</p>
                    <span class="time_date">
                        ${app.appendZero(createdAt.getHours()) + ':' + app.appendZero(createdAt.getMinutes()) + ' | ' + app.months[createdAt.getMonth()] + ' ' + createdAt.getDate()}
                    </span>
                </div>
            </div>
        </div>
    `;
}

function incomingMessage(image, content, createdAt, file_original_name =  '', file_new_name = '') {

    return `
        <div class="incoming_msg messages" style="margin: 15px 0;">
            <div class="incoming_msg_img">
                <img src="${appUrl}/assets/images/profile/${image}" alt="sunil">
            </div>
            <div class="received_msg">
                <div class="received_withd_msg">
                    <p>${message.checkMessageContent(content, file_original_name, file_new_name)}</p>
                    <span class="time_date">
                        ${app.appendZero(createdAt.getHours()) + ':' + app.appendZero(createdAt.getMinutes()) + ' | ' + app.months[createdAt.getMonth()] + ' ' + createdAt.getDate()}
                    </span>
                </div>
            </div>
        </div>
    `;
}

//Gets contact mark up
function getContactComponent(senderId, name, image) {
    return `
        <div class="chat_list" data-contact="${senderId}">
            <div class="chat_people">
                <div class="chat_img">
                    <img src="${appUrl}/assets/images/profile/${image}" alt="sunil">
                </div>
                <div class="chat_ib">
                    <h5>
                        ${name}
                        <span class="chat_date"></span>
                        <span class="badge badge-warning unread unread-${senderId}">0</span>
                    </h5>
                    <div class="onlineBox">
<!--                                       <div class="onlineOrOffline"></div>-->
                    </div>
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
               let messagesFeed = messagesData.messages.reverse().map(message => {
                   if(message.sender_id == messages.activeContact) {
                       return incomingMessage(message.image, message.content, new Date(message.created_at), message.file_original_name, message.file_new_name);
                   } else {
                       return outgoingMessage(message.image, message.content, new Date(message.created_at), message.file_original_name, message.file_new_name);
                   }
               });

               messages.history.prepend(messagesFeed);
               $('.load-messages').css('visibility', 'hidden');
               if($('.messages')[10]) {
                   $('.messages')[10].scrollIntoView({behavior: "smooth", block: "center", inline: "nearest"});
               }
           }

           message.show(+messages.activeContact, messagesComponent, ++messages.scrollNumber);
       }
   }
});

app.goToNewLine($('.message-content'), $('#message-form'));
