<?php
$acl_inc = array();
$i = 1;

$acl_inc[$i]['name'] = '主页';
$acl_inc[$i]['globar'] = array(
		"dashboard" => array(
			"主页" => "index",
			"列表" => "tabPage",
			"查看修改列表" => "getById",
		)
);


$i++;
$acl_inc[$i]['name'] = '全局设置';
$acl_inc[$i]['globar'] = array(
		'setting' => array(
			"主页" => "index",
			"列表" => "tabPage",
			"修改" => "save",
			"查看修改列表" => "getById",
		)
);

$i++;
$acl_inc[$i]['name'] = '操作日志';
$acl_inc[$i]['globar'] = array(
		"walletlog" => array(
			"主页" => "index",
			"列表" => "tabPage",
			"查看修改列表" => "getById",
		)
);

$i++;
$acl_inc[$i]['name'] = '用户与权限管理';
$acl_inc[$i]['globar'] = array(
		"userinfo" => array(
			"后台用户管理" => array(
					"主页" => "index",
					"列表" => "tabPage",
					"添加" => "add",
					"修改" => "updateUserById",
					"查看修改列表" => "getById",
					"删除" => "delete",
			),
		),
		"roleinfo" => array(
			"角色权限" => array(
					"主页" => "index",
					"列表" => "tabPage",
					"添加" => "add",
					"修改" => "updateUserById",
					"查看修改列表" => "getById",
					"删除" => "delete",
			),
		)
);

$i++;
$acl_inc[$i]['name'] = '奖励管理';
$acl_inc[$i]['globar'] = array(
		"walletuser" => array(
			"用户管理" => array(
					"主页" => "index",
					"列表" => "tabPage",
					"冻结和恢复" => "updateById",
					"删除" => "delete",
			),
		),
		"walletverify" => array(
			"提币审核" => array(
					"主页" => "index",
					"列表" => "tabPage",
					"查看修改列表" => "getById",
					"通过和驳回" => "updateById",
					"导出excel" => "excel",
			),
		),
		"walletfind" => array(
			"提币查询" => array(
					"主页" => "index",
					"列表" => "tabPage",
					"查看修改列表" => "getById",
					"导出excel" => "excel",
			),
		),
		"walletmsg" => array(
			"消息模板" => array(
					"主页" => "index",
					"列表" => "tabPage",
					"添加" => "add",
					"修改" => "updateById",
					"查看修改列表" => "getById",
					"删除" => "delete",
			),
		),
		"version" => array(
			"版本管理" => array(
					"主页" => "index",
					"列表" => "tabPage",
					"查看修改列表" => "getById",
					"添加" => "add",
					"删除" => "delete",
			),
		),
		"sendmsg" => array(
			"公告管理" => array(
					"主页" => "index",
					"列表" => "tabPage",
					"查看修改列表" => "getById",
					"添加" => "add",
					"删除" => "delete",
			),
		)
);

return $acl_inc;