<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>First Party Launch</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1>Partitioned Session Cookies</h1>
        <p>In order for this app to work properly, it needs to be able to store information about the session that you are starting using <a href="https://en.wikipedia.org/wiki/Third-party_cookies" target="_blank">third party cookies</a>, a technology associated with user-tracking on the web. Your browser (correctly) <a href="https://www.cookiestatus.com/" target="_blank">restricts the use of these cookies,</a> so we need you to give permission for this app to use them. THis will take place in three steps:</p>
        <ol>
            <li style="text-decoration: line-through">Launch the app in a first-party context</li>
            <li>Engage with the app in the first-party context</li>
            <li>Give explict permission to the app to store partitioned third-party cookies.</li>
        </ol>
        <button class="btn btn-primary" id="request">Engage with the app in the first-party context</button>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
    <script type="text/javascript">
        document.getElementById('request').addEventListener('click', () => {
            window.opener.location.href = `https://${window.location.hostname}/lti/request-storage-access${window.location.search}`;
            window.close();
        });
    </script>
</body>

</html>