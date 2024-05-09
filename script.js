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