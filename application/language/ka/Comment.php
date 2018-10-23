<?php
$list=array();

$list['comment_success']='메시지 성공';
$list['comment_error']='메시지 실패';
$list['error_status']='로그인 상태 이미 실효';
$list['error_info']='여기 잠시 평론이 없음';
$list['error_content']='평론 내용을 써주세요';

/*******提价订单가격 인상 주문********/ 
$list['error_bname']='충전 종류가 null상태면 불가';
$list['error_gathering']='충전주소가null상태임, 고객 서비스센터 연계해주십시요';
$list['error_nums']='구매수량이null상태면 불가';
$list['error_numsint']='구매수량 반드시 정수여야 함 ';
$list['error_name']='이름이 null상태면 불가';
$list['error_tel']='전화번호가 null상태면 불가';
$list['null_tel']='정확한 전화번호를 적어주십시요.';
$list['error_address']='배달 주소가 null상태면 불가';
$list['error_payhash']='교역 해시가 null상태면 불가';
$list['error_payment']='지갑주소가 null상태면 불가';
$list['order_success']='제출 성공,물건 발송을 기다려주세요';
$list['order_error']='제출실패 재시도해주세요';
$list['error_quantity']='재고 수량 부족';
$list['error_limits']='당신이 최고로';
$list['limits_msg']='개 수량 구매 가능';
$list['product_nums']='개';
$list['error_maxnums']='구매 수량이 5개를 초과할수 없음';
$list['error_maxhave']='당신은 이미 5개 주문이 찯기에 더이상 주문 불가능입니다.';
$list['bname_type']='서포트 하지 않는 전자화페';
$list['error_pay']='오류 발생, 고객서비스센터 연계해주세요';
$list['null_passphase']='교역 비번을 적어주세요';
$list['error_passphase']='계좌주소 혹은 교역 비번 오류';
$list['error_price']='구매 단가는 설정가격 이하로될수 없음 ';
$list['error_money']='당신 송금 금액 부족, 고객서비스센터 연계해주세요 ';
$list['unique_payhash']='매차 교역 해시, 한번만 제출 가능';
$list['payhash_status']='당신의 교역해시는 처리중이오니 30초후 재차 주문 제출해주세요';
$list['payhash_check']='당신의 교역해시 체크 해주세요';
$list['from_check']='당신의 지갑주소 체크 해주세요';
$list['hash_check']='무효 교역해시';
$list['error_country']='국가 선택해주세요';
$list['null_code']='검증은 시간에 못 미 친다.';
/**********订单查看 주문 체크 **************/ 
$list['order_msg0']='확인 대기';
$list['order_msg1']='지불 완료';
$list['order_msg2']='배송중';
$list['order_msg3']='완료';
$list['order_msg4']='철회 완료';
/*******钱包地址지갑주소********/ 

/****国家***/
$list['country_xg']='제품은 홍콩에 찾아가서 받을수 있음';
$list['china_xg']='홍콩';
$list['china_tw']='대만';
$list['china_aomen']='마카오';
return $list;