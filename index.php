<?php

// ------- Telegram -------
$telegram_ip_ranges = [
    ['lower' => '149.154.160.0', 'upper' => '149.154.175.255'],
    ['lower' => '91.108.4.0',    'upper' => '91.108.7.255'],
    ];
    $ip_dec = (float) sprintf("%u", ip2long($_SERVER['REMOTE_ADDR']));
    $ok=false;
    foreach ($telegram_ip_ranges as $telegram_ip_range) if (!$ok) {
    if(!$ok){
    $lower_dec = (float) sprintf("%u", ip2long($telegram_ip_range['lower']));
    $upper_dec = (float) sprintf("%u", ip2long($telegram_ip_range['upper']));
    if($ip_dec >= $lower_dec and $ip_dec <= $upper_dec){
    $ok=true;
    }}}
    if(!$ok){
    exit(header("location: https://coffemizban.com"));
    }

error_reporting(0);
// ------- include -------
include("config.php");
$date = date('Y/m/d');
// ------- Telegram -------
$update = json_decode(file_get_contents('php://input'));
if(isset($update->message)){
$chat_id = $update->message->chat->id;
$from_id = $update->message->from->id;
$text = $update->message->text;
$first = $update->message->from->first_name;
$message_id = $update->message->message_id;
$captio = $update->message->caption;
$video = $update->message->video;
$file_id = $update->message->video->file_id;
}
if (isset($update->callback_query)){
$chat_id = $update->callback_query->message->chat->id;
$data = $update->callback_query->data;
$message_id2 = $update->callback_query->message->message_id;
}

// Anti Code
if($chat_id != $admin){
    if(strpos($text, 'zip') !== false or strpos($text, 'ZIP') !== false or strpos($text, 'Zip') !== false or strpos($text, 'ZIp') !== false or strpos($text, 'zIP') !== false or strpos($text, 'ZipArchive') !== false or strpos($text, 'ZiP') !== false){
        bot('sendMessage',[
            'chat_id'=>$chat_id,
            'text'=>"❌ | از ارسال کد مخرب خودداری کنید",
            'parse_mode'=>"HTML",
            ]);
        exit;
        }
        if(strpos($text, 'kajserver') !== false or strpos($text, 'update') !== false or strpos($text, 'UPDATE') !== false or strpos($text, 'Update') !== false or strpos($text, 'https://api') !== false){
        bot('sendMessage',[
            'chat_id'=>$chat_id,
            'text'=>"❌ | از ارسال کد مخرب خودداری کنید",
            'parse_mode'=>"HTML",
            ]);
        exit;
        }
        if(strpos($text, '$') !== false or strpos($text, '{') !== false or strpos($text, '}') !== false){
        bot('sendMessage',[
            'chat_id'=>$chat_id,
            'text'=>"❌ | از ارسال کد مخرب خودداری کنید",
            'parse_mode'=>"HTML",
            ]);
        exit;
        }
        if(strpos($text, '"') !== false or strpos($text, '(') !== false or strpos($text, '=') !== false){
        bot('sendMessage',[
            'chat_id'=>$chat_id,
            'text'=>"❌ | از ارسال کد مخرب خودداری کنید",
            'parse_mode'=>"HTML",
            ]);
        exit;
        }
        if(strpos($text, 'getme') !== false or strpos($text, 'GetMe') !== false){
        bot('sendMessage',[
            'chat_id'=>$chat_id,
            'text'=>"❌ | از ارسال کد مخرب خودداری کنید",
            'parse_mode'=>"HTML",
            ]);
        exit;
        }
    }

    if($text == "/start"){
    
        $sql    = "SELECT `id` FROM `users` WHERE `id`=$chat_id";
        $result = mysqli_query($conn,$sql);
        
        $res = mysqli_fetch_assoc($result);
        
        if(!$res){
            $sql2    = "INSERT INTO `users` (`id`, `step`, `time`) VALUES ($chat_id, 'none', '$date')";
            $result2 = mysqli_query($conn,$sql2);
        }
        }


            $forchaneel = json_decode(file_get_contents("https://api.telegram.org/bot$token/getChatMember?chat_id=@$chanel&user_id=".$chat_id));
            $tch = $forchaneel->result->status;
            
                    if($tch != 'member' && $tch != 'creator' && $tch != 'administrator'){
            bot('sendMessage',[
            'chat_id'=>$chat_id,
            'text'=>"👩‍💼 سلام دوست عزیز برای استفاده از ربات باید در کانال ما جوین شید

            👈 لطفا از دکمه زیر برای ورود به کانال استفاده کنید",
            'parse_mode'=>"HTML",
            'reply_markup'=>json_encode([
            'inline_keyboard'=>[
            [['text'=>"🖥 کانال",'url'=>"https://t.me/$chanel?start"]],
            ]
            ])
            ]);
            exit();
            }

        $key1        = '👤 کانال ما';

        $reply_keyboard = [
                                [$key1] ,
        
                              ];

                              $reply_kb_options = [
                                'keyboard'          => $reply_keyboard ,
                                'resize_keyboard'   => true ,
                                'one_time_keyboard' => false ,
                            ];

                            $key11          = '📊 امار ربات';
                            $key21          = '📨 پیام همگانی';
                            $key51          = '📨 فوروارد همگانی';
                            $uploud         = '📨 اپلود ویدیو';
                            $RemoFilm       = '❌ حذف ویدیو';
                    
                            $reply_keyboard_panel = [
                                                    [$key11] ,
                                                    [$key21 , $key51] ,
                                                    [$uploud , $RemoFilm] ,
                            
                                                  ];
                             
                                $reply_kb_options_panel = [
                                                        'keyboard'          => $reply_keyboard_panel ,
                                                        'resize_keyboard'   => true ,
                                                        'one_time_keyboard' => false ,
                                                    ];

                                                    $back = '◀️ بازگشت';

                                                            $reply_keyboard_back = [
                                                                                        [$back] ,
                                                                                        
                                                                                    ];
                                                                                         
