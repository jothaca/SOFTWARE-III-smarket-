$(document).ready(function(){
    $("#registro").validate({
        rules: {
            nombres: { required: true, minlength: 3},
            apellidos: { required: true, minlength: 3},
            username: { required: true, minlength: 2},
            email: { required: true, email: true},
            fecha: { required: true, minlength: 3},
            sexo: { required: true, minlength: 3},
            ciudad: { required: true, minlength: 3},
            pais: { required: true, minlength: 3},
            pass: { required: true, minlength: 3},
            pass1: { required: true, minlength: 3}
        },
        messages: {
            nombres: "Debe introducir su nombre",
            apellidos: "Debe introducir su apellido",
            username: "Debe introducir su usuario",
            email: "Debe introducir su email",
            fecha: "Debe introducir su fecha de nacimineto",
            sexo: "Debe introducir su sexo",
            ciudad: "Debe introducir su ciudad",
            pais: "Debe introducir su país",
            pass: "Debe introducir una contraseña válida",
            pass1: "Debe coincidir sus contraseñas"
        },
    });

});