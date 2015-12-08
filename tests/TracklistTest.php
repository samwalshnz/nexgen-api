<?php

use NexgenApi\FetcherTracklistTransformer;
use NexgenApi\FetcherTrackTransformer;
use NexgenApi\Track;
use NexgenApi\Tracklist;

class TracklistTest extends PHPUnit_Framework_TestCase {

    public function testCanGetCurrentTrack()
    {
        /** @var Tracklist $tracklist */
        $tracklist = $this->makeTracklistStub();

        /** @var Track $track */
        $track = $tracklist->getCurrentTrack();

        $this->assertEquals('Jack Johnson', $track->getArtist());
        $this->assertEquals('Breakdown', $track->getTitle());
    }

    public function testCanGetNextTrack()
    {
        /** @var Tracklist $tracklist */
        $tracklist = $this->makeTracklistStub();

        /** @var Track $track */
        $track = $tracklist->getNextTrack();

        $this->assertEquals('Trevor Hall', $track->getArtist());
        $this->assertEquals('We Call', $track->getTitle());
    }

    public function testCanGetTrackByNumber()
    {
        /** @var Tracklist $tracklist */
        $tracklist = $this->makeTracklistStub();

        /** @var Track $track */
        $track = $tracklist->getTrackByNumber(2);

        $this->assertEquals('Trevor Hall', $track->getArtist());
        $this->assertEquals('We Call', $track->getTitle());
    }

    /**
     * @return Tracklist
     */
    private function makeTracklistStub()
    {
        /** @var FetcherTracklistTransformer $transformer */
        $transformer = new FetcherTracklistTransformer(new FetcherTrackTransformer());

        /** @var Tracklist $tracklist */
        $tracklist = $transformer->transform(simplexml_load_file('tests/stubs/api_response.xml'));

        return $tracklist;
    }

}