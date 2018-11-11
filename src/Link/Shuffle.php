<?php

namespace Cocur\Chain\Link;

/**
 * Shuffle.
 *
 * @author    Florian Eckerstorfer
 * @copyright 2015-2018 Florian Eckerstorfer
 */
trait Shuffle
{
    /**
     * @return Chain
     */
    public function shuffle()
    {
        shuffle($this->array);

        return $this;
    }
}
