// extracting cookie sent from login for the later api calls
let cookie = document.cookie.split(';');
let username = cookie[0];
console.log(username)
$(document).ready(() => {
    // get info about specific user
    $.ajax({
        url : `http://localhost:8000/api/user/getUser/${username}`  ,
        dataType: "json",
        success: function(data) {
            // handle successful response
            $("#details").append("<h4 class='mb-2'>Details:</h4>") +
            $("#details").append("<p>ID: " + data[0]['id'] + "</p>");
            $("#details").append("<p>Username : " + data[0]['username'] + "</p>");
            $("#details").append("<p>Email Adress : " + data[0]['email'] + "</p>");
            $("#details").append("<p>Movies Followed : " + data[0]['followed_movies']  + "</p>");
            $("#details").append("<p>Created At : " + data[0]['created_at']  + "</p>");
            $("#details").append("<p>Followed At : " + data[0]['updated_at']  + "</p>");
           
          console.log(data[0]['id'])
          },
          error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
          }
    })


    // logout button
    // redirect user to login page
    $("#logout").click(()=> {
        window.location.href = "http://localhost:8000/";
    })

    // for username

    $("#usernameBtn").on('click',() => {
        $("#username").removeClass('hidden');
        $("#forUsername").removeClass('hidden');
    })

    // for email

    $("#emailBtn").on('click',() => {
        $("#email").removeClass('hidden');
        $("#forEmail").removeClass('hidden');
    })

    // for password

    $("#passwordBtn").on('click',() => {
        $("#password").removeClass('hidden');
        $("#forPassword").removeClass('hidden');
    })

    // delete your account 

    $("#delete").click(() => {
        $.ajax({
            url : `http://localhost:8000/api/user/deleteUser/${username}`,
            method : 'DELETE',
            success : (data) =>{
                window.location.href =  "http://localhost:8000/deleted";
            }
        })
    })


    // handle the update User form submission

    $("#updateForm").on('submit',(e) =>{
        e.preventDefault();
        let formData = $("#updateForm").serialize();
        document.cookie = ''
        $.ajax({
            url : `http://localhost:8000/api/user/updateUser/${username}`,
            method : "POST",
            data : formData,
            dataType : "json",
            success : (data) => {
            // override cookie if username is changed 
            // this is done because in api calls I am reffering to the username not id 
            // username is stored in cookies and being extracted to provide api with essential information about user which it is trying to access
            // something similar like authorization header
            if($("#username").val() !== "") {
                document.cookie = $("#username").val();
            }
            // display the success info to the user
            $("#responseTxt").append(data.success + "<br>Please reload the page.")
            },
            error : (xhr) => {
                console.log(xhr.responseJSON)
            }
        })
    })

})