<?php

namespace NexgenApi;

class Track extends \stdClass {

    /**
     * @var string
     */
    protected $artist;

    /**
     * @var string
     */
    protected $title;

    /**
     * @param string $artist
     * @return $this
     */
    public function setArtist($artist)
    {
        if ( ! empty( $artist ) )
        {
            $this->artist = $artist;
        }

        return $this;
    }

    /**
     * @param string $title
     * @return $this
     */
    public function setTitle($title)
    {
        if ( ! empty( $title ) )
        {
            $this->title = $title;
        }

        return $this;
    }

    /**
     * @return mixed
     */
    public function getArtist()
    {
        return $this->artist;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

}