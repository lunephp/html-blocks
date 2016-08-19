<?php


namespace Lune\Html\Blocks;


interface BlockInterface
{
    public function onInsert(string $zone_name);

    public function render():string;
}