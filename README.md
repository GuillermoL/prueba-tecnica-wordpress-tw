# Tema Wordpress con Tailwind y Gestión de Productos

Desarrollo de un tema de Wordpress personalizado, maquetación **Mobile First** mediante **Tailwind** y un tipo de contenido personalizado (Custom Post Type) para la gestión de catálogo.



## Requisitos del entorno

* **PHP:** >= 8.0 (con servidor web Apache/Nginx o entorno local como LocalWP, WAMP, XAMPP...).
* **WordPress:** >= 6.0.
* **Node.js:** >= 18.x.

## Instalación y Configuración Paso a Paso

### 1. Ubicación del Tema
Clona o descarga este repositorio directamente en el directorio de temas de tu instalación local de WordPress:

/wp-content/themes/tu-tema-tw/

### 2. Instalación de Dependencias Node.js
Abre una terminal en la carpeta raíz del tema e instala todos los paquetes necesarios para el motor de Tailwind CSS y el proceso de compilación:

npm install


### 3. Compilación de Estilos (Tailwind CSS)

Para entorno de desarrollo (con recarga automática y observación de cambios en tiempo real):

Bash
npm run dev

Para entorno de producción
Bash
npm run prod O npm run build d

Importante: Cada vez que se agreguen o modifiquen clases de Tailwind en los archivos .php es obligatorio ejecutar la compilación para que las reglas se incorporen a la hoja de estilos final (style.css).

### Activación del Plugin de Productos

Dentro de la raíz de este repositorio, hay una copia del plugin en la carpeta:
/plugin-gestor-productos/

Copia la carpeta gestor-productos dentro de la carpeta de plugins de tu WordPress: /wp-content/plugins/.

Entra en el panel de administración del Escritorio de WordPress (/wp-admin/) y ve a Plugins > Plugins instalados.

Activa el plugin Gestor de Productos.

Tras activar, ve a Ajustes > Enlaces permanentes y pulsa en "Guardar cambios" para regenerar las reglas de reescritura de URL  y evitar errores 404 en las fichas de los productos.

### Estructura y Arquitectura del Tema

front-page.php: Plantilla que controla la página de inicio estática de la web. Renderiza la sección superior editable mediante el editor de bloques nativo de WordPress (Gutenberg) a través de the_content(), y ejecuta un bucle (WP_Query) optimizado para consultar los últimos 6 productos publicados.

template-parts/content/content-product.php: Componente reutilizable (card) de la tarjeta de producto. Maquetado aislando estilos para permitir su invocación limpia en cualquier bucle mediante get_template_part().

style.css: Archivo de cabecera del tema y hoja de estilos principal donde el motor de Node.js exporta el código compilado de Tailwind CSS.

tailwind.config.js: Configuración del framework, tipografías personalizadas (como Roboto), paleta de colores y rutas de escaneo de archivos.


