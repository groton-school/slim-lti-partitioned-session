<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>First Party Launch</title>
</head>

<body>
    <div class="container">
        <h1>First Party Launch</h1>
        <button id="request">Close</button>
    </div>
    <script type="text/javascript">
        document.getElementById('request').addEventListener('click', () => {
            const search = new URLSearchParams(window.location.search);
            window.opener.location.href = `https://${window.location.hostname}/lti/request-storage-access${window.location.search}`;
            window.close();
        });
    </script>
</body>

</html>