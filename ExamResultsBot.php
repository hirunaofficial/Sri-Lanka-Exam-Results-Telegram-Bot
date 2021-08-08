<?php
$token = 'BOT_TOKEN';
$img = 'BOT_IMG';

$input = file_get_contents('php://input');
$update = json_decode($input);
$send = $update->message->text;
$chat_id = $update->message->chat->id;
$fname = $update->message->chat->first_name;
$lname = $update->message->chat->last_name;

$inlinebutton = [
    'inline_keyboard' => [
        [
            ['text' => 'Support Group', 'url' => 'https://t.me/sltechzoneofficial'],
            ['text' => 'Update Channel', 'url' => 'https://t.me/sltechzone']
        ],
        [
            ['text' => '➕ Add me to Your Group', 'url' => 'https://t.me/SriLankaExamResultsBot?startgroup=new']
        ],
    ]
];

$keyboard = json_encode($inlinebutton, true);

if (strpos($send, "/start") === 0) {

$examstart = urlencode("<b>\xF0\x9F\x93\x9A Sri Lanka Grade 5 O/L A/L Exam Results Bot \xF0\x9F\x93\x9A\n\n\xF0\x9F\x91\x8B Hey $fname $lname \xF0\x9F\x92\xAD I'm Sri Lanka \xF0\x9F\x87\xB1\xF0\x9F\x87\xB0 Grade 5 O/L A/L Exam Results Bot \xF0\x9F\x92\xAA I can collect Grade 5 O/L A/L Exam Results \xF0\x9F\x93\x9A in Second Powerd By Sri lanka Department Of Examination \xF0\x9F\x9A\x80\n\n\xE2\x9C\x8F Type /help to More Information About Sri Lanka Grade 5 O/L A/L Exam Results Bot \xE2\x9C\xA8\n\n~ @SriLankaExamResultsBot</b>");

file_get_contents("https://api.telegram.org/bot$token/sendphoto?chat_id=$chat_id&photo=$img&parse_mode=HTML&caption=$examstart&reply_markup=$keyboard");
}

if (strpos($send, "/help") === 0) {

$examhelp = urlencode("<b>\xF0\x9F\x93\x9A Sri Lanka Grade 5 O/L A/L Exam Results Bot \xF0\x9F\x93\x9A\n\n\xE3\x80\xBD About Bot \xE3\x80\xBD\n\n\xE2\x96\xB6 Name - Sri Lanka Grade 5 O/L A/L Exam Results Bot\n\xE2\x96\xB6	Username - @SriLankaExamResultsBot\n\xE2\x96\xB6	Created By - @hirunaofficial\n\n\xF0\x9F\x94\xA7 Bot Commands \xF0\x9F\x94\xA7\n\n\xE2\x96\xB6	/start - Start Sri Lanka Grade 5 O/L A/L Exam Results Bot\n\xE2\x96\xB6 /help - More information about Sri Lanka Grade 5 O/L A/L Exam Results Bot\n\n\xE2\x96\xB6 /exams - Available Exams Results\n\xE2\x96\xB6 /alresult INDEX_NUMBER - Get A/L Exam Results\n\xE2\x96\xB6 /olresult INDEX_NUMBER - Get O/L Exam Results\n\xE2\x96\xB6 /g5result INDEX_NUMBER - Get Grade 5 Scholarship Exam Results</b>");

file_get_contents("https://api.telegram.org/bot$token/sendphoto?chat_id=$chat_id&photo=$img&parse_mode=HTML&caption=$examhelp&reply_markup=$keyboard");
}

