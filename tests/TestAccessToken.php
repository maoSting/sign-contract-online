<?php

namespace SHSign\tests;

use SHSign\Core\Main;

class TestAccessToken extends BasicTest {

    /**
     * accesstoken
     *
     * @throws \BYRobot\Exceptions\InvalidResponseException
     * @throws \ErrorException
     * Author: DQ
     */
    public function testGetAccessToken(){
        $companyLib = new Main($this->_config);
        $return = $companyLib->getAccessToken();
        $this->assertNotFalse(isset($return['access_token']), '获取access_token失败');
    }


}