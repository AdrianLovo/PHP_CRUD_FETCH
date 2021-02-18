import {mensaje} from './SweetMessage.js';

//Funcion auto ejecutable
(async function(){
    //Botones | Inputs
    let img = document.getElementById('img');
    let publicar = document.getElementById('publicar');
    let vistaPrevia = document.getElementById("vistaPrevia");
    let resultado = document.getElementById("resultado");
    listar();
})()


img.addEventListener('change', (e) => {
    vistaPrevia.classList.remove("d-none");
    let name = e.target.files[0];
    let img = URL.createObjectURL(name);
    document.getElementById("imgPrevia").src = img;
});

publicar.addEventListener("click", async (e) => {
    e.preventDefault();
    let frmImg = document.getElementById("frmImg");
    try{
       let response = await fetch('/App/Controllers/ControllerPublicacion.php', {
            method: 'POST',
            body: new FormData(frmImg)
        })
        let data = await response.json();
        
        if(data.IdURL > 0){
            mensaje('Imagen Publicada', 'success');
            document.getElementById("vistaPrevia").classList.add("d-none");
            frmImg.reset();
            resultado.append(crearCard(data));  //Agregando elmento 
        }else{
            mensaje('Error publicando Imagen', 'error');
        }
    }catch(error){
        mensaje('Error publicando Imagen', 'error');
    }
});

async function listar(){
    const data = new FormData();
    data.append('opcion', 'select');
    try{
        let response = await fetch('/App/Controllers/ControllerPublicacion.php', {
            method: 'POST',
            body: data
        });
        let nodos = [];
        let dataRes = await response.json();
        dataRes.forEach( element => {
            nodos.push(crearCard(element));       
        });
        resultado.append(...nodos);
    }catch(error){
        mensaje('Error Listando Publicaciones', 'error');
    }
}

function crearCard(element){
    //Container
    let container = document.createElement("div");    
    container.className ="col-lg-3 col-md-3 col-sm-4 col-xs-12 mt-2";
    
    //Card
    let card = document.createElement("div");    
    card.className ="card";        
    
    //Header
    let card_header = document.createElement("div");    
    card_header.className ="car-header text-white bg-secondary";
    let card_header_comentario = document.createElement("p");
    card_header_comentario.className = "card_fecha"
    card_header_comentario.innerHTML = "Publicado: " +  element.Fecha;
    card_header.appendChild(card_header_comentario);
    
    //Body
    let card_body = document.createElement("div");    
    card_body.className ="card-body";
    let card_body_comentario = document.createElement("p");
    card_body_comentario.innerHTML = element.Comentario;
    card_body.appendChild(card_body_comentario);
    
    let card_img = document.createElement("img");
    card_img.className ="img-thumbnail card_img";
    card_img.src = element.URL;

    let card_delete = document.createElement("button");
    card_delete.className ="btn btn-sm btn-danger";
    card_delete.innerText = "Eliminar";
    card_delete.id = element.IdURL;   

    //Agregando todo al Container Princiapl
    card.appendChild(card_header);
    card.appendChild(card_body);
    card.appendChild(card_img);
    card.appendChild(card_delete);
    container.appendChild(card);
    return container;
}

