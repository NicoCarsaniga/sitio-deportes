"use strict"

let APIurl = "http://localhost/web2/TPE-1-WEB/api/comments/";

let info = document.getElementById('info-user');
let itemInfo = document.getElementById('info-item');
let itemId = itemInfo.dataset.infoItem;


/**
 * Botón que envía mediante API REST un comentario
 */

// Instancio la app VUE
let app = new Vue({
    el: "#comments",
    data: {
        loading: false,
        comments: [],
        userName: info.dataset.user,
        rol: info.dataset.rol 
    },
    methods: {
        saludar: function (id) {
            alert("hola: " + id);
        }
    }
});

document.getElementById("btn-reload").addEventListener('click', getComments);
//setInterval(getComments, 30000);

getComments();


/**
 * Trae todos los comentarios según el torneo
 */
async function getComments() {
    app.loading = true;
    try {
        let respuesta = await fetch(APIurl + itemId);
        let comments = await respuesta.json();
        app.comments = comments;
        app.loading = false;
    }
    catch (e) {
        console.log(e);
    }
}

document.querySelector("#btn-addComment").addEventListener('click',addComment);
/**
 * Envía un comentario mediante API REST
 */
async function addComment() {
    try {
        let data = {
            "comentario": document.querySelector("#comentario").value,
            "id_torneo_fk": itemId,
            "votos": document.querySelector("#puntaje").value,
            "id_usuario_fk": info.dataset.userid
        } 
        console.log(data);
        let respuesta = await fetch(APIurl + itemId, {
            "method": "POST",
            "headers": { "Content-Type": "application/json" },
            "body": JSON.stringify(data)
        });
        let json = await respuesta.json();
    }
    catch (e){
        console.log(e);
    }
}