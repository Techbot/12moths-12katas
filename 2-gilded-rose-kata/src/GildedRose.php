<?php

namespace Kata;


class GildedRose {

    /** @var Degradable[] $items */
    private $items;

    /**
     * @param Degradable[] $items
     */
    public function __construct($items)
    {
        $this->items = $items;
    }

    public function updateQuality()
    {
        for ($i = 0; $i < count($this->items) ; $i++) {
            if ($this->items[$i]->getName() != "Aged Brie" && $this->items[$i]->getName() != "Backstage passes to a TAFKAL80ETC concert") {
                if ($this->items[$i]->getQuality() > 0) {
                    if ($this->items[$i]->getName() != "Sulfuras, Hand of Ragnaros") {
                        $this->items[$i]->setQuality($this->items[$i]->getQuality() - 1);
                    }
                }
            } else {
                $this->items[$i]->updateQuality();
            }

            if ($this->items[$i]->getName() != "Sulfuras, Hand of Ragnaros") {
                $this->items[$i]->updateSellIn();
            }

            if ($this->items[$i]->getSellIn() < 0) {
                if ($this->items[$i]->getName() != "Aged Brie") {
                    if ($this->items[$i]->getName() != "Backstage passes to a TAFKAL80ETC concert") {
                        if ($this->items[$i]->getQuality() > 0) {
                            if ($this->items[$i]->getName() != "Sulfuras, Hand of Ragnaros") {
                                $this->items[$i]->setQuality($this->items[$i]->getQuality() - 1);
                            }
                        }
                    } else {
                        $this->items[$i]->updateQuality();
                    }
                } else {
                    $this->items[$i]->updateQuality();
                }
            }
        }

        return $this->items;
    }
}