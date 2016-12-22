<?php

class NewsManager
{
    public function add(News $news)
    {
        $this->databaseManager->query('INSERT...');
    }

    public function addLotOfNews()
    {
        $news1 = new News();
        $news2 = new News();
        $news3 = new News();
        $news4 = new News();

        $this->databaseManager->query('INSERT...');
        $this->databaseManager->query('INSERT...');
        $this->databaseManager->query('INSERT...');
        $this->databaseManager->query('INSERT...');
        $this->databaseManager->query('INSERT...');
        $this->databaseManager->query('INSERT...');
    }
}

class NewsCollection
{
    /**
     * @var array
     */
    private $news;

    public function __destruct()
    {
        foreach ($this->news as $new) {
            unset($new);
        }
    }

    public function add()
    {
        $this->news[] = new News();
    }
}

class News
{
}

$newsCollection = new NewsCollection();
$newsCollection->add();
$newsCollection->add();
$newsCollection->add();


unset($newsCollection);
