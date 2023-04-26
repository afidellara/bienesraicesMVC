<main class="contenedor seccion">
  <h1>Más sobre nosotros</h1>

  <?php include 'iconos.php' ?>
</main>

<section class="seccion contenedor">
  <h2>Casas y depas en venta</h2>
  <?php 
  include 'listado.php'; 
  ?>
  <div class="alinear-derecha">
    <a href="/propiedades" class="boton-verde">Ver todas</a>
  </div>
</section>

<section class="imagen-contacto">
  <h2>Encuent la casa de tus sueños</h2>
  <p>
    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sapiente, rem
    placeat reiciendis commodi fugiat de
  </p>
  <a href="contacto.html" class="boton-amarillo">Contactanos</a>
</section>

<div class="contenedor seccion seccion-inferior">
  <section class="blog">
    <h3>Nuestro blog</h3>
    <article class="entrada-blog">
    <?php include 'blog.php' ?>
    </article>
  </section>
  <section class="testimoniales">
    <h3>Testimoniales</h3>
    <div class="testimonial">
      <blockquote>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore
        laboriosam ut dolor dolorem fugit odio rerum eaque repellat porro
        doloribus?
      </blockquote>
      <p>-Alejandro Lara</p>
    </div>
  </section>
</div>