<?php
date_default_timezone_set('Asia/Jakarta');
include "function.php";
echo color("red"," ===NOT SAFE FOR WORK IF 02===\n");
echo color("blue","| Claim Voucher Gojek+ Set Pin |\n");
echo color("yellow","| Auto create Gojek X Redeem voucher |\n");
echo color("green","| github: thedearme |\n");
echo color("red","| fanspage :gofoodseindonesia|\n");
echo color("blue","| Creator : A.G /Info Tele @Ameteraasu          |\n");
echo color("yellow","[] NuyuL:  ".date('[d-m-Y] [H:i:s]')."  []\n");
echo color("red","[]        TULIS NOMER PAKAI 62         []\n");
function change(){
        $nama = nama();
        $email = str_replace(" ", "", $nama) . mt_rand(100, 999);
        ulang:
        echo color("yellow","(•) Nomor : ");
        $no = trim(fgets(STDIN));
        $data = '{"email":"'.$email.'@gmail.com","name":"'.$nama.'","phone":"+'.$no.'","signed_up_country":"ID"}';
        $register = request("/v5/customers", null, $data);
        if(strpos($register, '"otp_token"')){
        $otptoken = getStr('"otp_token":"','"',$register);
        echo color("green","+] Kode verifikasi sudah di kirim")."\n";
        otp:
        echo color("nevy","?] Otp: ");
        $otp = trim(fgets(STDIN));
        $data1 = '{"client_name":"gojek:cons:android","data":{"otp":"' . $otp . '","otp_token":"' . $otptoken . '"},"client_secret":"83415d06-ec4e-11e6-a41b-6c40088ab51e"}';
        $verif = request("/v5/customers/phone/verify", null, $data1);
        if(strpos($verif, '"access_token"')){
        echo color("green","+] Berhasil mendaftar");
        $token = getStr('"access_token":"','"',$verif);
        $uuid = getStr('"resource_owner_id":',',',$verif);
        echo "\n".color("nevy","?] Arep Nuyul Voucher?: y/n ");
        $pilihan = trim(fgets(STDIN));
        if($pilihan == "y" || $pilihan == "Y"){
        echo color("red","===========(REDEEM VOUCHER)===========");
        echo "\n".color("yellow","!] Klem 5+10+15");
        echo "\n".color("red","!] Please wait");
        for($a=1;$a<=3;$a++){
        echo color("yellow",".");
        sleep(15);
        }
        $code1 = request('/go-promotions/v1/promotions/enrollments', $token, '{"promo_code":"COBAGOFOOD010420A"}');
        $message = fetch_value($code1,'"message":"','"');
        if(strpos($code1, 'Promo kamu sudah bisa dipakai')){
        echo "\n".color("green","+] Message: ".$message);
        goto goride;
        }else{
        echo "\n".color("red","-] Message: ".$message);
        echo "\n".color("yellow","!] Klem 10 10 10");
        echo "\n".color("red","!] Please wait");
        for($a=1;$a<=3;$a++){
        echo color("yellow",".");
        sleep(15);
        }
        sleep(5);
        $alt01 = request('/go-promotions/v1/promotions/enrollments', $token, '{"promo_code":"COBAGOFOOD010420B"}');
        $messagealt01 = fetch_value($alt01,'"message":"','"');
        if(strpos($alt01, 'Promo kamu sudah bisa dipakai.')){
        echo "\n".color("green","+] Message: ".$messagealt01);
        goto goride;
        }else{
        echo "\n".color("red","-] Message: ".$messagealt01);
        echo "\n".color("yellow","!] Klem 5+10+15");
        echo "\n".color("blue","!] Please wait");
        for($a=1;$a<=3;$a++){
        echo color("yellow",".");
        sleep(15);
        }
        sleep(5);
        $alt02 = request('/go-promotions/v1/promotions/enrollments', $token, '{"promo_code":"COBAGOFOOD010420A"}');
        $messageboba11 = fetch_value($alt02,'"message":"','"');
        if(strpos($alt02, 'Promo kamu sudah bisa dipakai.')){
        echo "\n".color("green","+] Message: ".$messagealt02);
        goto goride;
        }else{
        echo "\n".color("green","+] Message: ".$messagealt02);
        goride:
        echo "\n".color("yellow","!] Klem HEPILAINHATI");
        echo "\n".color("yellow","!] Please wait");
        for($a=1;$a<=3;$a++){
        echo color("yellow",".");
        sleep(5);
        }
        sleep(3);
        $goride = request('/go-promotions/v1/promotions/enrollments', $token, '{"promo_code":"HEPILAINHATI"}');
        $message1 = fetch_value($goride,'"message":"','"');
        echo "\n".color("green","+] Message: ".$message1);
        sleep(3);
        $cekvoucher = request('/gopoints/v3/wallet/vouchers?limit=10&page=1', $token);
        $total = fetch_value($cekvoucher,'"total_vouchers":',',');
        $voucher3 = getStr1('"title":"','",',$cekvoucher,"3");
        $voucher1 = getStr1('"title":"','",',$cekvoucher,"1");
        $voucher2 = getStr1('"title":"','",',$cekvoucher,"2");
        $voucher4 = getStr1('"title":"','",',$cekvoucher,"4");
        $voucher5 = getStr1('"title":"','",',$cekvoucher,"5");
        $voucher6 = getStr1('"title":"','",',$cekvoucher,"6");
        $voucher7 = getStr1('"title":"','",',$cekvoucher,"7");
        echo "\n".color("green","!] Total voucher ".$total." : ");
        echo color("yellow","                         1. ".$voucher1);
        echo "\n".color("green","                     2. ".$voucher2);
        echo "\n".color("blue","                     3. ".$voucher3);
        echo "\n".color("red","                     4. ".$voucher4);
        echo "\n".color("blue","                     5. ".$voucher5);
        echo "\n".color("red","                     6. ".$voucher6);
        echo "\n".color("yellow","                     7. ".$voucher7);
        $expired1 = getStr1('"expiry_date":"','"',$cekvoucher,'1');
        $expired2 = getStr1('"expiry_date":"','"',$cekvoucher,'2');
        $expired3 = getStr1('"expiry_date":"','"',$cekvoucher,'3');
        $expired4 = getStr1('"expiry_date":"','"',$cekvoucher,'4');
        $expired5 = getStr1('"expiry_date":"','"',$cekvoucher,'5');
        $expired6 = getStr1('"expiry_date":"','"',$cekvoucher,'6');
        $expired7 = getStr1('"expiry_date":"','"',$cekvoucher,'7');
         setpin:
         echo "\n".color("nevy","?] SET PIN SISAN ?: y/n ");
         $pilih1 = trim(fgets(STDIN));
         if($pilih1 == "y" || $pilih1 == "Y"){
         //if($pilih1 == "y" && strpos($no, "628")){
         echo color("red","========( PIN MU = 190396 )========")."\n";
         $data2 = '{"pin":"190396"}';
         $getotpsetpin = request("/wallet/pin", $token, $data2, null, null, $uuid);
         echo "Otp pin: ";
         $otpsetpin = trim(fgets(STDIN));
         $verifotpsetpin = request("/wallet/pin", $token, $data2, null, $otpsetpin, $uuid);
         echo $verifotpsetpin;
         }else if($pilih1 == "n" || $pilih1 == "N"){
         die();
         }else{
         echo color("red","-] GAGAL!!!\n");
         }
         }
         }
         }
         }else{
         goto setpin;
         }
         }else{
         echo color("red","-] Otp yang anda input salah");
         echo"\n==================================\n\n";
         echo color("yellow","!] Silahkan input kembali\n");
         goto otp;
         }
         }else{
         echo color("red","NOMOR SUDAH TERDAFTAR/SALAH !!!");
         echo "\nMau ulang? (y/n): ";
         $pilih = trim(fgets(STDIN));
         if($pilih == "y" || $pilih == "Y"){
         echo "\n==============Register==============\n";
         goto ulang;
         }else{
         echo "\n==============Register==============\n";
         goto ulang;
  }
 }
}
echo change()."\n"; ?>
