<?php
get_header();
if (have_posts()) :
  while (have_posts()) : the_post();
?>
    <section class="w-full bg-white">
      <div class="container max-w-screen-xl px-2 py-2 mx-auto lg:py-22 lg:px-3">
        <!-- breadcrum -->
        <div class="py-4 container flex gap-3 items-center">
          <a href="home" class="text-orange-400 text-base">
            <i class="fas fa-home"></i>
          </a>
          <span class="text-sm text-gray-400"><i class="fas fa-chevron-right"></i></span>
          <a href="recipe" class="text-primary text-gray-400 font-medium uppercase">
            Recipe
          </a>
          <span class="text-sm text-gray-400"><i class="fas fa-chevron-right"></i></span>
          <p class="text-gray-600 font-medium uppercase"><?= the_title() ?></p>
        </div>
        <!-- breadcrum end -->
        <!-- product view -->
        <div class="container pt-4 pb-6 grid lg:grid-cols-2 gap-6">
          <!-- product image -->
          <div>
            <div>
              <img id="main-img" class="w-full" src="<?= the_post_thumbnail('small') ?>
            </div>
          </div>
          <!-- product image end -->
          <!-- product content -->
          <div>
            <h2 class=" md:text-3xl text-2xl font-medium uppercase mb-2"><?= the_title(); ?></h2>
              <div class="flex items-center mb-4">
                <div class="flex gap-1 text-sm text-yellow-400">
                  <span><i class="fas fa-star"></i></span>
                  <span><i class="fas fa-star"></i></span>
                  <span><i class="fas fa-star"></i></span>
                  <span><i class="fas fa-star"></i></span>
                  <span><i class="fas fa-star"></i></span>
                </div>
              </div>
              <div class="space-y-2">
                <p class="space-x-2">
                  <span class="text-gray-800 font-semibold">Post By: </span>
                  <span class="text-gray-600"><?php ucfirst(the_author()); ?></span>
                </p>
                <p class="space-x-2">
                  <span class="text-gray-800 font-semibold">Category: </span>
                  <?php
                  $terms = get_the_terms($post->ID, 'category');
                  foreach ($terms as $term) :
                  ?>
                    <span class="text-gray-600"><?php echo $term->name; ?></span>
                  <?php endforeach; ?>
                </p>
              </div>
              <!-- product share icons -->
              <div class="flex space-x-3 mt-4">
                <a href="#" class="text-gray-400 hover:text-gray-500 h-8 w-8 rounded-full border border-gray-300 flex items-center justify-center">
                  <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" class="text-gray-400 hover:text-gray-500 h-8 w-8 rounded-full border border-gray-300 flex items-center justify-center">
                  <i class="fab fa-twitter"></i>
                </a>
                <a href="#" class="text-gray-400 hover:text-gray-500 h-8 w-8 rounded-full border border-gray-300 flex items-center justify-center">
                  <i class="fab fa-instagram"></i>
                </a>
              </div>
              <!-- product share icons end -->
            </div>
            <!-- product content end -->
          </div>
          <!-- product view end -->
          <!-- product details and review -->
          <div class="container pb-16">
            <!-- detail buttons -->
            <h3 class="border-b border-gray-200 font-roboto text-gray-800 pb-3 font-medium">
              Recipe Details
            </h3>
            <!-- details button end -->

            <!-- details content -->
            <div class="lg:w-4/5 xl:w-3/5 pt-6">
              <div class="space-y-3 text-gray-600">
                <p>
                  <?= the_content() ?>
                </p>
              </div>
            </div>
            <!-- details content end -->
          </div>
          <!-- product details and review end -->

          <!-- related products -->
          <div class="container pb-16">
            <h2 class="text-2xl md:text-3xl font-medium text-gray-800 uppercase mb-6">related products</h2>
            <!-- product wrapper -->
            <div class="grid lg:grid-cols-4 sm:grid-cols-2 gap-6">
              <!-- single product -->
              <?php $the_query = new WP_Query('posts_per_page=4');
              while ($the_query->have_posts()) : $the_query->the_post(); ?>

                <!-- end Post -->
                <div class="group rounded bg-white shadow overflow-hidden">
                  <!-- product image -->
                  <div class="relative">
                    <img style="height:120px;"class="w-full" src="<?php echo the_post_thumbnail('small'); ?>
                  </div>
                  <!-- product image end -->
                  <!-- product content -->
                  <div class=" pt-4 pb-3 px-4">
                    <a href="view.html">
                      <h4 class="uppercase font-medium text-xl mb-2 text-gray-800 hover:text-primary transition">
                        <?= the_title(); ?>
                      </h4>
                    </a>
                    <div class="flex items-center">
                      <div class="flex gap-1 text-sm text-yellow-400">
                        <span:key="n"><i class="fas fa-star"></i></span>
                          <span:key="n"><i class="fas fa-star"></i></span>
                            <span:key="n"><i class="fas fa-star"></i></span>
                              <span:key="n"><i class="fas fa-star"></i></span>
                                <span:key="n"><i class="fas fa-star"></i></span>
                      </div>
                    </div>
                  </div>
                  <!-- product content end -->
                  <!-- product button -->
                  <a href="<?php the_permalink(); ?>" class="block w-full py-1 text-center text-white bg-amber-900 rounded-b hover:bg-orange-400 hover:text-white transition">
                    Read More
                  </a>
                  <!-- product button end -->
                </div>
                <!-- single product end -->
              <?php
              endwhile;
              ?>
            </div>
            <!-- product wrapper end -->
          </div>
          <!-- related products end -->
        </div>

    </section>
<?php
  endwhile;
endif;
?>
<?php
get_footer();
?>