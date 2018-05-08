<?php 

return [
	/*
	| ---------------------------------------------------------
	| Setting the payment mode is Sandbox Mode or Live Mode
	| ---------------------------------------------------------
	| if set false it means sandbox mode, else it means live mode 
	| ** PLEASE BE CAREFULL ABOUT CHANGE THE LIVE MODE
	|
	*/
	'LIVE_MODE' => FALSE,
	
	/*
	| ---------------------------------------------------------
	| Setting the payment route in PAYMENT_PATH, SHARED_KEY & MALL_ID is code that you get from DOKU Merchant Page.
	| ---------------------------------------------------------
	|
	*/
	'PAYMENT_PATH' => 'dokularavel',
	'SHARED_KEY'   => 'PpjCAFz3A8so', 
	'MALL_ID'      => '10390046',
	'PERMATA_CODE' => NULL,
	'CURRENCY'	   => 360,
	'NOTIFY_SCREET_CODE'=>'123456',

	/* 
	| ---------------------------------------------------------
	| Define your table of order and the fields
	| ---------------------------------------------------------
	| 
	*/
	'TABLE_ORDER'                  => 'DokuPayments',
	'TABLE_FIELD_NO_ORDER'         => 'invoice_number',
	'TABLE_FIELD_AMOUNT'           => 'amount',
	'TABLE_FIELD_CUSTOMER_NAME'    => 'customer_name',
	'TABLE_FIELD_CUSTOMER_PHONE'   => 'customer_phone',
	'TABLE_FIELD_CUSTOMER_EMAIL'   => 'customer_email',
	'TABLE_FIELD_CUSTOMER_ADDRESS' => 'customer_address',
	'TABLE_FIELD_PAYMENT_DATE'     => 'payment_date',
	'TABLE_FIELD_PAYMENT_STATUS'   => 'payment_status',
	'TABLE_FIELD_PAYMENT_CHANNEL'  => 'payment_channel',
	'TABLE_FIELD_PAYMENT_APPROVAL_CODE' => 'payment_approval_code',
	'TABLE_FIELD_PAYMENT_SESSION_ID'=> 'payment_session_id',


	/*
	| ---------------------------------------------------------
	| DOKU PAYMENT AVAILABLE CHANNEL 
	| ---------------------------------------------------------
	| 15 = Credit Card
	| 04 = Doku Wallet
	| 02 = Mandiri Clickpay
	| 05 = Permata Bank / ATM Bersama	
	|
	| This setting is for default payment channel otherwise you can set the payment channel on the fly by url parameter "payment_channel"
	*/	
	'AVAILABLE_PAYMENT_CHANNEL'=> ['15','04','02','05'],
	'DEFAULT_PAYMENT_CHANNEL'=> '15', 			


	/* 
	| ---------------------------------------------------------
	| This setting is for set the product name in doku transaction
	| Basicly "DOKULARAVEL" package only send 1 basket to DOKU, that is global invoice. 
	| ---------------------------------------------------------
	| Alias that you can use : 
	| [invoice_no] to generate your invoice number / trans_id 
	| 
	*/
	'PRODUCT_NAME_FORMAT' => 'Invoice For Order No. [invoice_no]',




	/* 
	| ---------------------------------------------------------
	| Set redirect page DOKU 
	| ---------------------------------------------------------
	| [Default] or SHOW_DOKU_SUCCESS_PAGE set TRUE, SHOW_FINISH_PAGE set TRUE, YOUR_OWN_FINISH_PAGE set NULL
	| - Payment Flow : USER DATA -> PROCESSING -> DOKU SUCCESS PAGE -> FINISH PAGE
	|
	| If SHOW_DOKU_SUCCESS_PAGE set TRUE, SHOW_FINISH_PAGE set FALSE, YOUR_OWN_FINISH_PAGE set NULL
	| - Payment Flow : USER DATA -> PROCESSING -> DOKU SUCCESS PAGE
	| 
	| If SHOW_DOKU_SUCCESS_PAGE set FALSE, SHOW_FINISH_PAGE set TRUE, YOUR_OWN_FINISH_PAGE set NULL
	| - Payment Flow : USER DATA -> PROCESSING -> FINISH PAGE
	| 
	| If SHOW_DOKU_SUCCESS_PAGE set FALSE, SHOW_FINISH_PAGE set TRUE, YOUR_OWN_FINISH_PAGE set not NULL / set your own URL PAGE
	| - Payment Flow : USER DATA -> PROCESSING -> YOUR OWN FINISH PAGE
	| 
	*/
	'SHOW_DOKU_SUCCESS_PAGE' => TRUE, //it means the page that generated from DOKU
	'SHOW_FINISH_PAGE'       => TRUE, //it means the page that generated from "dokularavel" package.
	'YOUR_OWN_FINISH_PAGE'   => NULL, //it means the page that generated by your self


	/* 
	| ---------------------------------------------------------
	| This setting is for Develope Mode only, you can view DOKULARAVEL Session, also doPrePayment, or doPayment response
	| ---------------------------------------------------------
	| Access the debug url at /debug
	| 
	| will be available if DEBUG_MODE set TRUE
	|
	*/
	'DEBUG_MODE' => TRUE,
];