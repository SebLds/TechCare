<?php

function classCharger($class)
{
    require $class . '.php';
}
spl_autoload_register('classCharger');

