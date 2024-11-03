<?php

namespace Arya\Mvc\Middleware;

interface Middleware {
    function before(): void;
}