<?php
/**
 * Componente reutilizable: Tarjeta de Producto (Card)
 * 
 * Se renderiza de forma modular en los bucles mediante get_template_part().
 * Metodología: Mobile First utilizando clases utilitarias de Tailwind CSS.
 */

// Evitar acceso directo por seguridad
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'group flex flex-col bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-all duration-300 border border-gray-100 h-full' ); ?>>
    
    <?php /* 1. Imagen Destacada con efecto zoom suave en hover */ ?>
    <?php if ( has_post_thumbnail() ) : ?>
        <a href="<?php the_permalink(); ?>" class="relative w-full aspect-4/3 overflow-hidden bg-gray-50 block">
            <?php 
            the_post_thumbnail( 'medium_large', array(
                'class'   => 'w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-500 ease-out',
                'loading' => 'lazy',
                'alt'     => esc_attr( get_the_title() )
            ) ); 
            ?>
        </a>
    <?php else : ?>
        <a href="<?php the_permalink(); ?>" class="flex items-center justify-center w-full aspect-4/3 bg-gray-100 text-gray-400 block">
            <span class="text-sm font-medium"><?php _e( 'Sin imagen', 'gestor-productos' ); ?></span>
        </a>
    <?php endif; ?>

    <?php /* 2. Contenido de la tarjeta (Mobile First: p-5 en móvil, md:p-6 en escritorio) */ ?>
    <div class="flex flex-col flex-grow p-5 md:p-6">
        
        <?php /* Título del producto */ ?>
        <h3 class="text-lg md:text-xl font-semibold text-gray-900 mb-2 group-hover:text-blue-600 transition-colors duration-200">
            <a href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
            </a>
        </h3>

        <?php /* Descripción corta (limitada a 3 líneas visualmente con line-clamp) */ ?>
        <div class="text-sm md:text-base text-gray-600 mb-4 line-clamp-3 flex-grow">
            <?php 
            if ( has_excerpt() ) {
                the_excerpt();
            } else {
                echo wp_trim_words( get_the_content(), 15, '...' );
            }
            ?>
        </div>

        <?php /* 3. Pie de la tarjeta: Enlace de acción */ ?>
        <div class="mt-auto pt-4 border-t border-gray-100 flex items-center justify-between">
            <a href="<?php the_permalink(); ?>" class="inline-flex items-center text-sm font-semibold text-blue-600 hover:text-blue-800 transition-colors">
                <?php _e( 'Ver producto', 'gestor-productos' ); ?>
                <svg class="w-4 h-4 ml-1 transition-transform duration-200 group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </a>
        </div>

    </div>

</article>