<?php
# @Giclee1
# @kalpqbak
# @Play_MAYOR
# بدون ذكره المصدر هوه دليل فشلك
ob_start();
include('val.php');

$my_bot = [
    [['text' => $name_bot, 'url' => $url_bot]],
];

define('API_KEY', $API_KEY);
$token = 8551530679:AAFYuFo5Ghs2ZwKGWJQ7iL1_97BmNbihQk0
define("API_KEY",$token);
echo file_get_contents("https://api.telegram.org/bot" . API_KEY . "/setwebhook?url=" . $_SERVER['SERVER_NAME'] . "" . $_SERVER['SCRIPT_NAME']);
function bot($method,$datas=[]){
$amrakl = http_build_query($datas);
$url = "https://api.telegram.org/bot".API_KEY."/".$method."?$amrakl";
$amrakl = file_get_contents($url);
return json_decode($amrakl);
}
function shortNumber($num) 
{
    $units = ['', 'K', 'M', 'B', 'T'];
    for ($i = 0; $num >= 1000; $i++) {
        $num /= 1000;
    }
    return round($num, 1) . $units[$i];
}
 
function rand_text(){
    $abc = array("a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z","1","2","3","4","5","6","7","8","9","0");
    $fol = '#'.$abc[rand(5,36)].$abc[rand(5,36)].$abc[rand(5,36)].$abc[rand(5,36)].$abc[rand(5,36)].$abc[rand(5,36)].$abc[rand(5,36)].$abc[rand(5,36)].$abc[rand(5,36)].$abc[rand(5,36)];
    return $fol;
}


function check_m($id, $chat){
    $join = bot('getChatMember', ["chat_id" => $chat, "user_id" => $id])->result->status;
    if($join == 'left' or $join == 'kicked'){
        return false;
    }else{
        return true;
    }
}

$up = file_get_contents('php://input');
$update = json_decode($up);
if ($update->message) {
    $message = $update->message;
    $chat_id = $message->chat->id;
    $text = $message->text;
    $extext = explode(" ", $text);
    $first_name = $update->message->from->first_name;
    $username = $message->from->username;
    $id = $message->from->id;
    $message_id = $message->message_id;
    $entities = $message->entities;
    $language_code = $message->from->language_code;
    $tc = $update->message->chat->type;
    $jsons = json_decode(file_get_contents('data/data.json'), true);
    $get_jsons = json_decode(file_get_contents('data/data.json'));
    $re_message = $update->message->reply_to_message;
    $re_text = $re_message->text;
}


//data callback
if ($update->callback_query) {
    $chat_id2 = $update->callback_query->message->chat->id;
    $id2 = $update->callback_query->from->id;
    $first_name = $update->callback_query->from->first_name;
    $message_id2 = $update->callback_query->message->message_id;
    $data = $update->callback_query->data;
    $exdata = explode("|", $data);
    $jsons = json_decode(file_get_contents('data/data.json'), true);
    $get_jsons = json_decode(file_get_contents('data/data.json'));
}