if (strpos($send, "/exams") === 0) {
    $exams = file_get_contents("https://www.doenets.lk/result/service/examDetails");
    $examsdecode = json_decode($exams, true);

    $desAlResult = $examsdecode['desAlResult'];
    $yearAlResult = $examsdecode['yearAlResult'];
    $desOlResult = $examsdecode['desOlResult'];
    $yearOlResult = $examsdecode['yearOlResult'];
    $desGvResult = $examsdecode['desGvResult'];
    $yearGvResult = $examsdecode['yearGvResult'];

    $examstext = urlencode("<b>\xF0\x9F\x93\x9A Sri Lanka Grade 5 O/L A/L Exam Results Bot \xF0\x9F\x93\x9A\n\n$desAlResult - $yearAlResult\n$desOlResult - $yearOlResult\n$desGvResult - $yearGvResult\n\n~@SriLankaExamResultsBot</b>");

    file_get_contents("https://api.telegram.org/bot$token/sendphoto?chat_id=$chat_id&photo=$img&parse_mode=HTML&caption=$examstext&reply_markup=$keyboard");
}

if (strpos($send, "/alresult") === 0) {
    $alid = substr($send, 10);
    $alexam = file_get_contents("https://www.doenets.lk/result/service/AlResult/$alid");
    $alexamdecode = json_decode($alexam, true);

    $alexamination = $alexamdecode['examination'];
    $alyear = $alexamdecode['year'];
    $alname = $alexamdecode['name'];
    $alindexno = $alexamdecode['indexNo'];
    $alnic = $alexamdecode['nic'];
    $aldistrictRank = $alexamdecode['districtRank'];
    $alislandRank = $alexamdecode['islandRank'];
    $alzScore = $alexamdecode['zScore'];
    $alstream = $alexamdecode['stream'];
    $alsyllabus = $alexamdecode['studentInfo'][2]['value'];
    $alsub1name = $alexamdecode['subjectResults'][0]['subjectName'];
    $alsub1result = $alexamdecode['subjectResults'][0]['subjectResult'];
    $alsub2name = $alexamdecode['subjectResults'][1]['subjectName'];
    $alsub2result = $alexamdecode['subjectResults'][1]['subjectResult'];
    $alsub3name = $alexamdecode['subjectResults'][2]['subjectName'];
    $alsub3result = $alexamdecode['subjectResults'][2]['subjectResult'];
    $alsub4name = $alexamdecode['subjectResults'][3]['subjectName'];
    $alsub4result = $alexamdecode['subjectResults'][3]['subjectResult'];
    $alsub5name = $alexamdecode['subjectResults'][4]['subjectName'];
    $alsub5result = $alexamdecode['subjectResults'][4]['subjectResult'];
    $alerror = $alexamdecode['errMsge'];
    
    $altext = urlencode("<b>\xF0\x9F\x93\x8C $alerror$alexamination $alyear \xF0\x9F\x93\x8C\n\nExamination - $alexamination\nYear - $alyear\nSyllabus - $alsyllabus\nName - $alname\nIndex Number - $alindexno\nNIC Number - $alnic\nDistrict Rank - $aldistrictRank\nIsland Rank - $alislandRank\nZ-Score - $alzScore\nSubject Stream - $alstream\n\n$alsub1name - $alsub1result\n$alsub2name - $alsub2result\n$alsub3name - $alsub3result\n$alsub4name - $alsub4result\n$alsub5name - $alsub5result\n\n\xF0\x9F\x93\x9A Sri Lanka Grade 5 O/L A/L Exam Results Bot \xF0\x9F\x93\x9A\n~ @SriLankaExamResultsBot</b>");

    file_get_contents("https://api.telegram.org/bot$token/sendphoto?chat_id=$chat_id&photo=$img&parse_mode=HTML&caption=$altext&reply_markup=$keyboard");
}