$reply_kb_options_back = [
                                                                                            'keyboard'          => $reply_keyboard_back ,
                                                                                            'resize_keyboard'   => true ,
                                                                                            'one_time_keyboard' => false ,
                                                                                        ];

                                                    $adminstep = mysqli_fetch_assoc(mysqli_query($conn,"SELECT `step` FROM `users` WHERE `id`=$from_id LIMIT 1"));
                                                    if($adminstep['step'] == "key_hmgani" and $text != $back){
    
                                                        mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");
                                                        
                                                    $sql    = "SELECT * FROM `users`";
                                                    $result = mysqli_query($conn,$sql);
                                                     
                                                     while($row = mysqli_fetch_assoc($result)){
                                                            
                                                        bot('sendMessage',[
                                                    'chat_id'=>$row['id'],
                                                    'text'=>"$text",
                                                    'parse_mode'=>"HTML",
                                                    ]);
                                                    }
                                                    bot('sendMessage',[
                                                    'chat_id'=>$admin,
                                                    'text'=>"✅ انجام شد",
                                                    'parse_mode'=>"HTML",
                                                    'reply_markup'=>json_encode($reply_kb_options_panel),
                                                    ]);
                                                    }
                                                    
                                                    
                                                    if($adminstep['step'] == "key_forvard" and $text != $back){
                                                        
                                                        mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$admin' LIMIT 1");
                                                     
                                                    $sql    = "SELECT * FROM `users`";
                                                    $result = mysqli_query($conn,$sql);
                                                     
                                                     while($row = mysqli_fetch_assoc($result)){
                                                            
                                                        bot('ForwardMessage',[
                                                    'chat_id'=>$row['id'],
                                                    'from_chat_id'=>$chat_id,
                                                    'message_id'=>$message_id
                                                    ]);
                                                        }
                                                     
                                                        bot('sendMessage',[
                                                    'chat_id'=>$admin,
                                                    'text'=>"✅ انجام شد",
                                                    'parse_mode'=>"HTML",
                                                    'reply_markup'=>json_encode($reply_kb_options_panel),
                                                    ]);
                                                    }

