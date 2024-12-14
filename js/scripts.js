<<<<<<< HEAD
=======
$(document).ready(function () {
    /*
    $('#adminLogin').on('click', function(event) { 
        event.preventDefault(); 
        $('#staticBackdrop').modal('show'); 
    });
    */
    $("#inicioSesion").click(function() {
        let $loginUsuario = $("#username").val()
        let $loginContrasenia = $("#password").val()
        if ($loginUsuario != "" && $loginContrasenia != "") {
            $.ajax({
                type: "POST",
                url: "index.php",
                data: {"password": $loginContrasenia, "username": $loginUsuario},
                dataType: 'json',
                success: function (datos) {
                    if(datos.status == "error") {
                        Swal.fire({
                            icon: 'error',
                            showCloseButton: true,
                            confirmButtonText: "Regresar",
                            title: 'Contraseña incorrecta',
                            text: 'La contraseña introducida es incorrecta'
                        })
                    } else if(datos.status == "error2") {
                        Swal.fire({
                            icon: 'error',
                            showCloseButton: true,
                            confirmButtonText: "Volver",
                            title: 'Usuario desconocido',
                            text: 'El usuario no se encuentra en el sistema'
                        })
                    } else if (datos.status == "success") {
                        Swal.fire({
                            icon: 'success',
                            confirmButtonText: "Continuar",
                            showCloseButton: true,
                            title: 'Usuario correcto',
                            text: 'El usuario ha accedido correctamente'
                        }).then((result) => { if (result.isConfirmed) { window.location.href = '1FC7Xt0J30Cl.html'; }})
                    }
                },
                error: function (jqXHR) {
                    console.log("Error AJAX al hacer la petición al servidor: " + jqXHR.responseText);
                }
            })
        } else {
            Swal.fire({
                icon: 'error',
                confirmButtonText: "Aceptar",
                showCloseButton: true,
                title: 'No ha rellenado todos los campos',
                text: 'Verifique que ha rellenado todos los campos'
              })
        }
    })
    $.ajax({ 
        url: 'indexNoticias.php',
        method: 'GET',
        success: function(data) { 
        $('#noticias').html(data);
        }, 
        error: function(jqXHR, textStatus, errorThrown) { 
            console.log('Error: ' + textStatus + ' - ' + errorThrown); 
        } });
    });
>>>>>>> 36f2c519926638906c64f7a27174e3dd5e0a1ff5
