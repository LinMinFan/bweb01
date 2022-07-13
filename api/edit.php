<?php
include "../base.php";
$ids = $_POST['id'];
$table = $_POST['table'];
$dels = (isset($_POST['del']) ? $_POST['del'] : "");

//$$table base 物件
//dd($ids);    

//echo "table = ".$table;
//dd($texts);
//echo "sh = ".$sh;
//dd($dels);   

//$data['text'] =
//$data['sh'] =

if (!empty($ids)) {
    foreach ($ids as $key => $id) {
        //比對id是否存在$del有則刪除
        if (!empty($dels) && in_array($id, $dels)) {
            $$table->del($id);
        } else {
            //更新資料
            $data = $$table->find($id); //建立更新資料陣列
            //dd($data);
            switch ($table) {
                case 'title':
                    $data['text'] = $_POST['text'][$key];
                    $data['sh'] = (isset($_POST['sh']) && $id == $_POST['sh']) ? 1 : 0;
                    break;
                case 'ad':
                case 'news':
                    $data['text'] = $_POST['text'][$key];
                    $data['sh'] = (isset($_POST['sh']) && in_array($id, $_POST['sh'])) ? 1 : 0;
                    break;
                case 'mvim':
                case 'image':
                    $data['sh'] = (isset($_POST['sh']) && in_array($id, $_POST['sh'])) ? 1 : 0;
                    break;
                case 'admin':
                    $data['acc'] = $_POST['acc'][$key];
                    $data['pw'] = $_POST['pw'][$key];
                    break;
                case 'menu':
                    $data['text'] = $_POST['text'][$key];
                    $data['href'] = $_POST['href'][$key];
                    $data['sh'] = (isset($_POST['sh']) && in_array($id, $_POST['sh'])) ? 1 : 0;
                    break;
                    
                    default:
                    # code...
                    break;
                }
                $$table->save($data);
        }
    }
}

to("../back.php?do=$table");