if($adminstep['step'] == "uploud" and $text != $back){


    $sql22    = "INSERT INTO `films` (`id`, `caption`, `seen`, `link`) VALUES ('$text', '0', '0', '0')";
    $result22 = mysqli_query($conn,$sql22);

        bot('sendMessage',[
            'chat_id'=>$admin,
            'text'=>"📨 لطفا ویو خود را اپلود کنید",
            'parse_mode'=>"HTML",
            ]);
            
            mysqli_query($conn,"UPDATE `users` SET `step`='$text' WHERE id='$admin' LIMIT 1");
    
}
$adminstep2 = $adminstep['step'];
$sql45    = "SELECT `id` FROM `films` WHERE `id`='$adminstep2'";
$result45 = mysqli_query($conn,$sql45);
    
$res45 = mysqli_fetch_assoc($result45);

if($res45 != NULL){
    
    if(isset($video)){
        $resa = $res45['id'];
        mysqli_query($conn,"UPDATE `films` SET `caption`='$captio' WHERE id='$resa' LIMIT 1");
        mysqli_query($conn,"UPDATE `films` SET `link`='$file_id' WHERE id='$resa' LIMIT 1");
        
        bot('sendMessage',[
'chat_id'=>$admin,
'text'=>"✅ انجام شد",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode($reply_kb_options_panel),
]);

bot('sendMessage',[
        'chat_id'=>$chanel_Film,
        'text'=>"$captio
        🤖 : https://t.me/$bot_id?start=$resa
        ",
        'parse_mode'=>"HTML",
        ]);
mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$admin' LIMIT 1");
    }
}

if($adminstep['step'] == "RemoFilm" and $text != $back){

    $sql4    = "SELECT `id` FROM `films` WHERE `id`='$text'";
    $result4 = mysqli_query($conn,$sql4);
    
    $res4 = mysqli_fetch_assoc($result4);

    if($res4 != NULL){

        mysqli_query($conn,"DELETE FROM RemoFilm WHERE id='$text'");
        bot('sendMessage',[
            'chat_id'=>$admin,
            'text'=>"✅ انجام شد",
            'parse_mode'=>"HTML",
            'reply_markup'=>json_encode($reply_kb_options_panel),
            ]);
            mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$admin' LIMIT 1");
    }
    else{
        bot('sendMessage',[
            'chat_id'=>$admin,
            'text'=>"❌ ایدی اشتباه است لطفا ایدی درست را وارد کنید",
            'parse_mode'=>"HTML",
            ]);
    }
}

if(strpos($text == "/start") !== false){

    $id=str_replace("/start ","",$text);
    
    $dond = mysqli_fetch_assoc(mysqli_query($conn,"SELECT `id` FROM `films` WHERE `id`='$id' LIMIT 1"));
    $dond1 = $dond['id'];
        
    if($dond1 != NULL){
        
        $dond2 = mysqli_fetch_assoc(mysqli_query($conn,"SELECT `caption` FROM `films` WHERE `id`='$id' LIMIT 1"));
        $dond3 = $dond2['caption']; 

        $dond4 = mysqli_fetch_assoc(mysqli_query($conn,"SELECT `seen` FROM `films` WHERE `id`='$id' LIMIT 1"));
        $dond5 = $dond4['seen']; 
        
        $dond6 = mysqli_fetch_assoc(mysqli_query($conn,"SELECT `link` FROM `films` WHERE `id`='$id' LIMIT 1"));
        $dond7 = $dond6['link']; 

        $seen_Res = $dond5 + 1;

        $result = bot('sendVideo',[
            'chat_id'=>$chat_id,
            'video'=>"$dond7",
'caption'=>"$dond3

👁‍🗨 تعداد بازدید : $seen_Res
            ",
            ]);
            mysqli_query($conn,"UPDATE `films` SET `seen`='$seen_Res' WHERE id='$id' LIMIT 1");
    }  
                        
    
}
switch($text) {
 
                                                        case "/start"              : show_menu();       break;
                                                        case $key1                 : ChanelMa();        break;
}
                                                    
