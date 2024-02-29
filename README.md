# NDPS-Dev/aipay-corephp
Official AIPAY-CorePHP library of NTT DATA Payment Service.

## Prerequisites
- A minimum of PHP 7.3 upto 8.1

## Installation
- If your project using composer, run the below command   
   ```  
   composer require ndps/corephp:dev-main  
   ```
- If you are not using composer, download the latest release from the releases section. You should download the corephp.zip file from atomlite/corephp. And place in vendor folder.  

## How To Use It
- To open the payment popup, we need to call the JavaScript function **openPay()** from below JavaScript CDN.   

  **UAT**
  ```
  <script src="https://pgtest.atomtech.in/staticdata/ots/js/atomcheckout.js"></script>
  ```
  
  **PROD**
  ```
  <script src="https://psa.atomtech.in/staticdata/ots/js/atomcheckout.js"></script>
  ```
- To call the **openPay()** we need to pass the below details.
  ```
  <script>
        function openPay(){
            const options = {
            "atomTokenId": "11000000509998",
            "merchId": "65df273b53f05",
            "custEmail": "Test124@ndps.com",
            "custMobile": "9999999999",
            "returnUrl":"Your return URL for response handling"
            }
            let atom = new AtomPaynetz(options,'uat');
        }
    </script>
  ```
     **custEmail:** EmailID of the customer.   
     **custMobile:** Mobile Number of the customer.   
     **returnUrl:** The URL where the response will be posted by payment gateway.   
     **merchId:** Id of the merchant provided by NDPS.   
     **atomTokenId:** Call the **getAtomtokenId()** to get the atomTokenId.  
  ><em>Note: All five parameters are mandatory.</em>

- To call getAtomtokenId()

  ```
        include_once 'vendor/autoload.php';
        $transactionRequest = new \NDPS\TransactionRequest();

        $merchTxnId = uniqId();
        $merchId = "8952"; // Id provided by NDPS
        $custEmail = "Test@ndps.com";
        $custMobNo = "8989898989";
        $amount = "10.00";
        $returnURL = "http://localhost/AIPAY-CorePHP/response.php"; // Your return URL for response handling

        /*
        *Setting all values here
        */
        $transactionRequest->setMerchId($merchId);
        $transactionRequest->setPassword("Test@123");
        $transactionRequest->setMerchTxnId($merchTxnId);
        $transactionRequest->setMerchTxnDate("2021-09-04 20:46:00");
        $transactionRequest->setAmount($amount);
        $transactionRequest->setProduct("NSE");
        $transactionRequest->setCustAccNo("213232323");
        $transactionRequest->setTxnCurrency("INR");
        $transactionRequest->setCustEmail($custEmail);
        $transactionRequest->setCustMobile($custMobNo);
        $transactionRequest->setUDF1("udf1");
        $transactionRequest->setUDF2("udf2");
        $transactionRequest->setUDF3("udf3");
        $transactionRequest->setUDF4("udf4");
        $transactionRequest->setUDF5("udf5");
        $transactionRequest->setRequestEncypritonKey("A4476C2062FFA58980DC8F79EB6A799E");
        $transactionRequest->setResponseEncryptionKey("75AEF0FA1B94B3C10D4F5B268F757F11");
        $transactionRequest->setIsLive("false");

        //To get the atomTokenId
        $atomTokenId = $transactionRequest->getAtomtokenId(); 
  ```
  - To handle the respose part on return URL.
  - To handle the response use below function which will return the final response array.
  ```
       include_once 'vendor/autoload.php';
       $ndpsenc = new \NDPS\AtomAES();
   
       $respKey = "75AEF0FA1B94B3C10D4F5B268F757F11"; //Response Key provided by NDPS
       $data = $_POST['encData'];
       $decrypted = $ndpsenc->decrypt($data, $respKey, $respKey);
       $jsonData = json_decode($decrypted, true);
       print_r($jsonData);
  ```
  
  
