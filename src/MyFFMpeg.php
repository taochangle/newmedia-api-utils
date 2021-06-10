<?php


namespace taoxin\utils;


use FFMpeg\FFMpeg;

class MyFFMpeg
{
    private FFMpeg $ffmpeg;

    public function __construct($config = [])
    {
        $this->setFfmpeg($config);
    }


    /**
     * @return FFMpeg
     */
    public function getFfmpeg(): FFMpeg
    {
        return $this->ffmpeg;
    }

    /**
     */
    private function setFfmpeg($config): void
    {
        $this->ffmpeg = FFMpeg::create($config);
    }
}