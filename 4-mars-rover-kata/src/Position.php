<?php


namespace Kata;

class Position
{

    /** @var integer $xCoordinate */
    private $xCoordinate;

    /** @var integer $yCoordinate */
    private $yCoordinate;
    private $grid;

    /**
     * @param integer $xCoordinate
     * @param integer $yCoordinate
     * @param $grid
     */
    public function __construct($xCoordinate, $yCoordinate, $grid)
    {
        $this->xCoordinate = $xCoordinate;
        $this->yCoordinate = $yCoordinate;
        $this->grid = $grid;
    }

    /**
     * @return int
     */
    public function getXCoordinate()
    {
        return $this->xCoordinate;
    }

    /**
     * @return int
     */
    public function getYCoordinate()
    {
        return $this->yCoordinate;
    }

    public function moveYForward()
    {
        $this->yCoordinate = $this->yCoordinate + 1;
    }

    public function moveYBackward()
    {
        $this->yCoordinate = $this->yCoordinate - 1;
    }

    public function moveXForward()
    {
        $this->xCoordinate = $this->xCoordinate + 1;
    }

    public function moveXBackward()
    {
        $this->xCoordinate = $this->xCoordinate - 1;
    }
}
