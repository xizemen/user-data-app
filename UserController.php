<?php

/**
 * UserController class.
 *
 * This class receives outbound connections for user data insert requests.
 */
class UserController
{
    public function __construct()
    {
    }

    /**
     * This method will look for user data in $_POST.
     * As a result, user will be inserted into DB.
     *
     * @return void
     */
    public function post()
    {
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $phone_number = $_POST['phone_number'];
        $social_network_link = $_POST['social_network_link'];
        $subscription = $_POST['subscription'];

        $result = UserModel::createNewUser($first_name, $last_name, $email, $phone_number, $social_network_link, $subscription);
    }

    /**
     * This method will import a .json file, containing user data
     * As a result, user will be inserted into DB.
     *
     * @param $isNewDump
     * @return void
     */
    public function import($isNewDump = false)
    {
        $json_user_dump = file_get_contents($isNewDump ? "./user_new_dump.json" : "./user_dump.json");
        $user_array = json_decode($json_user_dump, true);

        $result = UserModel::importNewUser($user_array, $isNewDump);
    }
}

