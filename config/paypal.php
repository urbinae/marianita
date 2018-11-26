<?php
return array(
    // set your paypal credential
    'client_id' => 'AQhHDbBqTnjHkDLmpdzQ7xsB8FVpTgUThKsnD5YDjv8-vE9-ZBxBDqjbqAJuqadEPburJ0ZtUnGPVOGi',
    'secret' => 'EGeSqzMIaS4PauQLarDyxNTcLXqSXinOmOCSXubSStwzpQ-qJNQPwykWLnkCd9xwp6pciCbs6wBia6sm',

    /**
     * SDK configuration 
     */
    'settings' => array(
        /**
         * Available option 'sandbox' or 'live'
         */
        'mode' => 'sandbox',

        /**
         * Specify the max request time in seconds
         */
        'http.ConnectionTimeOut' => 30,

        /**
         * Whether want to log to a file
         */
        'log.LogEnabled' => true,

        /**
         * Specify the file that want to write on
         */
        'log.FileName' => storage_path() . '/logs/paypal.log',

        /**
         * Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
         *
         * Logging is most verbose in the 'FINE' level and decreases as you
         * proceed towards ERROR
         */
        'log.LogLevel' => 'FINE'
    ),
);