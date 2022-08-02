<?php
session_start();
date_default_timezone_set("Asia/Taipei");

class db{
    protected $table;
    protected $pdo;
    protected $dsn="mysql:host=localhost;charset=utf8;dbname=bweb01;";

    function __construct($table)
    {
        $this->table=$table;
        $this->pdo=new PDO($this->dsn,"root","");
    }

    function array_str($array){
        $tmp=[];
        foreach ($array as $key => $value) {
            $tmp[]="`$key`='$value'";
        }
        return $tmp;
    }

    function find($id){
        $sql="SELECT * FROM $this->table WHERE ";
        if (is_array($id)) {
            $tmp=$this->array_str($id);
            $sql.=join(" && ",$tmp);
        }else {
            $sql.="`id`=".$id;
        }
        //echo $sql;    
        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }

    function all(...$arg){
        $sql="SELECT * FROM $this->table ";
        if (isset($arg[0])) {
            if (is_array($arg[0])) {
                $tmp=$this->array_str($arg[0]);
                $sql.=" WHERE ".join(" && ",$tmp);
            }else{
                $sql.= $arg[0];
            }
        }    
        if (isset($arg[1])) {
                $sql.= $arg[1];
            }
            //echo $sql;    
            return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        }
    

    function del($id){
        $sql="DELETE  FROM $this->table WHERE ";
        if (is_array($id)) {
            $tmp=$this->array_str($id);
            $sql.=join(" && ",$tmp);
        }else {
            $sql.="`id`=".$id;
        }
        //echo $sql;    
        return $this->pdo->exec($sql);
    }

    function save($array){
        if (isset($array['id'])) {
            $tmp=$this->array_str($array);
            $sql="UPDATE $this->table SET ".join(" , ",$tmp)." WHERE `id`=".$array['id'];
        }else {
            $sql="INSERT INTO $this->table (`".join("`, `",array_keys($array))."`) VALUES ('".join("','",$array)."')";
        }
        echo $sql;    
        return $this->pdo->exec($sql);
    }

    function math($math,$col,...$arg){
        $sql="SELECT $math($col) FROM $this->table ";
        if (isset($arg[0])) {
            if (is_array($arg[0])) {
                $tmp=$this->array_str($arg[0]);
                $sql.=" WHERE ".join(" && ",$tmp);
            }else{
                $sql.= $arg[0];
            }
        }    
            if (isset($arg[1])) {
                $sql.= $arg[1];
            }
            //echo $sql;    
            return $this->pdo->query($sql)->fetchColumn();
        
    }    


}

class str{
    public $table;
    public $hd;
    public $td;
    public $abtn;
    public $ahd;
    public $atd;
    public $ubtn;
    public $uhd;
    public $utd;

    function __construct($table)
    {
        $this->table=$table;
        switch ($table) {
            case 'title':
                $this->hd="網站標題管理";
                $this->td=['網站標題','替代文字'];
                $this->abtn="新增網站標題圖片";
                $this->ahd="新增標題區圖片";
                $this->atd=['標題區圖片：','標題區替代文字：'];
                $this->ubtn="更新圖片";
                $this->uhd="更新圖片";
                $this->utd="圖片：";
                break;
            case 'ad':
                $this->hd="動態文字廣告管理";
                $this->td="動態文字廣告";
                $this->abtn="新增動態文字廣告";
                $this->ahd="新增動態文字廣告";
                $this->atd="動態文字廣告：";
                break;
            case 'mvim':
                $this->hd="動畫圖片管理";
                $this->td="動畫圖片";
                $this->abtn="新增動畫圖片";
                $this->ahd="新增動畫圖片";
                $this->atd="動畫圖片：";
                $this->ubtn="更換動畫";
                $this->uhd="更換動畫";
                $this->utd="動畫：";
                break;
            case 'image':
                $this->hd="校園映像資料管理";
                $this->td="校園映像資料圖片";
                $this->abtn="新增校園映像圖片";
                $this->ahd="新增校園映像圖片";
                $this->atd="校園映像圖片：";
                $this->ubtn="更換圖片";
                $this->uhd="更換圖片";
                $this->utd="圖片：";
                break;
            case 'total':
                $this->hd="進站總人數管理";
                $this->td="進站總人數";
                break;
            case 'bottom':
                $this->hd="頁尾版權資料管理";
                $this->td="頁尾版權資料";
                break;
            case 'news':
                $this->hd="最新消息資料管理";
                $this->td="最新消息資料內容";
                $this->abtn="新增最新消息資料";
                $this->ahd="新增最新消息資料";
                $this->atd="最新消息資料：";
                break;
            case 'admin':
                $this->hd="管理者帳號管理";
                $this->td=['帳號','密碼'];
                $this->abtn="新增管理者帳號";
                $this->ahd="新增管理者帳號";
                $this->atd=['帳號：','密碼：','確認密碼：'];
                break;
            case 'menu':
                $this->hd="選單管理";
                $this->td=['主選單名稱','選單連結網址','次選單數'];
                $this->abtn="新增主選單";
                $this->ahd="新增主選單";
                $this->atd=['主選單名稱','選單連結網址','次選單數'];
                $this->ubtn="編輯次選單";
                $this->uhd="編輯次選單";
                $this->utd=['次選單名稱','次選單連結網址'];
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

$title=new db('title');
$total=new db('total');
$bottom=new db('bottom');
$ad=new db('ad');
$mvim=new db('mvim');
$image=new db('image');
$news=new db('news');
$admin=new db('admin');
$menu=new db('menu');

$sh=['sh'=>1];

if (!isset($_SESSION['log'])) {
    $ts=$total->find(1);
    $ts['total']++;
    $_SESSION['log']=1;
    $total->save($ts);
}

?>