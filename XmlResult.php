<?php


class XmlResult
{

    private $ico;
    private $title;
    private $address;
    private $dic;

    /**
     * @return mixed
     */
    public function getIco()
    {
        return $this->ico;
    }

    /**
     * @param mixed $ico
     */
    public function setIco($ico)
    {
        $this->ico = $ico;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getDic()
    {
        return $this->dic;
    }

    /**
     * @param mixed $dic
     */
    public function setDic($dic)
    {
        $this->dic = $dic;
    }

    public function validate(): bool {
        return !empty($this->getIco()) && !empty($this->getTitle()) && !empty($this->getAddress());
    }
}
