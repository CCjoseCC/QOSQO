function toggleMenu() {
    const opciones = document.getElementById("opciones");
    opciones.style.display = opciones.style.display === "flex" ? "none" : "flex";
  }



document.getElementById("crearcuenta").addEventListener("click", function(event) {
    event.preventDefault(); // Evita el envío automático del formulario

    // Obtener los valores ingresados por el usuario
    const uIngresado = document.querySelector("input[name='nombre_user']").value;
    const aIngresado = document.querySelector("input[name='nom_user']").value;
    const coIngresado = document.querySelector("input[name='correo_user']").value;
    const cIngresado = document.querySelector("input[name='contrasena_user']").value;
    

    // Verificar que los campos no estén vacíos
    if (uIngresado && cIngresado && aIngresado && coIngresado) {
        Swal.fire({
            title: '¡Bienvenido!',
            text: 'Iniciaste sesión correctamente',
            icon: 'success',
            confirmButtonText: 'Aceptar',
            confirmButtonColor: '#202020'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '../iniciarSeccion/iniciar.html';
            }
        });
    } else {
        Swal.fire({
            title: 'Error',
            text: 'Por favor, ingresa un usuario y una contraseña',
            icon: 'error',
            confirmButtonText: 'Intentar nuevamente',
            confirmButtonColor: '#d33'
        });
    }
});
