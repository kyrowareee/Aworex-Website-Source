<?php

//Проверка авторизации

use GuzzleHttp\Promise\Is;

function isLoggedIn() {

//Если присутствует куки SNID
if (isset($_COOKIE['SNID'])) {
    //Если присутствует запись в базе данных о ключах авторизации
        if (DB::query('SELECT user_id FROM login_tokens WHERE token=:token', array(':token'=>sha1($_COOKIE['SNID'])))) {
            //Вытаскиваем айди пользователя
                $userid = DB::query('SELECT user_id FROM login_tokens WHERE token=:token', array(':token'=>sha1($_COOKIE['SNID'])))[0]['user_id'];
                //Если присутствует куки SNID_
                if (isset($_COOKIE['SNID_'])) {
                    //Возвращаем айди пользователя
                        return $userid;
                    //Иначе
                } else {
                    //Генерируем новый токен, старый удаляем из базы данных
                        $cstrong = True;
                        $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
                        DB::query('INSERT INTO login_tokens VALUES (\'0\', :token, :user_id)', array(':token'=>sha1($token), ':user_id'=>$userid));
                        DB::query('DELETE FROM login_tokens WHERE token=:token', array(':token'=>sha1($_COOKIE['SNID'])));
                        //Добавляем новые куки
                        setcookie("SNID", $token, time() + 60 * 60 * 24 * 7, '/', NULL, NULL, TRUE);
                        setcookie("SNID_", '1', time() + 60 * 60 * 24 * 3, '/', NULL, NULL, TRUE);
                        //Возвращаем айди пользователя снова
                        return $userid;
                }
        }
}
//Если вовсе не присутствует, то возвращаем false (т.е пользователь не авторизирован)
return false;
}

function email() {
    return DB::query('SELECT email FROM users WHERE id=:id', array(':id'=>isLoggedIn()))[0]['email'];
}

?>