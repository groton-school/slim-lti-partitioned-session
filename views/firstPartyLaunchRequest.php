<div class="container">
  <h1>Partitioned Session Cookies</h1>
  <p>In order for this app to work properly, it needs to be able to store information about the session that you are starting using <a href="https://en.wikipedia.org/wiki/Third-party_cookies" target="_blank">third party cookies</a>, a technology associated with user-tracking on the web. Your browser (correctly) <a href="https://www.cookiestatus.com/" target="_blank">restricts the use of these cookies,</a> so we need you to give permission for this app to use them. THis will take place in three steps:</p>
  <ol>
    <li>Launch the app in a first-party context</li>
    <li>Engage with the app in the first-party context</li>
    <li>Give explict permission to the app to store partitioned third-party cookies.</li>
  </ol>
  <button class="btn btn-primary" id="request">Launch the app in a first-party context</button>
</div>
<script type="text/javascript">
  document.getElementById('request').addEventListener('click', () => {
    console.log('launching in first party context');
    const popup = window.open('', '_blank');
    popup.location.href = `https://${window.location.hostname}/lti/first-party-launch${window.location.search}`;
  });
</script>