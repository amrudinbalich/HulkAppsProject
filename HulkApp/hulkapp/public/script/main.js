// get username from cookie
let cookie = document.cookie.split(';');
let username = cookie[0];

// function to follow a specified movie on the list
// after you followed a movie please refresh the page and change should be done
// passing the movie id as an argument to a call function
function call(id) {
    console.log(id)
    let userData = "username=" + username;
    $.ajax({
      url : `http://localhost:8000/api/movie/followMovie/${id}`,
      method : "POST", // -- using patch because I am updating the table
      data : userData,
      dataType : "json",
      success : (data) => {
        alert(data.success + '\nRefresh the page')
    }
    })
  }

// jquery script 
$(document).ready(() => {

// calling an api to generate all movies onto the page
$.ajax({
    url : "http://localhost:8000/api/movie/getAllMovies",
    method : "GET",
    contentType : "json",
    success: (data) => {
        for (let i = 0; i < data.length; i++) {
            const movie = data[i];
            $(".row").append(
            "<div id='movie' class='col-md-4 p-5 border border border-secondary m-4'>" 
            + `<strong>ID: ${movie.id}`  +  "</strong><br>" 
            + `<strong>Name: ${movie.name}` + "</strong><br>"
            + `Genre: ${movie.genre}` + "<br>"
            + `Created in: ${movie.created_in}` + "<br>"
            + `<strong>Followers: ${movie.followers}` + "</strong><br>"
            + "<button id='" + movie.name + "' onclick='call(" + movie.id + ")' class='btn btn-primary btn-sm mt-2'>Follow</button>"
            + "</div>"
            );
          }
      }
      // test 
})  

// simply logout user

$("#logout").on('click' , () => {
    window.location.href = "http://localhost:8000/";
})

})
