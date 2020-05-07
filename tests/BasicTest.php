<?php

namespace SHSign\tests;

use PHPUnit\Framework\TestCase;

class BasicTest extends TestCase {

    // 配置
    protected $_config = null;

    public function __construct($name = null, array $data = [], $dataName = '') {
        parent::__construct($name, $data, $dataName);
        $this->_config = include 'tests/config.php';
    }

    public function testConfig() {
        $this->assertNotEmpty($this->_config, '配置文件无法读取');
    }

}