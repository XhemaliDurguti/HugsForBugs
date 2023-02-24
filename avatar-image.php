<?php
/*
    Template Name: Avatar-image
*/
get_header();
session_start();
if (!isset($_SESSION['login']) || !$_SESSION['login']) {
    echo "<script>window.location.href= 'sign-in'</script>";
}
global $wpdb;

$user = $_SESSION['username'];

if (isset($_POST["update"])) {

    $filename = $_FILES['image']["name"];
    $tempname = $_FILES["image"]["tmp_name"];
    // $folder = get_template_directory_uri().'/upload/'.$filename;
    $upload_dir = wp_upload_dir();
    $error = array();
    if(empty($filename)){
        $error['imageerror'] = "You not selected Image!!";
    }else {
        if ($filename) {
            move_uploaded_file($tempname, $upload_dir['basedir'] . '/upload/' . $filename);
            $table_name = 'user-sign-up';
            $data = array(
                'avatar' => $wpdb->escape($filename),
            );
            $where = array(
                'username' => $user,
            );

            $update = $wpdb->update($table_name, $data, $where);
            if ($update == 1) {
                $success = 'You profile Avatar update successfully!';
            } else {
                $error['imageerror'] = "Something went wrong,Please try Again!";
            }
        }
    }    
}
$sql = "SELECT * FROM `user-sign-up` where username='" . $user . "'";
$query = $wpdb->get_row($sql);
$uploads = wp_upload_dir();


?>
<section class="w-full bg-white">
    <div class="container max-w-screen-xl px-2 py-2 mx-auto lg:py-22 lg:px-6">
        <!-- breadcrum -->
        <div class="py-4 container flex gap-3 items-center">
            <a href="home" class="text-orange-400 text-base">
                <i class="fas fa-home"></i>
            </a>
            <span class="text-sm text-gray-400"><i class="fas fa-chevron-right"></i></span>
            <p class="text-gray-600 font-medium uppercase">My Profile Picture</p>
            <?php
            $sql = "SELECT * FROM `user-sign-up` where username='" . $user . "'";
            $query = $wpdb->get_row($sql);

            ?>
        </div>
        <!-- breadcrum end -->
        <div class="container lg:grid grid-cols-12 items-start gap-6 pt-4 pb-16">
            <!-- sidebar -->
            <?php
            include('profile-sidebar.php');
            ?>
            <!-- sidebar end -->
            <!-- account content -->
            <div class="col-span-9 grid md:grid-cols-3 gap-4 mt-6 lg:mt-0">
                <div class="col-span-9 shadow rounded px-6 pt-5 pb-7 mt-6 lg:mt-0">
                    <form method="post" enctype="multipart/form-data">
                        <h3 class="text-lg font-medium capitalize mb-4">
                            Profile Picture
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
                            <input type="hidden" name="id" value="<?php echo $query->id; ?>">
                            <div class="grid grid-cols-3 gap-4 flex items-center">
                                <div class="mb-4">
                                    <img src="<?php echo esc_url($uploads['baseurl']) . '/upload/' . $query->avatar; ?>" alt="" style="height:150px;">
                                </div>
                            </div>
                            <div class="grid sm:grid-cols-2 gap-4">
                                <div>
                                    <input type="file" name="image" class="input-box w-full block border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:ring-0 focus:border-yellow-900 placeholder-gray-400">
                                </div>
                            </div>
                            <div class="mt-6">
                                <button type="submit" name="update" class="px-6 py-2 text-center text-white bg-amber-900 border border-primary rounded hover:bg-orange-400 hover:text-primary transition uppercase font-roboto font-medium">
                                    Change Picture
                                </button>
                            </div>
                    </form>

                </div>
                <!-- account content end -->
            </div>
            <!-- account content end -->
        </div>
    </div>
</section>
<!-- Prej Ketu osht e ndrequn -->
<?php

get_footer();
?>