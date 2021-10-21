<!doctype html>
<html>
  <body>
    <form onsubmit="return false;">
      <div id="securepay-ui-container"></div>
      <button onclick="mySecurePayUI.tokenise();">Submit</button>
      <button onclick="mySecurePayUI.reset();">Reset</button>

    </form>
     <script id="securepay-ui-js" src="https://payments-stest.npe.auspost.zone/v3/ui/client/securepay-ui.min.js"></script>

    <script type="text/javascript">


      var mySecurePayUI = new securePayUI.init({
        containerId: 'securepay-ui-container',
        scriptId: 'securepay-ui-js',
        clientId: '0oaxb9i8P9vQdXTsn3l5',
        merchantCode: '5AR0055',
        card: {
            allowedCardTypes: ['visa', 'mastercard'],
            showCardIcons: false,
            onCardTypeChange: function(cardType) {
              // card type has changed
            },
            onBINChange: function(cardBIN) {
              // card BIN has changed
            },
            onFormValidityChange: function(valid) {
              // form validity has changed
            },
            onTokeniseSuccess: function(tokenisedCard) {
                //Send this token along with the POST create payment   https://payments-stest.npe.auspost.zone/v2/payments

                console.log(tokenisedCard);
              // card was successfully tokenised or saved card was successfully retrieved
            },
            onTokeniseError: function(errors) {
              // tokenization failed
            }
        },

        style: {
          backgroundColor: 'rgba(150, 250, 200, 0.2)',
          label: {
            font: {
                family: 'Arial, Helvetica, sans-serif',
                size: '0.9rem',
                color: 'darkblue'
            }
          },
          input: {
           font: {
               family: 'Arial, Helvetica, sans-serif',
               size: '1.1rem',
               color: 'darkblue'
           }
         }
        },
        onLoadComplete: function () {
          // the UI Component has successfully loaded and is ready to be interacted with
        }
      });
    </script>
  </body>
</html>
