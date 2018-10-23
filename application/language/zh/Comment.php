<?php
$list=array();
/*******留言*******/
$list['comment_success']='留言成功';
$list['comment_error']='留言失败';
$list['error_status']='登录状态已失效';
$list['error_info']='这里暂时没有评论';
$list['error_content']='请填写评论内容';

/*******提价订单********/
$list['error_bname']='充值种类不能为空';
$list['error_gathering']='充值地址为空，请联系客服';
$list['error_nums']='购买数量不能为空';
$list['error_numsint']='购买数量必须为整数';
$list['error_name']='姓名不能为空';
$list['error_tel']='电话不能为空';
$list['null_tel']='请填写正确的电话号码';
$list['error_address']='收货地址不能为空';
$list['error_payhash']='交易哈希不能为空';
$list['error_payment']='钱包地址不能为空';
$list['order_success']='提交成功，请等待发货';
$list['order_error']='提交失败，请重试';
$list['error_quantity']='库存数量不足';
$list['error_limits']='您最多还能购买';
$list['limits_msg']='个订单，还能购买 ';
$list['product_nums']=' 个';
$list['error_maxnums']='购买不能超过5个';
$list['error_maxhave']='您已经有5个订单了，不能再订购了';
$list['bname_type']='不支持的数字货币';
$list['error_pay']='发生错误，请联系客服';
$list['null_passphase']='请填写交易密码';
$list['error_passphase']='账号地址或者交易密码错误';
$list['error_price']='购买单价不能小于设定价格';
$list['error_money']='您的转账金额不足，请联系客服';
$list['unique_payhash']='每个交易哈希只能提交一次';
$list['payhash_status']='您的交易哈希还在处理中，请稍等30秒再提交订单';
$list['payhash_check']='请检查您的交易哈希';
$list['from_check']='请检查您的钱包地址';
$list['hash_check']='无效的交易哈希';
$list['error_country']='请选择国家';

/**********订单查看**************/
$list['order_msg0']='等待确认';
$list['order_msg1']='已付款';
$list['order_msg2']='配送中';
$list['order_msg3']='已完成';
$list['order_msg4']='已撤销';

/*******钱包地址********/
$list['money_success']='提交成功';
$list['money_error']='提交失败，请重试';
$list['lock_tel']='电话号码已被使用';
$list['money_code']='验证码有误';
$list['null_code']='验证码不能为空';
$list['moneyadd_error']='钱包地址不能为空';
$list['okexmoney_error']='okex钱包地址不能为空';

/****国家***/
$list['country_xg']='香港自提';
$list['china_xg']='中国香港';
$list['china_tw']='中国台湾';
$list['china_aomen']='中国澳门';

return $list;