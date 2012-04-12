<?php

namespace Less\Node;

class Comment
{
    public function __construct($value, $silent)
    {
        $this->value = $value;
        $this->silent = !! $silent;
    }

    public function compile($env = null)
    {
        return $this;
    }

    public function toCSS($env)
    {
        return $env->compress ? '' : $this->value;
    }

}
