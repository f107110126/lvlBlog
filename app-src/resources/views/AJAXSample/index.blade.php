<html>
<head>
    <title>Laravel Ajax示例</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
    </script>

    <script>
        function getMessage() {
            $.ajax({
                type: 'get',
                url: '{{ url('/getmsg') }}',
                data: '_token = @csrf',
                success: function (data) {
                    $("#msg").html(data.msg);
                }
            });
        }

        function setCookie(index = '', value = '') {
            $.ajax({
                type: 'post',
                url: '{{ url('/setCookie') }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    cName: index,
                    cValue: value
                },
                success: function (data) {
                    console.log(data);
                }
            });
        }

        function getCookie(index = '') {
            $.ajax({
                type: 'post',
                url: '{{ url('/getCookie') }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    cName: index
                },
                success: function (data) {
                    console.log(data);
                }
            });
        }
    </script>
</head>

<body>
<div id='msg'>这条消息将会使用Ajax来替换.
    点击下面的按钮来替换此消息.
</div>
<p>原文出自【易百教程】，商业转载请联系作者获得授权，非商业请保留原文链接：https://www.yiibai.com/laravel/laravel_ajax.html</p>
<form>
    <button type="button" onclick="getMessage();">換消息</button>
</form>
</body>

</html>

