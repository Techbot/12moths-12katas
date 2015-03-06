<?php


namespace Kata;


class RoverTest extends \PHPUnit_Framework_TestCase
{

    public function testRoverFacedNorthWhenTurnsLeftFacesWest()
    {

        $rover = new Rover(new North(), new InfiniteGrid());
        $rover->turnLeft();
        $this->assertInstanceOf('Kata\West', $rover->getDirection());
    }

    public function testRoverFacedNorthWhenTurnsRightFacesEast()
    {
        $rover = new Rover(new North(), new InfiniteGrid());
        $rover->turnRight();
        $this->assertInstanceOf('Kata\East', $rover->getDirection());
    }

    public function testRoverFacedSouthWhenTurnsLeftFacesEast()
    {
        $rover = new Rover(new South(), new InfiniteGrid());
        $rover->turnLeft();
        $this->assertInstanceOf('Kata\East', $rover->getDirection());
    }

    public function testRoverFacedSouthWhenTurnsRightFacesWest()
    {
        $rover = new Rover(new South(), new InfiniteGrid());
        $rover->turnRight();
        $this->assertInstanceOf('Kata\West', $rover->getDirection());
    }

    public function testRoverFacedEastWhenTurnsLeftFacesNorth()
    {
        $rover = new Rover(new East(), new InfiniteGrid());
        $rover->turnLeft();
        $this->assertInstanceOf('Kata\North', $rover->getDirection());
    }

    public function testRoverFacedEastWhenTurnsRightFacesSouth()
    {
        $rover = new Rover(new East(), new InfiniteGrid());
        $rover->turnRight();
        $this->assertInstanceOf('Kata\South', $rover->getDirection());
    }

    public function testRoverFacedWestWhenTurnsLeftFacesSouth()
    {
        $rover = new Rover(new West(), new InfiniteGrid());
        $rover->turnLeft();
        $this->assertInstanceOf('Kata\South', $rover->getDirection());
    }

    public function testRoverFacedWestWhenTurnsRightFacesNorth()
    {
        $rover = new Rover(new West(), new InfiniteGrid());
        $rover->turnRight();
        $this->assertInstanceOf('Kata\North', $rover->getDirection());
    }

    public function testRoverFacedNorthAt00CoordinateWhenMovesForwardEndsAt01Coordinate()
    {
        $grid = new InfiniteGrid();
        $grid->setPosition(new Position(0, 0));
        $rover = new Rover(new North(), $grid);

        $rover->moveForward();

        $this->assertEquals(new Position(0, 1), $rover->getPosition());
    }

    public function testRoverFacedSouthAt01CoordinateWhenMovesForwardEndsAt00Coordinate()
    {

        $grid = new InfiniteGrid();
        $grid->setPosition(new Position(0, 1));
        $rover = new Rover(new South(), $grid);

        $rover->moveForward();

        $this->assertEquals(new Position(0, 0), $rover->getPosition());
    }

    public function testRoverFacedEastAt00CoordinateWhenMovesForwardEndsAt10Coordinate()
    {
        $grid = new InfiniteGrid();
        $grid->setPosition(new Position(0, 0));
        $rover = new Rover(new East(), $grid);

        $rover->moveForward();

        $this->assertEquals(new Position(1, 0), $rover->getPosition());
    }

    public function testRoverFacedWestAt10CoordinateWhenMovesForwardEndsAt00Coordinate()
    {
        $grid = new InfiniteGrid();
        $grid->setPosition(new Position(1, 0));
        $rover = new Rover(new West(), $grid);

        $rover->moveForward();

        $this->assertEquals(new Position(0, 0), $rover->getPosition());
    }

    public function testRoverFacedNorthAt01CoordinateWhenMovesBackwardEndsAt00Coordinate()
    {
        $grid = new InfiniteGrid();
        $grid->setPosition(new Position(0, 1));
        $rover = new Rover(new North(), $grid);

        $rover->moveBackward();

        $this->assertEquals(new Position(0, 0), $rover->getPosition());
    }

