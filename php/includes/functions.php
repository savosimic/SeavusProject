<?php

    function getData()
    {
         require_once "connection.php";

          $response = file_get_contents('https://restcountries.eu/rest/v2/all');
          $response = json_decode($response);

          $results = [];
          foreach ($response as $key => $value) {
              $results[$key]['name'] = $value->name;
              $results[$key]['region'] = $value->region;
              $results[$key]['population'] = $value->population;
              $results[$key]['flag'] = $value->flag;
          }

          return $results;

    }

    function getFavorites($user)
    {
        require_once "connection.php";

        $query = "SELECT * FROM countries
        INNER JOIN favorites ON countries.id = favorites.country_id
        INNER JOIN users ON users.id = favorites.user_id WHERE favorites.user_id = $user";
        $result = mysqli_query($conn, $query);

        $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

        return $rows;
    }

    function getComments($countryId)
    {
        require "connection.php";

        $query = "SELECT * FROM comments WHERE country_id = $countryId";
        $result = mysqli_query($conn, $query);

        $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

        return $rows;
    }

    function getUsers()
    {
        require "connection.php";

        $query = "SELECT * FROM users";
        $result = mysqli_query($conn, $query);

        $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

        return $rows;
    }

    function getCountries()
    {
        require "connection.php";

        $query = "SELECT * FROM countries";
        $result = mysqli_query($conn, $query);

        $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

        return $rows;
    }

    function initCountries()
    {
        require "connection.php";

        $query = "SELECT * FROM `countries`";
        $result = mysqli_query($conn, $query);

        $rows = mysqli_num_rows($result);
        if ($rows == 0) {
             $results = getData();
             foreach ($results as $result) {
                 $name = "\"" .$result['name'] . "\"";
                 $region = "\"" . $result['region'] . "\"";
                 $population = $result['population'];
                 $flag = "\"" . $result['flag'] . "\"";

                 $sql = "INSERT INTO countries(name, region, population, flag) VALUES($name, $region, $population, $flag)";

                 $query = mysqli_query($conn, $sql);
                 if ($query) {
                     // echo 1;
                 } else {
                     echo "Something went wrong!";
                 }
             }
         }
     }

?>
