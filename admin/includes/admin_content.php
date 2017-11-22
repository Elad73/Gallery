<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Admin
                <small>Subheading</small>
            </h1>

            <?php

           /* $userId = 32;
            $user = User::find_by_id($userId);
            $str_result = "";

            if ($user) {
                $user->set_username("JustUpdated");
                $str_result = "<h3>User $userId has updated.</h3>";
            } else {
                $user = new User();
                $user->set_first_name("Jean");
                $user->set_last_name("Grey-Summers");
                $user->set_username("Phoenix");
                $user->set_password("1234");
                $str_result = "<h3>User " . $user->get_username() . ", ID ** ";
                $str_result .=  " has created.</h3>";

            }

            $user->save();
            echo str_replace("**", $user->get_id(),$str_result);
*/
/*
           $photos = Photo::find_all();

           foreach ($photos as $photo) {
               echo "<h4>" . $photo->get_description(). "</h4>";
           }*/

           $photo = new Photo();
           $photo->set_title("Just some test title");
           $photo->set_size(20);
           $photo->set_description("Another test description");
           $photo->set_type("png");

           $photo->create();



            ?>

            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i> <a href="index.php">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-file"></i> Blank Page
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

</div>


