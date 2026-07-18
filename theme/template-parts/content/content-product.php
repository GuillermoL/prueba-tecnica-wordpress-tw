<?php
/**
 * Componente reutilizable: Tarjeta de Producto (Card)
 * 
 * Este archivo se utiliza para renderizar cada producto en la sección de productos
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'flex flex-col bg-white shadow-[0_0_60px_0_rgba(0,0,0,0.1)] h-full font-["Roboto",sans-serif]' ); ?>>
    
    <?php /* 1. Parte superior: Contenedor de imagen  */ ?>
    <div class="relative w-full aspect-4/3 bg-[#E2E8F0] flex items-center justify-center">
        <?php if ( has_post_thumbnail() ) : ?>
            <a href="<?php the_permalink(); ?>" class="block w-full h-full">
                <?php 
                the_post_thumbnail( 'medium_large', array(
                    'class'   => 'w-full h-full object-cover object-center',
                    'loading' => 'lazy',
                    'alt'     => esc_attr( get_the_title() )
                ) ); 
                ?>
            </a>
        <?php else : ?>
            <a href="<?php the_permalink(); ?>" class="flex items-center justify-center w-full h-full text-gray-400">
                <span class="text-sm font-medium"><?php _e( 'Sin imagen', 'gestor-productos' ); ?></span>
            </a>
        <?php endif; ?>
    </div>

    <?php /* 2. Parte inferior */ ?>
    <div class="flex flex-col flex-grow items-center justify-between p-6 md:p-8 text-center bg-white">
        
        <div class="w-full mb-6">
            <?php /* Título del producto */ ?>
            <h3 class="text-[#3E509D] font-medium text-lg md:text-[24px] leading-[30.8px] mb-3">
                <a href="<?php the_permalink(); ?>">
                    <?php the_title(); ?>
                </a>
            </h3>

            <?php /* Descripción corta */ ?>
            <div class="text-[#4F5665] font-normal text-sm md:text-[15px] leading-[22px] line-clamp-3">
                <?php 
                if ( has_excerpt() ) {
                    the_excerpt();
                } else {
                    echo wp_trim_words( get_the_content(), 15, '...' );
                }
                ?>
            </div>
        </div>

        <?php /* 3. Botón "Leer más" */ ?>
        <div class="mt-auto pt-2">
            <a href="<?php the_permalink(); ?>" class="inline-flex items-center justify-center bg-[#9FCE00] text-white font-bold text-sm md:text-[16px] leading-[48px] h-[48px] px-[24px] rounded-[40px] capitalize tracking-normal">
                <?php _e( 'Leer más', 'gestor-productos' ); ?>
            </a>
        </div>

    </div>

</article>