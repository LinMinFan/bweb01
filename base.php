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

    function __construct($table)
    {
        $this->table=$table;
        $this->pdo=new PDO($this->dsn,$this->user,$this->pw);
    }

    public function array_str($array)
    {
        $tmp = [];
        foreach ($array as $key => $value) {
            $tmp[] = "`$key` = '$value'";
        }
        return $tmp;
    }

    public function find($id)
    {
        $sql = "SELECT * FROM $this->table";
        if (is_array($id)) {
            $tmp= $this->array_str($id);
            $sql = $sql." WHERE ".join(" AND ", $tmp);
        } else {
            $sql = $sql." WHERE `id` = ".$id;
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
                $sql = $sql." WHERE ".join(" AND ", $tmp);
            } else {
                $sql = $sql.$arg[0];
            }
        }
        if (isset($arg[1])) {
            $sql = $sql.$arg[1];
        }
        //echo $sql;
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function del($id)
    {
        $sql = "DELETE FROM $this->table";
        if (is_array($id)) {
            $tmp = $this->array_str($id);
            $sql = $sql." WHERE ".join(" AND ", $tmp);
        } else {
            $sql = $sql . " WHERE `id` = " . $id;
        }
        return $this->pdo->exec($sql);
    }

    public function save($array)
    {
        if(isset($array['id'])){
            $sql = "UPDATE $this->table SET";
            $tmp = $this->array_str($array);
            $sql = $sql.join(",",$tmp)." WHERE `id` = ".$array['id'];
        }else {
            $sql = "INSERT INTO $this->table";
            $sql = $sql."(`".join("`, `",array_keys($array))."`) VALUES ('".
            join("','",$array)."')";
        }
        //echo $sql;
        return $this->pdo->exec($sql);
    }

    public function math($math,$col,...$arg)
    {
        $sql = "SELECT $math($col) FROM $this->table";
        if (isset($arg[0])) {
            if (is_array($arg[0])) {
                $tmp = $this->array_str($arg[0]);
                $sql = $sql." WHERE ".join(" AND ", $tmp);
            } else {
                $sql = $sql.$arg[0];
            }
        }
        if (isset($arg[1])) {
            $sql = $sql.$arg[1];
        }
        return $this->pdo->query($sql)->fetchColumn();
    }
}

class Str {
    public $table;
    public $hdr;
    public $htd;
    public $addbtn;
    public $adddr;
    public $addtd;
    public $upbtn;
    public $updr;
    public $uptd;

    function __construct($table)
    {
        $this->table=$table;
        switch ($table) {
            case 'title':
                $this->hdr="網站標題管理";
                $this->htd=["網站標題","替代文字"];
                $this->addbtn="新增網站標題圖片";
                $this->adddr="新增標題區圖片";
                $this->addtd=["標題區圖片","標題區替代文字"];
                $this->upbtn="更新圖片";
                $this->updr="更新圖片";
                $this->uptd="圖片";
                break;
            case 'ad':
                $this->hdr="動態文字廣告管理";
                $this->htd="動態文字廣告";
                $this->addbtn="新增動態文字廣告";
                $this->adddr="新增動態文字廣告";
                $this->addtd="動態文字廣告";
                break;
            case 'mvim':
                $this->hdr="動畫圖片管理";
                $this->htd="動畫圖片";
                $this->addbtn="新增動畫圖片";
                $this->adddr="新增動畫圖片";
                $this->addtd="動畫圖片";
                $this->upbtn="更換動畫";
                $this->updr="更換動畫";
                $this->uptd="動畫";
                break;
            case 'image':
                $this->hdr="校園映像資料管理";
                $this->htd="校園映像資料圖片";
                $this->addbtn="新增校園映像圖片";
                $this->adddr="新增校園映像圖片";
                $this->addtd="校園映像圖片";
                $this->upbtn="更換圖片";
                $this->updr="更換圖片";
                $this->uptd="圖片";
                break;
            case 'total':
                $this->hdr="進站總人數管理";
                $this->htd="進站總人數";
                break;
            case 'bottom':
                $this->hdr="頁尾版權資料管理";
                $this->htd="頁尾版權資料";
                break;
            case 'news':
                $this->hdr="最新消息資料管理";
                $this->htd="最新消息資料內容";
                $this->addbtn="新增最新消息資料";
                $this->adddr="新增最新消息資料";
                $this->addtd="最新消息資料";
                break;
            case 'admin':
                $this->hdr="管理者帳號管理";
                $this->htd=["帳號","密碼"];
                $this->addbtn="新增管理者帳號";
                $this->adddr="新增管理者帳號";
                $this->addtd=["帳號","密碼","確認密碼"];
                break;
            case 'menu':
                $this->hdr="選單管理";
                $this->htd=["主選單名稱","選單連結網址","次選單數"];
                $this->addbtn="新增主選單";
                $this->adddr="新增主選單";
                $this->addtd=["主選單名稱","選單連結網址"];
                $this->upbtn="編輯次選單";
                $this->updr="編輯次選單";
                $this->uptd=["次選單名稱","次選單連結網址"];
                break;
            
            default:
                # code...
                break;
        }
    }
}

function dd($array){
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}

function to($url){
    header("location:".$url);
}

$title=new DB('title');
$ad=new DB('ad');
$mvim=new DB('mvim');
$image=new DB('image');
$total=new DB('total');
$bottom=new DB('bottom');
$news=new DB('news');
$admin=new DB('admin');
$menu=new DB('menu');


if(!isset($_SESSION['total'])){
    $comes=$total->find(1);
    $comes['total']++;
    $total->save($comes);
    $_SESSION['total']=1;
}
?>