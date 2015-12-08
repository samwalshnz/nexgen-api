<?php

use NexgenApi\Track;

class TrackTest extends PHPUnit_Framework_TestCase {

    public function testCanSetArtist()
    {
        $track = new Track();

        $track->setArtist('Jack Johnson');

        $this->assertEquals('Jack Johnson', PHPUnit_Framework_Assert::readAttribute($track, 'artist'));
    }

    public function testCanSetTitle()
    {
        $track = new Track();

        $track->setTitle('Breakdown');

        $this->assertEquals('Breakdown', PHPUnit_Framework_Assert::readAttribute($track, 'title'));
    }

    public function testCanGetArtist()
    {
        $track      = new Track;
        $reflection = new ReflectionClass($track);

        $property = $reflection->getProperty('artist');
        $property->setAccessible(true);

        $property->setValue($track, 'Jack Johnson');

        $this->assertEquals('Jack Johnson', $track->getArtist());
    }

    public function testCanGetTitle()
    {
        $track      = new Track;
        $reflection = new ReflectionClass($track);

        $property = $reflection->getProperty('title');
        $property->setAccessible(true);

        $property->setValue($track, 'Breakdown');

        $this->assertEquals('Breakdown', $track->getTitle());
    }

}