if($update->inline_query->query){
    $inline = $update->inline_query;
    $query_id = $inline->id;
    $query = $inline->query;
    $query_form_id = $inline->from->id;
    if($query == 'mylink'){
        bot('answerInlineQuery',[
            'inline_query_id'=>$query_id,    
            'cache_time'=>0,
            'results' => json_encode([[
                'type'=>'article',
                'id'=>base64_encode(rand(5,555)),
                'title'=>"إضغط هنا لنشر رابط الدعوة الخاص بك",
                'description'=>"🏆😍 بوت الرشق الأول في التليجرام 😱🔥
- رشق قنوات - مشاهدات - لايكات تليجرام مجاناً ❤️🤩
- رشق متابعين - مشاهدات - لايكات انستقرام مجاناً 
- رشق يوتيوب. - تيكتوك مجاناً.
- رشق تويتر. -  فيسبوك مجاناً.
ـ شحن كافة الالعاب مجانآ.
ـ شراء بطائق اكترونية مجانآ.
- ربح المال عبر مشاركة الرابط وبعد ذالك تستطيع مصارفه النقاط الا مال وا تقديم طلب سحب اموالي عبر قسم العملات الاكترونية عبر اي محفظه اكترونية 
- رابط البوت للإنضمام مجاناً 👇",
                'disable_web_page_preview'=>'true',
                'input_message_content'=>['disable_web_page_preview'=>true,'message_text'=>"🏆😍 بوت الرشق الأول في التليجرام 😱🔥
- رشق قنوات - مشاهدات - لايكات تليجرام مجاناً ❤️🤩
- رشق متابعين - مشاهدات - لايكات انستقرام مجاناً 
- رشق يوتيوب. - تيكتوك مجاناً.
- رشق تويتر. -  فيسبوك مجاناً.
ـ شحن كافة الالعاب مجانآ.
ـ شراء بطائق اكترونية مجانآ.
- ربح المال عبر مشاركة الرابط وبعد ذالك تستطيع مصارفه النقاط الا مال وا تقديم طلب سحب اموالي عبر قسم العملات الاكترونية عبر اي محفظه اكترونية 
- رابط البوت للإنضمام مجاناً 👇"],
                    'reply_markup' => ['inline_keyboard' => [ 
                        [['text' => "إضغط هنا للدخول إلى البوت", 'url' => $link_invite.$query_form_id]],
                        ]
                    ]
            ]])
        ]);
    }
}
$bans = explode("\n", file_get_contents("data/ban.txt"));
$is_ok = file_get_contents('data/is_ok.txt');
$is_no = file_get_contents('data/is_no.txt');
$ex_is_ok = explode("\n", $is_ok);
$ex_is_no = explode("\n", $is_no);

if($message){
    if(!in_array($id, $adminss)){
        if (in_array($id, $ex_is_no) or in_array($id, $bans)) {
            bot('sendmessage', [
                'chat_id' => $id,
                'text' => "لا يمكنك استخدام البوت",
                'reply_to_message_id' => $message_id
            ]);
            return;
        } 
    }
}

$json_config = json_decode(file_get_contents('data/config.json'), true);
$config = json_decode(file_get_contents('data/config.json'));
$run = $config->run;

$members = file_get_contents('data/members.txt');
$exmembers = explode("\n", $members);
if (!in_array($id, $exmembers) and $update->message){
    $jsonsstart = json_decode(file_get_contents('data/cache.json'), true);
    $get_jsonsstart = json_decode(file_get_contents('data/cache.json'));
    if(in_array($extext[1], $exmembers)){
        if($extext[0] == '/start' && $extext[1] != null){
            $jsonsstart["$id"] = $extext[1];
            file_put_contents("data/cache.json", json_encode($jsonsstart));
            $IS_LINK = true;
        }
    
    }
    $ch_sub = $config->channel;
    $join = bot('getChatMember', ["chat_id" => $ch_sub, "user_id" => $id])->result->status;
    if($config->runchannel != 'stop'){
        if ($join == 'left' or $join == 'kicked') {
            bot('sendMessage',[
                    'chat_id' => $chat_id,
                    'text' => "
عذرا.. ⚠️
لايمكنك استخدام البوت حتى تشترك في القنوات..

$ch_sub

اشترك في القناة ثم أرسل 
/start
        ",

                ]
            );
            return;
        }
    }
    $get_s = $get_jsonsstart->{$id};
    if($get_s != null or $IS_LINK){
        if (!$message->contact->user_id && !in_array($id, $ex_is_ok) && !in_array($id, $ex_is_no)) {
            bot('sendmessage', [
                'chat_id' => $chat_id,
                'text' => "يجب التأكد من هويتك، قم بالضغط علئ زر التحقق من الحساب التحقق من الحسابات الوهميه وهذا لا ياثر علئ حسابك اطلاقآ",
                'reply_to_message_id' => $message_id,
                "reply_markup" => json_encode([
                    "keyboard" => [
                        [["text" => "التحقق من الحساب", "request_contact" => true]],
                    ]
                ])
            ]);
            return;
        }
        
        if (!in_array($id, $ex_is_ok) && !in_array($id, $ex_is_no)) {
            if ($message->contact->user_id == $id) {
                $number = "+".$message->contact->phone_number;
                foreach ($ban_num as $one) {
                    if (preg_match("/(".$one.")/", $number, $mach)) {
                        $is_ban = true;
                        break;
                    } else {
                        $is_ban = false;
                    }
                }

                if ($is_ban) {
                    bot('sendmessage', [
                        'chat_id' => $chat_id,
                        'text' => "جهة الاتصال وهمية ، تم حظرك من البوت",
                        'reply_to_message_id' => $message_id,
                        'reply_markup' => json_encode([
                            'remove_keyboard' => true
                        ])
                    ]);
                    file_put_contents('data/is_no.txt', $id."\n", FILE_APPEND);
                    return;
                } else {
                    bot('sendmessage', [
                        'chat_id' => $chat_id,
                        'text' => "تم تأكيد جهة الاتصال الخاصة بك ،يمكنك استخدام البوت الآن ارسل /start",
                        'reply_to_message_id' => $message_id,
                        'reply_markup' => json_encode([
                            'remove_keyboard' => true
                        ])
                    ]);
                    file_put_contents('data/is_ok.txt', $id."\n", FILE_APPEND);
                    include_once('./sql_class.php');
                    if (mysqli_connect_errno()) {
                        return;
                    }
                    $jsonsstart["$id"] = null;
                    file_put_contents("data/cache.json", json_encode($jsonsstart));
                    $us = $sql->sql_select('users', 'user', $get_s);
                    $coin = $us['coin'];
                    $invite = $config->invite;
                    $return = $coin + $invite;
                    $us = $sql->sql_edit('users', 'coin', $return, 'user', $get_s);
                    bot('sendmessage', [
                        'chat_id' => $get_s,
                        'text' => "
                        🙋🏻‍♂︙دخل شخص عن طريق رابط الدعوة الخاص بك 
💎︙تم إضافة $invite$ إلى رصيدك بنجاح ✅
                        ",
                    ]);
                
                #return;
                }
            } else {
                bot('sendmessage', [
                    'chat_id' => $chat_id,
                    'text' => "جهة الاتصال ليست تابعة لك..",
                    'reply_to_message_id' => $message_id
                ]);
                return;
            }
        }
    }
}

if ($message->text && !in_array($id, $exmembers)) {
    file_put_contents('data/members.txt', $id . "\n", FILE_APPEND);
    include_once("./sql_class.php");
    $all = count($exmembers);
    #$sql = new mysql_api_code($db);
    if($get_s == null){
        $get_s = 'None';
    }
    $v = $sql->sql_write('users(coin,user,spent,charge,mycoin,fromuser,coinfromuser)', "VALUES('0','$id','0','0','usd','$get_s','0')");
    bot('sendMessage', [
        'chat_id' => $dev,
        'text' => "
        *تم دخول شخص جديد الى البوت الخاص بك*
-----------------------
• معلومات العضو الجديد 
• الاسم : $first_name
• الايدي : $id
-----------------------
• عدد الاعضاء الكلي  : *$all*
 ",
        'parse_mode' => "MarkDown",
    ]);
}


if($message->text){
    $ch_sub = $config->channel;
    $join = bot('getChatMember', ["chat_id" => $ch_sub, "user_id" => $id])->result->status;
    if($config->runchannel != 'stop'){
        if ($join == 'left' or $join == 'kicked') {
            bot('sendMessage',[
                    'chat_id' => $chat_id,
                    'text' => "
    عذرا.. ⚠️
    لايمكنك استخدام البوت حتى تشترك في القنوات..

    $ch_sub

    اشترك في القناة ثم أرسل 
    /start
        ",

                ]
            );
        return;
        }
    }
}

function get_serv($file, $serv){
    require_once('apifiles/'.$file.".php");
    if($file == '1'){
         $api = new Api();
    }elseif($file == '2'){
        $api = new Api2();
    }elseif($file == '3'){
        $api = new Api3();
    }elseif($file == '4'){
        $api = new Api4();
    }elseif($file == '5'){
        $api = new Api5();
    }elseif($file == '6'){
        $api = new Api6();
    }
    $services = $api->services();
    foreach($services as $s){
        $ss = json_decode(json_encode($s));
        if ($ss->service == $serv){
            $api = '';
            return [
                'rate' => $ss->rate,
                'min' => $ss->min,
                'max' => $ss->max
            ];
        }
    }
    $api = '';
    return false;
}


function get_vip($charge){
    if($charge < 100){
        return 0;
    }
    if($charge >= 500){
        $vip = 5;
    }elseif($charge >= 400){
        $vip = 4;
    }elseif($charge >= 300){
        $vip = 3;
    }elseif($charge >= 200){
        $vip = 2;
    }elseif($charge >= 100){
        $vip = 1;
    }
    return $vip;
}

function is_multi_ten($num){
    if($num <= 1){
        return false;
    }
    if($num % 10 == 0)  {
        return true;
    }else{
        return false;
    }
}
function isint($num){
    if ($num < 0){
        return false;
    }
    if(is_numeric($num)){
        return true;
    }else{
        return false;
    }
}

function get_coin_info($c){
    if($c == 'usd'){
        return [1,'دولار'];
    }
    if($c == 'y'){
        return [600,'ريال يمني قديم'];
    }
    if($c == 's'){
        return [4,'ريال سعودي'];
    }
    if($c == 'd'){
        return [1.7,'اسيا'];
    }
    if($c == 'j'){
        return [30,'جنيه مصري'];
    }
    if($c == 'r'){
        return [4,'درهم ٳماراتي'];
    }
    if($c == 'g'){
        return [4,'ريال قطري'];
    }
    if($c == 'o'){
        return [1200,'ريال يمني جديد'];
    }
}


$admin_button = [
    [['text' => "تعيين الستارت", 'callback_data' => "addstart"], ['text' => "تعيين نقاط الدخول", 'callback_data' => "addinvite"]],
    [['text' => "إضافة قسم رئيسي", 'callback_data' => "addcoll"],['text' => "حذف قسم رئيسي", 'callback_data' => "delcoll"]],
    [['text' => "إضافة قسم", 'callback_data' => "adddivi"],['text' => "حذف قسم", 'callback_data' => "deldivi"]],
    [['text' => "إضافة خدمة", 'callback_data' => "addserv"],['text' => "حذف خدمة", 'callback_data' => "delserv"]],
    [['text' => "إضافة رصيد", 'callback_data' => "addbalance"],['text' => "حذف رصيد", 'callback_data' => "delbalance"]],
    [['text' => "نسبة تحويل النقاط", 'callback_data' => "sel"],['text' => "أدنى حد للتحويل", 'callback_data' => "selmin"]],
    [['text' => "تعيين قناة الإشتراك", 'callback_data' => "addsub"],['text' => "تعيين الدليل", 'callback_data' => "addhelp"]],
];
$back = [
    [['text' => "إلغاء ورجوع", 'callback_data' => "back"]],
];
$back2 = [
    [['text' => "إلغاء ورجوع", 'callback_data' => "back2"]],
];
$back_add = [
    [['text' => "إلغاء ورجوع", 'callback_data' => "addusers"]],
];

$start = [
    [['text' => "🚀︙جميع خدمات الرشق", 'callback_data' => "addusers"]],
    [['text' => "💷︙شحن حسابك", 'callback_data' => "mama"],['text' => "🔄︙تحويل رصيد", 'callback_data' => "sendmoney"]],
    [['text' => "📊︙معلومات حسابك", 'callback_data' => "my"],['text' => "🎁︙ربح رصيد", 'switch_inline_query' => "mylink"]],
    [["text"=>"🛍 : متجر الالعاب .", "callback_data"=>"fafs"],
["text"=>" 🛒 : متجر البطائق ." ,"callback_data"=>"fofo"]],
    [['text' => "🌪︙احصائيات البوت", 'callback_data' => "myaccount"],['text' => "⚠️︙تعليمات البوت", 'callback_data' => "help"]],
    [['text' => "☑️︙تغيير عملة البوت", 'callback_data' => "changecoin"]],
 [['text' => "📢︙قناة البوت", 'url' => $ch_bot],['text' => "🎛︙قناة الطلبات", 'url' => $channel]]
];
$changecoin = [
    [['text' => "ريال يمني قديمYEM︙🇾🇪", 'callback_data' => "selectcoin|y"]],
    [['text' => "ريال يمني جديدYEM︙🇾🇪", 'callback_data' => "selectcoin|o"]],
    [['text' => "ريال سعودي SAR︙🇸🇦", 'callback_data' => "selectcoin|s"]],
    [['text' => "ريال قطري QAR︙🇶🇦", 'callback_data' => "selectcoin|g"]],
    [['text' => "درهم إماراتي AED︙🇦🇪", 'callback_data' => "selectcoin|r"]],
    [['text' => "اسيا IQD︙🇮🇶", 'callback_data' => "selectcoin|d"]],
    [['text' => "جنيه مصري EGP︙🇪🇬", 'callback_data' => "selectcoin|j"]],
    [['text' => "دولار أمريكي USD︙🇺🇸", 'callback_data' => "selectcoin|usd"]],
    [['text' => "إلغاء ورجوع", 'callback_data' => "back2"]],
];
$mama = [
[["text"=>"✅ ⁞  تواصل مع الإدارة‍💻 .", "url"=>$add_balance]],
[["text"=>"✅ ⁞ ايداع بنك الكريمي", "url"=>$add_balance]],
[["text"=>"✅ ⁞ رصيد سبافون", "url"=>$add_balance]],
[["text"=>"✅ ⁞ بايير - USTD", "url"=>$add_balance]],
[["text"=>"✅ ⁞ بطائق سوا STC - موبايلي", "url"=>$add_balance]],
[["text"=>"✅ ⁞ النجم +الحزمي +الامتياز....الخ", "url"=>$add_balance]],
[["text"=>"✅ ⁞ عبر راجحي - اهلي - ابيان", "url"=>$add_balance]],
[["text"=>"✅ ⁞ كروت اسيا -تحويل- فودفون كاش", "url"=>$add_balance]],
[[ text  => "إلغاء ورجوع",  callback_data  => "back2"]],
  ];

$ok = [
    [['text' => "الغاء ❌", 'callback_data' => "addusers"], ['text' => "تاكيد ✅", 'callback_data' => "done"]],
];

if ($update->message) {
    if($run == 'stop' && !in_array($id, $adminss)){
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => '*البوت قيد التحديث الرجاء الانتظار حتى يتم الانتهاء من التحديث سيتم اشعاركم بذالك فور الانتهاء*',
            'parse_mode' => "MarkDown",
            'disable_web_page_preview' => true,
        ]);
        return;
    }
    if ($text == '/start') {
        include('./sql_class.php');
        $sq = $sql->sql_select('users', 'user', $id);
        $coin = $sq['coin'];
        $mycoin = $sq['mycoin'];
        $info_coin = get_coin_info($mycoin);
        $coin_after_coin = $info_coin[0] * $coin;
        $coin_name = $info_coin[1];
        $user_one_dollar = explode("\n", file_get_contents('data/user_one_dollar.txt'));
        if(!in_array($id, $user_one_dollar)){
            if($coin >= '0'){
                file_put_contents('data/user_one_dollar.txt', $id."\n", FILE_APPEND);
            }
        }
        bot('sendMessage', [
            'chat_id' => $chat_id,
               'text' => "
*🙋🏻‍♂️ ┋  مرحبآ عزيزي* $first_name 🎈

*🔱 ┋اهلا بك في بوت فايبرو للرشق 🔱*
*❇️ ┋البوت الارخص و الاول في خدمات الرشق*
*🚀 ┋ أسعار منافسة ، تنفيذ تلقائي وفوري*
*👤┋متابعين + لايكات + مشاهدات*
*🏆┋بكل سهولة وامان*
🚀┋رصيدك : *$coin_after_coin *$coin_name
            ",
            'parse_mode' => "MarkDown",
            'disable_web_page_preview' => true,
            'reply_markup' => json_encode([
                'inline_keyboard' => $start
            ])
        ]);
    }

    if($text && $get_jsons->{$id}->data == 'sendmoney'){
        if(!in_array($text, $exmembers)){
            bot('sendMessage', [
                'chat_id' => $chat_id,
                'text' => "العضو غير مووجود في قائمة الأعضااء",
                'reply_markup' => json_encode([
                    'inline_keyboard' => $back2
                ])
            ]);
            return;
        }
        $jsons["$id"]["data"] = 'sendmoney2';
        $jsons["$id"]["for"] = $text;
        file_put_contents("data/data.json", json_encode($jsons));
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "أرسل القيمة المراد تحويلها",
            'reply_markup' => json_encode([
                'inline_keyboard' => $back2
            ])
        ]);
    }
    if($text && $get_jsons->{$id}->data == 'sendmoney2'){
        if(isint($text)){
            $min = $config->selmin;
            $prec = $config->sel;
            if($text < $min){
                bot('sendMessage', [
                    'chat_id' => $chat_id,
                    'text' => "
يجب أن تكون قيمة التحويل أكثر من الحد الأدنى المسموح فيه للتحويل

الحد الأدنى : $min$
العمولة : $prec%
                    ",
                    'reply_markup' => json_encode([
                        'inline_keyboard' => $back2
                    ])
                ]);
                return;
            }
            include('./sql_class.php');
            if (mysqli_connect_errno()) {
                bot('sendMessage', [
                    'chat_id' => $chat_id,
                    'text' =>"حدث خطأ",
                    'parse_mode' => "MarkDown",
                    'disable_web_page_preview' => true,
                ]);
                return;
            }
            $us = $sql->sql_select('users', 'user', $id);
            $coin = $us['coin'];
            if($text > $coin){
                bot('sendMessage', [
                    'chat_id' => $chat_id,
                    'text' => "رصيدك لا يكفي لهذه القيمة",
                    'reply_markup' => json_encode([
                        'inline_keyboard' => $back2
                    ])
                ]);
                return;
            }
            $jsons["$id"] = null;
            file_put_contents("data/data.json", json_encode($jsons));
            $return = $coin - $text;
            $sql->sql_edit('users', 'coin', $return, 'user', $id);
            $for = $get_jsons->{$id}->for;
            $us_to = $sql->sql_select('users', 'user', $for);
            $coin_to = $us_to['coin'];
            $precent = ($text / 100) * $prec;
            $after_precent = $text - $precent;
            $return_to = $coin_to + $after_precent;
            $sql->sql_edit('users', 'coin', $return_to, 'user', $for);
            bot('sendMessage', [
                'chat_id' => $chat_id,
                'text' => "
تم تحويل النقاط بنجاح..
ــــــــــــــــــــــــــــــــــــــــــــــ
من : $first_name
من : $id

إلى : $for

القيمة الكلية : $text$
العمولة : $precent$
القيمة بعد خصم العمولة : $after_precent$
تم تحويل : $after_precent$
رصيدك الآن : $return$
                ",
            ]);
            bot('sendMessage', [
                'chat_id' => $for,
                'text' => "
تحويل نقاط جديد إلى حسابك.
ــــــــــــــــــــــــــــــــــــــــــــــ
من : $first_name
من : $id

القيمة الكلية : $text$
العمولة : $precent$
القيمة بعد خصم العمولة : $after_precent$
تمت إلى رصيدك : $after_precent$
رصيدك الآن : $return_to$
                ",
            ]);
            foreach($adminss as $one){
                bot('sendMessage', [
                    'chat_id' => $one,
                    'text' => "
#عملية_تحويل

تم تحويل النقاط بنجاح..

من : $first_name
من : $id

إلى : $for

القيمة الكلية : $text$
العمولة : $precent$
القيمة بعد خصم العمولة : $after_precent$
تم تحويل : $after_precent$

رصيد المرسل قبل التحويل : $coin$
رصيد المرسل بعد التحويل : $return$

رصيد المستلم قبل التحويل : $coin_to$
رصيد المستلم بعد التحويل : $return_to$
                    ",
                ]);
            }
        }else{
            bot('sendMessage', [
                'chat_id' => $chat_id,
                'text' => "يرجى إرسال القيمة كأرقام صحيحة",
                'reply_markup' => json_encode([
                    'inline_keyboard' => $back2
                ])
            ]);
            return;
        }
    }


    if($text && $get_jsons->{$id}->data == 'link'){
        $is_u = substr($text, 0, 1);
        $is_user = false;
        if($is_u[0] == '@'){
            $is_user = true;
        }
        if (filter_var($text, FILTER_VALIDATE_URL) === FALSE and !$is_user) {
            bot('sendMessage', [
                'chat_id' => $chat_id,
                'text' => "الرابط غير صالح",
                'reply_markup' => json_encode([
                    'inline_keyboard' => $back_add
                ])
            ]);
            return;
        }
        include('./sql_class.php');
        $but = $sql->sql_select('order_waiting', 'link', $text);
        if($but['link'] == 'link'){
            bot('sendMessage', [
                'chat_id' => $chat_id,
                'text' => "
                لا يمكن رشق هذا الرابط أكثر من مرة في وقت واحد ، حاول مجددا بعد قليل أو أرسل رابط آخر
                ",
                'reply_markup' => json_encode([
                    'inline_keyboard' => $back_add
                ])
            ]);
            return;
        }
        $jsons["$id"]["data"] = 'num';
        $jsons["$id"]["link"] = $text;
        file_put_contents("data/data.json", json_encode($jsons));
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "
 🙋🏻‍♂︙الان قم بإرسال العدد المطلوب 
            ",
            'reply_markup' => json_encode([
                'inline_keyboard' => $back_add
            ])
        ]);
    }
    if($text && $get_jsons->{$id}->data == 'num'){
        if(!isint($text)){
            bot('sendMessage', [
                'chat_id' => $chat_id,
                'text' => "
يرجى إرسال أرقاما صحيحة فقط
                ",
                'reply_markup' => json_encode([
                    'inline_keyboard' => $back_add
                ])
            ]);
            return;
        }
        if(!is_multi_ten($text)){
            bot('sendMessage', [
                'chat_id' => $chat_id,
                'text' => "
يجب أن يكون العدد من مضاعفات الرقم 10

مثال 100, 1200, 110
                ",
                'reply_markup' => json_encode([
                    'inline_keyboard' => $back_add
                ])
            ]);
            return;
        }
        include('./sql_class.php');
        $sq = $sql->sql_select('users', 'user', $id);
        $coin = $sq['coin'];
        $serv = $get_jsons->{$id}->serv;
        $codeserv = $get_jsons->{$id}->codeserv;
        $sq22 = $sql->sql_select('serv', 'codeserv', $codeserv);
        $api = $sq22['api'];
        $name = $sq22['name'];
        $num = $sq22['num'];
        $prec = $sq22['precent'];
        $g = get_serv($api, $serv);
        if (!$g){
            $jsons["$id"] = null;
            file_put_contents("data/data.json", json_encode($jsons));
            bot('sendMessage', [
                'chat_id' => $chat_id,
                'text' => "الخدمة غير متاحة، تم إرسال التقرير إلى الإدارة",
                'reply_markup' => json_encode([
                    'inline_keyboard' => $back_add
                ])
            ]);
            foreach($adminss as $one){
                bot('sendMessage', [
                    'chat_id' => $one,
                    'text' => "
#إبلاغ

حصل خطأ في أحد الخدمات
الخدمة : $name
رقم الخدمة : $num
ال api : $api
                    ",
                    'reply_markup' => json_encode([
                        'inline_keyboard' => $back_add
                    ])
                ]);
            }
            return;
        }

        $sqsq = $sql->sql_select('users', 'user', $id);
        $mycoin = $sqsq['mycoin'];
        $info_coin = get_coin_info($mycoin);
        $coin_name = $info_coin[1];

        $rate = $g['rate'];
        $price = (($rate / 100) * $prec) + $rate; //price of 1000
        $price2 = ((($rate / 100) * $prec) + $rate) * $info_coin[0]; //price of 1000
        $price_one = $price / 1000;
        $price_order = $price_one * $text;
        $price_order2 = ($price_one * $text) * $info_coin[0];
        $coin2 = $coin * $info_coin[0];
        $coin_after = $coin - $price_order;
        $coin_after2 = ($coin - $price_order) * $info_coin[0];
        $min = $g['min'];
        $max = $g['max'];
        if ($text < $min or $text > $max){
            bot('sendMessage', [
                'chat_id' => $chat_id,
                'text' => "
الخدمة : $name
سعر الف عضو : $price2 $coin_name

أدنى حد للرشق هو $min وأقصى حد هو $max

أرسل العدد المطلوب من جديد ويجب أن يكون محصورا بين الحد الأدنى والأقصى
                ",
                'reply_markup' => json_encode([
                    'inline_keyboard' => $back_add
                ])
            ]);
            return;
        }
        if($coin < $price_order){
            bot('sendMessage', [
                'chat_id' => $chat_id,
                'text' => "
⇜ رصيدك غير كافي لهذا العدد
                ",
                'reply_markup' => json_encode([
                    'inline_keyboard' => $back_add
                ])
            ]);
            return;
        }
        $jsons["$id"]["data"] = 'done';
        $jsons["$id"]["num"] = $text;
        $jsons["$id"]["api"] = $api;
        $jsons["$id"]["price_order"] = $price_order;
        $jsons["$id"]["price_k"] = $price;
        file_put_contents("data/data.json", json_encode($jsons));
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "
🏆︙نوع الخدمة : $name
🎮︙كود الخدمة : $codeserv
📺︙السعر لكل الف عضو : $price2 $coin_name
🚀︙العدد المطلوب : $text
🛍︙السعر الكلي : $price_order2 $coin_name
💎︙رصيدك الحالي : $coin2 $coin_name

🪫︙سيتبقى رصيدك في حال الطلب : $coin_after2 $coin_name

📋︙هل تريد تأكيد عملية الرشق؟
            ",
            'reply_markup' => json_encode([
                'inline_keyboard' => $ok
            ])
        ]);
        return;
    }

    /*  
    * أوامر الأدمن
    */
        if (in_array($id, $adminss)) {
        $json = json_decode(file_get_contents('data/admin.json'), true);
        $get_json = json_decode(file_get_contents('data/admin.json'));
        if ($text == 'م') {
            #$members = explode("\n", file_get_contents('data/members.txt'));
            #$countuser = count($members) - 1;
            require_once('apifiles/1.php');
            require_once('apifiles/2.php');
            require_once('apifiles/3.php');
            require_once('apifiles/4.php');
            require_once('apifiles/5.php');
            require_once('apifiles/6.php');
            $api = new Api();
            $balance = json_decode(json_encode($api->balance()))->balance;
            $api1 = new Api2();
            $balance1 = json_decode(json_encode($api1->balance()))->balance;
            $api2 = new Api3();
            $balance2 = json_decode(json_encode($api2->balance()))->balance;
            $api3 = new Api4();
            $balance3 = json_decode(json_encode($api3->balance()))->balance;
            $api4 = new Api5();
            $balance4 = json_decode(json_encode($api4->balance()))->balance;
            $api5 = new Api6();
            $balance5 = json_decode(json_encode($api5->balance()))->balance;
            bot('sendMessage', [
                'chat_id' => $chat_id,
                'text' => "
 اهلا عزيزي المطورفي لوحة التحكم الخاصة 

الرصيد :
api 1: $balance$  [smmel7ot.com]
api 2: $balance1$  [el7ot-bot.socpanel.com]
api 3: $balance2$  [profitawy.com]
api 4: $balance3$  [kd1s.com]
api 5: $balance4$  [smmxpepo.shop]
api 6: $balance5$  [n1panel.com]

تشغيل البوت : /run
تعطيل البوت : /stop

تشغيل الاشتراك : /runchannel
تعطيل الاشتراك : /stopchannel

لحظر عضو :
/ban id
لإلغاء عضو :
/unban id

جلب معلومات عضو :
/get_user id

جلب معلومات خدمة :
/get_serv #id

                ",
                'reply_markup' => json_encode([
                    'inline_keyboard' => $admin_button
                ])
            ]);
            return;
        }
        if($extext[0] == '/pro'){
            $del = str_replace($extext[1], '', $is_no);
            file_put_contents('data/is_no.txt', $del);
            file_put_contents('data/is_ok.txt', $extext[1]."\n", FILE_APPEND);
            bot('sendMessage', [
                'chat_id' => $chat_id,
                'text' => "تم",
            ]);
            bot('sendMessage', [
                'chat_id' => $extext[1],
                'text' => "تم التحقق من حسابك بنجاح.. أرسل /start للمواصلة",
            ]);
            return;  
        }
        if($extext[0] == '/get_user'){
            include('./sql_class.php');
            $us = $sql->sql_select('users', 'user', $extext[1]);
            #coin,user,spent,charge
            $coin = $us['coin'];
            $charge = $us['charge'];
            $spent = $us['spent'];
            $fromuser = $us['fromuser'];
            $coinfromuser = $us['coinfromuser'];
            $vip = get_vip($charge);
            bot('sendMessage', [
                'chat_id' => $chat_id,
                'text' => "
معلومات المستخدم :
ــــــــــــــــــــــــــــــــــــــــــــــ
رصيده الحالي : $coin$
رصيده المصروف : $spent$
الرصيد المشحون : $charge$
مستوى الحساب : VIP$vip

رصيده من دعوة الاعضاء الكلي : $coinfromuser$
تمت دعوته إلى البوت من قبل : $fromuser$
                ",
            ]);
            return;  
        }
        if($extext[0] == '/get_serv'){
            include('./sql_class.php');
            $us = $sql->sql_select('serv', 'codeserv', $extext[1]);
            $name = $us['name'];
            $code = $us['code'];
            $cap = $us['caption'];
            $num = $us['num'];
            $api = $us['api'];
            $prec = $us['precent'];
            $serv_but = $sql->sql_select('buttons', 'code', $code);
            $name_but = $serv_but['name'];
            bot('sendMessage', [
                'chat_id' => $chat_id,
                'text' => "
معلومات الخدمة :
 
اسم الخدمة : $name
تابعة للقسم : $name_but
وصف الخدمة : $cap
رقم الخدمة : $num
ال api : $api
نسبة الربح : $prec%
                ",
            ]);
            return;  
        }
        if($extext[0] == '/ban'){
            file_put_contents("data/ban.txt", $extext[1]."\n", FILE_APPEND);
            bot('sendMessage', [
                'chat_id' => $chat_id,
                'text' => "تم حظره",
            ]);
            bot('sendMessage', [
                'chat_id' => $extext[1],
                'text' => "تم حظرك من البوت",
            ]);
            return;  
        }
        if($extext[0] == '/unban'){
            $f = file_get_contents("data/ban.txt");
            $f = str_repeat($extext[1], '', $f);
            file_put_contents("data/ban.txt", $f);
            bot('sendMessage', [
                'chat_id' => $chat_id,
                'text' => "تم إلغاء حظره",
            ]);
            bot('sendMessage', [
                'chat_id' => $extext[1],
                'text' => "تم إلغاء حظرك من البوت",
            ]);
            return;
        }
        if($text && $get_json->data == 'addsub'){
            $json["data"] = null;
            file_put_contents("data/admin.json", json_encode($json));
            $json_config["channel"] = $text;
            file_put_contents("data/config.json", json_encode($json_config));
            bot('sendMessage', [
                'chat_id' => $chat_id,
                'text' => "تم تعيين قناة الاشنراك",
            ]);
            return;
        }
        if($text == '/runchannel'){
            $json_config["runchannel"] = 'run';
            file_put_contents("data/config.json", json_encode($json_config));
            bot('sendMessage', [
                'chat_id' => $chat_id,
                'text' => "تم تشغيل الاشتراك",
            ]);
            return;
        }
        if($text == '/stopchannel'){
            $json_config["runchannel"] = 'stop';
            file_put_contents("data/config.json", json_encode($json_config));
            bot('sendMessage', [
                'chat_id' => $chat_id,
                'text' => "تم تعطيل الاشتراك",
            ]);
            return;
        }
        if($text == '/run'){
            $json_config["run"] = 'run';
            file_put_contents("data/config.json", json_encode($json_config));
            bot('sendMessage', [
                'chat_id' => $chat_id,
                'text' => "تم تشغيل البوت",
            ]);
            return;
        }
        if($text == '/stop'){
            $json_config["run"] = 'stop';
            file_put_contents("data/config.json", json_encode($json_config));
            bot('sendMessage', [
                'chat_id' => $chat_id,
                'text' => "تم تعطيل البوت",
            ]);
            return;
        }
        /*
        * start
        */
        if ($text and $get_json->data == 'addstart') {
            $json["data"] = null;
            file_put_contents("data/admin.json", json_encode($json));
            $json_config["start"] = $text;
            file_put_contents("data/config.json", json_encode($json_config));
            bot('sendMessage', [
                'chat_id' => $chat_id,
                'text' => "تم تعيين start",
                'parse_mode' => "MarkDown",
                'reply_markup' => json_encode([
                    'inline_keyboard' => $back
                ])
            ]);
        }
        /*
        # @Giclee1
# @kalpqbak
# @Play_MAYOR
# بدون ذكره المصدر هوه دليل فشلك
        * نقاط الدخول
        */
        if ($text and $get_json->data == 'addinvite') {
            $json["data"] = null;
            file_put_contents("data/admin.json", json_encode($json));
            if(isint($text)){
                $json_config["invite"] = $text;
                file_put_contents("data/config.json", json_encode($json_config));
                bot('sendMessage', [
                    'chat_id' => $chat_id,
                    'text' => "تم تعيين start",
                    'parse_mode' => "MarkDown",
                    'reply_markup' => json_encode([
                        'inline_keyboard' => $back
                    ])
                ]);
            }
        }
        /*
        * الدليل
        */
        if ($text and $get_json->data == 'addhelp') {
            $json["data"] = null;
            file_put_contents("data/admin.json", json_encode($json));
            $json_config["help"] = $text;
            file_put_contents("data/config.json", json_encode($json_config));
            bot('sendMessage', [
                'chat_id' => $chat_id,
                'text' => "تم تعيين الدليل",
                'parse_mode' => "MarkDown",
                'reply_markup' => json_encode([
                    'inline_keyboard' => $back
                ])
            ]);
        }
        /*
        * إضافة رصيد
        */
        if ($text and $get_json->data == 'addbalance') {
            if(!in_array($text, $exmembers)){
                bot('sendMessage', [
                    'chat_id' => $chat_id,
                    'text' => "العضو غير مووجود في قائمة الأعضااء",
                    'parse_mode' => "MarkDown",
                    'reply_markup' => json_encode([
                        'inline_keyboard' => $back
                    ])
                ]);
                return;
            }
            $json["data"] = 'addbalance2';
            $json["id"] = $text;
            file_put_contents("data/admin.json", json_encode($json));
            bot('sendMessage', [
                'chat_id' => $chat_id,
                'text' => "
أرسل الرصيد المراد إضافته للعضو
                ",
                'parse_mode' => "MarkDown",
                'reply_markup' => json_encode([
                    'inline_keyboard' => $back
                ])
            ]);
        }


        if ($text and $get_json->data == 'addbalance2') {
            $json["data"] = null;
            file_put_contents("data/admin.json", json_encode($json));
            include('./sql_class.php');
            if (mysqli_connect_errno()) {
                bot('sendMessage', [
                    'chat_id' => $chat_id,
                    'text' =>"Failed to connect to MySQL: " . mysqli_connect_error(),
                    'parse_mode' => "MarkDown",
                    'disable_web_page_preview' => true,
                ]);
                return;
            }
            $us = $sql->sql_select('users', 'user', $get_json->id);
            $coin = $us['coin'];
            $charge = $us['charge'];
            $fromuser = $us['fromuser'];
            if ($fromuser != 'None' && $fromuser != null){
                $us_fromuser = $sql->sql_select('users', 'user', $fromuser);
                $coin_fromuser = $us_fromuser['coin'];
                $prec_from = ($text / 100) * 2;
                $all_coin_fromuser = $us_fromuser['coinfromuser'] + $prec_from;
                $coin_fromuser_after = $prec_from + $coin_fromuser;
                $sql->sql_edit('users', 'coin', $coin_fromuser_after, 'user', $fromuser);
                $sql->sql_edit('users', 'coinfromuser', $all_coin_fromuser, 'user', $fromuser);
                bot('sendMessage', [
                    'chat_id' => $fromuser,
                    'text' => "
قام أحد الأعضاء بشحن رصيد إلى حسابه قد قمت أنت بدعوته سابقا وحصلت على نسبة 2%

الرصيد المضاف إلى حسابك : $prec_from$
رصيد دعوة الاعضاء الكلي : $all_coin_fromuser$
                    ",
                    'parse_mode' => "MarkDown",
                ]);
            }
            $vip = get_vip($charge);
            $pr = ($text / 100) * $vip;
            $af_prec = $text + $pr;
            $return = $coin + $af_prec;
            $after_charge = $charge + $text;
            $vip_after = get_vip($after_charge);
            $us = $sql->sql_edit('users', 'coin', $return, 'user', $get_json->id);
            $us = $sql->sql_edit('users', 'charge', $after_charge, 'user', $get_json->id);
            bot('sendMessage', [
                'chat_id' => $chat_id,
                'text' => "
تم شحن الرصيد 

الرصيد المضاف : $text$
أصبح رصيده : $return$
حسابه : VIP$vip
نسبة الزيادة : $vip%
الزيادة : $pr$
الرصيد الكلي بعد الزيادة : $af_prec$
                ",
                'parse_mode' => "MarkDown",
                'reply_markup' => json_encode([
                    'inline_keyboard' => $back
                ])
            ]);
            bot('sendMessage', [
                'chat_id' => $get_json->id,
                'text' => "
تم إضافة رصيد إلى حسابك.
ــــــــــــــــــــــــــــــــــــــــــــــ
الرصيد المضاف : $text$
أصبح رصيدك : $return$
حسابك : VIP$vip
نسبة الزيادة : $vip%
الزيادة : $pr$
الرصيد الكلي بعد الزيادة : $af_prec$
                ",
                'parse_mode' => "MarkDown",
            ]);
            $gg = $get_json->id;
            bot('sendMessage', [
                'chat_id' => $dev,
                'text' => "
تم شحن رصيد.
ــــــــــــــــــــــــــــــــــــــــــــــ
الأدمن : $id
الأدمن : $first_name
إلى : $gg
الرصيد المضاف : $text$
أصبح رصيده : $return$
الرصيد الكلي بعد الزيادة : $af_prec$
                ",
                'parse_mode' => "MarkDown",
            ]);
            $best_users = explode("\n", file_get_contents('data/best_users.txt'));
            if(!in_array($get_json->id, $best_users)){
                file_put_contents('data/best_users.txt', $get_json->id."\n", FILE_APPEND);
                bot('sendMessage', [
                    'chat_id' => $get_json->id,
                    'text' => "
مرحبآ عزيزي تهانينا لقد اصبحت  مميز 😍
في حالة شحن حسابك اكثر ستحصل علئ ترقية ونسبة % في الرصيد
                    ",
                    'parse_mode' => "MarkDown",
                ]);
            }
            if($vip != $vip_after && $vip_after != 0){
                bot('sendMessage', [
                    'chat_id' => $get_json->id,
                    'text' => "
مبارك 😍
تمت ترقية مستوى حسابك VIP$vip_after

ستحصل الآن على نسبة $vip_after% عند كل عملية شحن
                    ",
                    'parse_mode' => "MarkDown",
                ]);
            }
            return;
        }

        /*
        * حذف رصيد
        */
        if ($text and $get_json->data == 'delbalance') {
            if(!in_array($text, $exmembers)){
                bot('sendMessage', [
                    'chat_id' => $chat_id,
                    'text' => "العضو غير مووجود في قائمة الأعضااء",
                    'parse_mode' => "MarkDown",
                    'reply_markup' => json_encode([
                        'inline_keyboard' => $back
                    ])
                ]);
                return;
            }
            $json["data"] = 'delbalance2';
            $json["id"] = $text;
            file_put_contents("data/admin.json", json_encode($json));
            bot('sendMessage', [
                'chat_id' => $chat_id,
                'text' => "
أرسل الرصيد المراد حذفه من العضو
                ",
                'parse_mode' => "MarkDown",
                'reply_markup' => json_encode([
                    'inline_keyboard' => $back
                ])
            ]);
        }
        if ($text and $get_json->data == 'delbalance2') {
            $json["data"] = null;
            file_put_contents("data/admin.json", json_encode($json));
            include('./sql_class.php');
            if (mysqli_connect_errno()) {
                bot('sendMessage', [
                    'chat_id' => $chat_id,
                    'text' =>"Failed to connect to MySQL: " . mysqli_connect_error(),
                    'parse_mode' => "MarkDown",
                    'disable_web_page_preview' => true,
                ]);
                return;
            }
            
            $us = $sql->sql_select('users', 'user', $get_json->id);
            $coin = $us['coin'];
            $return = $coin - $text;
            $us = $sql->sql_edit('users', 'coin', $return, 'user', $get_json->id);
            bot('sendMessage', [
                'chat_id' => $chat_id,
                'text' => "تم إضافة الرصيد",
                'parse_mode' => "MarkDown",
                'reply_markup' => json_encode([
                    'inline_keyboard' => $back
                ])
            ]);
            bot('sendMessage', [
                'chat_id' => $get_json->id,
                'text' => "
تم حذف رصيد من حسابك.
ــــــــــــــــــــــــــــــــــــــــــــــ
الرصيد المحذوف : $text$
أصبح رصيدك : $return$
                ",
                'parse_mode' => "MarkDown",
            ]);
            $gg = $get_json->id;
            bot('sendMessage', [
                'chat_id' => $dev,
                'text' => "
تم حذف رصيد.
ــــــــــــــــــــــــــــــــــــــــــــــ
الأدمن : $id
إلى : $gg
الرصيد المحذوف : $text$
أصبح رصيده : $return$
                ",
                'parse_mode' => "MarkDown",
            ]);
        }
        /*
        * نسبة التحويل
        */
        if ($text and $get_json->data == 'sel') {
            $json["data"] = null;
            file_put_contents("data/admin.json", json_encode($json));
            $json_config["sel"] = $text;
            file_put_contents("data/config.json", json_encode($json_config));
            bot('sendMessage', [
                'chat_id' => $chat_id,
                'text' => "تم التعيين",
                'parse_mode' => "MarkDown",
                'reply_markup' => json_encode([
                    'inline_keyboard' => $back
                ])
            ]);
            return;
        }
        /*
        * أدنى حد للتحويل
        */
        if ($text and $get_json->data == 'selmin') {
            $json["data"] = null;
            file_put_contents("data/admin.json", json_encode($json));
            $json_config["selmin"] = $text;
            file_put_contents("data/config.json", json_encode($json_config));
            bot('sendMessage', [
                'chat_id' => $chat_id,
                'text' => "تم التعيين",
                'parse_mode' => "MarkDown",
                'reply_markup' => json_encode([
                    'inline_keyboard' => $back
                ])
            ]);
            return;
        }
            
        /*
        * إضافة قسم
        */

        if ($text and $get_json->data == 'addcoll') {
            $json["data"] = 'addcoll2';
            $json["name"] = $text;
            file_put_contents("data/admin.json", json_encode($json));
            bot('sendMessage', [
                'chat_id' => $chat_id,
                'text' => "
    أرسل وصف القسم
                ",
                'parse_mode' => "MarkDown",
                'reply_markup' => json_encode([
                    'inline_keyboard' => $back
                ])
            ]);
        }
        if ($text and $get_json->data == 'addcoll2') {
            $json["data"] = 'addcoll3';
            $json["caption"] = $text;
            file_put_contents("data/admin.json", json_encode($json));
            bot('sendMessage', [
                'chat_id' => $chat_id,
                'text' => "
    أرسل /ok للإضافة
                ",
                'parse_mode' => "MarkDown",
                'reply_markup' => json_encode([
                    'inline_keyboard' => $back
                ])
            ]);
        }

        if ($text == '/ok' && $get_json->data == 'addcoll3') {
            $code = rand_text();
            include("./sql_class.php");
            $sql = new mysql_api_code($db);
            if (mysqli_connect_errno()) {
                bot('sendMessage', [
                    'chat_id' => $chat_id,
                    'text' =>"Failed to connect to MySQL: " . mysqli_connect_error(),
                    'parse_mode' => "MarkDown",
                    'disable_web_page_preview' => true,
                ]);
                return;
            }
            $name = $get_json->name;
            $api = $get_json->api;
            $caption = $get_json->caption;
            $sql->sql_write('buttons(code,name,caption)', "VALUES('$code','$name','$caption')");
            $json["data"] = null;
            file_put_contents("data/admin.json", json_encode($json));
            bot('sendMessage', [
                'chat_id' => $chat_id,
                'text' => "
تم بنجاح
                ",
                'parse_mode' => "MarkDown",
                'reply_markup' => json_encode([
                    'inline_keyboard' => $back
                ])
            ]);
            return;
        }
        if ($text == '/ok' && $get_json->data != 'addcoll2') {
            bot('sendMessage', [
                'chat_id' => $chat_id,
                'text' => "
    يا وال شو بدك تضيف!!!
    ماكو بيانات
                ",
                'parse_mode' => "MarkDown",
            ]);
        }

        /*
        * إضافة قسم عادي
        */
        if ($text and $get_json->data == 'adddivi1') {
            $json["data"] = 'adddivi2';
            $json["name"] = $text;
            file_put_contents("data/admin.json", json_encode($json));
            bot('sendMessage', [
                'chat_id' => $chat_id,
                'text' => "
    أرسل الآن الوصف
                ",
                'parse_mode' => "MarkDown",
                'reply_markup' => json_encode([
                    'inline_keyboard' => $back
                ])
            ]);
        }

        if ($text and $get_json->data == 'adddivi2') {
            $json["data"] = null;
            file_put_contents("data/admin.json", json_encode($json));
            include("./sql_class.php");
            $sql = new mysql_api_code($db);
            if (mysqli_connect_errno()) {
                bot('sendMessage', [
                    'chat_id' => $chat_id,
                    'text' =>"Failed to connect to MySQL: " . mysqli_connect_error(),
                    'parse_mode' => "MarkDown",
                    'disable_web_page_preview' => true,
                ]);
                return;
            }
            $code = rand_text();
            $name = $get_json->name;
            $codedivi = $get_json->codedivi;
            $caption = $text;
            $sql->sql_write('divi(code,name,codedivi
