<?php
get_header();
global $wpdb, $user_ID;

if ($_POST) {
    $name =  $wpdb->escape($_POST['fname']);
    $lastname = $wpdb->escape($_POST['lname']);
    $username = $wpdb->escape($_POST['username']);
    $email = $wpdb->escape($_POST['email']);
    $password = $wpdb->escape(md5($_POST['password']));
    $cpassword = $wpdb->escape(md5($_POST['password_confirmation']));


    $error = array();
    $success = array();
    if (empty($name) || empty($lastname) || empty($username) || empty($email) || empty($password) || empty($cpassword)) {
        $error['all'] = "All Fields Empty!";
    }
    if (strpos($name, ' ') !== FALSE) {
        $error['name'] = "Name can`t not use Space!";
    }
    if (empty($name)) {
        $error['name'] = "First name is empty!";
    }
    if ($name < 3) {
        $error['name'] = "First name is Short!";
    }
    if (empty($lastname)) {
        $error['lastname'] = "Last name is empty!";
    }
    if ($lastname < 3) {
        $error['lastname'] = "Last name is Short!";
    }
    if (strpos($username, ' ') !== FALSE) {
        $error['username_space'] = "Username has Space!";
    }
    if (empty($username)) {
        $error['username'] = "Username is empty!";
    }
    if (username_exists(sanitize_user($username))) {
        $error['username'] = "Username already exists!";
    }
    if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
        $error['email'] = "Email is Not Valid!";
    }
    if (empty($email)) {
        $error['email'] = "Email is empty!";
    }
    if (strcmp($password, $cpassword) !== 0) {
        $error['password'] = "Password didn`t match!";
    }
    if (count($error) == 0) {
        $data = array(
            'name' =>  $wpdb->escape($_POST['fname']),
            'surname' => $wpdb->escape($_POST['lname']),
            'username' => $wpdb->escape($_POST['username']),
            'email' => $wpdb->escape($_POST['email']),
            'password' => $wpdb->escape(md5($_POST['password'])),
        );
        $table_name = 'user-sign-up';

        $result = $wpdb->insert($table_name, $data, $format = NULL);

        if ($result == 1) {
            $success = 'You register successfully!';
            echo "<script>setTimeout(function(){ window.location.href = '" . home_url() . "/sign-in'; }, 3000);</script>";
        } else {
            $error['error'] = "Something went wrong,Please try Again!";
        }
    } else {
    }
}
?>
<div class="bg-orange-100 w-full flex items-center justify-center">
    <div class="w-full py-8">
        <div class="flex items-center justify-center space-x-2">
        </div>
        <div class="bg-orange-50 w-5/6 md:w-3/4 lg:w-2/3 xl:w-[500px] 2xl:w-[550px] mt-8 mx-auto px-16 py-8 rounded-lg shadow-2xl">

            <h2 class="text-center text-2xl font-bold text-orange-900 py-2">Sign Up</h2>
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
                    <?php echo $success; ?>-Back to <br /> <a href="#">Login</a>
                </div>
            <?php
            }
            ?>
            <form class="my-8 text-sm" method="POST">
                <div class=" flex flex-col my-4">
                    <label for="name" class="text-orange-900">Name</label>
                    <input type="text" name="fname" id="name" class="mt-2 p-2  border border-gray-300  focus:border-gray-300  text-gray-900" placeholder="Enter your name">
                </div>
                <div class="flex flex-col my-4">
                    <label for="name" class="text-orange-900">Lastname</label>
                    <input type="text" name="lname" id="lname" class="mt-2 p-2 border  border-gray-300 focus:border-gray-300  text-gray-900" placeholder="Enter your Lastname">
                </div>
                <div class="flex flex-col my-4">
                    <label for="name" class="text-orange-900">Username</label>
                    <input type="text" name="username" id="username" class="mt-2 p-2  border border-gray-300  focus:border-gray-300  text-gray-900" placeholder="Enter your username">
                </div>
                <div class="flex flex-col my-4">
                    <label for="email" class="text-orange-900">Email Address</label>
                    <input type="text" name="email" id="email" class="mt-2 p-2  border border-gray-300  focus:border-gray-300  text-gray-900" placeholder="Enter your email">
                </div>
                <div class="flex flex-col my-4">
                    <label for="password" class="text-orange-900">Password</label>
                    <div class="relative flex items-center mt-2">
                        <input :type=" show ? 'text': 'password' " name="password" id="password" class="flex-1 p-2 pr-10  border border-gray-300 focus:border-gray-300  text-gray-900" placeholder="Enter your password" type="password">
                    </div>
                </div>
                <div class="flex flex-col my-4">
                    <label for="password_confirmation" class="text-orange-900">Password Confirmation</label>
                    <div class="relative flex items-center mt-2">
                        <input :type=" show ? 'text': 'password' " name="password_confirmation" id="password_confirmation" class="flex-1 p-2 pr-10 border border-gray-300  text-gray-900" placeholder="Enter your password again" type="password">
                    </div>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" name="agre" id="agre" class="mr-2 focus:ring-0 rounded">
                    <label for="agre" class="text-orange-900">I accept the <a href="#" class="text-orange-600 hover:text-orange-600 hover:underline">terms</a></label>
                </div>
                <br>
                <div class="register">
                    <button type="submit" name="register" class="bg-orange-900 w-full text-gray-100 py-2 rounded-full hover:bg-orange-700">Register</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
get_footer();
?>