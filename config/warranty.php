<?php

return [
    'website' => 'http://192.168.1.6/',
    'serviceTypeName' => [
        'X' => '维修',
        'H' => '更换',
        'T' => '退货',
        'G' => '协商',
    ],
    'processPhaseName' => [
        'init' => '工单创建',
        'auth' => '工单审核',
        'waitshoes' => '等待客户寄鞋',
        'repair' => '工厂修鞋',
        'sendback' => '寄回客户',
        'refund' => '退款处理',
        'finish' => '处理结束',
    ],
    'postTypeName' => [
        'R' => '客户寄回',
        'S' => '寄还客户',
    ],
    'issueCodeName' => [
        'F001' => '产品质量问题',
        'O001' => '厂商发错货',
        'T001' => '客户原因退换货',
    ],
    'repairResult' => [
        'T' => '鞋已修好',
        'F' => '鞋未修好',
    ],
    'statusName' => [
        '0' => '正常',
        '1' => '结束',
        '2' => '终止',
    ],
];


