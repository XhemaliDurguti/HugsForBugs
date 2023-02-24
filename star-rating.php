<?php
/*
    Template Name: infoaccount
    */
get_header();
session_start();
if (!isset($_SESSION['login']) || !$_SESSION['login']) {
    echo "<script>window.location.href= 'sign-in'</script>";
}
global $wpdb;


$user = $_SESSION['username'];
//Select Data Information from Database
$sql = "SELECT * FROM `user-sign-up` where username='" . $user . "'";
$query = $wpdb->get_row($sql);
$uploads = wp_upload_dir();
if (isset($_POST['edit'])) {
    $namee = $wpdb->escape($_POST["n"]);
    $rating = $wpdb->escape($_POST["rating"]);
    $error = array();
    if (empty($namee)) {
        $error['ratingerror'] = 'Name of recipes is empty!';
    } else {
        $data = array(
            'name' =>  $namee,
            'rate' => $rating,
        );
        $table_name = 'ratee';

        $result = $wpdb->insert($table_name, $data, $format = NULL);
        if ($result == 1) {
            $success = 'Rating Successfully!';
        } else {
            echo 'Error';
        }
    }
}
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
<section class="w-full bg-white">
    <div class="container max-w-screen-xl px-2 py-2 mx-auto lg:py-22 lg:px-6">
        <!-- breadcrum -->
        <div class="py-4 container flex gap-3 items-center">
            <a href="" class="text-orange-400">
                <i class="fas fa-home"></i>
            </a>
            <span class="text-sm text-gray-400"><i class="fas fa-chevron-right"></i></span>
            <p class="text-gray-600 font-medium uppercase">Star Rating Recipes</p>
        </div>
        <!-- breadcrum end -->
        <div class="container lg:grid grid-cols-12 items-start gap-6 pt-4 pb-16">
            <!-- sidebar -->
            <?php
            include('profile-sidebar.php');
            ?>
            <!-- sidebar end -->
            <!-- account content -->
            <div class="col-span-9 shadow rounded px-6 pt-5 pb-7 mt-6 lg:mt-0">
                <form method="post">
                    <h3 class="text-lg font-medium capitalize mb-4">
                        Profile Information
                    </h3>
                    <?php
                    if (!empty($error)) {
                        foreach ($error as $err) {
                    ?>
                            <div class="relative px-4 py-3 leading-normal text-red-700 bg-red-100 rounded-lg mb-2" role="alert">
                                <span class="absolute inset-y-0 left-0 flex items-center ml-4">
                                    <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                        <path d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" fill-rule="evenodd"></path>
                                    </svg>
                                </span>
                                <p class="ml-6"><?php echo $err; ?></p>
                            </div>
                    <?php
                        }
                    }
                    ?>
                    <?php
                    if (!empty($success)) {
                    ?>
                        <div class="bg-green-100 rounded-lg py-5 px-6 mb-3 text-base text-green-700 inline-flex items-center w-full mb-2" role="alert">
                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check-circle" class="w-4 h-4 mr-2 fill-current" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path fill="currentColor" d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z"></path>
                            </svg>
                            <?php echo $success; ?>
                        </div>
                    <?php
                    }
                    ?>
                    <div class="space-y-4">

                        <div class="grid sm:grid-cols-2 gap-4">
                            <div>
                                <label class="text-gray-600 mb-2 block">
                                    Name Recipes
                                </label>
                                <input type="text" name="n" class="input-box w-full block border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:ring-0 focus:border-yellow-900 placeholder-gray-400">
                            </div>
                            <div>
                                <label class="text-gray-600 mb-2 block">
                                    Rating
                                </label>
                                <span class='result'>0</span>
                                <input type="hidden" name="rating">
                                <div class="rateyo" id="rating" data-rateyo-rating="4" data-rateyo-num-stars="5" data-rateyo-score="3">
                                </div>

                            </div>
                        </div>
                        <div class="mt-6">
                            <button type="submit" name="edit" class="px-6 py-2 text-center text-white bg-amber-900 border border-primary rounded hover:bg-orange-400 hover:text-primary transition uppercase font-roboto font-medium">
                                Send Rating
                            </button>
                        </div>
                </form>
            </div>
            <!-- account content end -->
        </div>
    </div>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>

<script>
    $(function() {
        $(".rateyo").rateYo().on("rateyo.change", function(e, data) {
            var rating = data.rating;
            $(this).parent().find('.score').text('score :' + $(this).attr('data-rateyo-score'));
            $(this).parent().find('.result').text('rating :' + rating);
            $(this).parent().find('input[name=rating]').val(rating); //add rating value to input field
        });
    });
</script>
<?php

get_footer();
?>