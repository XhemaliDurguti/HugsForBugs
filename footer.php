<?php
$image = get_field('logo', 'options');
$picture = $image['sizes']['large'];
// var_dump($image);
?>
<footer>
    <div class="p-11 bg-gray-900 text-gray-200">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-2">
                <div class="mb-5 w-1/2">
                    <a href="home">
                        <img src="<?php echo $picture; ?>" alt="logo" class="mx-auto">
                    </a>
                </div>
                <div class="mb-5">
                    <h4>Useful Links</h4>
                    <?php
                    $arguments = array(
                        'theme_location' => 'footer',
                        'container' => '',
                        'items_wrap' => '<ul class="text-gray-500">%3$s</ul>',
                        'walker' => ''
                    );
                    wp_nav_menu($arguments);
                    ?>
                </div>
                <div class="mb-5">
                    <h4>Our Services</h4>
                    <?php
                    $arguments = array(
                        'theme_location' => 'footer',
                        'container' => '',
                        'items_wrap' => '<ul class="text-gray-500">%3$s</ul>',
                        'walker' => ''
                    );
                    wp_nav_menu($arguments);
                    ?>
                </div>
                <div class="mb-5">
                    <?php the_field('page_title', 30); ?>
                    <?php
                    $arguments = array(
                        'theme_location' => 'footer',
                        'container' => '',
                        'items_wrap' => '<ul class="text-gray-500">%3$s</ul>',
                        'walker' => ''
                    );
                    wp_nav_menu($arguments);
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="w-full bg-gray-800 text-gray-500 px-10">
        <div class="max-w-7xl flex flex-col sm:flex-row py-4 mx-auto justify-between items-center">
            <div class="text-center">
                <div>
                    Copyright <strong><span class="text-yellow-500"><?php the_field('title', 'options'); ?></span></strong>.All Rights Reserved
                </div>
                <div>
                    Designed by <a href="#" class="text-yellow-500"><?php the_field('title', 'options'); ?></a>
                </div>
            </div>
            <div class="text-center text-xl text-white">
                <a href="<?php the_field('twitter', 'options'); ?>" class="w-10 h-10 rounded-full bg-yellow-500 hover:bg-amber-600 mx-1 inline-block pt-1" target="_blank"><i class="fa-brands fa-twitter"></i></a>
                <a href="<?php the_field('facebook', 'options'); ?>" class="w-10 h-10 rounded-full bg-yellow-500 hover:bg-amber-600 mx-1 inline-block pt-1" target="_blank"><i class="fa-brands fa-facebook"></i></a>
                <a href="<?php the_field('instagram', 'options'); ?>" class="w-10 h-10 rounded-full bg-yellow-500 hover:bg-amber-600 mx-1 inline-block pt-1" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                <a href="<?php the_field('youtube', 'options'); ?>" class="w-10 h-10 rounded-full bg-yellow-500 hover:bg-amber-600 mx-1 inline-block pt-1" target="_blank"><i class="fa-brands fa-youtube"></i></a>
            </div>
        </div>
    </div>
</footer>
</body>
<?php wp_footer(); ?>

</html>