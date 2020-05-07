<?php

namespace SHSign\tests;

use SHSign\Core\Main;

class TestTransactionInfo extends BasicTest {

    /**
     *
     * @todo 未测试
     *
     * @throws \BYRobot\Exceptions\InvalidResponseException
     * @throws \ErrorException
     * Author: DQ
     */
    public function testGetAccessToken(){
        $companyLib = new Main($this->_config);
        try{
            $return = $companyLib->getTransactionInfo('371326199202086419');
        }catch (\Exception $e){
            var_dump($e->getMessage());
        }
//        $this->assertNotFalse(isset($return['access_token']), '获取access_token失败');
    }


}