<?php

return [
    /**
     * API Token Key (string)
     * Accepted value:
     * Live Token: https://myfatoorah.readme.io/docs/live-token
     * Test Token: https://myfatoorah.readme.io/docs/test-token
     */
    'api_key' => '5bN6jlyUcCZsl7GknRxL4thJ_ntKTNI7M1VhHFYnjB0Xe284pf-sUkFJ_-ti2p2WFnolota-fuK_AIFIRCSzd_vhGlHUUdF8CLEAeOg-8tZe92G_1U4ejYg1ekwxLvY43qQlnypB4oYsmCJdk_bSNJUYFRK6WVghP8mbPPG_1kvwjyXCOZ8qcEFqRmI0HMeQFDhzBuuInsTI-iNTvbZTJLk2QqjDdnqgfV4P0BNTQiybe26aaa3EJ3Qtg-cWgTBQmShdNb8VICj7qIwDX0-u6FSluoQkZGOSW9yfxXkJGDzlMB9IFcF6KRkAKhLSNIrWHouAmyvdPVZ4Iabv0hdf5rwjHuHDG8_IQhTgfZcPqZZwG1frRJIvZeM6VBVM137Ihmd5N0Tkp8UNnyUD9SRgoK6nicWEvMRWDEsOiAJo4t1TYDyoflSnPfvc6GK10Zz-EQR7Xm3XJrwIyRUSmgwNUEZQa7OijNYa2t8PkFT4hhQ9Rzelp7u_CpiDyW-vM4dVJYpNOKNq3K2eG2B__ji7hUTGqYFbUbciHasz6rlefKkKDeWwMeoT-_C1fCJjxmZ7CvzZmBTacVMXISDHarbwcHk0LewbupltROOcm0oKoI8-P_Cd1YcKLL8tdudAYb-f58E8-mxUS5fAJuGPQVpEYdRQYZHm3GRbfbu42FiCHSzgNPAx_Qtp1pEiryJxQpEvRq7Mmg',
    /**
     * Test Mode (boolean)
     * Accepted value: true for the test mode or false for the live mode
     */
    'test_mode' => false,
    /**
     * Country ISO Code (string)
     * Accepted value: KWT, SAU, ARE, QAT, BHR, OMN, JOD, or EGY.
     */
    'country_iso' => 'SAU',
    /**
     * Save card (boolean)
     * Accepted value: true if you want to enable save card options.
     * You should contact your account manager to enable this feature in your MyFatoorah account as well.
     */
    'save_card' => true,
    /**
     * Webhook secret key (string)
     * Enable webhook on your MyFatoorah account setting then paste the secret key here.
     * The webhook link is: https://{example.com}/myfatoorah/webhook
     */
    'webhook_secret_key' => '',
    /**
     * Register Apple Pay (boolean)
     * Set it to true to show the Apple Pay on the checkout page.
     * First, verify your domain with Apple Pay before you set it to true.
     * You can either follow the steps here: https://docs.myfatoorah.com/docs/apple-pay#verify-your-domain-with-apple-pay or contact the MyFatoorah support team (tech@myfatoorah.com).
    */
    'register_apple_pay' => false
];
