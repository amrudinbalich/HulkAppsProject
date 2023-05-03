$(document).ready(() => {
    $("#form").on('submit',(e) =>{
        e.preventDefault();
        let formData = $("#form").serialize();
        // make an ajax call
        $.ajax({
            url : "http://localhost:8000/api/auth/login",
            method : "POST",
            data : formData,
            success : (data) =>{
                // if user is found just replace him to the main page
                // store user name in cookie in order to make calls later
                let username = $("#username").val();
                document.cookie = username;
                window.location.href = 'http://localhost:8000/main';
            },
            error : (jqXHR) =>{
                // handling errors from server
                if(jqXHR.status === 422) {
                    $("#response").removeClass('hidden').fadeIn();
                    $("#response").append("<h5 class='text-warning font-bold mx-3'>" + jqXHR.responseJSON.error + "</h5>").fadeIn();
                }
            }
        })
    })
})