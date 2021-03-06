<?php
/* Digraph Core | https://gitlab.com/byjoby/digraph-core | MIT License */
namespace Digraph\Modules\Blocks;

use Digraph\DSO\Noun;
use Digraph\FileStore\FileStoreFile;

class BlockArea extends Noun
{
    const ROUTING_NOUNS = ['blockarea'];
    const SLUG_ENABLED = true;

    public function body()
    {
        return $this->blockContent();
    }

    public function formMap(string $action) : array
    {
        $s = $this->factory->cms()->helper('strings');
        return [
            'digraph_title' => false,
            'digraph_body' => false
        ];
    }

    public function blockContent()
    {
        $out = '';
        $b = $this->factory->cms()->helper('blocks');
        foreach ($this->children() as $block) {
            $out .= $b->block($block);
        }
        return $out;
    }

    public function searchIndexed()
    {
        return false;
    }
}
