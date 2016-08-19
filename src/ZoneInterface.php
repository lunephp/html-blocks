<?php


namespace Lune\Html\Blocks;


interface ZoneInterface
{
    public function append($content);

    public function prepend($content);

    public function count():int;

    public function isEmpty():bool;

    public function render():string;
}