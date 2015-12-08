<?php

namespace NexgenApi;

class FetcherTracklistTransformer {

    /**
     * @var \SimpleXMLElement
     */
    private $xml;

    /**
     * @var FetcherTrackTransformer
     */
    private $trackTransformer;

    /**
     * FetcherTracklistTransformer constructor.
     *
     * @param FetcherTrackTransformer $trackTransformer
     */
    public function __construct(FetcherTrackTransformer $trackTransformer)
    {
        $this->trackTransformer = $trackTransformer;
    }

    /**
     * FetcherTrack constructor.
     *
     * @param \SimpleXMLElement $xml
     * @return Tracklist
     */
    public function transform(\SimpleXMLElement $xml)
    {
        $tracklist = new Tracklist();

//        var_dump(get_class($xml->audio));
//        var_dump((array)$audio['audio']);
        foreach ($xml->audio as $audioXml)
        {
//            var_dump(get_class($audioXml));
//            var_dump($audioXml);
//            var_dump($audioXml->title[0]);
            /** @var Track $track */
            $track = $this->transformTrack($audioXml);

            /** @var Tracklist $tracklist */
            $tracklist->addTrack($track);
        }

        return $tracklist;
    }

    /**
     * @param \SimpleXMLElement $xml
     * @return Track
     */
    public function transformTrack(\SimpleXMLElement $xml)
    {
        /** @var Track $track */
        $track = $this->trackTransformer->transform($xml);

        return $track;

    }

    public function getTitle()
    {
        return $this->xml->title[0];
    }
}