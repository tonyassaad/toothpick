<!doctype html>
<html>
    <script type="text/javascript">

        function fetchApi(){


      var myHeaders = new Headers();
      ///myHeaders.append("Authorization", "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvdXNlclwvbG9naW4iLCJpYXQiOjE2MDgxOTgwMDEsImV4cCI6MTYwODIyODAwMSwibmJmIjoxNjA4MTk4MDAxLCJqdGkiOiJ4NUFuSFFPZ0swQ2lsd0pzIiwic3ViIjoxLCJwcnYiOiI4N2UwYWYxZWY5ZmQxNTgxMmZkZWM5NzE1M2ExNGUwYjA0NzU0NmFhIn0.V-ih0hqVs8nK6W4nQ0S45ZdRKXyzodPIO87AEydkQDs");

      var urlencoded = new URLSearchParams();

      var requestOptions = {
        method: 'GET',
        headers: myHeaders,
        body: urlencoded,
        redirect: 'follow'
      };
console.log(myHeaders);

      fetch("https:api.no1draftpick.adcreatorsdemo.com.au", requestOptions)
        .then(response => response.text())
        .then(result =>console.log(result))
        .catch(error => console.log('error', error));
        }

          </script>
    <body>
        <form onsubmit="return false;">
          <div id="securepay-ui-container"></div>
          <button onclick="fetchApi();">fetch</button>

        </form>

  {{-- <script id="service-worker" src="https://js.pusher.com/beams/service-worker.js"></script> --}}



  </body>
</html>
