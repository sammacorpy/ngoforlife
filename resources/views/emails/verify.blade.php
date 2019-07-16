<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/bootstrap.css">

    <link rel="stylesheet" href="css/bootstrap-theme.css">

    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/signupstyle.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-offset-3 col-md-6">
            <div style="border:1px solid orange;padding:10px;margin-top:10px;margin-bottom:10px;color:#909090;"><h3>Verify your life account to access all our services</h3>
            <br>
            <br>
            Hello {{ $username }}!
            <br>
            <p>
            Thanks for using our services we promise to fullfill your every request, we are Life we decide future.
            verify your account to use best of our services and health tips.
            <br>
            <br>
            keep smiling<br>
            sammacorpy
            <br>
            </p>
            </div>
            <a href="http://localhost:8000/username/{{ $username }}/verify/{{ $seck }}" class="custombutton btncustom" style="width:150px;text-align:center;background-color:orange;display:inline-block;padding:10px;color:white;text-decoration:none;">Verify Now</a>
        </div>
    </div>
</div>


    <script src="https://code.jquery.com/jquery-3.2.1.min.js "></script>
    <script type="text/javascript " src="/js/bootstrap.js "></script>
</body>

</html>