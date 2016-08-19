<?php


namespace Lune\Html\Blocks\Blocks;


use Lune\Html\Blocks\BlockInterface;

class TextBlock implements BlockInterface
{

    private $content;

    public function __construct($content)
    {
        $this->content = $content;
    }

    public function onInsert(string $zone_name)
    {

    }

    public function render():string
    {
        return (string)$this->content;
    }
}