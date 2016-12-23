<?php

interface StreamInterface
{
    public function open();

    public function fetchData();

    public function close();
}

interface VideoStreamInterface extends StreamInterface
{
    public function fetchVideos();
}

class WebStream implements StreamInterface
{
    public function open()
    {
        echo "Flux ouvert\n";
    }

    public function fetchData()
    {
        echo "Donnees recup\n";
    }

    public function close()
    {
        echo "Flux ferme\n";
    }
}

class YoutubeStream implements VideoStream
{
    public function open()
    {
        echo "Flux ouvert\n";
    }

    public function fetchData()
    {
        echo "Donnees recup\n";
    }

    public function close()
    {
        echo "Flux ferme\n";
    }

    public function fetchVideos()
    {
        echo "Videos recup\n";
    }
}

class Client
{
    private $stream;

    public function __construct(VideoStreamInterface $stream)
    {
        $this->stream = $stream;
    }

    public function execute()
    {
        $this->stream->open();

        $this->stream->fetchData();
        $data = $this->stream->fetchVideos();

        $this->stream->close();

        return $data;
    }
}

$webStream = new YoutubeStream();
$client = new Client($webStream);

$client->execute();
