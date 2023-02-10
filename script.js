let menuVisible = false;
//Función que oculta o muestra el menu
function mostrarOcultarMenu(){
    if(menuVisible){
        document.getElementById("nav").classList ="";
        menuVisible = false;
    }else{
        document.getElementById("nav").classList ="responsive";
        menuVisible = true;
    }
}

function seleccionar(){
    //oculto el menu una vez que selecciono una opcion
    document.getElementById("nav").classList = "";
    menuVisible = false;
}
//Funcion que aplica las animaciones de las habilidades
function efectoHabilidades(){
    var skills = document.getElementById("skills");
    var distancia_skills = window.innerHeight - skills.getBoundingClientRect().top;
    if(distancia_skills >= 300){
        let habilidades = document.getElementsByClassName("progreso");
        habilidades[0].classList.add("htmlcss");
        habilidades[1].classList.add("javascript");
        habilidades[2].classList.add("python");
        habilidades[3].classList.add("sql");
        habilidades[4].classList.add("full");
        habilidades[5].classList.add("comunicacion");
        habilidades[6].classList.add("trabajo");
        habilidades[7].classList.add("empatia");
        habilidades[8].classList.add("dedicacion");
        habilidades[9].classList.add("proyect");
    }
}

//detecto el scrolling para aplicar la animacion de la barra de habilidades
window.onscroll = function(){
    efectoHabilidades();
} 

//eliminar los datos luego de enviar los datos.
const div = document.getElementById("myForm");
form.addEventListener("submit", function(event) {
  event.preventDefault();
  // aquí puedes enviar tus datos al servidor
  // ...
  div.reset();
});

// Recoger los valores de los campos del formulario
const nombre = document.querySelector('input[placeholder="Tú Nombre"]').value;
const telefono = document.querySelector('input[placeholder="Número telefónico"]').value;
const correo = document.querySelector('input[placeholder="Dirección de correo"]').value;
const tema = document.querySelector('input[placeholder="Tema"]').value;
const mensaje = document.querySelector('textarea[placeholder="Mensaje"]').value;

// Crear un objeto con los datos del formulario
const datos = {
  nombre: nombre,
  telefono: telefono,
  correo: correo,
  tema: tema,
  mensaje: mensaje
};

// Enviar los datos del formulario a través de una petición AJAX
fetch('/enviar-correo', {
  method: 'POST',
  headers: {
    'Content-Type': 'application/json'
  },
  body: JSON.stringify(datos)
})
  .then(res => res.json())
  .then(data => {
    console.log(data);
  })
  .catch(error => {
    console.error(error);
  });
