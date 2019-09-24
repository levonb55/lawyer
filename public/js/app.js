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
    }
};
