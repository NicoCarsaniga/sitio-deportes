"use strict"

let url = "http://localhost/web2/TPE-1-WEB/api/comments/";
let itemId = document.getElementById("itemId").value;
let user = document.getElementById("user").value;
let rol = document.getElementById("rol").value;

// Instancio la app VUE
let app = new Vue({
    el: "#comments",
    data: {
        loading: false,
        comments: [],
    },
    methods: {
        saludar: function (id) {
            alert("hola: " + id);
        }
    }
});

document.getElementById("btn-reload").addEventListener('click', getComments);

getComments();


// Trae todos los comentarios según el torneo

async function getComments() {
  app.loading = true;
    try {
        let respuesta = await fetch(url + itemId);
        let comments = await respuesta.json();
            app.comments = comments;
            app.loading = false;
    }
    catch (e) {
        console.log(e);
    }
}
