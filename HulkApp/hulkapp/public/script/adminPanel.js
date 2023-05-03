$(document).ready(() => {
    // fetching all users
    $.ajax({
        url : "http://localhost:8000/api/user/getAllUsers",
        dataType : "json",
        success : (data) => {
            let uBody = $("#uBody");
            console.log(data)
            for(let i = 0 ; i < data.length ; i++) {
                let user = data[i];
                uBody.append(
                    "<tr>\
                    <th scope='row'>" + user.id + "</th>\
                    <td>" + user.username + "</td>\
                    <td>" + user.email + "</td>\
                    <td><button class='btn btn-sm btn-danger' onClick='delUser(\"" + user.username + "\")'>Delete</button></td>\
                    </tr>"
                );
            }
        }
    })
    // fetching all movies
    $.ajax({
        url : "http://localhost:8000/api/movie/getAllMovies",
        dataType : "json",
        success : (data) => {
            let mBody = $("#mBody");
            console.log(data)
            for(let i = 0 ; i < data.length ; i++) {
                let movie = data[i];
                mBody.append(
                    "<tr>\
                    <th scope='row'>" + movie.id + "</th>\
                    <td>" + movie.name + "</td>\
                    <td>" + movie.genre + "</td>\
                    <td>" + movie.created_in + "</td>\
                    <td><button class='btn btn-sm btn-danger' onClick='delMovie(\"" + movie.id + "\")'>Delete</button></td>\
                    </tr>"
                );

            }
        }
    })
})

function delUser (username) {
    $.ajax({
        url : `http://localhost:8000/api/user/deleteUser/${username}`,
        method : 'DELETE',
        success : (data) => {
            alert(data.success + '\nRefresh the page')
        }
    })
}

function delMovie (id) {
    $.ajax({
        url : `http://localhost:8000/api/movie/deleteMovie/${id}`,
        method : 'DELETE',
        success : (data) => {
            alert(data.success + '\nRefresh the page')
        }
    })
}