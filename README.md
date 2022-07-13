# 題組一解題步驟

## 共同項目

### 預備時間

* 鍵盤、滑鼠、螢幕設備檢查
* xmpp安裝
* vscode安裝
* 題組資料備份
* 建立資料夾
* 測試localhost
* 建立base檔
* 資料庫連線測試
* 建立css資料夾
* 建立js資料夾
* 建立api資料夾

### 解題順序

* 整理檔案
    * 建立img資料夾
    * 建立icon資料夾
    * 建立index.php
    * 建立back.php
    * 修改css、js連結路徑
    * 抽出網站標題header.php
    * 抽出頁尾版權footer.php
    * 建立front資料夾抽出內容class=di區塊
        * 建立main.php
        * 建立login.php
        * 建立news.php

    * 建立back資料夾抽出標題管理至form表單結束區塊
        * 建立title.php(優先處理,其他分頁待title完成後複製貼上)
        * ad.php
        * admin.php
        * bottom.php
        * image.php
        * menu.php
        * mvin.php
        * news.php
        * total.php

    * 建立modal資料夾抽出存放後台新增按鈕彈出視窗
        * 建立建立title.php(優先處理,其他分頁待title完成後複製貼上)
        * ad.php
        * admin.php
        * bottom.php
        * image.php
        * menu.php
        * mvin.php
        * news.php
        * total.php
        * upload.php(處理更新資)
        
    * 建立sql資料表

        * title

        |名稱|類型|屬性|預設值|額外資訊|備註|
        |--|--|--|--|--|--|
        |id|int|UNSIGNED|--|AI|--|
        |img|varchar|--|--|--|--|
        |text|varchar|--|--|--|--|
        |sh|int|--|--|--|--|

        * ad

        |名稱|類型|屬性|預設值|額外資訊|備註|
        |--|--|--|--|--|--|
        |id|int|UNSIGNED|--|AI|--|
        |text|varchar|--|--|--|--|
        |sh|int|--|--|--|--|

        * admin

        |名稱|類型|屬性|預設值|額外資訊|備註|
        |--|--|--|--|--|--|
        |id|int|UNSIGNED|--|AI|--|
        |acc|varchar|--|--|--|--|
        |pw|varchar|--|--|--|--|
        
        * bottom

        |名稱|類型|屬性|預設值|額外資訊|備註|
        |--|--|--|--|--|--|
        |id|int|UNSIGNED|--|AI|--|
        |bottom|varchar|--|--|--|--|

        * image

        |名稱|類型|屬性|預設值|額外資訊|備註|
        |--|--|--|--|--|--|
        |id|int|UNSIGNED|--|AI|--|
        |img|varchar|--|--|--|--|
        |sh|int|--|--|--|--|

        * menu

        |名稱|類型|屬性|預設值|額外資訊|備註|
        |--|--|--|--|--|--|
        |id|int|UNSIGNED|--|AI|--|
        |text|varchar|--|--|--|--|
        |href|varchar|--|--|--|--|
        |parent|int|UNSIGNED|--|--|--|
        |sh|int|--|--|--|--|

        * mvin

        |名稱|類型|屬性|預設值|額外資訊|備註|
        |--|--|--|--|--|--|
        |id|int|UNSIGNED|--|AI|--|
        |img|varchar|--|--|--|--|
        |sh|int|--|--|--|--|
        
        * news

        |名稱|類型|屬性|預設值|額外資訊|備註|
        |--|--|--|--|--|--|
        |id|int|UNSIGNED|--|AI|--|
        |text|varchar|--|--|--|--|
        |sh|int|--|--|--|--|
        
        * total

        |名稱|類型|屬性|預設值|額外資訊|備註|
        |--|--|--|--|--|--|
        |id|int|UNSIGNED|--|AI|--|
        |total|varchar|--|--|--|--|

* 連接資料表顯示頁尾版權

* modal/title.php完成新增網站標題功能

* back/title.php完成抓取sql新增資料並顯示
    * 網站標題 300px * 30px
    * 替代文字
    * 顯示
    * 刪除
    * 更新圖片

* 新增modal/upload.php、api/add.php、api/upload.php
    * 建立api/add.php
        * 判斷是否有$_FILES優先處理圖片上傳
        * 以switch處理不同資料表欄位
        * 完成新增資料功能
    * 建立api/edit.php
        * 先判斷是否有id要刪除再建立陣列更新資料
        * 以switch處理不同資料表欄位
        * 完成修改功能
    * 建立api/upload.php
        * 判斷是否有$_FILES
        * 完成更新圖片功能

* 建立Str類別管理後台文字 
    * 完成網站標題管理文字

* 複製back/title.php建立ad.php動態文字廣告管理
    * 修改back/ad.php欄位
    * 完成動態文字廣告管理欄位&文字顯示部分
    * sh顯示變更checkbox
    * 複製modal/title.php建立ad.php
        * 完成欄位&文字修改
    * api/add.php增加ad表單switch
        * 完成新增
    * api/edit.php增加ad表單switch
    * 完成動態文字廣告管理

* 複製back/title.php建立mvim.php動畫圖片管理
    * 修改back/mvim.php欄位
    * 完成動畫圖片管理欄位&文字顯示部分
    * sh顯示變更checkbox
    * 複製modal/title.php建立mvim.php
        * 完成欄位&文字修改
    * api/add.php增加mvim表單switch
        * 完成新增
    * api/edit.php增加mvim表單switch
    * 完成畫圖片管理

