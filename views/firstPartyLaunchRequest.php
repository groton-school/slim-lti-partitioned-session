<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>First Party Launch Request</title>
</head>

<body>
  <div class="container">
    <h1>First Party Launch Request</h1>
    <button id="request">Request</button>
  </div>
  <script type="text/javascript">
    document.getElementById('request').addEventListener('click', () => {
      console.log('launching in first party context');
      const popup = window.open('', '_blank');
      popup.location.href = `https://${window.location.hostname}/lti/first-party-launch${window.location.search}`;
    });
  </script>
</body>

</html>