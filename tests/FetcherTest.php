<?php

use NexgenApi\Tracklist;

class FetcherTest extends PHPUnit_Framework_TestCase {

    public function testCanGetTracklistFromServer()
    {
        /** @var string $url Url to get XML data for current playing song from The Rock's website */
        $url = 'http://www.therock.net.nz/Portals/0/Inbound/NowPlaying/NowPlaying.aspx';

        /** @var \NexgenApi\Fetcher $fetcher */
        $fetcher = new \NexgenApi\Fetcher($url);

        /** @var Tracklist $tracklist */
        $tracklist = $fetcher->fetch();

        $this->assertInstanceOf(Tracklist::class, $tracklist);
        $this->assertInternalType('string',$tracklist->getCurrentTrack()->getArtist());
        $this->assertInternalType('string',$tracklist->getCurrentTrack()->getTitle());
        $this->assertInternalType('string',$tracklist->getNextTrack()->getArtist());
        $this->assertInternalType('string',$tracklist->getNextTrack()->getTitle());
    }

}