* 複製back/mvim.php建立image.php校園映像資料管理
    * 修改back/image.php欄位
    * 完成校園映像資料管理欄位&文字顯示部分
    * sh顯示變更checkbox
    * 複製modal/mvim.php建立image.php
        * 完成欄位&文字修改
    * api/add.php增加image表單switch
        * 完成新增
    * api/edit.php增加image表單switch
    * 建立分頁
    * 完成校園映像資料管理

* 複製modal/ad.php建立back/total.php進站總人數管理
    * 修改back/total.php欄位
        * 完成欄位&文字修改
    * 複製upload.php建立update.php
        * 處理更新人數管理資料
    * 完成進站總人數管理

* 複製back/total.php建立bottom.php進站總人數管理
    * 修改back/bottom.php欄位
        * 完成欄位&文字修改
        * 處理更新頁尾版權資料
        * base.php建立if(!isset($_SESSION['total']))判斷進入網頁人次+1
    * 完成頁尾版權資料

* 複製back/ad.php建立back/news.php最新消息資料管理
    * 修改back/news.php
        * 完成欄位&文字修改
    * 複製modal/ad.php建立news.php
        * input修改為textarea
    * api/add.php增加news表單switch
        * 完成新增
    * api/edit.php增加news內容與ad相同表單switch
    * 複製image分頁
        * 修改顯示筆數為每頁5筆
    * 完成最新消息資料管理

* 複製back/ad.php建立back/admin.php管理者帳號管理
    * 修改back/admin.php欄位
        * 完成欄位&文字修改
    * 複製modal/ad.php建立admin.php
        * input:type修改為password
        * 完成欄位&文字修改
    * api/add.php增加admin表單switch
        * 完成新增
    * api/edit.php增加admin表單switch
    * 完成管理者帳號管理

* 複製back/title.php建立menu.php選單管理
    * 修改back/menu.php欄位
        * input:text、href、parent、sh，button
        * 次選單數math(count,id,[parent => parent_id] 
    * 完成動態文字廣告管理欄位&文字顯示部分
    * 複製modal/title.php建立menu.php新增主選單
        * 完成欄位&文字修改
    * api/add.php增加menu表單switch
        * 完成新增
    * api/edit.php增加menu表單switch
    * 建立modal/edit_sub.php編輯次選單  
        * 以$_GET[id]取得parent_id並用foereach列出
        * 新增更多次選單button
        * 綁定onclick more(); 增加input欄位text2[] , href2[]
        * 新增api/edit_sub.php處理新增刪除更新次選單
        * 依據id判斷是否刪除
        * 依據parent_id判斷是否更新
        * 依據是否有text2[], href2[]判斷是否新增
        * 完成編輯次選單
    * 完成選單管理

* 處理前台顯示部分

    * 動態文字廣告將marquee抽出為marquee.php並用inculd插入
        * 抓取ad表單sh==1資料顯示於動態文字廣告區

    * 動畫圖片輪播區顯示輪播動畫
        * 抽出front內main.php
        * 將js Array() 及 ww() 移至 div class="cent" 沒有資料 下方 
        * 使用抓取mvin表單sh==1資料
        * 使用foreach + js push ./img/mvim[img]至 lin陣列
        * now = 0下方 呼叫ww()
    
    * 校園景觀圖片並顯示於校園映像區
        * 前台顯示大小150*103
        * 保持顯示3張 超過不放可用icon上下控制
        * 右側校園映像區建立div*3上下放icon中間foreach跑圖片
        * 抓取image內sh==1所有圖片
        * 使用內建js function 圖片id加上ssaa<索引值>及class加上im
        * 上下onclick事件使用pp(1,2),修改pp()num=sh的count數
        * 修改pp(2)公式(nowpage+1)<=(num-3)

    * 顯示最新消息5則,超過顯示More…超連結文字
        * 抽出front內main.php
        * 最新消息區span下方
        * 抓取news內sh==1所有text並計算總數量若大於5則顯示More…
        * More的連結為?do=news
        * 消息區ul下foreach顯示li及前5文字並使用mb_substr取前20字
        * li下再增加一span並將完整text寫入加上class=all及display設定為none
    
    * 處理front/news.php更多最新消息區
        * marquee用include引入
        * 更多最新消息下加上hr
        * 複製front/main.php最新消息區並移除More
        * 複製分頁功能貼上並修改div為5
        * news->all()條件改為" limit $start,$div"
        * 將ul改成ol並給予起始參數為$start+1

    * 點選管理登入，顯示管理登入頁面?do=login
        * 管理登入按鈕若有session變更為返回管理並將連結變更back.php否則顯示登入
        * login頁面若有session返回管理back.php
        * marquee用include引入
        * 建立api/login.php處理登入
        * 使用math(count,id,acc=> pw=>)檢查
        * 1為admin 前往back.php 0為 js alert 帳號密碼錯誤
        * 建立api/logout.php處理登出
        * back.php登出前往api/logout.php並unset($_SESSION['login'])後回index.php

    * 主選單區內顯示由後台管理程式所設定之主選單及次選單
        * 抓取全部parent=0 sh=1 之主選單顯示於管理區
        * 使用foreach列出div class=mainmu 及a.href=href
        * 抓取sh==1 主選單之次選單 使用foreach列出div class=mw及div class=mainmu2
        * 順序為mainmu>a mw>mainmu2>a

* 完成所有模組 依剩餘時間判斷是否處理美化       