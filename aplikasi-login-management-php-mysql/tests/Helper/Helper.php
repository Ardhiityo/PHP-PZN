<?php

namespace Arya\Mvc\App {
    function header(string $value)
    {
        echo $value;
    }
}

namespace Arya\Mvc\Service {
    function setcookie($name, $value, $duration = null, $path = null)
    {
        echo "$name : $value";
    }
}
