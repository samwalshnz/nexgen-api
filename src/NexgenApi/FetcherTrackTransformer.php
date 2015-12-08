<?php

namespace NexgenApi;

class FetcherTrackTransformer {

    /**
     * @param \SimpleXMLElement $xml
     * @return Track
     */
    public function transform(\SimpleXMLElement $xml)
    {
        $track = new Track();

        $track->setArtist((string) $xml->artist);
        $track->setTitle((string) $xml->title);

        return $track;
    }
}