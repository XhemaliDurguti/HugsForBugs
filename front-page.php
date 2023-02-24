<?php
/*
* Template Name: Home
*/
error_reporting(0);
get_header();

$title = get_field('page_title');
$descrption = get_field('description');
$other_desc = get_field('other_description');
?>
<section class="text-white body-font bg-cover bg-no-repeat bg-bottom bg-right" style="background-image:url('https://images.pexels.com/photos/260922/pexels-photo-260922.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1');">
    <div class="text-white container mx-auto flex px-5 py-40 items-center justify-center flex-col">
        <div class="text-center lg:w-2/3 w-full">
            <h1 class="inline-flex max-w-2xl mb-4 text-4xl font-extrabold leading-none tracking-tight md:text-5xl xl:text-6xl dark:text-white italic">
                <?php the_field('banner_title', 'option'); ?></h1>
            <p class="mb-8 leading-relaxed italic font-bold">
                <?php the_field('banner_description', 'option'); ?>
            </p>
            <div class="flex justify-center">
                <a href="about" class="inline-flex text-gray-700 font-bold bg-orange-500 border-0 py-2 px-6 focus:outline-none hover:bg-orange-400 rounded-full text-lg">Read
                    More</a>
            </div>
        </div>
    </div>
</section>
<!--- Features Section -->
<section class="bg-white">
    <div class="container max-w-screen-xl px-2 py-16 mx-auto lg:py-24 lg:px-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php if (have_rows('team')) : ?>
                <?php while (have_rows('team')) : the_row(); ?>
                    <div class="shadow-md p-6 rounded-md bg-slate-100 border border-amber-200 hover:transition duration-500 hover:scale-125">
                        <div class="inline-block p-4 border-slate-800 mb-3">
                            <i class="<?php the_sub_field('svg_link'); ?>"></i>
                            <h3 class="text-4xl font-bold text-slate-800 mb-2"><?php the_sub_field('name'); ?></h3>
                            <p class="text-lg text-gray-600">
                                <?php the_sub_field('description'); ?>
                            </p>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</section>
<section class="bg-white rounded">
    <div class="container max-w-screen-xl mx-auto ">
        <nav class="flex flex-col sm:flex-row">
            <!-- Shtume -->
            <ul class="flex items-center gap-2 text-sm font-medium nav">
                <?php
                $terms = get_terms(
                    array(
                        'taxonomy' => 'category',
                        'hide_empty' => false,
                        'parent' => 0,
                    )
                ); ?>
                <li class="flex">
                    <a href="?category=all" class="relative flex items-center justify-center gap-2 rounded-lg bg-amber-200 px-3 py-2 text-amber-700 hover:bg-amber-900 hover:text-white">All</a>
                </li>
                <?php
                foreach ($terms as $term) {
                ?>
                    <li class="flex-1">
                        <a href="?category='<?php echo $term->slug; ?>'" class="relative flex items-center justify-center gap-2 rounded-lg bg-amber-200 px-3 py-2 text-amber-700 hover:bg-amber-900 hover:text-white">
                            <?php echo $term->name; ?></a>
                    </li>
                <?php
                }
                ?>
            </ul>
            <div>
        </nav>
        <div class="border-b-2 border-amber-300 p-1"></div>
    </div>
    <div class="container max-w-screen-xl mx-auto grid gap-8 md:grid-cols-2 lg:grid-cols-3 p-3 md:p-4 xl:p-5">
        <?php
        $category = $_GET['category'];
        if ($category == 'all' || empty($category)) {
            $args = array(
                'post_type' => 'post',
                'orderby' => 'ID',
                'post_status' => 'publish',
                'order'    => 'DESC',
                'posts_per_page' => -1,
            );
        } else {
            $args = array(
                'post_type' => 'post',
                'orderby' => 'ID',
                'post_status' => 'publish',
                'order'    => 'DESC',
                'posts_per_page' => -1,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'category',
                        'field' => 'slug',
                        'terms' => $category
                    )
                )
            );
        }
        $result = new WP_Query($args);
        if ($result->have_posts()) : ?>
            <?php while ($result->have_posts()) : $result->the_post(); ?>
                <a href="<?php the_permalink() ?>">
                    <div class="overflow-hidden rounded-2xl bg-gray-50">
                        <div class="flex items-center h-[180px] overflow-hidden">
                            <img src="<?php the_post_thumbnail('large') ?>" />
                        </div>
                        <div class="p-6">
                            <div class="flex flex-col items-start justify-between sm:flex-row sm:items-center">
                                <div>
                                    <span class="inline-flex items-center px-3 py-1 bg-yellow-200 hover:bg-yellow-300 rounded-full text-sm font-semibold text-yellow-600">
                                        <?php
                                        $terms = get_the_terms($post->ID, 'category');
                                        foreach ($terms as $term) {
                                        ?>
                                            <span class="ml-1"><?php echo  $term_name = $term->name; ?></span>
                                        <?php
                                        }

                                        ?>
                                    </span>
                                    <h2 class="mt-2 text-lg font-semibold text-gray-800"><?php the_title(); ?></h2>
                                </div>
                            </div>

                            <hr class="mt-4 mb-4" />

                            <div class="flex flex-wrap justify-between">
                                <p class="inline-flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 stroke-orange-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>

                                    <span class="ml-2 text-gray-600">Posted By:</span>
                                    <span class="mx-2">•</span>
                                    <span class="text-gray-400"><?php the_author(); ?></span>
                                </p>

                                <p class="inline-flex items-center text-gray-600">
                                <div class="flex gap-1 text-sm text-yellow-400">
                                    <span:key="n"><i class="fas fa-star"></i></span>
                                        <span:key="n"><i class="fas fa-star"></i></span>
                                            <span:key="n"><i class="fas fa-star"></i></span>
                                                <span:key="n"><i class="fas fa-star"></i></span>
                                                    <span:key="n"><i class="fas fa-star"></i></span>
                                </div>
                                <span class="ml-2"> 5.0 (2.5k) </span>
                                </p>
                            </div>
                        </div>
                    </div>
                </a>
        <?php
            endwhile;
        endif;
        wp_reset_postdata();
        ?>
    </div>

