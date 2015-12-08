<?php

namespace NexgenApi;

use NexgenApi\Exceptions\TrackNotFoundException;

class Tracklist {

    /**
     * @var array
     */
    protected $tracks = [];

    /**
     * @param Track $track
     * @return $this
     */
    public function addTrack(Track $track)
    {
        $this->tracks[] = $track;

        return $this;
    }

    /**
     * @return Track
     */
    public function getCurrentTrack()
    {
        $track = $this->getTrackByNumber(1);

        return $track;
    }

    /**
     * @return Track
     */
    public function getNextTrack()
    {
        $track = $this->getTrackByNumber(2);

        return $track;
    }

    /**
     * @param int $number
     * @return Track
     * @throws TrackNotFoundException
     */
    public function getTrackByNumber($number)
    {

        if (!is_numeric($number) || $number <= 0)
        {
            throw new \InvalidArgumentException;
        }

        $index = $number - 1;

        if (! isset($this->tracks[$index]))
        {
            throw new TrackNotFoundException;
        }

        return $this->tracks[$index];
    }

}