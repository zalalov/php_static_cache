<?php

/**
 * We call this function 10 times per page load.
 * Could you, somehow, cache the user's options in memory
 * in order to optimize the loading time of the page?
 *
 * You can't use other caching services.
 */
function getUserOptions($username)
{
    static $options = [];

    if (empty($options)) {
        // Getting user options
        sleep(1);
        $options = ["ACCESS_TOKEN" => bin2hex(openssl_random_pseudo_bytes(16))];
    }

    return $options;
}

list($msecStart, $secStart) = explode(" ", microtime());

for ($i = 0; $i != end(range(0, 9)); $i++) {
    $options = getUserOptions("testuser");
}

list($msecEnd, $secEnd) = explode(" ", microtime());

// Output
print sprintf("Exec Time (in seconds): %d\n", ($secEnd - $secStart));