<!doctype html>
<html lang="EN">
    <head>
        <title>Ex2</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css" type="text/css">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script>
            function showCookie() {
                var cookies = document.cookie;
                if (cookies == '') {
                    strData = '<h3>Không có cookie nào ở thời điểm hiện tại</h3>';
                    document.getElementById("content").innerHTML = strData;
                } 
                else {
                    let listCookies = document.cookie.split(';');
                    let cookieString = '<ol>';
                    for (let i = 0; i < listCookies.length; i++) {
                        cookieString += '<li>' + listCookies[i] + '</li>';
                    }
                    cookieString += '</ol>';
                    document.getElementById("content").innerHTML = cookieString;
                }
            }
            function addCookie() {
                $.ajax({
                    // The link we are accessing.
                    url: "form/addform.php",
                        
                    // The type of request.
                    type: "get",
                        
                    // The type of data that is getting returned.
                    dataType: "html",
                    success: function( strData ) {
                        document.getElementById("content").innerHTML = strData;
                    }
                });
            }
            function submit_addcookie() {
                let key = $('#key').val();
                let value = $('#value').val();
                let exdays = $('#exdays').val();
                if (key == "") {
                    alert("Hãy điền vào mục key");
                }
                else if (value == "") {
                    alert("Hãy điền vào mục value");
                }
                else {
                    let date = new Date();
                    if (exdays != 0) {
                        date.setTime(date.getTime() + (exdays*24*60*60*1000));
                    }
                    else{
                        date.setTime(date.getTime() + (24*60*60*1000));
                    }
                    let addcok = key + '=' + value + '; expires=' + date;
                    document.cookie = addcok;
                    alert('Thêm cookie thành công');
                }
            }
            function delCookie() {
                $.ajax({
                    // The link we are accessing.
                    url: "form/delform.php",
                        
                    // The type of request.
                    type: "get",
                        
                    // The type of data that is getting returned.
                    dataType: "html",
                    success: function( strData ) {
                        document.getElementById("content").innerHTML = strData;
                        let listCookies = document.cookie.split(';');
                        let optionVal;
                        let optionText;
                        for (let i = 0; i < listCookies.length; i++) {
                            optionVal = listCookies[i].split('=')[0];
                            optionText = (i+1) + ': ' + listCookies[i];
                            $('#cookies').append('<option value="' + optionVal + '">' + optionText+'</option>');
                        }
                    }
                });
            }
            function submit_delform() {
                var keydel = $('#cookies').val();
                var date = new Date();
                date.setTime(date.getTime() + (-1000*24*60*60*1000));
                var delcookie = keydel + '=; expires=' + date;
                document.cookie = delcookie;
                alert("Xóa thành công");
                delCookie()
            }
            function submit_delformall() {
                var cookies = document.cookie.split(";");
                var date = new Date();
                date.setTime(date.getTime() + (-1000*24*60*60*1000));
                for (var i = 0; i < cookies.length; i++) {
                    var name = cookies[i];
                    document.cookie = name + "=;expires="+date;
                    document.cookie = name + ";expires="+date;
                }
                alert("Xóa tất cả thành công");
            }
            function updCookie() {
                $.ajax({
                    // The link we are accessing.
                    url: "form/updform.php",
                        
                    // The type of request.
                    type: "get",
                        
                    // The type of data that is getting returned.
                    dataType: "html",
                    success: function( strData ) {
                        document.getElementById("content").innerHTML = strData;
                        let listCookies = document.cookie.split(';');
                        let optionVal;
                        let optionText;
                        for (let i = 0; i < listCookies.length; i++) {
                            optionVal = listCookies[i].split('=')[0];
                            optionText = (i+1) + ': ' + listCookies[i];
                            $('#cookies').append('<option value="' + optionVal + '">' + optionText+'</option>');
                        }
                    }
                });
            }
            function submit_updform() {
                let keyUpdate = $('#cookies').val();
                let date = new Date();
                let exCookieUpdate = $('#dateUpdate').val();
                let valueUpdate = $('#valueUpdate').val();
                date.setTime(date.getTime() + (exCookieUpdate*24*60*60*1000));
                if (valueUpdate == 0) {
                    alert("Hãy điền value")
                }
                else if (exCookieUpdate == 0) {
                    let updateCookie = keyUpdate + '=' + valueUpdate;
                    document.cookie = updateCookie;
                    alert('Cập nhật thành công (chỉ cập nhật value)');
                } 
                else {
                    let updateCookie = keyUpdate + '=' + valueUpdate + '; expires=' + date;
                    document.cookie = updateCookie;
                    alert('Cập nhật thành công');
                }
                
            }
        </script>
        
        <style>
            #content{
                margin-top: 10px;
            }
            table{
                width: 100%;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <form>
                <input type="button" name="submit" id="submit1" value="Danh sách cookies" class="btn btn-primary" onclick="showCookie()">
                <input type="button" name="submit" id="submit2" value="Thêm cookies" class="btn btn-primary" onclick="addCookie()">
                <input type="button" name="submit" id="submit3" value="Cập nhật cookies" class="btn btn-primary" onclick="updCookie()">
                <input type="button" name="submit" id="submit4" value="Xóa cookies" class="btn btn-primary" onclick="delCookie()">
            </form>
        </div>
        <div class="container" id="content"></div>
    </body>
</html>