</section>
<section class="bg-white dark:bg-gray-800">
    <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
        <div class="mx-auto max-w-screen-md sm:text-center">
            <h2 class="mb-4 text-3xl tracking-tight font-bold text-gray-900 sm:text-4xl dark:text-white">Subscribe to our Newsletter</h2>
            <p class="mx-auto mb-8 max-w-2xl font-light text-gray-400 md:mb-12 sm:text-xl dark:text-gray-300">Join our newsletter to stay updated on the latest traditional restaurants, and delicious recipes in Kosovo. Simply enter your email.</p>
            <?php
            if (isset($_POST['submit'])) {
                $data = array(
                    'email' => $wpdb->escape($_POST['email']),
                );

                $table_name = 'newsletter';

                $result = $wpdb->insert($table_name, $data, $format = NULL);
            }
            ?>
            <form class="form" method="post">
                <div class="items-center mx-auto mb-3 space-y-4 max-w-screen-sm sm:flex sm:space-y-0">
                    <div class="relative w-full">
                        <label for="email" class="hidden mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Email address</label>
                        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400 dark:text-gray-300" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                            </svg>
                        </div>
                        <input class="block p-3 pl-10 w-full text-sm text-gray-400 bg-gray-50 rounded-lg border border-gray-300 sm:rounded-none sm:rounded-l-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Enter your email" type="text" name="email" id="email" required="">
                    </div>
                    <div>
                        <button type="submit" name="submit" value="send" onclick="myFunction()" class="py-3 px-5 w-full text-sm font-medium text-center text-white rounded-lg  cursor-pointer bg-orange-400 border border-orange-800 sm:rounded-none sm:rounded-r-lg hover:bg-orange-700 focus:ring-4 focus:ring-orange-300">Subscribe</button>
                    </div>
                </div>
            </form>

        </div>

    </div>
</section>
<script type="text/javascript">
    const currentLocation = location.href;
    const menuItem = document.querySelectorAll('categorie');
    const menuLength = menuItem.length;

    for (let i = 0; i < menuLength; i++) {
        if (menuItem[i].href === currentLocation) {
            menuItem[i].className = "relative flex items-center justify-center gap-2 rounded-lg bg-amber-900 px-3 py-2 text-white hover:bg-amber-900 hover:text-white";
        }
    }
</script>
<?php get_footer(); ?>