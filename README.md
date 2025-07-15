## What is OxaPay?
OxaPay is a crypto payment gateway that enables businesses to accept payments in various cryptocurrencies securely.


### Installation (Laravel >= 7)

    composer require oxapay/oxapay

###  Service Provider & Facade (Laravel >= 11)

Add the service provider to `bootstrap/providers.php`

    Return [
	    // …
		OxaPay\OxaPay\Providers\OxaPayProvider::class, // OxaPay Package
	]

###  Service Provider & Facade (Laravel 7-10)
Add the service provider to `config/app.php`

    ‘providers’ => [
	    // …
	    OxaPay\OxaPay\Providers\OxaPayProvider::class, // OxaPay Package
	]

#### Publish Config

    php artisan vendor:publish --provider="OxaPay\OxaPay\Providers\OxaPayProvider"

After publishing the package, the **oxapay.php** file is available in the **config** folder. Inside the oxapay file in the config, you can define your api key values ​​in merchants, payouts, general, and use them in the project.
In the callback_url section you can set the callback_url address.
If a callback_url is set, it is used by default when sending the request.

> If you get the **SSL certificate problem** error, it is because SSL is not enabled on your localhost.
You can fix the problem in this thread. [Solution](https://stackoverflow.com/questions/29822686/curl-error-60-ssl-certificate-unable-to-get-local-issuer-certificate)
**This problem will not occur on the server.**


### Usage
First import the OxaPay Facade.
Then call the function inside the try, catch.
Some functions require a API-key. If a API-key is not passed to the function, it uses the default key from `config/oxapay.php` .

    use OxaPay\OxaPay\Facades\OxaPay;
    
    try {
	    $data = [...];
	    $apiKey = config('oxapay.merchants.key_2');
	    $result = OxaPay::generateInvoice($data);
		OR:
	    $result = OxaPay::generateInvoice($data, $apiKey);
	} catch (Exception $e) {  
		return response()->json(['error' => $e->getMessage()], $e->getCode());  
	}

### Functions & Exceptions
 - [Generate Invoice](#generate-invoice)
 - [Generate White Label](#generate-white-label)
 - [Generate Static Address](#generate-static-address)
 - [Revoking Static Address](#revoking-static-address)
 - [Static Address List](#static-address-list)
 - [Payment Information](#payment-information)
 - [Payment History](#payment-history)
 - [Accepted Currencies](#accepted-currencies)
 - [Generate Payout](#generate-payout)
 - [Payout Information](#payout-information)
 - [Payout History](#payout-history)
 - [Swap Request](#swap-request)
 - [Swap History](#swap-history)
 - [Swap Pairs](#swap-pairs)
 - [Swap Calculate](#swap-calculate)
 - [Swap Rate](#swap-rate)
 - [Account Balance](#account-balance)
 - [Prices](#prices)
 - [Supported Currencies](#supported-currencies)
 - [Supported Fiat Currencies](#supported-fiat-currencies)
 - [Supported Networks](#supported-networks)
 - [System Status](#system-status)
 - [Webhook](#webhook)
 - [Exceptions](#exceptions)



### Generate Invoice
This endpoint enables you to generate a new invoice and obtain a payment URL for completing the transaction. **[more info](https://docs.oxapay.com/api-reference/payment/generate-invoice)**

    $data = [  
	    "amount" => 37.5,  //required | decimal
	    "currency" => "TRX",  
	    "lifetime" => 50,  
	    "fee_paid_by_payer" => 0,  
	    "under_paid_coverage" => 0,  
	    "to_currency" => "usdt",  
	    "auto_withdrawal" => true,  
	    "mixed_payment" => true,  
	    "callback_url" => "https://www.your-website.com/oxapay/webhook",  
	    "return_url" => "https://www.your-website.com",  
	    "email" => "your-email@example.com",  
	    "order_id" => "your-order-id",  
	    "thanks_message" => "your thanks message",  
	    "description" => "your description",  
	    "sandbox" => false  
	];
	
	$apiKey = config('oxapay.merchants.key_2');
	$response = OxaPay::generateInvoice($data, $apiKey);


### Generate White Label

This endpoint allows you to generate white-labeled payment solutions. **[more info](https://docs.oxapay.com/api-reference/payment/generate-white-label)**


    $data = [  
    	"pay_currency" => "btc",  //required
		"amount" => 0.05,  //required | decimal
		"currency" => "usd",
		"network" => "btc",  
		"lifetime" => 60,  
		"fee_paid_by_payer" => 1,  
		"under_paid_cover" => 21.5,  
		"to_currency" => "usdt",  
		"auto_withdrawal" => true,  
		"callback_url" => "https://www.your-website.com/oxapay/webhook",  
		"email" => "your-email@example.com",  
		"order_id" => "your-order-id",  
		"description" => "your description"
	];
	
	$apiKey = config('oxapay.merchants.key_2');
	$response = OxaPay::generateInvoice($data, $apiKey);


### Generate Static Address
This endpoint allows you to generate a static address for a specific currency and network. The static address will be linked to a unique track_id, and if a callback_url is provided, your server will receive notifications for any payments made to the address. [more info](https://docs.oxapay.com/api-reference/payment/generate-static-address)

    
    $data = [  
	    "network" => "eth",  //required
	    "callback_url" => "https://www.your-website.com/oxapay/webhook",  
	    "discription" => "your discription",  
	    "order_id" => "your-order-id",  
	    "email" => "your-email@example.com",  
	    "to_currency" => "usdt",  
	    "auto_withdrawal" => true  
	];  
	
	$apiKey = config('oxapay.merchants.key_2');
	$response = OxaPay::generateStaticAddress($data, $apiKey);  


### Revoking Static Address
You can revoke a static wallet by providing the merchant API key and the address associated with the static wallet. [more info](https://docs.oxapay.com/api-reference/payment/revoking-static-address)

    $data = [  
	    "address" => "your-address"  //required
	];  
	
	$apiKey = config('oxapay.merchants.key_2');
	$response = OxaPay::revokeStaticAddress($data, $apiKey);  


### Static Address List

Use this endpoint to retrieve a list of static addresses associated with a specific business. [more info](https://docs.oxapay.com/api-reference/payment/static-address-list)

	$data = [  
	    "track_id" => 133830568,  
	    "network" => 'bep20',  
	    "currency" => 'btc',  
	    "address" => 'your-address',  
	    "have_tx" => false,  
	    "order_id" => "your-order-id",  
	    "email" => 'your-email@example.com',  
	    "page" => 3,  
	    "size" => 5  
	];  
	
	$apiKey = config('oxapay.merchants.key_2');
	$response = OxaPay::staticAddressList($data, $apiKey);


### Payment Information
Utilize the Payment Information endpoint to retrieve detailed information about a specific payment using its `track_id`. [more info](https://docs.oxapay.com/api-reference/payment/payment-information)

    $paymentIdent = 199078636;  //required
    $apiKey = config('oxapay.merchants.key_2');
	$response = OxaPay::paymentInformation($paymentIdent, $apiKey);


### Payment History
Use this endpoint to retrieve a list of payments associated with your account, determined by your Merchant API Key. [more info](https://docs.oxapay.com/api-reference/payment/payment-history)

    $data = [  
	    "track_id" => 199078636,  
	    "type" => '',  //nullable|in:invoice,white_label,static_address
	    "status" => '',  //nullable|in:Paid,Confirming
	    "pay_currency" => 'TON',  
	    "currency" => 'TON',  
	    "network" => '',  
	    "address" => 'your-address',  
	    "from_amount" => '0.01',  
	    "to_amount" => '0.02',  
	    "sort_by" => '',  //nullable|in:create_date,pay_date,amount
	    "sort_type" => '',  //nullable|in:asc,desc
	    "page" => '1',  
	    "size" => '200',  
	    "from_date" => '1728142072',  
	    "to_date" => '1828142072'  
	];  
	
	$apiKey = config('oxapay.merchants.key_2');
	$response = OxaPay::paymentHistory($data, $apiKey);


### Accepted Currencies
The endpoint retrieves the list of cryptocurrencies available for payment processing through OxaPay. [more info](https://docs.oxapay.com/api-reference/payment/accepted-currencies)

    $apiKey = config('oxapay.merchants.key_2');
    $response = OxaPay::acceptedCurrencies($apiKey);

### Generate Payout
This endpoint enables you to generate a cryptocurrency payout request, allowing you to transfer funds to a specified address. [more info](https://docs.oxapay.com/api-reference/payout/generate-payout)

    $data = [  
	    "address" => "your-address",  //required
	    "currency" => "TRX",  //required
	    "amount" => 5.5,  //required
	    "callback_url" => "https://www.your-website.com/oxapay/webhook",  
	    "description" => "your description",  
	    "network" => "TRC20",  
	    "memo" => "test"  
	];  
	
	$apiKey = config('oxapay.payouts.key_2');
	$response = OxaPay::generatePayout($data, $apiKey);

### Payout Information
This endpoint retrieves the details of a specific payout using its `track_id`. [more info](https://docs.oxapay.com/api-reference/payout/payout-information)

    $ident = 258298386;  //required
    $apiKey = config('oxapay.payouts.key_2');
	$response = OxaPay::payoutInformation($ident, $apiKey);

### Payout History
This endpoint retrieves a list of payout transactions associated with your account, based on your Payout API Key. [more info](https://docs.oxapay.com/api-reference/payout/payout-history)

    $data = [  
	    "status" => "confirmed",  
	    "type" => "send",  
	    "currency" => "btc",  
	    "network" => "bitcoin",  
	    "from_amount" => "1",  
	    "to_amount" => "1000",  
	    "from_date" => "1736501460",  
	    "to_date" => "1736501470",  
	    "sort_by" => "create_date",  //create_date,pay_date,amount
	    "sort_type" => "asc",  //asc,desc
	    "size" => "2",  //nullable|from1 to 200
	    "page" => "1"  
	];  
	
	$apiKey = config('oxapay.payouts.key_2');
	$response = OxaPay::payoutHistory($data, $apiKey);

### Swap Request
This endpoint allows you to swap your account assets. [more info](https://docs.oxapay.com/api-reference/swap/swap-request)

    $data = [  
	    "from_currency" => "usdt",  //required
	    "to_currency" => "btc",  //required
	    "amount" => 1.5  //required|decimal
	];  
	
	$apiKey = config('oxapay.general.key_2');
	$response = OxaPay::swapRequest($data, $apiKey);

### Swap History
This endpoint allows you to retrieve a list of swap transactions based on your General API Key. [more info](https://docs.oxapay.com/api-reference/swap/swap-history)

    $data = [  
	    "track_id" => "393831199",  
	    "type" => "", //nullable|in:autoConvert,manualSwap,swapByApi  
	    "from_currency" => "USDT",  
	    "to_currency" => "BTC",  
	    "from_date" => "",  
	    "to_date" => "",  
	    "sort_by" => "amount",  //nullable|in:create_date,amount
	    "sort_type" => "asc",  //nullable|in:asc,desc
	    "size" => "2",  //nullable|from 1 to 200
	    "page" => "1"  
	];  
	
	$apiKey = config('oxapay.general.key_2');
	$response = OxaPay::swapHistory($data, $apiKey);

### Swap Pairs
This endpoint allows you to access a list of swappable cryptocurrencies along with their minimum swap amounts. [more info](https://docs.oxapay.com/api-reference/swap/swap-pairs)

    $apiKey = config('oxapay.general.key_2');
    $response = OxaPay::swapPairs($apiKey);

### Swap Calculate
This endpoint allows you to instantly calculate how much cryptocurrency you'll receive when swapping one currency for another. [more info](https://docs.oxapay.com/api-reference/swap/swap-calculate)

    $data = [  
	    "from_currency" => "btc",  //required
	    "to_currency" => "usdt",  //required
	    "amount" => 1  //required
	];  
	
	$apiKey = config('oxapay.general.key_2');
	$response = OxaPay::swapCalculate($data, $apiKey);

### Swap Rate
This endpoint allows you to fetch real-time swap rates for cryptocurrency pairs supported by OxaPay. [more info](https://docs.oxapay.com/api-reference/swap/swap-rate)

    $data = [  
	    "from_currency" => "btc",  //required
	    "to_currency" => "usdt"  //required
	];  
	
	$apiKey = config('oxapay.general.key_2');
	$response = OxaPay::swapRate($data, $apiKey);

### Account Balance
This endpoint allows you to retrieve the details of all wallets associated with a user, including a list of currencies and their corresponding amounts. [more info](https://docs.oxapay.com/api-reference/common/account-balance)

	$data = [  
	    "currency" => "BTC" //empty means all currencies   
	];  
	
	$apiKey = config('oxapay.general.key_2');
	$response = OxaPay::accountBalance($data, $apiKey);

### Prices
This endpoint allows you to retrieve the current prices of all cryptocurrencies supported by OxaPay. [more info](https://docs.oxapay.com/api-reference/common/prices)

    $response = OxaPay::prices();

### Supported Currencies
This endpoint allows you to access a comprehensive list of supported cryptocurrencies, including their network details, symbol, name, and withdrawal information, enabling you to identify the appropriate network for each currency. [more info](https://docs.oxapay.com/api-reference/common/supported-currencies)

    $response = OxaPay::currencies();


### Supported Fiat Currencies
This endpoint allows you to retrieve a list of supported fiat currencies, with details including currency code (e.g., USD, AUD), symbol, name, price, and display precision. [more info](https://docs.oxapay.com/api-reference/common/supported-fiat-currencies)

    $response = OxaPay::fiats();

### Supported Networks
This endpoint allows you to retrieve a list of blockchain networks supported by OxaPay for cryptocurrency transactions. [more info](https://docs.oxapay.com/api-reference/common/supported-networks)

    $response = OxaPay::networks();

### System Status
This endpoint allows you to check the current status of the OxaPay API, ensuring it is functioning correctly. [more info](https://docs.oxapay.com/api-reference/common/system-status)

    $response = OxaPay::systemStatus();

### Webhook
Merchants can set up a callback_url in their merchant requests, and upon processing payments, OxaPay will send you notifications in JSON format.
The payout Webhook is similar to a merchant Webhook exactly.
You will initially receive a callback with the "paying" status. You should wait for a second callback where the "status" value will be "paid".[more info](https://docs.oxapay.com/webhook)

When using the package for webhook, you can use 2 functions, `getData()` and `validate()`.
The **getData()** function can return data.
The **validate()** function validates the data. If the response is 200, it means the data is correct. This function can be used in both payment and payout types.
If the input to the **validate()** function is empty, it uses the default payment or payout API-key for validation. Otherwise, the API-key value can be passed to this function.

**getData() :**

    $response = OxaPay::webhook()->getData();

**response (200):**

    {
    "data":{"track_id": "151811887","status":"Paying","type":"invoice","module_name":"OxaPay","amount":10,"value":3.6839,"currency":"POL","order_id":"ORD-12345","email":"customer@oxapay.com","note":"","fee_paid_by_payer":0,"under_paid_coverage":0,"description":"Test Description","date":1738493900,"txs":[{"status":"confirming","tx_hash":"x","sent_amount":10,"received_amount":9.85,"value":3.6839,"currency":"POL","network":"Polygon Network","sender_address": "x","address":"x","rate":0.36839,"confirmations":10,"auto_convert_amount":0,"auto_convert_currency":"USDT","date":1738494035}]},
    "hmac":"f091392a069e0de0cef1a92fefb0ceb658453dc22acd4d27786a9d927064634bad5d7350ca78c0380ba815f87ff42307ca9bc017fc630c639a600eb984c0a178"
    }

**validate() :**

    $response = OxaPay::webhook()->getData();
**response (200) :**

    {"data":{"track_id":"120916648","status":"Paid","type":"invoice","module_name":"Test-Package-1","amount":12,"value":3.3192,"currency":"TRX","order_id":"your-order-id","email":"your-email@example.com","note":null,"fee_paid_by_payer":0,"under_paid_coverage":0,"description":"your description","date":1749716800,"txs":[{"status":"confirmed","tx_hash":"sandbox","sent_amount":3.079e-5,"received_amount":3.079e-5,"value":3.3194086279,"currency":"BTC","network":"Bitcoin Network","sender_address":null,"address":"sandbox","rate":1,"confirmations":10,"auto_convert_amount":0,"auto_convert_currency":"USDT","date":1749717025}]}}

### Exceptions

**ConnectionException :**
Failed to establish a connection with the server.

**InvalidApiKeyException :**
The provided API key is invalid.

**InvalidHmacSignatureException :**
The provided HMAC signature does not match the expected value.

**InvalidParamException :**
One or more input parameters are invalid or missing.

**InvalidRequestException :**
The overall structure of the request is incorrect.

**InvalidWebhookTypeException :**
The provided webhook type is invalid.

**NotFoundException :**
The requested resource was not found (404).

**ServerErrorException :**
Internal server error (500).

**ServiceUnavailableException :**
The service is currently unavailable.
