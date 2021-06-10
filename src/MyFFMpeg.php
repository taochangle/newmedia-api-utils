<?php


namespace taoxin\utils;


use FFMpeg\FFMpeg;

class MyFFMpeg
{
    private FFMpeg $ffmpeg;
    private array $config;

    public function __construct($config = [])
    {
        $this->setFfmpeg();
        if (!$config) {
            $this->config = [
                'ffmpeg.binaries' => '/opt/local/ffmpeg/bin/ffmpeg',
                'ffprobe.binaries' => '/opt/local/ffmpeg/bin/ffprobe',
                'timeout' => 3600, // The timeout for the underlying process
                'ffmpeg.threads' => 12,   // The number of threads that FFMpeg should use
            ];
        }
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
    private function setFfmpeg(): void
    {
        $this->ffmpeg = FFMpeg::create($this->config);
    }
}