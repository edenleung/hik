<?php

namespace Hik\Frs;

use Hik\Module;

class Face extends Module
{
    protected $urls = [
        // 人脸分组
        'createGroupAddition' => '/api/frs/v1/face/group/single/addition',
        'updateGroupAddition' => '/api/frs/v1/face/group/single/update',
        'deleteGroupAddition' => '/api/frs/v1/face/group/batch/deletion',

        // 人脸
        'createSingleAddition' => '/api/frs/v1/face/single/addition',
        'updateSingleAddition' => '/api/frs/v1/face/single/update',

        // 人脸评分
        'pictureCheck' => '/api/frs/v1/face/picture/check',
    ];

    /**
     * 单个添加人脸分组 
     */
    public function createGroupAddition(array $data)
    {
        // name.require
        // description.require
        $this->data = $data;
    }

    /**
     * 单个修改人脸分组
     */
    public function updateGroupAddition(array $data)
    {
        // indexCode.require
        // name.require
        // description.require

        $this->data = $data;
    }

    /**
     * 按条件删除人脸分组
     */
    public function deleteGroupAddition(array $data)
    {
        // indexCode.require
        $this->data = $data;
    }

    /**
     * 单个添加人脸
     */
    public function createSingleAddition(array $data)
    {
        // faceGroupIndexCode.require
        // faceInfo.require
        // faceInfo.name.require
        // facePic.require
        // facePic.faceUrl.require
        // facePic.faceBinaryData.require

        $this->data = $data;
    }

    /**
     * 修改单个添加人脸
     */
    public function updateSingleAddition(array $data)
    {
        $this->data = $data;
    }

    /**
     * 人脸评分
     * 
     */
    public function pictureCheck(array $data)
    {
        // facePicBinaryData.require
        // facePicUrl.require
        $this->data = $data;
    }
}
