class Message {

    //Gets Messages specific to a user and receiver
    show(contact, component, scroll) {
       $.get(appUrl + '/users/messages/' + contact + '/' + scroll)
            .then(response => {
                component(response);
            })
            .catch(error => {
                console.log(error);
            });
    }

    store(messageInput, component, failedMessage, processData = true, contentType) {
        let progressBar = $('.upload-progress');
        let progressBarNumber = $('.upload-progress-number');

        $.ajax({
            method: 'POST',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: appUrl + '/messages/store',
            data: messageInput,
            processData: processData,
            contentType: contentType,
            xhr: function() {
                let xhr = $.ajaxSettings.xhr();
                if(!processData) {
                    xhr.upload.onprogress = function (e) {
                        progressBar.show();
                        // For uploads
                        if (e.lengthComputable) {
                            let progressNumber = ((e.loaded / e.total) * 100).toFixed() + '%';
                            progressBarNumber.text(progressNumber).css('width', progressNumber);
                        }
                    };
                }

                return xhr;
            }
        })
        .done(function(response) {
            progressBar.hide();
            progressBarNumber.width(0);
            component(response);
        })
        .fail(function() {
            let errorMessage = 'An error happened while posting a message!';
            failedMessage(errorMessage);
        });
    }

    editMessage() {

    }

    deleteMessage() {

    }

    markAsRead(id) {
        $.ajax({
            method: 'PUT',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: appUrl + `/messages/${id}/read`
        })
        .catch(() => {
            console.log('An error happened while marking a message as read.');
        });
    }

    //Checks whether a message is a file attachment or a text
    checkMessageContent(content, original_name, new_name) {
        let messageContent = '';
        if(original_name) {
            messageContent = `<a href="${appUrl}/assets/attachments/${new_name}" target="_blank">${original_name}</a>`;
        } else {
            messageContent = content;
        }

        return messageContent;
    }
}

let message = new Message();
