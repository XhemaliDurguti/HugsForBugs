<?php
/*
    Template Name: Recipe
*/
error_reporting(0);
get_header();
?>
<section class="w-full bg-white">
    <div class="container max-w-screen-xl px-2 py-2 mx-auto lg:py-22 lg:px-3">
        <!-- breadcrum -->
        <div class="py-4 container flex gap-3 items-center">
            <a href="" class="text-orange-400">
                <i class="fas fa-home"></i>
            </a>
            <span class="text-sm text-gray-400"><i class="fas fa-chevron-right"></i></span>
            <p class="text-gray-600 font-medium uppercase">Recipes</p>
        </div>
        <!-- breadcrum end -->
        <!--shop wrapper-->
        <div class="container grid lg:grid-cols-4 gap-6 pt-4 pb-16 items-start relative ">
            <!--sidebar--->
            <div class="border border-gray-300 col-span-1 bg-white px-4 pb-6 shadow rounded overflow-hidden lg:static left-4 top-16 z-10 w-72 lg:w-full lg:block ">
                <div class="divide-y divide-gray-600 space-y-5 relative">
                    <!--Category filter-->
                    <div class="relative">
                        <h3 class="text-xl text-gray-800 mb-3 uppercase font-medium pt-4">Categories</h3>
                        <div class="space-y-2">
                            <form method="GET">
                                <?php
                                $terms = get_terms([
                                    'taxonomy' => 'category',
                                    'hide_empty' => false,
                                    'parent' => 0,
                                ]);
                                ?>
                                <?php
                                foreach ($terms as $term) :
                                ?>
                                    <div class="flex items-center">
                                        <input type="checkbox" id="Bedroom" name="cate_type[]" value="<?php echo $term->name; ?>" class="accent-orange-400 focus:ring-0 rounded-sm cursor-pointer">
                                        <label class="text-gray-600 ml-3 cursor-pointer"><?php echo $term->name; ?></label>
                                    </div>
                                <?php endforeach; ?>
                                <!--single category-->

                        </div>
                    </div>
                    <div class="mt-6">
                        <button type="submit" class="px-6 py-2 text-center text-white bg-amber-900 border border-primary rounded hover:bg-orange-400 hover:text-primary transition uppercase font-roboto font-medium my-2">Filter</button>
                    </div>
                    </form>
                    <!--Category Filter end-->

                </div>
            </div>
            <!--sidebar end-->
            <div class="col-span-3">
                <!-- Sotring -->
                <div class="flex items-center mb-4">
                    <!-- class="w-44 text-sm text-gray-600 px-4 py-3 border-gray-900 shadow-sm rounded focus:ring-primary focus:border-amber-900"-->
                    <form method="GET">

                        <select name="orderby" id="orderby" class="border border-gray-300 w-44 text-sm text-gray-600 px-4 py-3 shadow-sm rounded focus:ring-orange-400 focus:border-amber-900">
                            <option value="date" <?php echo selected($_GET['orderby'], 'date'); ?>>
                                Newest to Oldest
                            </option>
                            <option value="title" <?php echo selected($_GET['orderby'], 'title'); ?>>
                                Oldest to News
                            </option>
                        </select>
                        <input id="order" type="hidden" name="order" value="<?php echo (isset($_GET['order']) && $_GET['order'] == 'ASC') ? 'ASC' : 'DESC'; ?>" />
                        <button type="submit" class="px-6 py-2 text-center text-white bg-amber-900 border border-primary rounded hover:bg-orange-400 hover:text-primary transition uppercase font-roboto font-medium">Apply</button>
                    </form>
                    
                    <div class="links flex gap-2 ml-auto buttons">
                        <ul class="p-2 flex flex-wrap">
                            <li data-view="list-view" class="list active border border-gray-300 w-10 h-9 flex items-center justify-center text-gray-600 rounded cursor-pointer hover:bg-orange-400">
                                <i class="fas fa-list"></i>
                            </li>
                            <li data-view="grid-view" class="li-grid border border-gray-300 w-10 h-9 flex items-center justify-center text-gray-600 rounded cursor-pointer hover:bg-orange-400 hover:text-white">
                                <i class="fas fa-th"></i>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Sorting end--->

                <div class="view_main container max-w-screen-xl mx-auto grid gap-8 md:grid-cols-2 lg:grid-cols-3 p-3 md:p-4 xl:p-1">
                    <?php
                    $category = $_GET['cate_type'];
                    if ($category == 'all' || empty($category)) {
                        $args = array(
                            'post_type' => 'post',
                            'orderby' => 'ID',
                            'post_status' => 'publish',
                            'order'    => $order,
                            'posts_per_page' => -1,
                        );
                    } else {

                        $args = array(
                            'post_type' => 'post',
                            'orderby' => 'ID',
                            'post_status' => 'publish',
                            'order'    => $order,
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
                    ?>
                    <!-- List View -->
                    <div class="view_wrap list-view col-span-9 mt-6 lg:mt-0 space-y-4" style="display: block;">
                        <?php
                        $result = new WP_Query($args);
                        if ($result->have_posts()) :
                            while ($result->have_posts()) : $result->the_post();
                        ?>
                                <!-- Ndrysho-->
                                <div class="view-item ">
                                    <!-- single wishlist -->
                                    <div class="flex items-center md:justify-between gap-4 md:gap-6 p-4 border border-gray-200 rounded flex-wrap md:flex-nowrap">
                                        <!-- cart image -->
                                        <div class="w-25 flex-shrink-0">
                                            <img style="width:200px;height:150px;" src="<?php the_post_thumbnail('large'); ?>
                                        </div>
                                        
                                        <div class=" md:w-1/3 w-full">
                                            <h2 class="text-gray-800 mb-1 xl:text-xl textl-lg font-medium uppercase">
                                                <?php the_title(); ?>
                                            </h2>
                                            <p class="text-gray-500 text-sm">
                                            <p class="inline-flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 stroke-orange-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>

                                                <span class="ml-2 text-gray-600">Posted By:</span>
                                                <span class="mx-2">•</span>
                                                <span class="text-gray-400"><?php the_author(); ?></span>
                                            </p>
                                            </p>
                                        </div>
                                        <!-- cart content end -->
                                        <div class="">

                                            <span class="inline-flex items-center m-2 px-3 py-1 bg-yellow-200 hover:bg-yellow-300 rounded-full text-sm font-semibold text-yellow-600">
                                                <?php
                                                $terms = get_the_terms($post->ID, 'category');
                                                foreach ($terms as $term) {
                                                ?>
                                                    <span class="ml-1"><?php echo  $term_name = $term->name; ?></span>
                                                <?php
                                                }
                                                ?>
                                            </span>
                                        </div>
                                        <a href="<?php the_permalink(); ?>" class="ml-auto md:ml-0 block px-6 py-2 text-center text-sm text-white bg-amber-900 border border-amber-400 rounded hover:bg-orange-400 hover:text-white transition uppercase font-roboto font-medium">
                                            Read More
                                        </a>
                                    </div>
                                    <!-- single wishlist end -->
                                </div>
                        <?php
                            endwhile;
                        endif;
                        wp_reset_postdata();
                        ?>
                    </div>
                    <!-- List View End -->

                </div>
                <!-- product grid end -->
                <!-- List Grid -->
                <div class="view_wrap grid-view-1" style="display: none;">
                    <div class="container max-w-screen-xl mx-auto grid gap-4 md:grid-cols-2 lg:grid-cols-3 p-1 md:p-4 xl:p-1">
                        <?php
                        $result = new WP_Query($args);
                        if ($result->have_posts()) :
                            while ($result->have_posts()) : $result->the_post(); ?>
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
                </div>
                <!-- List Grid End -->
            </div>
        </div>
        <!-- shop wrapper end -->
        <!--Pjesa e butonave -->

    </div>
</section>

<script>
    var li_links = document.querySelectorAll(".links ul li");
    var view_wraps = document.querySelectorAll(".view_wrap");
    var list_view = document.querySelector(".list-view");
    var grid_view = document.querySelector(".grid-view-1");

    li_links.forEach(function(link) {
        link.addEventListener("click", function() {
            li_links.forEach(function(link) {
                link.classList.remove("active");
            })

            link.classList.add("active");

            var li_view = link.getAttribute("data-view");

            view_wraps.forEach(function(view) {
                view.style.display = "none";
            })

            if (li_view == "list-view") {
                list_view.style.display = "block";
            } else {
                grid_view.style.display = "block";
            }
        })
    })


    const archiveOrderby = document.getElementById('orderby');
    const archiveOrder = document.getElementById('order');

    if (archiveOrderby && archiveOrder) {

        const setOrder = () => {

            const orderBy = archiveOrderby.options[archiveOrderby.selectedIndex].value;

            if ('title' === orderBy) {
                archiveOrder.value = 'ASC';
            } else {
                archiveOrder.value = 'DESC';
            }

        }
        archiveOrderby.addEventListener('change', setOrder);
        setOrder();
    }
</script>
<?php
get_footer();
?>