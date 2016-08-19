<?php


namespace Lune\Html\Blocks;


interface ZoneCollectionInterface
{
    public function append($content, string $zone_name = 'main');

    public function prepend($content, string $zone_name= 'main');

    public function count(string $zone_name= 'main'):int;

    public function isEmpty(string $zone_name= 'main'):bool;

    public function render(string $zone_name= 'main'):string;
}