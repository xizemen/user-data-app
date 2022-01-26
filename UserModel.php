<?php

/**
 * UserModel class.
 *
 * Operates and saves user data to a DB.
 */
class UserModel
{
    /**
     * This method:
     * 1st - connects to a DB
     * 2nd - inserts a provided user data
     *
     * @param $first_name
     * @param $last_name
     * @param $email
     * @param $phone_number
     * @param $social_network_link
     * @param $subscription
     * @return mixed
     */
    public static function createNewUser($first_name, $last_name, $email, $phone_number, $social_network_link, $subscription)
    {
        $db_connection = new DbConnection();

        $db_connection->query("INSERT INTO users 
            (user_first_name, user_last_name, user_email, user_phone, user_social_link, user_subscription) 
            VALUES 
            (" . $first_name . " ," . $last_name . ", " . $email . ", " . $phone_number . ", " . $social_network_link . ", " . $subscription . ")");

        return $db_connection->lastInsertId();
    }

    /**
     * This method resolves user field names from $isNewDump boolean flag.
     *
     * @param array $userData
     * @param $isNewDump
     * @return int
     */
    public static function importNewUser(array $userData, $isNewDump = false)
    {
        if ($isNewDump) {
            $first_name = $userData['dump_user_name'];
            $last_name = $userData['dump_user_surname'];
            $email = $userData['dump_user_email_address'];
            $phone_number = $userData['dump_user_phone'];
            $social_network_link = $userData['dump_user_social_url'];
            $subscription = $userData['dump_user_subscription'];
        } else {
            $first_name = $userData['user_name'];
            $last_name = $userData['user_surname'];
            $email = $userData['user_email_address'];
            $phone_number = $userData['user_phone'];
            $social_network_link = $userData['user_social_url'];
            $subscription = $userData['user_billing_plan'];
        }

        return self::createNewUser($first_name, $last_name, $email, $phone_number, $social_network_link, $subscription);
    }
}