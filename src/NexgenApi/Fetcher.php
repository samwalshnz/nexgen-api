<?php

namespace NexgenApi;

class Fetcher {

    /**
     * @param string $url
     * @return Tracklist
     */
    public function fetch($url)
    {
        if (empty($url) || !is_string($url))
        {
            throw new \InvalidArgumentException();
        }

        /** @var \SimpleXMLElement $xml */
        $xml = simplexml_load_file($url);

        $transformer = new FetcherTracklistTransformer(new FetcherTrackTransformer());

        /** @var Tracklist $tracklist */
        $tracklist = $transformer->transform($xml);

        return $tracklist;
    }
}