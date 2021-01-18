<?php

namespace Hik;

class Response
{
    protected $result;

    public function __construct(array $result)
    {
        $this->result = $result;
    }

    /**
     * 原始数据
     */
    public function getData()
    {
        return $this->result;
    }

    /**
     * 状态
     */
    public function getCode()
    {
        return $this->result['code'];
    }

    /**
     * 信息
     */
    public function getMessage()
    {
        return $this->result['msg'];
    }

    public function getContents($key = null)
    {
        // data
        // 'pageSize'
        // 'list'
        // 'total'
        // 'totalPage'
        // 'pageNo'
        if ($key) {
            return $this->result['data'][$key];
        }

        return $this->result['data'];
    }

    public function getTotal()
    {
        return $this->getContents('total');
    }

    public function getList()
    {
        return $this->getContents('list');
    }

    public function getTotalPage()
    {
        return $this->getContents('totalPage');
    }

    public function getPageNo()
    {
        return $this->getContents('pageNo');
    }

    public function getPageSize()
    {
        return $this->getContents('pageSize');
    }
}
