<?php

use GrotonSchool\Slim\LTI\PartitionedSession\Actions\ThirdPartyCookieAction;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Request Storage Access</title>
</head>

<body>
    <div class="container">
        <h1>Partitioned Session Cookies</h1>
        <p>In order for this app to work properly, it needs to be able to store information about the session that you are starting using <a href="https://en.wikipedia.org/wiki/Third-party_cookies" target="_blank">third party cookies</a>, a technology associated with user-tracking on the web. Your browser (correctly) <a href="https://www.cookiestatus.com/" target="_blank">restricts the use of these cookies,</a> so we need you to give permission for this app to use them. THis will take place in three steps:</p>
        <ol>
            <li style="text-decoration: line-through">Launch the app in a first-party context</li>
            <li style="text-decoration: line-through">Engage with the app in the first-party context</li>
            <li>Give explict permission to the app to store partitioned third-party cookies.</li>
        </ol>
        <button id="request">Give explict permission to the app to store partitioned third-party cookies.</button>
    </div>
    <script type="text/javascript">
        document.getElementById('request').addEventListener('click', () => {
            document.requestStorageAccess({
                cookie: true
            }).then(() => {
                console.log('setting third party cookie');
                document.cookie = '<?= ThirdPartyCookieAction::COOKIE_NAME ?>=true; Path=/; MaxAge=3600; Secure; SameSite=None; Partitioned';
                window.location.href = `https://${window.location.hostname}/lti/third-party-cookies${window.location.search}`
            }).catch(console.error);
        });
    </script>
</body>

</html>