
<?php
include 'global/config.php';
include 'global/conexion.php';
include 'carrito.php';
include 'principal/cabecera.php';

?>



    
    <main>
        <div class="slider">
            <img src="img/principal.jpg" alt="principal">
        </div>
        <div class="audio">
            <audio id="background-audio" controls>
                <source src="audio/audio.mp3" type="audio/mpeg">
            </audio>
            <audio id="background-audio" autoplay loop>
                <source src="audio/ambiente.mp3" type="audio/mpeg">
            </audio>
        </div>
        <section class="product-section">
            <h2>ESCOGE TU ESTILO</h2>
            <div class="product-categories">
                <a href="pages/zapatos.html" class="category-link active">Zapatos</a>
                <a href="pages/mocasines.html" class="category-link">Mocasines</a>
                <a href="pages/zapatillas.html" class="category-link">Zapatillas</a>
                <a href="pages/tacones.html" class="category-link">Tacones</a>
            </div>
    
            <div class="product-list">
                <div class="product-item">
                    <img src="img/zapatilla_urbana.jpg" alt="Zapatillas Urbanas">
                    <p>ZAPATILLAS URBANAS</p>
                </div>
                <div class="product-item">
                    <img src="img/zapatilla_deportiva.jpg" alt="Zapatillas Deportivas">
                    <p>ZAPATILLAS DEPORTIVAS</p>
                </div>
                <div class="product-item">
                    <img src="img/casuales.jpg" alt="Zapatillas Casuales">
                    <p>ZAPATILLAS CASUALES</p>
                </div>
            </div>
            <div class="type">
                <h2>¿QUÉ DESEA COMPRAR?</h2>
                <div class="product-type-list">
                    <a href="pages/zapatos.html" class="product-type-item">
                        <img src="img/zapato.png" alt="Zapato">
                        <p>ZAPATO</p>
                    </a>
                    <a href="pages/mocasines.html" class="product-type-item">
                        <img src="img/mocasines.png" alt="Mocasines">
                        <p>MOCASINES</p>
                    </a>
                    <a href="pages/zapatillas.html" class="product-type-item">
                        <img src="img/zapatilla.png" alt="Zapatillas">
                        <p>ZAPATILLAS</p>
                    </a>
                    <a href="pages/tacones.html" class="product-type-item">
                        <img src="img/tacos.png" alt="Tacones">
                        <p>TACONES</p>
                    </a>
                </div>
            </div>
        </section>
        </div>
        <div class="video-container">
            <video autoplay muted loop>
                <source src="video/Zapatos Gente caminando Shoes VIDEOS LIBRES IN COPY RIGHT.mp4" type="video/mp4">
            </video>
        </div>
        
    
        <div class="table-container">
            <h1>PRODUCTO MAS VENDIDOS</h1>
            <table>
                <thead>
                    <tr>
                        <th>Imagen</th>
                        <th>Producto</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Cantidad Disponible</th>
                        <th>Comprar</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><img src="img/zapato.png" alt="Zapato"></td>
                        <td>Zapato de cuero</td>
                        <td>Zapato formal de cuero genuino, color negro.</td>
                        <td>S/.149.99</td>
                        <td>15</td>
                        <td><button class="buy-btn" onclick="location.href='pages/zapatos.html'">Comprar</button></td>
                    </tr>
                    <tr>
                        <td><img src="img/mocasines.png" alt="Mocasin"></td>
                        <td>Mocasin clásico</td>
                        <td>Mocasin casual de cuero para uso diario.</td>
                        <td>S/.239.99</td>
                        <td>20</td>
                        <td><button class="buy-btn" onclick="location.href='pages/zapatos.html'">Comprar</button></td>
                    </tr>
                    <tr>
                        <td><img src="img/zapatilla.png" alt="Zapatillas"></td>
                        <td>Zapatillas deportivas</td>
                        <td>Zapatillas ligeras para correr.</td>
                        <td>S/.159.99</td>
                        <td>10</td>
                        <td><button class="buy-btn" onclick="location.href='pages/zapatos.html'">Comprar</button></td>
                    </tr>
                    <tr>
                        <td><img src="img/tacos.png" alt="Tacones"></td>
                        <td>Tacones elegantes</td>
                        <td>Tacones de fiesta con un diseño elegante y moderno.</td>
                        <td>S/.199.99</td>
                        <td>8</td>
                        <td><button class="buy-btn" onclick="location.href='pages/zapatos.html'">Comprar</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <div class="form-contact">
            <h2>Contáctanos</h2>
            <form action="#" method="post">
                Nombre
                <input type="text" id="nombre" name="nombre" placeholder="Escribe tu nombre" required>
                G-mail
                <input type="email" id="email" name="email" placeholder="Escribe tu G-mail" required>
                Teléfono
                <input type="tel" id="telefono" name="telefono" placeholder="Escribe tu teléfono">
                Mensaje
                <textarea id="mensaje" name="mensaje" placeholder="Deja aquí tu comentario..." rows="4"
                    required></textarea>
    
                <button type="submit">Enviar</button>
            </form>
        </div>
    
    </main>

<?php include 'principal/pie.php'; ?>