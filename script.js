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