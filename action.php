<?php


if (!empty($_POST["out_sum"])) {

    $out_sum = trim(htmlspecialchars(strip_tags($_POST["out_sum"])));

    $mrh_login = "идентификатор"; // идентификатор магазина
    $mrh_pass1 = "пароль1"; // пароль #1

    $inv_id = ""; // номер счета

    $receipt = "%7B%22items%22:%5B%7B%22name%22:%22name%22,%22quantity%22:1,%22sum%22:11,%22tax%22:%22none%22%7D%5D%7D"; // передаём товарную номенклатуру в urlencode
    $receipt_urlencode = urlencode($receipt);

    $inv_desc = "description"; // описание заказа

    $crc = md5("$mrh_login:$out_sum:$inv_id:$receipt:$mrh_pass1"); // формирование подписи
// Перенаправляем пользователя на страницу оплаты
    Header("Location: https://auth.robokassa.ru/Merchant/Index.aspx?MrchLogin=$mrh_login&OutSum=$out_sum&InvId=$inv_id&Receipt=$receipt_urlencode&Desc=$inv_desc&SignatureValue=$crc");

}