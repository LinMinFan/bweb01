<?php
session_start();
date_default_timezone_set("ASia/Taipei");

class DB
{
    protected $dsn = "mysql:host=localhost;charset=utf8;dbname=bweb01";
    protected $user = "root";
    protected $pw = "";
    protected $table;
    protected $pdo;

    function __construct($table)
    {
        $this->table = $table;
        $this->pdo = new PDO($this->dsn, $this->user, $this->pw);
    }

    public function array_str($array)
    {
        foreach ($array as $key => $value) {
            $tmp[] = "`$key` = '$value'";
        }
        return $tmp;
    }

    public function q($sql)
    {
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id)
    {
        $sql = "SELECT * FROM $this->table";
        if (is_array($id)) {
            $tmp = $this->array_str($id);
            $sql = $sql . " WHERE " . join(" AND ", $tmp);
        } else {
            $sql = $sql . " WHERE `id` = " . $id;
        }
        //echo $sql;
        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }

    public function all(...$arg)
    {
        $sql = "SELECT * FROM $this->table";
        if (isset($arg[0])) {
            if (is_array($arg[0])) {
                $tmp = $this->array_str($arg[0]);
                $sql = $sql . " WHERE " . join(" AND ", $tmp);
            } else {
                $sql = $sql . $arg[0];
            }
        }
        if (isset($arg[1])) {
            $sql = $sql .  $arg[1];
        }
        //echo $sql;
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function del($id)
    {
        $sql = "DELETE FROM $this->table";
        if (is_array($id)) {
            $tmp = $this->array_str($id);
            $sql = $sql . " WHERE " . join(" AND ", $tmp);
        } else {
            $sql = $sql . " WHERE `id` = " . $id;
        }
        //echo $sql;
        return $this->pdo->exec($sql);
    }

    public function save($array)
    {
        if (isset($array['id'])) {
            $sql = "UPDATE $this->table SET";
            $tmp = $this->array_str($array);
            $sql = $sql . join(" , ", $tmp) . " WHERE `id` = " . $array['id'];
        } else {
            $sql = "INSERT INTO $this->table (`" . join("`, `", array_keys($array)) . "`) VALUES ('" . join("','", $array) . "')";
        }
        //echo $sql;
        return $this->pdo->exec($sql);
    }

    public function math($math, $col, ...$arg)
    {
        $sql = "SELECT $math($col) FROM $this->table";
        if (isset($arg[0])) {
            if (is_array($arg[0])) {
                $tmp = $this->array_str($arg[0]);
                $sql = $sql . " WHERE " . join(" AND ", $tmp);
            } else {
                $sql = $sql . $arg[0];
            }
        }
        if (isset($arg[1])) {
            $sql = $sql . " WHERE " . $arg[1];
        }
        //echo $sql;
        return $this->pdo->query($sql)->fetchColumn();
    }
}

function dd($array)
{
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}

function to($url)
{
    header("location:" . $url);
}

class Str
{

    public $table;
    public $header;
    public $thheader;
    public $addbtn;
    public $upbtn;

    function __construct($table)
    {
        $this->table = $table;

        switch ($table) {
            case 'title':
                $this->header = "網站標題管理";
                $this->td = ["網站標題", "替代文字"];
                $this->addbtn = "新增網站標題圖片";
                $this->addhdr = "新增標題區圖片";
                $this->addtd = ["標題區圖片:", "標題區替代文字:"];
                $this->updbtn = "更新圖片";
                $this->updhdr = "更新圖片";
                $this->updtd = "圖片";
                break;
            case 'ad':
                $this->header = "動態文字廣告管理";
                $this->td = "動態文字廣告管理";
                $this->addbtn = "新增動態文字廣告";
                $this->addhdr = "新增動態文字廣告";
                $this->addtd = "動態文字廣告";
                break;
            case 'mvim':
                $this->header = "動畫圖片管理";
                $this->td = "動畫圖片";
                $this->addbtn = "新增動畫圖片";
                $this->addhdr = "新增動畫圖片";
                $this->addtd = "動畫圖片";
                $this->updbtn = "更新動畫";
                $this->updhdr = "更新動畫";
                $this->updtd = "動畫";
                break;
            case 'image':
                $this->header = "校園映像資料管理";
                $this->td = "校園映像資料圖片";
                $this->addbtn = "新增校園映像圖片";
                $this->addhdr = "新增校園映像圖片";
                $this->addtd = "校園映像圖片";
                $this->updbtn = "更新圖片";
                $this->updhdr = "更新圖片";
                $this->updtd = "圖片";
                break;
            case 'total':
                $this->header = "進站總人數管理";
                $this->td = "進站總人數";
                break;
            case 'bottom':
                $this->header = "頁尾版權資料管理";
                $this->td = "頁尾版權資料";
                break;
            case 'news':
                $this->header = "最新消息資料管理";
                $this->td = "最新消息資料內容";
                $this->addbtn = "新增最新消息資料";
                $this->addhdr = "新增最新消息資料";
                $this->addtd = "最新消息資料";
                break;
            case 'admin':
                $this->header = "管理者帳號管理";
                $this->td = ["帳號","密碼"];
                $this->addbtn = "新增管理者帳號";
                $this->addhdr = "新增管理者帳號";
                $this->addtd =  ["帳號：","密碼：","確認密碼："];
                break;
            case 'menu':
                $this->header = "選單管理";
                $this->td = ["主選單名稱","選單連結網址","次選單數"];
                $this->addbtn = "新增主選單";
                $this->addhdr = "新增主選單";
                $this->addtd =  ["主選單名稱","選單連結網址"];
                $this->updbtn = "編輯次選單";
                $this->updhdr = "編輯次選單";
                $this->updtd = ["次選單名稱","次選單連結網址"];
                break;
    
            default:

                break;
        }
    }
}

$ad = new DB('ad');
$mvim = new DB('mvim');
$image = new DB('image');
$total = new DB('total');
$bottom = new DB('bottom');
$news = new DB('news');
$admin = new DB('admin');
$menu = new DB('menu');
$title = new DB('title');

if (!isset($_SESSION['login'])) {
    $logins = $total->find(1)['total'];
    $logins = $logins + 1;
    $num = ['id' => 1, 'total' => $logins];
    $total->save($num);
    $_SESSION['login'] = $logins;
}

//$id=['sh'=>1];
//$sql = " limit 0,2";
//$tmp=$ad->array_str($id);
//dd($tmp);
//dd($ad->all($sql));
?>