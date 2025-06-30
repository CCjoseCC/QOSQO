function toggleMenu() {
    const opciones = document.getElementById("opciones");
    opciones.style.display = opciones.style.display === "flex" ? "none" : "flex";
  }




document.getElementById("boiniciar").addEventListener("click", function(event) {
    event.preventDefault(); // Evita el envío automático del formulario

    // Obtener los valores ingresados por el usuario
    const uIngresado = document.querySelector("input[name='usuario']").value;
    const cIngresada = document.querySelector("input[name='contrasena']").value;

    // Verificar que los campos no estén vacíos
    if (uIngresado && cIngresada) {
        Swal.fire({
            title: '¡Bienvenido!',
            text: 'Iniciaste sesión correctamente',
            icon: 'success',
            confirmButtonText: 'Aceptar',
            confirmButtonColor: '#202020'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '../index.html';
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

/*
document.getElementById("boiniciar").addEventListener("click", function(event) {
    event.preventDefault(); // Evita el envío automático del formulario
    alert("Iniciaste sesión");
    window.location.href = '../index.html';
});
*/