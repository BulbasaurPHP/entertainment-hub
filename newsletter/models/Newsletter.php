<?php

namespace models;

class Newsletter
{
    private $content;

    public function __construct($content)
    {
        $this->content = $content;
    }

    public function getNewsletterContent()
    {
        return $this->content;
    }
}
