<?php

namespace App\Common;

use Cache;

class SmsFunction
{

    // 极速数据短信发送消息方法
    public function Send_message($name,$quota,$tel,$channel,$mobile='13823771801'){
        $appkey = env('SMS_APP_KEY');
        $mobile = $mobile;
        $name=$name.'，需求：'.$quota.'万元，'.'电话：'.$tel.'，来自：'.$channel;
        $content = '客户：'.$name.'，资料提交成功，请及时处理。【广商通商业共享】';
        $url = "http://api.jisuapi.com/sms/send?appkey=$appkey&mobile=$mobile&content=$content";
        $this->curlOpen($url);
        return true;
    }

    // 极速数据短信类方法
    public function Send_sms($phone){
        $appkey = env('SMS_APP_KEY');//你的appkey
        $mobile = $phone;//手机号 超过1024请用POST
        $rand=rand(1000,9999);
        $content = '尊敬的用户您好，您的短信验证码为'.$rand.'，5分钟内有效。请妥善保管，如非本人操作，请忽略。【广商通商业共享】';//utf8
        $url = "http://api.jisuapi.com/sms/send?appkey=$appkey&mobile=$mobile&content=$content";
        $result = $this->curlOpen($url);
        $jsonarr = json_decode($result, true);
        if($jsonarr['status'] != 0)
        {
            return $jsonarr['msg'];
            exit();
        }
        $result = $jsonarr['result'];
        Cache::add('sms',$rand,5);
        return $result['count'].' '.$result['accountid'].'<br>';
    }

    // 极速数据短信CURL方法
    protected function curlOpen($url, $config = array())
    {
        $arr = array('post' => false,'referer' => $url,'cookie' => '', 'useragent' => 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0; Trident/4.0; SLCC1; .NET CLR 2.0.50727; .NET CLR 3.0.04506; customie8)', 'timeout' => 20, 'return' => true, 'proxy' => '', 'userpwd' => '', 'nobody' => false,'header'=>array(),'gzip'=>true,'ssl'=>false,'isupfile'=>false);
        $arr = array_merge($arr, $config);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, $arr['return']);
        curl_setopt($ch, CURLOPT_NOBODY, $arr['nobody']);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_USERAGENT, $arr['useragent']);
        curl_setopt($ch, CURLOPT_REFERER, $arr['referer']);
        curl_setopt($ch, CURLOPT_TIMEOUT, $arr['timeout']);
        //curl_setopt($ch, CURLOPT_HEADER, true);//获取header
        if($arr['gzip']) curl_setopt($ch, CURLOPT_ENCODING, 'gzip,deflate');
        if($arr['ssl'])
        {
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        }
        if(!empty($arr['cookie']))
        {
            curl_setopt($ch, CURLOPT_COOKIEJAR, $arr['cookie']);
            curl_setopt($ch, CURLOPT_COOKIEFILE, $arr['cookie']);
        }
        if(!empty($arr['proxy']))
        {
            //curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP);
            curl_setopt ($ch, CURLOPT_PROXY, $arr['proxy']);
            if(!empty($arr['userpwd']))
            {
                curl_setopt($ch,CURLOPT_PROXYUSERPWD,$arr['userpwd']);
            }
        }

        //ip比较特殊，用键值表示
        if(!empty($arr['header']['ip']))
        {
            array_push($arr['header'],'X-FORWARDED-FOR:'.$arr['header']['ip'],'CLIENT-IP:'.$arr['header']['ip']);
            unset($arr['header']['ip']);
        }
        $arr['header'] = array_filter($arr['header']);
        if(!empty($arr['header']))
        {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $arr['header']);
        }
        if ($arr['post'] != false)
        {
            curl_setopt($ch, CURLOPT_POST, true);
            if(is_array($arr['post']) && $arr['isupfile'] === false)
            {
                $post = http_build_query($arr['post']);
            }
            else
            {
                $post = $arr['post'];
            }
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        }
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }

}