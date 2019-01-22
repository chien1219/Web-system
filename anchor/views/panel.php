<?php echo $header;?>

  <header class="wrap">
    <br/>
    <h1><?php echo __('<font face="Comic Sans MS">VEVE Database Manage System</font>', 'Welcome'); ?></h1>
    </br>
    <p><?php echo __('查詢時間的輸入格式 :&emsp;<font color="blue">20180101</font>', 'message'); ?></p>
    <p><?php echo __('若要查詢所有資料，在條件位留空。', 'message'); ?></p>
    <br/>
    
    <p><?php echo __('1. 選擇操作項目: ', 'function'); ?></p>
    <form action="<?php echo Uri::to('admin/panel_update'); ?>" method="POST">
    <select name="function" id="baseFunctionForm" style="margin-top: 10px">
        <option value="query">資料庫查詢功能</option>
        <option value="sendmail">發信功能</option>
    </select>
        <input type="submit" name="submit" style="margin-top: 10px; margin-left: 20px;"/>
    </form>
    <br/>    
     
    <script lang="JavaScript">functionForm();</script>
     
    <p><?php echo __('2. 選擇欲查詢之資料庫: ', 'db'); ?></p>
    <form action="<?php echo Uri::to('admin/panel_update'); ?>" id="dbForm" method="POST">
            <select name="db" style="margin-top: 10px">
            <option value="gamedb">GameDB</option>
            <option value="logdb">LogDB</option>
            <option value='accountdb'>AccountDB</option>
            </select>
            <input type="submit" name="submit" style="margin-top: 10px; margin-left: 20px;"/>    
    </form>
    </br>
    
    <!-- GM測試   對外版只有正式服-->
    <p><?php echo __('3. 選擇欲查詢之伺服器: ','server'); ?></p>
    <form action="<?php echo Uri::to('admin/panel_update'); ?>" method="POST">
    <select name="server" style="margin-top: 10px" onchange="">
        <option value="develop">開發機(僅限區網)</option>
        <option value="test">測試機</option>
        <option value="real">正式伺服器</option>
    </select>
        <input type="submit" name="submit" style="margin-top: 10px; margin-left: 20px;"/>
    </form>
     <br/>
  </header>

<?php echo $footer; ?>

<script lang="JavaScript">
    
    function functionForm(){
        delLast();
        var function = document.getElementById("baseFunctionForm").value;
                
        if (function === 'query')
        {
            var str="選擇欲查詢之資料庫:<br />""
            +"<select name=\"db\" style=\"margin-top: 10px\">"
            +"<option value=\"gamedb\">GameDB</option>"
            +"<option value=\"logdb\">LogDB</option>"
            +"</select>"
            +"<input type=\"submit\" name=\"submit\" style=\"margin-top: 10px; margin-left: 20px;\"/>";    
        
            document.all["dbForm"].insertAdjacentHTML("BeforeEnd",str);
        }
    }
    function delLast(){
       if(document.all["dbForm"])
       {
           eval("document.all[\"dbForm\"]").outerHTML = "";
       }
   }
</script>
 
  <!--
    <form action="<?php echo Uri::to('http://192.168.1.205/webmfp9/checkpurchase/checkpurchase_googleplayNew.php?accountId=donate1&roleDBID=26&tmpID=0&gameServerIP=192.168.1.151'); ?>" method="POST" align="start" style="margin-top:20px">
        <input type="hidden" name="receipt" value='{"json":"{\"orderId\":\"GPA.3375-6598-8393-04894\",\"packageName\":\"com.versus.veve\",\"productId\":\"pile.dia\",\"purchaseTime\":1531448016243,\"purchaseState\":0,\"developerPayload\":\"payload\",\"purchaseToken\":\"lgdpdojgebkjpcomaaeiegie.AO-J1Oz7qPOyXXhe-UJsBGG1aezm8lgBgioZ6T3cq8A7v1AMJyp35p91QrDYSW3sT43CgvCXv3EQ3kNtx58IADkycI9nmGLT2MauTNFVe-UVbStUoSv7Cgg\"}","signature":"WDhWnJP7TLmMzd1eq3UfRDsbZlWuMOazRFr6cr/V/AvOI4jOwa79U78eI9UC3gsinU73HBAAz7dioCtDY3rgtPw5/Sc634H+zemlVBF/evucWE89iIQqQtb4SroY5cuxPs5H/IrlAdmeDiJPFlGbiNDjtt0s782A+Mk2nee6WpX5b1LGy8WiREffQX+i4oV/tOb0OPARqIQaENGxKcOGffEzbsDWOpP++fWNQDVRBWNdPSbxutM8GAadIHkpzLgCH1tUCgW6L8cYxLiQel74oVZ0woiW4k/7BxBjWsVVodwKARE+Er4O8nQV3NOEY1eO1/Mqfr7w2lKv6aEYF7LD2A=="}'>
        <input type="submit" style="margin-top: 10px; margin-left: 20px;"/>
    </form>
    -->