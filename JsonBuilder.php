<?php


class JsonBuilder
{

    private $data;
    private $log;

    public function __construct()
    {
        $this->data = array();
        $this->log = false;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @param array $data
     */
    public function setData(array $data): void
    {
        $this->data = $data;
    }

    /**
     * @return bool
     */
    public function isLog(): bool
    {
        return $this->log;
    }

    /**
     * @param bool $log
     */
    public function setLog(bool $log): void
    {
        $this->log = $log;
    }

    public function set($key, $value){
        $this->data[$key] = $value;
    }

    public function build(): string {
        return json_encode($this->getData());
    }
}
