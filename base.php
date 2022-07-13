<?php
session_start();
date_default_timezone_set("Asia/Taipei");

class DB
{
    protected $dsn = "mysql:host=localhost;charset=utf8;dbname=bweb01";
    protected $user = "root";
    protected $pw = "";
    protected $table;
    protected $pdo;

    public function __construct($table)
    {
        $this->table = $table;
        $this->pdo = new PDO($this->dsn, $this->user, $this->pw);
    }

    public function q($sql)
    {
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function array_str($array)
    {
        foreach ($array as $key => $value) {
            $tmp[] = " `$key` = '$value' ";
        }
        return $tmp;
    }

    public function find($id)
    {
        $sql = "SELECT * FROM `$this->table`";
        if (is_array($id)) {
            $tmp = $this->array_str($id);
            $sql = $sql . " WHERE " . join(" AND ", $tmp);
        } else {
            $sql = $sql . " WHERE `id` = '$id'";
        }
        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }

    public function all(...$arg)
    {
        $sql = "SELECT * FROM `$this->table`";
        if (isset($arg[0])) {
            if (is_array($arg[0])) {
                $tmp = $this->array_str($arg[0]);
                $sql = $sql . " WHERE " . join(" AND ", $tmp);
            } else {
                $sql = $sql . $arg[0];
            }
        }
        if (isset($arg[1])) {
            $sql = $sql . $arg[1];
        }
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function del($id)
    {
        $sql = "DELETE FROM `$this->table`";
        if (is_array($id)) {
            $tmp = $this->array_str($id);
            $sql = $sql . " WHERE " . join(" AND ", $tmp);
        } else {
            $sql = $sql . " WHERE `id` = '$id'";
        }
        return $this->pdo->exec($sql);
    }

    public function save($array)
    {
        if (isset($array['id'])) {
            $sql = "UPDATE `$this->table` SET";
            foreach ($array as $key => $value) {
                if ($key != "id") {
                    $tmp[] = "`$key` = '$value'";
                }
            }
            $sql = $sql . join(" , ", $tmp) . " WHERE `id` = '{$array['id']}'";
        } else {
            $sql = "INSERT INTO `$this->table` (`" . join("`, `", array_keys($array)) . "`) VALUES ('" . join("','", $array) . "')";
        }
        echo $sql;
        return $this->pdo->exec($sql);
    }

    public function math($math, $col, ...$arg)
    {
        $sql = "SELECT $math($col) FROM `$this->table`";
        if (isset($arg[0])) {
            if (is_array($arg[0])) {
                $tmp = $this->array_str($arg[0]);
                $sql = $sql . " WHERE " . join(" AND ", $tmp);
            } else {
                $sql = $sql . $arg[0];
            }
        }
        if (isset($arg[1])) {
            $sql = $sql . $arg[1];
        }
        return $this->pdo->query($sql)->fetchColumn();
    }
}

class Str
{
    public $table;
    public $header;
    public $tdheader;
    public $updatebtn;
    public $addmodalbtn;
    public $modalheader;
    public $modalimgtext;
    public $modaltext;

    public function __construct($table)
    {
        $this->table = $table;
        switch ($table) {
            case 'title':
                $this->header = "網站標題管理";
                $this->tdheader = ["網站標題", "替代文字"];
                $this->updatebtn = "更新圖片";
                $this->addmodalbtn = "新增網站標題圖片";
                $this->addmodalheader = "新增網站標題圖片";
                $this->addmodalimg = "標題區圖片";
                $this->addmodaltext = "標題區替代文字";
                $this->uploadheader = "更新網站標題圖片";
                $this->uploadimgtext = "標題區圖片";
                break;
            case 'ad':
                $this->header = "動態文字廣告管理";
                $this->tdheader = "動態文字廣告";
                $this->addmodalbtn = "新增動態文字廣告";
                $this->addmodalheader = "新增動態文字廣告";
                $this->addmodaltext = "動態文字廣告";
                break;
            case 'mvim':
                $this->header = "動畫圖片管理";
                $this->tdheader = "動畫圖片";
                $this->updatebtn = "更換動畫";
                $this->addmodalbtn = "新增動畫圖片";
                $this->addmodalheader = "新增動畫圖片";
                $this->addmodalimg = "動畫圖片";
                $this->uploadheader = "更換動畫圖片";
                $this->uploadimgtext = "動畫圖片";
                break;
            case 'image':
                $this->header = "校園映像資料管理";
                $this->tdheader = "校園映像圖片";
                $this->updatebtn = "更換圖片";
                $this->addmodalbtn = "新增校園映像圖片";
                $this->addmodalheader = "新增校園映像圖片";
                $this->addmodalimg = "校園映像圖片";
                $this->uploadheader = "更校園映像圖片";
                $this->uploadimgtext = "校園映像圖片";
                break;
            case 'total':
                $this->header = "進站總人數管理";
                $this->addmodalheader = "進站總人數管理";
                $this->addmodaltext = "進站總人數";
                break;
            case 'bottom':
                $this->header = "頁尾版權資料管理";
                $this->addmodalheader = "頁尾版權資料管理";
                $this->addmodaltext = "頁尾版權資料";
                break;
            case 'news':
                $this->header = "最新消息資料管理";
                $this->tdheader = "最新消息資料內容";
                $this->addmodalbtn = "新增最新消息資料";
                $this->addmodalheader = "新增最新消息資料";
                $this->addmodaltext = "最新消息資料";
                break;
            case 'admin':
                $this->header = "管理者帳號管理";
                $this->tdheader = ["帳號", "密碼"];
                $this->addmodalbtn = "新增管理者帳號";
                $this->addmodalheader = "新增管理者帳號";
                $this->addmodaltext = ["帳號", "密碼", "確認密碼"];
                break;
            case 'menu':
                $this->header = "選單管理";
                $this->tdheader = ["主選單名稱", "選單連結網址","次選單數"];
                $this->updatebtn = "編輯次選單";
                $this->addmodalbtn = "新增主選單";
                $this->addmodalheader = "新增主選單";
                $this->addmodaltext = ["主選單名稱","主選單連結網址"];
                $this->uploadheader = "編輯次選單";
                $this->uploadimgtext = ["次選單名稱","次選單連結網址"];
                $this->uploadimgbut = "更多次選單";
                break;
            default:
                # code...
                break;
        }
    }
}

function to($url)
{
    header("location:" . $url);
}

function dd($array)
{
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}

$ad = new DB('ad');
$admin = new DB('admin');
$bottom = new DB('bottom');
$image = new DB('image');
$menu = new DB('menu');
$mvim = new DB('mvim');
$news = new DB('news');
$title = new DB('title');
$total = new DB('total');

if(!isset($_SESSION['total'])){
    $totals=$total->find(1);
    $totals['total']++;
    $total->save($totals);
    $_SESSION['total']=$totals['total'];
}