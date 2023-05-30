<?php

// OpenAI API配置参数

$api_url = 'https://api.openai.com/v1/chat/completions';

$api_key = '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'; // 替换成您的API密钥

// 定义要提交的数据

$data = array(

    'model' => 'gpt-3.5-turbo',

    'messages' => array(

        array(

            'role' => 'user',

            'content' => $_GET['a']

        )

    ),

    'temperature' => 0.9

);

// 将数据转换为JSON格式

$json_data = json_encode($data);

// 准备cURL请求选项

$curl_options = array(

    CURLOPT_URL => $api_url,

    CURLOPT_RETURNTRANSFER => true,

    CURLOPT_POST => true,

    CURLOPT_POSTFIELDS => $json_data,

    CURLOPT_HTTPHEADER => array(

        'Content-Type: application/json',

        'Authorization: Bearer ' . $api_key

    )

);

// 创建cURL句柄并设置选项

$ch = curl_init();

curl_setopt_array($ch, $curl_options);

// 执行cURL请求并获取响应

$response = curl_exec($ch);

echo $response;

// 检查cURL请求是否成功

if (curl_errno($ch)) {

    throw new Exception(curl_error($ch));

}

// 关闭cURL句柄

curl_close($ch);

// 解析响应JSON数据

$data = json_decode($response, true);

// 输出机器人回答

//echo $data['choices'][0]['message']['content'];

?>
