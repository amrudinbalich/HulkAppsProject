$(document).ready(() => {
    $("#form").on('submit',(e) => {
        // prevent default form submission
        e.preventDefault();
        // collect formdata
        let formData = $("#form").serialize();
        console.log(formData)
        $.ajax({
            url : 'http://localhost:8000/api/user/registerUser',
            method : "POST",
            data : formData,
            dataType : "json", // -- expected data type
            success : (data) => {
                // display success data
                $("#response").removeClass('hidden').append("<p class='font-bold text-success my-0'>" + data.message + "</p> <br>");
                $("#response").append("<p class='font-bold my-0'>Soon you will be redirected to main page</p>")
                setTimeout(() => {
                    // redirect user to login page again
                    window.location.href = "http://localhost:8000/";
                },2000);
            },
            error : (xhr) => {
                // check is status 422
                if( xhr.status === 422) {
                // assing object to the errors variable for ease of usage
                let errors = xhr.responseJSON 
                // loop over dynamic array and display errors to user
                for (let field in errors) {
                    $("#response").removeClass('hidden').append("<p class='font-bold text-danger'>" + errors[field][0] + "</p>");
                  }
                }
        }  })
    })
})