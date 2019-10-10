<?php

namespace Model\Article;

/**
 * Class Article
 * @package Model\Article
 */
class Article
{
    /** @var int */
    private $id;

    /** @var string */
    private $title;

    /** @var string */
    private $image;

    /** @var string */
    private $head;

    /** @var string */
    private $content;

    /** @var int */
    private $createDate;

    /** @var int */
    private $idCreator;

    /**
     * Article constructor.
     */
    public function __construct()
    {
    }

    /**
     * Hydrate Article data
     *
     * @param array $data
     */
    public function hydrate(array $data)
    {
        // Set and secure all article fields
        $this->setId($data['id']);
        $this->setTitle(htmlspecialchars_decode($data['title']));
        $this->setImage(htmlspecialchars_decode($data['image']));
        $this->setHead(htmlspecialchars_decode($data['head']));
        $this->setContent(htmlspecialchars_decode($data['content']));
        $this->setCreateDate(strtotime($data['create_date']));
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Return image full path (including images root path)
     *
     * @return null|string
     */
    public function getImagePath()
    {
        // Return null if no image belong to this article
        if (empty($this->image)) {

            return null;
        }

        return "public/var/images/" . $this->image;
    }

    /**
     * @param string $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @return string
     */
    public function getHead()
    {
        return $this->head;
    }

    /**
     * @param string $head
     */
    public function setHead($head)
    {
        $this->head = $head;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return int
     */
    public function getCreateDate()
    {
        return $this->createDate;
    }

    /**
     * Return article date into a specific format
     *
     * @return bool|string
     */
    public function getCreateDateFormatted()
    {
        return date('F d\, Y \a\t H:i a', $this->createDate);
    }

    /**
     * @param int $createDate
     */
    public function setCreateDate($createDate)
    {
        $this->createDate = $createDate;
    }

    /**
     * @return int
     */
    public function getIdCreator()
    {
        return $this->idCreator;
    }

    /**
     * @param int $idCreator
     */
    public function setIdCreator($idCreator)
    {
        $this->idCreator = $idCreator;
    }
}