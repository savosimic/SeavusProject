<?php

    $request = $_GET['request'];

    if ($request == 1) {
        require_once "connection.php";

        $data = json_decode(file_get_contents('php://input'));

        $userId = $data->user_id;
        $countryId = $data->country_id;

       $query = "SELECT * FROM `favorites` WHERE `country_id` = $countryId";
       $result = mysqli_query($conn, $query);

       $rows = mysqli_num_rows($result);
       if ($rows == 0) {
           $sql = "INSERT INTO `favorites` (user_id, country_id) VALUES($userId, $countryId)";
           if (mysqli_query($conn, $sql)) {
              echo "Successfuly added to favorites!";
           } else {
              echo 0;
           }
       } else {
            echo "You already saved this country as favorite.";
       }

      exit;
    }


    if ($request == 2) {
        require_once "connection.php";

        $data = json_decode(file_get_contents('php://input'));

        $userId = $data->user_id;
        $countryId = $data->country_id;

        $query = "SELECT  *  FROM  `favorites`  WHERE  `user_id` = $userId  AND  `country_id` = $countryId";
        $result = mysqli_query($conn, $query);

        $rows = mysqli_num_rows($result);
        if ($rows != 0) {
            $sql = "DELETE FROM `favorites`  WHERE  `user_id` = $userId  AND `country_id` = $countryId";

            if (mysqli_query($conn, $sql)) {
               echo "Successfuly deleted from favorites!";
            } else {
               echo "Something went wrong.";
            }
        } else {
          echo "no rows";
        }

      exit;
    }


    if ($request == 3) {
        require "connection.php";

        $data = json_decode(file_get_contents('php://input'));

        $userId = $data->user_id;
        $countryId = $data->country_id;
        $comment = "\"" . $data->comment . "\"";

        $sql = "INSERT INTO `comments` (user_id, country_id, description) VALUES($userId, $countryId, $comment)";
        if (mysqli_query($conn, $sql)) {
           $query = "SELECT description,created_at FROM `comments` WHERE `description` = $comment";
           $result = mysqli_query($conn, $query);
           $rows = mysqli_fetch_array($result);

          echo json_encode($rows);
        } else {
           echo 0;

        }

      exit;
    }

    if ($request == 4) {
      echo 'axios dd';
    }

?>