if($from_id == $admin){
                                                    
                                                    switch($text) {
                                                 
                                                        case $key11 : statistics();                break;
                                                        case "/admin" : panel();                   break;
                                                        case $key21 : key_hmgani();                break;
                                                        case $key51 : key_forvard();               break;
                                                        case $uploud : uploud();                   break;
                                                        case $RemoFilm : RemoFilm();               break;
                                                        case $back            : back();            break;
                                                    }
}

function show_menu(){

    global $reply_kb_options;
    global $chat_id;
    global $vpnname;
                                                        
                                                        bot('sendMessage',[
                                                        'chat_id'=>$chat_id,
'text'=>"🤖 سلام عزیز خوش امدی برای استفاده از ما باید درون کانال ما روی لینک ویدیو کلیک کنی و وارد ربات شی استارت کنی ویدیو رو دریافت کنی",
                                                        'parse_mode'=>"HTML",
                                                        'reply_markup'=>json_encode($reply_kb_options),
                                                        ]);
}

function ChanelMa(){

    global $chat_id;
    global $chanel;

    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"@$chanel",
        'parse_mode'=>"HTML",
        ]);
}

function panel(){

    global $chat_id;
    global $reply_kb_options_panel;
    global $date;
    
    bot('sendMessage',[
                                                        'chat_id'=>$chat_id,
'text'=>"👨‍🔧 سلام مدیر به پنل مدیریت خوش امدی

🕰 : $date",
                                                        'parse_mode'=>"HTML",
                                                        'reply_markup'=>json_encode($reply_kb_options_panel),
                                                        ]);
}

function key_hmgani(){
    
    global $admin;
    global $conn;
    global $reply_kb_options_back;
    
    bot('sendMessage',[
'chat_id'=>$admin,
'text'=>"📝 پیام خود را بنویسید",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode($reply_kb_options_back),
]);

mysqli_query($conn,"UPDATE `users` SET `step`='key_hmgani' WHERE id='$admin' LIMIT 1");
}

function key_forvard(){
    
    global $admin;
    global $conn;
    global $reply_kb_options_back;
    
    bot('sendMessage',[
'chat_id'=>$admin,
'text'=>"📝 پیام خود را فوروارد کنید",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode($reply_kb_options_back),
]);

mysqli_query($conn,"UPDATE `users` SET `step`='key_forvard' WHERE id='$admin' LIMIT 1");
}

function uploud(){

    global $chat_id;
    global $conn;
    global $reply_kb_options_back;

    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"📨 نامی برای ویو خود انتخاب کنید و دقت کنید حتما انگلیسی باشد",
        'parse_mode'=>"HTML",
        'reply_markup'=>json_encode($reply_kb_options_back),
        ]);
        
        mysqli_query($conn,"UPDATE `users` SET `step`='uploud' WHERE id='$chat_id' LIMIT 1");
        }

function back(){

    global $reply_kb_options_panel;
    global $chat_id;

bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"↩️ به منو اصلی برگشتیم",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode($reply_kb_options_panel),
]);
mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");
}

function RemoFilm(){

    global $chat_id;
    global $conn;
    global $reply_kb_options_back;

    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"👨‍🔧 برای حذف ویدیو لطفا ایدی یدیو رو وارد کنید",
        'parse_mode'=>"HTML",
        'reply_markup'=>json_encode($reply_kb_options_back),
        ]);
        
        mysqli_query($conn,"UPDATE `users` SET `step`='RemoFilm' WHERE id='$chat_id' LIMIT 1");
}

function statistics(){
    
    global $chat_id;
    global $conn;

    $sql43    = "SELECT * FROM `users`";
$result43 = mysqli_query($conn,$sql43);
$res43    = mysqli_num_rows($result43);

bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"امار شما : ",
        'parse_mode'=>"HTML",
        'reply_markup'=>json_encode([
        'inline_keyboard'=>[
        [
            ['text'=>"امار کاربران",'callback_data'=>"gggggg"],
            ['text'=>"$res43",'callback_data'=>"gggggg"],
        ],
        ]
        ])
        ]);
}
?>