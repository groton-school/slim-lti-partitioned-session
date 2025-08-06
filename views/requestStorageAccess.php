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
        <h1>Request Storage Access</h1>
        <button id="request">Request</button>
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