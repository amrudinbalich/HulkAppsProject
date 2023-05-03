Register Readme

Script Location : /public/script/register.js


You have probably noticed so far that I don't have the required on my input forms
So Every time when user don't fills the input form I had generated him my custom answer using jQuery and Bootstrap

The Structure and Concept :
- Registration form is done by calling api call on submit from the Frontend using jQuery not from the normal Form Submission
- So . Every time user submits the form I am preventing the default submission and collecting the info .
- After the form submission user should simply fill all the data in order to get his account created 
- If he don't fills anything unique messages from Laravel Validator is gonna appear on his page
- I have done this using the error callback on jQuery $.ajax call
- So , every time when something is missing in the form user will know what is exactly missing in his form
- On success callback I am just displaying a message that user is registered and after 2 seconds I am redirecting him to the login page again just to make a process more natural
- Validator also makes sure that one username and email cannot be taken twice
- So it is a perfect way to not make duplicate inputs in database


User Create API Call :
-You have probably noticed so far that I am not using classic form submission but AJAX call 
-I am doing this because it is just my personal preference and I because I love to have a little bit more grippier controll over frontend of my app
-So on sumbit the form is submitted onto api route (http://localhost:8000/api/user/registerUser) . Than the server logic is handling the rest
-After getting the response I am using success and error callbacks to handle the rest you have it in the text above

