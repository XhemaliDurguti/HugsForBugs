<?php
/*
        Template Name: 404
    */
?>
<?php get_header(); ?>

<?php
$the_page    = null;
$errorpageid = get_option('404pageid', 0);

if ($errorpageid !== 0) {
    // Typecast to an integer
    $errorpageid = (int) $errorpageid;

    // Get our page
    $the_page = get_page($errorpageid);
}
?>
<style>
    .emoji-404 {

        position: relative;
        animation: mymove 2.5s infinite;
    }

    @keyframes mymove {
        33% {
            top: 0px;
        }

        66% {
            top: 20px;
        }

        100% {
            top: 0px
        }



    }
</style>
<div id="four-oh-four">
    <?php if ($the_page == NULL || isset($the_page->post_content) && trim($the_page->post_content == '')) : ?>
        <div class="flex h-[calc(100vh-50px)] items-center justify-center p-5 bg-white w-full">
            <div class="text-center">
                <div class="inline-flex rounded-full bg-yellow-100 p-4">
                    <div class="rounded-full stroke-orange-600 bg-yellow-200 p-4">
                        <img src="https://cdn.dribbble.com/users/406059/screenshots/1795025/media/9331d4e13898e54479bdc734478b3388.gif" class="rounded-full">
                    </div>
                </div>
                <h1 class="mt-5 text-[36px] font-bold text-slate-800 lg:text-[50px]">404 - Page not found</h1>
                <p class="text-slate-600 mt-5 lg:text-lg">The page you are looking for doesn't exist or <br />has been removed.</p>
            </div>
        </div>
    <?php else : ?>
        <?php echo apply_filters('the_content', $the_page->post_content); ?>
    <?php endif; ?>
</div>
<?php get_footer(); ?>