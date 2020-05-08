<?php

namespace SHSign\tests;

use SHSign\Core\Main;

class TestUploadContract extends BasicTest {

    /**
     * 上传合同
     *
     *
     * Author=> DQ
     */
    public function testUploadContract() {
        try {
            $mainLib             = new Main($this->_config);
            $pid                 = '0285';
            $projectName         = '龙南佳苑';
            $HID                 = '02852019120225149_31';
            $contractInfo        = [
                "contractNO"         => "201901300650100001",
                "contractAttribute"  => "01",
                "actualRent"         => "1000",
                "jiaoZuFangShi"      => "31",
                "contractRent"       => "1000",
                "cash"               => "1000",
                "zuJinZhiFuFangShi"  => "个人付",
                "payType"            => "个人付",
                "signDate"           => "2019-08-15",
                "contractStartDate"  => "2019-08-15",
                "contractEndDate"    => "2021-08-14",
                "jiaoZuZhi"          => "1",
                "mianZuZhi"          => "1",
                "firstContract"      => "",
                "heTongTeShuYueDing" => "1",
                "category"           => "1",
            ];
            $uploadTenantBean    = [
                "transactionNo"    => "1234567890",
                "name"             => "张三",
                "sex"              => "男",
                "nation"           => "汉",
                "birthday"         => "1988-05-23",
                "address"          => "上海",
                "cardNo"           => "310012199011212521",
                "age"              => "30",
                "registeredRight"  => "上海",
                "registeredType"   => "本市",
                "mobile"           => "13917331290",
                "telephone"        => "63211234",
                "email"            => "1@1.com",
                "education"        => "本科",
                "livingCardNo"     => "居住证",
                "livingCardTime"   => "2019-12-12",
                "bankAccount"      => "4321123412341234",
                "bank"             => "招商银行",
                "bankProxy"        => "银行代扣",
                "companyName"      => "sitri",
                "contact"          => "李四",
                "taxpayerAddress"  => "上海",
                "taxpayerMobile"   => "13912771213",
                "companyPartition" => "机关单位",
                "workPartition"    => "公共管理",
                "zip"              => "111111",
                "remark"           => "111",
                "livingStartTime"  => "2019-12-12",
                "livingStatus"     => "在租"
            ];
            $uploadHouseInfoBean = [
                "location"  => "华发路406弄10号1001",
                "roomNo"    => "702",
                "houseType" => "2室1厅1卫",
                "livingNum" => "2",
                "area"      => "61.71",
                "category"  => "公租房"
            ];
            $togetherList        = [
                "cardno"          => "310012199011212521",
                "name"            => "张三",
                "mobile"          => "13917331290",
                "ration"          => "夫妻",
                "livingStartTime" => "2019-12-12",
                "livingStatus"    => "在租"
            ];

            $return = $mainLib->uploadContract($pid, $projectName, $HID, $contractInfo, $uploadTenantBean, $uploadHouseInfoBean, $togetherList);
            $this->assertNotEmpty($return, '运营公司上传合同信息 错误');
        } catch (\Exception $e) {
            $this->assertEmpty($e->getMessage(), $e->getMessage());
        }
    }

}