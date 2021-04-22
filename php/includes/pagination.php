
<?php

    require "includes/connection.php";
    $db=$conn;

    function currentPage() {
        if (isset($_GET['page']) && $_GET['page']!="") {
            $currentPage = validate($_GET['page']);
        } else {
            $currentPage = 1;
        }
       return $currentPage;
    }

    function validate($value) {
        $value = trim($value);
        $value = stripslashes($value);
        $value = htmlspecialchars($value);
        return $value;
    }

    function paginationRecords($totalRecordsPerPage,$tableName){
         global $db;
         $currentPage=currentPage();
         $totalPreviousRecords = ($currentPage-1) * $totalRecordsPerPage;
         $query = $db->prepare("SELECT * FROM ".$tableName." LIMIT ?, ?");
         $query->bind_param('ii',$totalPreviousRecords,$totalRecordsPerPage);
         $query->execute();
         $result=$query->get_result();
         if ($result->num_rows>0) {
            $row= $result->fetch_all(MYSQLI_ASSOC);

            return $row;

         } else {
            return $row=[];
         }
    }

    function paginationRecordsCounter($totalRecordsPerPage){
        $currentPage=currentPage();
        $totalPreviousRecords=($currentPage-1)*$totalRecordsPerPage;
        $dataCounter=$totalPreviousRecords + 1;

        return $dataCounter;
    }

    function previousPage() {
       $currentPage=currentPage();
       $previousPage = $currentPage - 1;

       if($currentPage > 1) {
         $previous="<a href='?page=" . $previousPage . "'> Previous </a>";

         return $previous;
       }
    }

    function nextPage($totalPages){
       $currentPage=currentPage();
       $nextPage = $currentPage + 1;

       if($currentPage < $totalPages) {
        $next="<a href='?page=" . $nextPage . "'> Next </a>";

        return $next;
      }
    }

    function paginationNumbers($totalPages) {
        $currentPage=currentPage();
        $adjacents = "2";
        $second_last = $totalPages - 1;
        $pagelink='';
        if ($totalPages <= 5) {
           for ($counter = 1; $counter <= $totalPages; $counter++) {
               if ($counter == $currentPage) {
                $pagelink.= "<a class='active'>" . $counter . " </a> ";
               } else {
                $pagelink.= "<a href='?page=" . $counter . "'>" . $counter . " </a> ";
                }
           }
        } elseif ($totalPages > 5) {
           if($currentPage <= 4) {
              for ($counter = 1; $counter < 8; $counter++) {
               if ($counter == $currentPage) {
                  $pagelink.= "<a class='active'" . $counter . "'>" . $counter . " </a> ";
                } else {
                     $pagelink.= "<a href='?page=" . $counter . "'>" . $counter . " </a> ";
                }
              }
              $pagelink.= "<a> ... </a>";
              $pagelink.= "<a href='?page=" . $second_last . "'>" . $second_last . " </a> ";
              $pagelink.= "<a href='?page=" . $totalPages . "'>" . $totalPages . " </a> ";
           } elseif ($currentPage > 4 && $currentPage < $totalPages - 4) {
                 $pagelink.= "<a href='?=1'> 1 </a>";
                 $pagelink.= "<a href='?page=2'> 2 </a> ";
                 $pagelink.= "<a> ... </a>";
                for (
                     $counter = $currentPage - $adjacents;
                     $counter <= $currentPage + $adjacents;
                     $counter++
                     ) {
                     if ($counter == $currentPage) {
                       $pagelink.= "<a class='active'>" . $counter . " </a> ";
                     } else {
                        $pagelink.= "<a href='?page=" . $counter . "'>" . $counter . " </a> ";
                     }
                }
                $pagelink.= "<a> ... </a>";
                $pagelink.= "<a href='?page=" . $second_last . "'>" . $second_last . " </a> ";
                $pagelink.= "<a href='?page=" . $totalPages . "'>" . $totalPages . " </a> ";
           } else {
                 $pagelink.= "<a href='?page=1'>  1 </a> ";
                 $pagelink.= "<a href='?page=2'> 2 </a> ";
                 $pagelink.= "<a> ... </a> ";
                for (
                     $counter = $totalPages - 6;
                     $counter <= $totalPages;
                     $counter++
                     ) {
                     if ($counter == $currentPage) {
                       $pagelink.= "<a class='active'>" . $counter . " </a> ";
                       }else {
                        $pagelink.= "<a href='?page=" . $counter . "'>" . $counter . " </a> ";
                       }
                }
          }
        }

        return $pagelink;

    }

    function pagination($totalRecordsPerPage,$tableName) {
       $currentPage=currentPage();
       global $db;
       $query ="SELECT * FROM ".$tableName;
       $result=$db->query($query);

       $totalRecords=$result->num_rows;
       $totalPages = ceil($totalRecords / $totalRecordsPerPage);
       $pagination='';
       $pagination.=previousPage();
       $pagination.=paginationNumbers($totalPages);
       $pagination.=nextPage($totalPages);

       return $pagination;
    }

?>