if (strpos($send, "/olresult") === 0) {
    $olid = substr($send, 10);
    $olexam = file_get_contents("https://www.doenets.lk/result/service/OlResult/$olid");
    $olexamdecode = json_decode($olexam, true);

    $olexamination = $olexamdecode['examination'];
    $olyear = $olexamdecode['year'];
    $olname = $olexamdecode['name'];
    $olindexno = $olexamdecode['indexNo'];
    $olnic = $olexamdecode['nic'];
    $olsub1name = $olexamdecode['subjectResults'][0]['subjectName'];
    $olsub1result = $olexamdecode['subjectResults'][0]['subjectResult'];
    $olsub2name = $olexamdecode['subjectResults'][1]['subjectName'];
    $olsub2result = $olexamdecode['subjectResults'][1]['subjectResult'];
    $olsub3name = $olexamdecode['subjectResults'][2]['subjectName'];
    $olsub3result = $olexamdecode['subjectResults'][2]['subjectResult'];
    $olsub4name = $olexamdecode['subjectResults'][3]['subjectName'];
    $olsub4result = $olexamdecode['subjectResults'][3]['subjectResult'];
    $olsub5name = $olexamdecode['subjectResults'][4]['subjectName'];
    $olsub5result = $olexamdecode['subjectResults'][4]['subjectResult'];
    $olsub6name = $olexamdecode['subjectResults'][5]['subjectName'];
    $olsub6result = $olexamdecode['subjectResults'][5]['subjectResult'];
    $olsub7name = $olexamdecode['subjectResults'][6]['subjectName'];
    $olsub7result = $olexamdecode['subjectResults'][6]['subjectResult'];
    $olsub8name = $olexamdecode['subjectResults'][7]['subjectName'];
    $olsub8result = $olexamdecode['subjectResults'][7]['subjectResult'];
    $olsub9name = $olexamdecode['subjectResults'][8]['subjectName'];
    $olsub9result = $olexamdecode['subjectResults'][8]['subjectResult'];
    $olerror = $olexamdecode['errMsge'];
    
    $oltext = urlencode("<b>\xF0\x9F\x93\x8C $olerror$olexamination $olyear \xF0\x9F\x93\x8C\n\nExamination - $olexamination\nYear - $olyear\nName - $olname\nIndex Number - $olindexno\nNIC Number - $olnic\n\n$olsub1name - $olsub1result\n$olsub2name - $olsub2result\n$olsub3name - $olsub3result\n$olsub4name - $olsub4result\n$olsub5name - $olsub5result\n$olsub6name - $olsub6result\n$olsub7name - $olsub7result\n$olsub8name - $olsub8result\n$olsub9name - $olsub9result\n\n\xF0\x9F\x93\x9A Sri Lanka Grade 5 O/L A/L Exam Results Bot \xF0\x9F\x93\x9A\n~ @SriLankaExamResultsBot</b>");

    file_get_contents("https://api.telegram.org/bot$token/sendphoto?chat_id=$chat_id&photo=$img&parse_mode=HTML&caption=$oltext&reply_markup=$keyboard");
}

if (strpos($send, "/g5result") === 0) {
    $g5id = substr($send, 10);
    $g5exam = file_get_contents("https://www.doenets.lk/result/service/GvResult/$g5id");
    $g5examdecode = json_decode($g5exam, true);

    $g5examination = $g5examdecode['examination'];
    $g5year = $g5examdecode['year'];
    $g5name = $g5examdecode['name'];
    $g5districtRank = $g5examdecode['districtRank'];
    $g5islandRank = $g5examdecode['islandRank'];
    $g5nic = $g5examdecode['nic'];
    $g5cutoffname = $g5examdecode['studentInfo'][4]['param'];
    $g5cutoff = $g5examdecode['studentInfo'][4]['value'];
    $g5subname = $g5examdecode['subjectResults'][0]['subjectName'];
    $g5subresult = $g5examdecode['subjectResults'][0]['subjectResult'];
    $g5error = $g5examdecode['errMsge'];
    
    $g5text = urlencode("<b>\xF0\x9F\x93\x8C $g5error$g5examination $g5year \xF0\x9F\x93\x8C\n\nExamination - $g5examination\nYear - $g5year\nName - $g5name\nIndex Number - $g5indexno\n$g5cutoffname - $g5cutoff\n$g5subname - $g5subresult\n\n\xF0\x9F\x93\x9A Sri Lanka Grade 5 O/L A/L Exam Results Bot \xF0\x9F\x93\x9A\n~ @SriLankaExamResultsBot</b>");

    file_get_contents("https://api.telegram.org/bot$token/sendphoto?chat_id=$chat_id&photo=$img&parse_mode=HTML&caption=$g5text&reply_markup=$keyboard");
}