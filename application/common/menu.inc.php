<?php
/*array(菜单名，菜单url参数，是否显示)*/
$i=1;
$j=0;
$menu_left =  array();
$menu_left[$i]['parent']=array(
		'name' => '主页',
		'icon' => 'zmdi zmdi-home zmdi-hc-fw',
		'url' => '/admin/dashboard?menuid='.$i,
		'level' => '0',
		'status'=>'1'
);

$i++;

$menu_left[$i]['parent']=array(
		'name' => '全局设置',
		'icon' => 'glyphicon glyphicon-wrench',
		'url' => '/admin/setting?menuid='.$i,
		'level' => '1',
		'status'=>'1'
);

$i++;
$menu_left[$i]['parent']=array(
		'name' => '操作日志',
		'icon' => 'glyphicon glyphicon-book',
		'url' => '/admin/walletlog?menuid='.$i,
		'level' => '2',
		'status'=>'1'
);

$i++;
$menu_left[$i]['parent']=array(
		'name' => '用户与权限管理',
		'icon' => 'zmdi zmdi-accounts zmdi-hc-fw',
		'url' => '',
		'level' => '3',
		'status'=>'1'
);
$menu_left[$i]['child'] = array(
		array('name' => '用户信息','icon' => '','url' => '/admin/userinfo?menuid='.$i,'level' => '0','status'=>'1'),
		array('name' => '角色权限','icon' => '','url' => '/admin/roleinfo?menuid='.$i,'level' => '1','status'=>'1'),
);

$i++;
$menu_left[$i]['parent']=array(
		'name' => '奖励管理',
		'icon' => 'glyphicon glyphicon-compressed',
		'url' => '',
		'level' => '4',
		'status'=>'1'
);

$menu_left[$i]['child'] = array(
		array('name' => '用户管理','icon' => '','url' => '/admin/walletuser?menuid='.$i,'level' => '0','status'=>'1'),
		//array('name' => '提币审核','icon' => '','url' => '/admin/walletverify?menuid='.$i,'level' => '1','status'=>'1'),
		array('name' => '提币查询','icon' => '','url' => '/admin/walletfind?menuid='.$i,'level' => '2','status'=>'1'),
		array('name' => '消息模板','icon' => '','url' => '/admin/walletmsg?menuid='.$i,'level' => '3','status'=>'1'),
		//array('name' => '版本管理','icon' => '','url' => '/admin/version?menuid='.$i,'level' => '4','status'=>'1'),
		//array('name' => '公告管理','icon' => '','url' => '/admin/sendmsg?menuid='.$i,'level' => '5','status'=>'1'),
);

return $menu_left;