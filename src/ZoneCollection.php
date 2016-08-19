<?php


namespace Lune\Html\Blocks;


class ZoneCollection implements ZoneCollectionInterface
{
    private $zones = [];

    protected function getZone(string $name):ZoneInterface
    {
        if (!array_key_exists($name, $this->zones)) {
            $this->zones[$name] = new Zone($name);
        }
        return $this->zones[$name];
    }

    public function append($content, string $zone_name = 'main')
    {
        $this->getZone($zone_name)->append($content);
    }

    public function prepend($content, string $zone_name = 'main')
    {
        $this->getZone($zone_name)->prepend($content);
    }

    public function count(string $zone_name = 'main'):int
    {
        return $this->getZone($zone_name)->count();
    }

    public function isEmpty(string $zone_name = 'main'):bool
    {
        return $this->getZone($zone_name)->isEmpty();
    }

    public function render(string $zone_name = 'main'):string
    {
        return $this->getZone($zone_name)->render();
    }


}