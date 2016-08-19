<?php


namespace Lune\Html\Blocks;


use Lune\Html\Blocks\Blocks\TextBlock;

class Zone implements ZoneInterface
{

    protected $blocks = [];

    protected $name;

    protected $cache = null;

    public function __construct($name)
    {

        $this->name = $name;
    }

    public function append($content)
    {
        array_push($this->blocks, $this->insert($content));
        $this->invalidateCache();
    }

    public function prepend($content)
    {
        array_unshift($this->blocks, $this->insert($content));
        $this->invalidateCache();
    }

    public function count():int
    {
        return sizeof($this->blocks);
    }

    public function isEmpty():bool
    {
        $content = $this->render();
        return empty($content);
    }

    protected function invalidateCache()
    {
        $this->cache = null;
    }

    protected function insert($content)
    {
        $block = $this->makeBlock($content);
        $block->onInsert($this->name);
        return $block;
    }

    protected function makeBlock($content):BlockInterface
    {
        if ($content instanceof BlockInterface) {
            return $content;
        }
        return new TextBlock($content);
    }

    public function render():string
    {
        if (is_null($this->cache)) {
            $content = array_map(function ($block) {
                return $block->render();
            }, $this->blocks);
            $this->cache = trim(implode(PHP_EOL, $content));
        }
        return $this->cache;
    }
}
