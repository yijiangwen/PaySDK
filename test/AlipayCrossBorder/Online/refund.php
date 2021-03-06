<?php
/**
 * 支付宝 Cross-border Online Payment 退款 Demo
 */
require __DIR__ . '/common.php';

// 公共配置
$params = new \Yurun\PaySDK\AlipayCrossBorder\Params\PublicParams;
$params->appID = $GLOBALS['PAY_CONFIG']['appid'];
$params->md5Key = $GLOBALS['PAY_CONFIG']['md5Key'];
$params->apiDomain = 'https://openapi.alipaydev.com/gateway.do'; // 设为沙箱环境，如正式环境请把这行注释

// SDK实例化，传入公共配置
$pay = new \Yurun\PaySDK\AlipayCrossBorder\SDK($params);

// 支付接口
$request = new \Yurun\PaySDK\AlipayCrossBorder\Online\Refund\Request;
$request->out_return_no = date('Ymd') . mt_rand(100, 99999999); // 退款订单号
$request->out_trade_no = 'test37132408'; // 要退款订单的订单号
$request->return_amount = 0.01;
$request->currency = 'USD';
$request->product_code = 'NEW_OVERSEAS_SELLER';

// 调用接口
$result = $pay->execute($request);

var_dump('result:', $result);

var_dump('success:', $pay->checkResult());

var_dump('error:', $pay->getError(), 'error_code:', $pay->getErrorCode());

