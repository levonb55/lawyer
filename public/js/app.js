let app = {
    months: [
        "January", "February", "March", "April", "May", "June",
        "July", "August", "September", "October", "November", "December"
    ],
    //Scrolls the element to the bottom
    scrollToBottom: function (el) {
        document.querySelector(el).scrollTo(0, document.querySelector(el).scrollHeight);
    },
    //Appends zero to time if one number depicts
    appendZero: function (createdAt) {
        if(createdAt.toString().length === 1) {
            return '0' + createdAt;
        }

        return createdAt;
    },

    // Goes to new line when pressing Ctrl + Enter
    goToNewLine: function (element, form) {
        element.keydown(function (e) {
            if (e.keyCode === 13 && e.ctrlKey) {
                $(this).val(function(i,val){
                    return val + "\n";
                });

                element[0].scrollBy(0, 25);
            }
        }).keypress(function(e){
            if (e.keyCode === 13 && !e.ctrlKey) {
                form.submit();
                return false;
            }
        }).keyup(function (e){
            if (e.keyCode === 17) {
                ctrlKeyDown = false;
            }
        });
    }
};