    public function testRoverFacedSouthAt00CoordinateWhenMovesBackwardEndsAt01Coordinate()
    {
        $grid = new InfiniteGrid();
        $grid->setPosition(new Position(0, 0));
        $rover = new Rover(new South(), $grid);

        $rover->moveBackward();

        $this->assertEquals(new Position(0, 1), $rover->getPosition());
    }

    public function testRoverFacedEastAt10CoordinateWhenMovesBackwardEndsAt00Coordinate()
    {
        $grid = new InfiniteGrid();
        $grid->setPosition(new Position(1, 0));
        $rover = new Rover(new East(), $grid);

        $rover->moveBackward();

        $this->assertEquals(new Position(0, 0), $rover->getPosition());
    }

    public function testRoverFacedWestAt00CoordinateWhenMovesBackwardEndsAt10Coordinate()
    {
        $grid = new InfiniteGrid();
        $grid->setPosition(new Position(0, 0));
        $rover = new Rover(new West(), $grid);

        $rover->moveBackward();

        $this->assertEquals(new Position(1, 0), $rover->getPosition());
    }

    public function testNorthEdgeIsWrappedInARectangularGridWhenMovingForward()
    {
        $grid = new RectangularGrid(2, 2);
        $grid->setPosition(new Position(0, 1));
        $rover = new Rover(new North(), $grid);

        $rover->moveForward();

        $this->assertEquals(new Position(0, 0), $rover->getPosition());
    }

    public function testNorthEdgeIsWrappedInARectangularGridWhenMovingBackward()
    {
        $grid = new RectangularGrid(2, 2);
        $grid->setPosition(new Position(0, 1));
        $rover = new Rover(new South(), $grid);

        $rover->moveBackward();

        $this->assertEquals(new Position(0, 0), $rover->getPosition());
    }

    public function testSouthEdgeIsWrappedInARectangularGridWhenMovingForward()
    {
        $grid = new RectangularGrid(2, 2);
        $grid->setPosition(new Position(0, 0));
        $rover = new Rover(new South(), $grid);

        $rover->moveForward();

        $this->assertEquals(new Position(0, 1), $rover->getPosition());
    }

    public function testSouthEdgeIsWrappedInARectangularGridWhenMovingBackward()
    {
        $grid = new RectangularGrid(2, 2);
        $grid->setPosition(new Position(0, 0));
        $rover = new Rover(new North(), $grid);

        $rover->moveBackward();

        $this->assertEquals(new Position(0, 1), $rover->getPosition());
    }

    public function testEastEdgeIsWrappedInARectangularGridWhenMovingForward()
    {
        $grid = new RectangularGrid(2, 2);
        $grid->setPosition(new Position(1, 0));
        $rover = new Rover(new East(), $grid);

        $rover->moveForward();

        $this->assertEquals(new Position(0, 0), $rover->getPosition());
    }

    public function testEastEdgeIsWrappedInARectangularGridWhenMovingBackward()
    {
        $grid = new RectangularGrid(2, 2);
        $grid->setPosition(new Position(1, 0));
        $rover = new Rover(new West(), $grid);

        $rover->moveBackward();

        $this->assertEquals(new Position(0, 0), $rover->getPosition());
    }

    public function testWestEdgeIsWrappedInARectangularGridWhenMovingForward()
    {
        $grid = new RectangularGrid(2, 2);
        $grid->setPosition(new Position(0, 0));
        $rover = new Rover(new West(), $grid);

        $rover->moveForward();

        $this->assertEquals(new Position(1, 0), $rover->getPosition());
    }

    public function testWestEdgeIsWrappedInARectangularGridWhenMovingBackward()
    {
        $grid = new RectangularGrid(2, 2);
        $grid->setPosition(new Position(0, 0));
        $rover = new Rover(new East(), $grid);

        $rover->moveBackward();

        $this->assertEquals(new Position(1, 0), $rover->getPosition());
    }
}
