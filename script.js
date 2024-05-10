let state = 'light'
let theme = document.getElementById("theme")

function change(css_file){
    theme.removeAttribute('href')
    theme.setAttribute('href',css_file)
}

window.onload = function () {
    document.getElementById("manipulate").addEventListener('click', function () {
        if(state == 'light'){
            change('dark_theme.css');
            state = 'dark';
        }
        else{
            change('light_theme.css');
            state = 'light';
        }
    })
}

function logout(){
    console.log("logout called");
    let allcookies = document.cookie;
    let cookielist = allcookies.split(";");

    cookielist.forEach(cookie => {
        let name = cookie.split("=")[0];
        if(name == "active"){
            document.cookie = "active=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/"
            window.location.replace("/language_learning")
        }
    })
}

let allcookies = document.cookie;
let cookielist = allcookies.split(";");
let loggedin = false;
let accountBTN = document.getElementById('acc');

cookielist.forEach(cookie => {
    name = cookie.split('=')[0];
    value = cookie.split('=')[1];
    if(name == "active" && value != ""){
        loggedin = true;
    }
});

if(!loggedin){
    accountBTN.innerHTML = "<a href='/language_learning/login.html' style='text-decoration:none; color: white; padding: 10px;'>Login</a>"
    }
else{
    accountBTN.innerHTML = "<a href='/language_learning/profile.php' style='text-decoration:none; color: white; padding: 10px;'>Profile</a>"

}
function toggleMode() {
    var element = document.body;
    element.classList.toggle("dark-mode");
}