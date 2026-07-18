<?php
/**
 * Plantilla de la página de inicio (Front Page)
 *
 * Replicando diseño de Figma
 * 
 */

get_header();
?>

<main id="main" class="site-main bg-[#F5F8F9] min-h-screen py-12 md:py-20 font-['Roboto',sans-serif]">

    <?php /* 1. SECCIÓN SLIDER PRINCIPAL EDITABLE (Gutenberg) */ ?>
    <section class="hero-slider-section w-full mb-12 md:mb-16 overflow-hidden">
        <?php
        while ( have_posts() ) :
            the_post();
            the_content();
        endwhile;
        ?>
    </section>

    <?php /* 2. SECCIÓN DE PRODUCTOS (Figma: Ancho máximo proporcional, rejilla responsive) */ ?>
    <section class="productos-section max-w-[1308px] mx-auto px-4 sm:px-6 lg:px-8">
        
        <?php /* Título de la sección con estilos diferenciados por bloque de texto */ ?>
        <header class="text-center mb-12 md:mb-16">
            <h2 class="inline-block text-2xl sm:text-3xl md:text-[36px] leading-tight md:leading-[57.6px]">
                <span class="text-[#9FCE00] font-bold uppercase block sm:inline">
                    <?php _e( 'Panel Sándwich', 'gestor-productos' ); ?>
                </span>
                <span class="text-[#3E509D] font-medium block sm:inline sm:ml-2">
                    <?php _e( 'para tu proyecto', 'gestor-productos' ); ?>
                </span>
            </h2>
        </header>

        <?php
        // Consulta WP_Query para mostrar los últimos 6 productos publicados
        $args_productos = array(
            'post_type'      => 'producto',
            'posts_per_page' => 6,
            'orderby'        => 'date',
            'order'          => 'DESC',
            'post_status'    => 'publish',
        );

        $query_productos = new WP_Query( $args_productos );

        if ( $query_productos->have_posts() ) :
        ?>
            <?php /* Grid de productos: 1 col en móvil, 2 en tablet, 3 en escritorio */ ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 lg:gap-[35px]">
                <?php
                while ( $query_productos->have_posts() ) :
                    $query_productos->the_post();
                    
                    // Renderizado modular de la tarjeta de producto
                    get_template_part( 'template-parts/content/content', 'product' );
                    
                endwhile;
                ?>
            </div>
            <?php
            wp_reset_postdata();
            ?>
        <?php else : ?>
            <div class="text-center py-16 bg-white rounded-lg shadow-sm border border-gray-100 max-w-md mx-auto">
                <p class="text-[#4F5665] text-lg font-normal">
                    <?php _e( 'No hay productos disponibles en este momento.', 'gestor-productos' ); ?>
                </p>
            </div>
        <?php endif; ?>

    </section>

</main>

<?php
get_footer();
?>