<?php 

class Cabinet 
{

    public static function getUserHistory($id) 
    {

        $db = Db::getConnection();

        $userOrder = [];

        $result = $db->query("SELECT * FROM product_order WHERE user_id = $id");

        $i = 0;
        while ($row = $result->fetch()) {
            $userOrder[$i]['id'] = $row['id'];
            $userOrder[$i]['user_name'] = $row['user_name'];
            $userOrder[$i]['user_phone'] = $row['user_phone'];
            $userOrder[$i]['user_comment'] = $row['user_comment'];
            $userOrder[$i]['date'] = $row['date'];
            $userOrder[$i]['status'] = $row['status'];
            $i++;
        }

    }

}