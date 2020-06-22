<html>

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<script>

function Rradio_OnOff(id){
   if(id == "Radio_On")

   {

      document.all["Radio_On"].style.display = '';         // 보이게

      document.all["Radio_Off"].style.display = 'none';  // 안보이게

   }

   else

   {

      document.all["Radio_On"].style.display = 'none';  // 안보이게

      document.all["Radio_Off"].style.display = '';         // 보이게

   }

}

function input(){
var input = document.getElementById("jjcode").value;


// $sql = "SELECT * FROM final WHERE A1 = '회사명' and A11 = "."'A060310'";
// $result = mysqli_query($conn, $sql);
// $c_name = mysqli_fetch_array($result)['A2'];

document.getElementById("cname").innerHTML = <?=$c_name?>;
document.getElementById("output").value = <?=$c_name?>;
}



</script>

<?php
$conn = mysqli_connect(
  'nas.6cats.co.kr:7001',
  'gunslord',
  'gm2580!!',
  'home');


if (!$conn) echo 'mysql접속실패 : '.mysql_error();

mysqli_query($conn, "set session character_set_connection=utf8;");
mysqli_query($conn, "set session character_set_results=utf8;");
mysqli_query($conn, "set session character_set_client=utf8;");



?> 














</head>

<body>
<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
  overflow:hidden;padding:10px 5px;word-break:normal;}
.tg th{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
  font-weight:normal;overflow:hidden;padding:10px 5px;word-break:normal;}
.tg .tg-mn8v{background-color:#9b9b9b;border-color:inherit;font-weight:bold;text-align:center;vertical-align:top}
.tg .tg-x028{background-color:#000000;border-color:#000000;color:#ffffff;font-weight:bold;text-align:center;vertical-align:top}
.tg .tg-yj5y{background-color:#efefef;border-color:inherit;text-align:center;vertical-align:top}
.tg .tg-34fe{background-color:#c0c0c0;border-color:inherit;text-align:center;vertical-align:top}
.tg .tg-zlqz{background-color:#c0c0c0;border-color:inherit;font-weight:bold;text-align:center;vertical-align:top}
.tg .tg-6x6l{border-color:#646464;font-weight:bold;text-align:center;vertical-align:top}
.tg .tg-8m8h{background-color:#cbcefb;border-color:inherit;font-weight:bold;text-align:center;vertical-align:top}
.tg .tg-zme7{background-color:#ffce93;border-color:inherit;text-align:center;vertical-align:top}
.tg .tg-c3ow{border-color:inherit;text-align:center;vertical-align:top}
.tg .tg-w3ps{background-color:#ffce93;border-color:inherit;font-weight:bold;text-align:center;vertical-align:top}
.tg .tg-p6xp{background-color:#c0c0c0;border-color:#646464;color:#000000;font-weight:bold;text-align:center;vertical-align:top}
.tg .tg-p0kf{background-color:#000000;border-color:#000000;color:#ffffff;text-align:center;vertical-align:top}
.tg .tg-0pky{border-color:inherit;text-align:left;vertical-align:top}
.tg .tg-9u2q{background-color:#9b9b9b;border-color:inherit;text-align:center;vertical-align:top}
.tg .tg-7btt{border-color:inherit;font-weight:bold;text-align:center;vertical-align:top}
.tg .tg-bvbb{border-color:#000000;color:#3166ff;font-weight:bold;text-align:center;vertical-align:top}
.tg .tg-jw0j{background-color:#96fffb;border-color:inherit;font-weight:bold;text-align:center;vertical-align:top}
.tg .tg-gdc4{background-color:#96fffb;border-color:inherit;text-align:center;vertical-align:top}
</style>
<?php






$temp = $_POST['jjcode'];
$sql = "SELECT * FROM final WHERE A1 = '회사명' and A11 = '$temp'";
$result = mysqli_query($conn, $sql);
$c_name = mysqli_fetch_array($result)['A2'];

$sql = "SELECT * FROM final WHERE A1 = '보통주발행주수' and A11 = '$temp'";
$result = mysqli_query($conn, $sql);
$c_botong = mysqli_fetch_array($result)['A2'];

$sql = "SELECT * FROM final WHERE A1 = '현재주가' and A11 = '$temp'";
$result = mysqli_query($conn, $sql);
$c_juga = mysqli_fetch_array($result)['A2'];

$sql = "SELECT * FROM final WHERE A1 = '우선주발행주수' and A11 = '$temp'";
$result = mysqli_query($conn, $sql);
$c_usun = mysqli_fetch_array($result)['A2'];

$sql = "SELECT * FROM final WHERE A1 = '베타' and A11 = '$temp'";
$result = mysqli_query($conn, $sql);
$c_beta = mysqli_fetch_array($result)['A2'];

$sql = "SELECT * FROM final WHERE A1 = '자기주식' and A11 = '$temp'";
$result = mysqli_query($conn, $sql);
$c_jagi = mysqli_fetch_array($result)['A2'];

$sql = "SELECT * FROM final WHERE A1 = 'Business Summary' and A11 = '$temp'";
$result = mysqli_query($conn, $sql);
$c_bs1 = mysqli_fetch_array($result)['A2'];

$sql = "SELECT * FROM final WHERE A1 = 'Business Summary' and A11 = '$temp'";
$result = mysqli_query($conn, $sql);
$c_bs2 = mysqli_fetch_array($result)['A3'];

$sql = "SELECT * FROM final WHERE A1 = '최종 적용 할인율_적용' and A11 = '$temp'";
$result = mysqli_query($conn, $sql);
$c_cj1 = mysqli_fetch_array($result)['A2'];

$sql = "SELECT * FROM final WHERE A1 = '최종 적용 할인율_미적용' and A11 = '$temp'";
$result = mysqli_query($conn, $sql);
$c_cj2 = mysqli_fetch_array($result)['A2'];

$sql = "SELECT * FROM final WHERE A1 = '년도' and A11 = '$temp'";
$result = mysqli_query($conn, $sql);
$c_date1 = mysqli_fetch_array($result)['A2'];
$sql = "SELECT * FROM final WHERE A1 = '년도' and A11 = '$temp'";
$result = mysqli_query($conn, $sql);
$c_date2 = mysqli_fetch_array($result)['A3'];
$sql = "SELECT * FROM final WHERE A1 = '년도' and A11 = '$temp'";
$result = mysqli_query($conn, $sql);
$c_date3 = mysqli_fetch_array($result)['A4'];


$sql = "SELECT * FROM final WHERE A1 = '영업자신이익률' and A11 = '$temp'";
$result = mysqli_query($conn, $sql);
$c_yu1 = mysqli_fetch_array($result)['A2'];
$sql = "SELECT * FROM final WHERE A1 = '영업자신이익률' and A11 = '$temp'";
$result = mysqli_query($conn, $sql);
$c_yu2 = mysqli_fetch_array($result)['A3'];
$sql = "SELECT * FROM final WHERE A1 = '영업자신이익률' and A11 = '$temp'";
$result = mysqli_query($conn, $sql);
$c_yu3 = mysqli_fetch_array($result)['A4'];
$sql = "SELECT * FROM final WHERE A1 = '영업자신이익률' and A11 = '$temp'";
$result = mysqli_query($conn, $sql);
$c_yu4 = mysqli_fetch_array($result)['A5'];

$sql = "SELECT * FROM final WHERE A1 = '비영업자산이익률' and A11 = '$temp'";
$result = mysqli_query($conn, $sql);
$c_byu1 = mysqli_fetch_array($result)['A2'];
$sql = "SELECT * FROM final WHERE A1 = '비영업자산이익률' and A11 = '$temp'";
$result = mysqli_query($conn, $sql);
$c_byu2 = mysqli_fetch_array($result)['A3'];
$sql = "SELECT * FROM final WHERE A1 = '비영업자산이익률' and A11 = '$temp'";
$result = mysqli_query($conn, $sql);
$c_byu3 = mysqli_fetch_array($result)['A4'];
$sql = "SELECT * FROM final WHERE A1 = '비영업자산이익률' and A11 = '$temp'";
$result = mysqli_query($conn, $sql);
$c_byu4 = mysqli_fetch_array($result)['A5'];

$sql = "SELECT * FROM final WHERE A1 = '차입이자율' and A11 = '$temp'";
$result = mysqli_query($conn, $sql);
$c_cha1 = mysqli_fetch_array($result)['A2'];
$sql = "SELECT * FROM final WHERE A1 = '차입이자율' and A11 = '$temp'";
$result = mysqli_query($conn, $sql);
$c_cha2 = mysqli_fetch_array($result)['A3'];
$sql = "SELECT * FROM final WHERE A1 = '차입이자율' and A11 = '$temp'";
$result = mysqli_query($conn, $sql);
$c_cha3 = mysqli_fetch_array($result)['A4'];
$sql = "SELECT * FROM final WHERE A1 = '차입이자율' and A11 = '$temp'";
$result = mysqli_query($conn, $sql);
$c_cha4 = mysqli_fetch_array($result)['A5'];

$sql = "SELECT * FROM final WHERE A1 = 'ROE' and A11 = '$temp'";
$result = mysqli_query($conn, $sql);
$c_roe1 = mysqli_fetch_array($result)['A2'];
$sql = "SELECT * FROM final WHERE A1 = 'ROE' and A11 = '$temp'";
$result = mysqli_query($conn, $sql);
$c_roe2 = mysqli_fetch_array($result)['A3'];
$sql = "SELECT * FROM final WHERE A1 = 'ROE' and A11 = '$temp'";
$result = mysqli_query($conn, $sql);
$c_roe3 = mysqli_fetch_array($result)['A4'];
$sql = "SELECT * FROM final WHERE A1 = 'ROE' and A11 = '$temp'";
$result = mysqli_query($conn, $sql);
$c_roe4 = mysqli_fetch_array($result)['A5'];
$sql = "SELECT * FROM final WHERE A1 = 'ROE' and A11 = '$temp'";
$result = mysqli_query($conn, $sql);
$c_roe5 = mysqli_fetch_array($result)['A6'];

$sql = "SELECT * FROM final WHERE A1 = '컨센서스2' and A11 = '$temp'";
$result = mysqli_query($conn, $sql);
$c_cun1 = mysqli_fetch_array($result)['A2'];
$sql = "SELECT * FROM final WHERE A1 = '컨센서스2' and A11 = '$temp'";
$result = mysqli_query($conn, $sql);
$c_cun2 = mysqli_fetch_array($result)['A3'];
$sql = "SELECT * FROM final WHERE A1 = '컨센서스2' and A11 = '$temp'";
$result = mysqli_query($conn, $sql);
$c_cun3 = mysqli_fetch_array($result)['A4'];

$sql = "SELECT * FROM final WHERE A1 = '최종 적용 할인율_적용' and A11 = '$temp'";
$result = mysqli_query($conn, $sql);
$c_cjh1 = mysqli_fetch_array($result)['A2'];

$sql = "SELECT * FROM final WHERE A1 = 'ROE2' and A11 = '$temp'";
$result = mysqli_query($conn, $sql);
$c_roe21 = mysqli_fetch_array($result)['A2'];
$sql = "SELECT * FROM final WHERE A1 = 'ROE2' and A11 = '$temp'";
$result = mysqli_query($conn, $sql);
$c_roe22 = mysqli_fetch_array($result)['A3'];
$sql = "SELECT * FROM final WHERE A1 = 'ROE2' and A11 = '$temp'";
$result = mysqli_query($conn, $sql);
$c_roe23 = mysqli_fetch_array($result)['A4'];
$sql = "SELECT * FROM final WHERE A1 = 'ROE2' and A11 = '$temp'";
$result = mysqli_query($conn, $sql);
$c_roe24 = mysqli_fetch_array($result)['A5'];

$sql = "SELECT * FROM final WHERE A1 = '현재주가' and A11 = '$temp'";
$result = mysqli_query($conn, $sql);
$c_hjuga = mysqli_fetch_array($result)['A2'];

$sql = "SELECT * FROM final WHERE A1 = '적정주가' and A11 = '$temp'";
$result = mysqli_query($conn, $sql);
$c_jjuga = mysqli_fetch_array($result)['A2'];

$sql = "SELECT * FROM final WHERE A1 = '매도가격' and A11 = '$temp'";
$result = mysqli_query($conn, $sql);
$c_dgagu = mysqli_fetch_array($result)['A2'];

$sql = "SELECT * FROM final WHERE A1 = '매수가격' and A11 = '$temp'";
$result = mysqli_query($conn, $sql);
$c_sgagu = mysqli_fetch_array($result)['A2'];

$sql = "SELECT * FROM final WHERE A1 = '주가' and A11 = '$temp'";
$result = mysqli_query($conn, $sql);
$c_juga1 = mysqli_fetch_array($result)['A2'];
$sql = "SELECT * FROM final WHERE A1 = '주가' and A11 = '$temp'";
$result = mysqli_query($conn, $sql);
$c_juga2 = mysqli_fetch_array($result)['A3'];
$sql = "SELECT * FROM final WHERE A1 = '주가' and A11 = '$temp'";
$result = mysqli_query($conn, $sql);
$c_juga3 = mysqli_fetch_array($result)['A4'];

$sql = "SELECT * FROM final WHERE A1 = 'PER' and A11 = '$temp'";
$result = mysqli_query($conn, $sql);
$c_jugap1 = mysqli_fetch_array($result)['A2'];
$sql = "SELECT * FROM final WHERE A1 = 'PER' and A11 = '$temp'";
$result = mysqli_query($conn, $sql);
$c_jugap2 = mysqli_fetch_array($result)['A3'];
$sql = "SELECT * FROM final WHERE A1 = 'PER' and A11 = '$temp'";
$result = mysqli_query($conn, $sql);
$c_jugap3 = mysqli_fetch_array($result)['A4'];

$sql = "SELECT * FROM final WHERE A1 = '배열' and A11 = '$temp'";
$result = mysqli_query($conn, $sql);
$c_br = mysqli_fetch_array($result)['A2'];

$sql = "SELECT * FROM final WHERE A1 = '적정가 대비' and A11 = '$temp'";
$result = mysqli_query($conn, $sql);
$c_jjgd = mysqli_fetch_array($result)['A2'];

echo<<<ETO
<form method="post" action="index.php">
종목코드 : <input type="text" name="jjcode" size="20" value="A060310">
<input type="submit" value = 'submit'>
</form>
<table class="tg">
  <tr>
    <th class="tg-x028">기초자료</th>
    <th class="tg-p0kf"></th>
    <th class="tg-p0kf"></th>
    <th class="tg-p0kf"></th>
    <th class="tg-p0kf"></th>
    <th class="tg-p0kf"></th>
  </tr>
  <tr>
    <td class="tg-p6xp">회사명</td>
    <td class="tg-c3ow" id = "cname">$c_name</td>
    <td class="tg-zlqz">보통주발행주수</td>
    <td class="tg-c3ow">$c_botong</td>
    <td class="tg-c3ow"></td>
    <td class="tg-c3ow"></td>
  </tr>
  <tr>
    <td class="tg-p6xp">현재주가</td>
    <td class="tg-c3ow">$c_juga</td>
    <td class="tg-zlqz">우선주발행주수</td>
    <td class="tg-c3ow">$c_usun</td>
    <td class="tg-c3ow"></td>
    <td class="tg-c3ow"></td>
  </tr>
  <tr>
    <td class="tg-p6xp">베타(β)</td>
    <td class="tg-c3ow">$c_beta</td>
    <td class="tg-zlqz">자기주식</td>
    <td class="tg-c3ow">$c_jagi</td>
    <td class="tg-c3ow"></td>
    <td class="tg-c3ow"></td>
  </tr>
  <tr>
    <td class="tg-c3ow"></td>
    <td class="tg-c3ow"></td>
    <td class="tg-c3ow"></td>
    <td class="tg-c3ow"></td>
    <td class="tg-c3ow"></td>
    <td class="tg-c3ow"></td>
  </tr>
  <tr>
    <td class="tg-x028">Business Summary</td>
    <td class="tg-p0kf"></td>
    <td class="tg-p0kf"></td>
    <td class="tg-p0kf"></td>
    <td class="tg-p0kf"></td>
    <td class="tg-p0kf"></td>
  </tr>
  <tr>
    <td class="tg-c3ow" colspan="6">$c_bs1</td>
  </tr>
  <tr>
    <td class="tg-0pky" colspan="6">$c_bs2</td>
  </tr>
  <tr>
    <td class="tg-c3ow" colspan="6"></td>
  </tr>
  <tr>
    <td class="tg-c3ow"></td>
    <td class="tg-c3ow"></td>
    <td class="tg-c3ow"></td>
    <td class="tg-c3ow"></td>
    <td class="tg-c3ow"></td>
    <td class="tg-c3ow"></td>
  </tr>
  <tr>
    <td class="tg-x028">요구수익률</td>
    <td class="tg-p0kf"></td>
    <td class="tg-p0kf"></td>
    <td class="tg-p0kf"></td>
    <td class="tg-p0kf"></td>
    <td class="tg-p0kf"></td>
  </tr>
  <tr>
    <td class="tg-8m8h">별도 요구수익률</td>
    <td class="tg-w3ps">
    <label><input type="radio" name="color" value="$c_cj1" onclick="Rradio_OnOff('Radio_On');" checked> 적용</label>
    <label><input type="radio" name="color" value="$c_cj2" onclick="Rradio_OnOff('Radio_On');"> 비적용</label>
    </td>
    <td class="tg-zme7">8.05%</td>
    <td class="tg-c3ow"></td>
    <td class="tg-c3ow"></td>
    <td class="tg-c3ow"></td>
  </tr>
  <tr>
    <td class="tg-zlqz">무위험이자율</td>
    <td class="tg-c3ow">1.6%</td>
    <td class="tg-c3ow"></td>
    <td class="tg-c3ow"></td>
    <td class="tg-c3ow"></td>
    <td class="tg-c3ow"></td>
  </tr>
  <tr>
    <td class="tg-zlqz">시장위험프리미엄</td>
    <td class="tg-c3ow">6.64%</td>
    <td class="tg-c3ow"></td>
    <td class="tg-c3ow"></td>
    <td class="tg-c3ow"></td>
    <td class="tg-c3ow"></td>
  </tr>
  <tr>
    <td class="tg-mn8v">최종 적용 할인율</td>
    <td class="tg-9u2q">$c_cjh1</td>
    <td class="tg-c3ow"></td>
    <td class="tg-c3ow"></td>
    <td class="tg-c3ow"></td>
    <td class="tg-c3ow"></td>
  </tr>
  <tr>
    <td class="tg-c3ow"></td>
    <td class="tg-c3ow"></td>
    <td class="tg-c3ow"></td>
    <td class="tg-c3ow"></td>
    <td class="tg-c3ow"></td>
    <td class="tg-c3ow"></td>
  </tr>
  <tr>
    <td class="tg-x028">ROE 추정</td>
    <td class="tg-w3ps">1순위</td>
    <td class="tg-zme7"></td>
    <td class="tg-c3ow"></td>
    <td class="tg-c3ow"></td>
    <td class="tg-c3ow"></td>
  </tr>
  <tr>
    <td class="tg-7btt">년도</td>
    <td class="tg-yj5y">$c_date1</td>
    <td class="tg-yj5y">$c_date2</td>
    <td class="tg-yj5y">$c_date3</td>
    <td class="tg-yj5y">가중평균</td>
    <td class="tg-yj5y">선택</td>
  </tr>
  <tr>
    <td class="tg-7btt">영업자산이익률</td>
    <td class="tg-c3ow">$c_yu1</td>
    <td class="tg-c3ow">$c_yu2</td>
    <td class="tg-c3ow">$c_yu3</td>
    <td class="tg-c3ow">$c_yu4</td>
    <td class="tg-w3ps">1순위</td>
  </tr>
  <tr>
    <td class="tg-7btt">비영업자산이익률</td>
    <td class="tg-c3ow">$c_byu1</td>
    <td class="tg-c3ow">$c_byu2</td>
    <td class="tg-c3ow">$c_byu3</td>
    <td class="tg-c3ow">$c_byu4</td>
    <td class="tg-w3ps">1순위</td>
  </tr>
  <tr>
    <td class="tg-7btt">차입이자율</td>
    <td class="tg-c3ow">$c_cha1</td>
    <td class="tg-c3ow">$c_cha2</td>
    <td class="tg-c3ow">$c_cha3</td>
    <td class="tg-c3ow">$c_cha4</td>
    <td class="tg-w3ps">1순위</td>
  </tr>
  <tr>
    <td class="tg-zlqz">ROE</td>
    <td class="tg-34fe">$c_roe1</td>
    <td class="tg-34fe">$c_roe2</td>
    <td class="tg-34fe">$c_roe3</td>
    <td class="tg-34fe">$c_roe4</td>
    <td class="tg-x028">분석 : $c_roe5</td>
  </tr>
  <tr>
    <td class="tg-c3ow"></td>
    <td class="tg-c3ow"></td>
    <td class="tg-c3ow"></td>
    <td class="tg-c3ow"></td>
    <td class="tg-c3ow"></td>
    <td class="tg-c3ow"></td>
  </tr>
  <tr>
    <td class="tg-7btt">컨센서스</td>
    <td class="tg-34fe">$c_cun1</td>
    <td class="tg-34fe">$c_cun2</td>
    <td class="tg-34fe">$c_cun3</td>
    <td class="tg-34fe">1순위</td>
    <td class="tg-34fe">별도값</td>
  </tr>
  <tr>
    <td class="tg-7btt">ROE</td>
    <td class="tg-c3ow">$c_roe21</td>
    <td class="tg-c3ow">$c_roe22</td>
    <td class="tg-c3ow">$c_roe23</td>
    <td class="tg-c3ow">$c_roe24</td>
    <td class="tg-zme7">5%</td>
  </tr>
  <tr>
    <td class="tg-c3ow"></td>
    <td class="tg-c3ow"></td>
    <td class="tg-c3ow"></td>
    <td class="tg-c3ow"></td>
    <td class="tg-c3ow"></td>
    <td class="tg-c3ow"></td>
  </tr>
  <tr>
    <td class="tg-x028">RIM 적정주가</td>
    <td class="tg-zme7">1순위</td>
    <td class="tg-c3ow"></td>
    <td class="tg-c3ow"></td>
    <td class="tg-c3ow"></td>
    <td class="tg-c3ow"></td>
  </tr>
  <tr>
    <td class="tg-mn8v">현재주가</td>
    <td class="tg-c3ow">$c_hjuga</td>
    <td class="tg-7btt">적정가 대비</td>
    <td class="tg-zlqz">주당 가치</td>
    <td class="tg-zlqz">주가</td>
    <td class="tg-zlqz">PER</td>
  </tr>
  <tr>
    <td class="tg-mn8v">적정주가</td>
    <td class="tg-7btt">$c_jjuga</td>
    <td class="tg-bvbb">$c_jjgd</td>
    <td class="tg-zlqz">초과이익 지속</td>
    <td class="tg-c3ow">$c_juga1</td>
    <td class="tg-c3ow">$c_jugap1</td>
  </tr>
  <tr>
    <td class="tg-mn8v">매도가격</td>
    <td class="tg-c3ow">$c_dgagu</td>
    <td class="tg-c3ow"></td>
    <td class="tg-zlqz">10%씩(10년) 감소</td>
    <td class="tg-c3ow">$c_juga2</td>
    <td class="tg-c3ow">$c_jugap2</td>
  </tr>
  <tr>
    <td class="tg-mn8v">매수가격</td>
    <td class="tg-c3ow">$c_sgagu</td>
    <td class="tg-c3ow"></td>
    <td class="tg-zlqz">20%씩(5년) 감소</td>
    <td class="tg-c3ow">$c_juga3</td>
    <td class="tg-c3ow">$c_jugap3</td>
  </tr>
  <tr>
    <td class="tg-c3ow"></td>
    <td class="tg-c3ow"></td>
    <td class="tg-c3ow"></td>
    <td class="tg-c3ow"></td>
    <td class="tg-c3ow">$c_br</td>
    <td class="tg-c3ow"></td>
  </tr>
  <tr>
    <td class="tg-c3ow"></td>
    <td class="tg-c3ow"></td>
    <td class="tg-c3ow"></td>
    <td class="tg-c3ow"></td>
    <td class="tg-c3ow"></td>
    <td class="tg-c3ow"></td>
  </tr>
  <tr>
    <td class="tg-x028">기타 참고사항</td>
    <td class="tg-34fe"></td>
    <td class="tg-34fe"></td>
    <td class="tg-34fe"></td>
    <td class="tg-34fe">올해 예상배당</td>
    <td class="tg-c3ow"></td>
  </tr>
  <tr>
    <td class="tg-7btt">주당배당금</td>
    <td class="tg-c3ow"></td>
    <td class="tg-c3ow"></td>
    <td class="tg-c3ow"></td>
    <td class="tg-c3ow"></td>
    <td class="tg-c3ow"></td>
  </tr>
  <tr>
    <td class="tg-jw0j">배당수익률</td>
    <td class="tg-gdc4"></td>
    <td class="tg-gdc4"></td>
    <td class="tg-gdc4"></td>
    <td class="tg-gdc4"></td>
    <td class="tg-c3ow"></td>
  </tr>
  <tr>
    <td class="tg-c3ow"></td>
    <td class="tg-34fe"></td>
    <td class="tg-34fe"></td>
    <td class="tg-34fe"></td>
    <td class="tg-34fe"></td>
    <td class="tg-c3ow"></td>
  </tr>
  <tr>
    <td class="tg-6x6l">당기순이익</td>
    <td class="tg-c3ow"></td>
    <td class="tg-c3ow"></td>
    <td class="tg-c3ow"></td>
    <td class="tg-c3ow"></td>
    <td class="tg-c3ow"></td>
  </tr>
  <tr>
    <td class="tg-6x6l">영업이익</td>
    <td class="tg-c3ow"></td>
    <td class="tg-c3ow"></td>
    <td class="tg-c3ow"></td>
    <td class="tg-c3ow"></td>
    <td class="tg-c3ow"></td>
  </tr>
  <tr>
    <td class="tg-6x6l">영업현금흐름</td>
    <td class="tg-c3ow"></td>
    <td class="tg-c3ow"></td>
    <td class="tg-c3ow"></td>
    <td class="tg-c3ow"></td>
    <td class="tg-c3ow"></td>
  </tr>
  <tr>
    <td class="tg-6x6l">영업CF - 영업이익</td>
    <td class="tg-c3ow"></td>
    <td class="tg-c3ow"></td>
    <td class="tg-c3ow"></td>
    <td class="tg-c3ow"></td>
    <td class="tg-c3ow"></td>
  </tr>
</table>

ETO;

?>


</body>

</html>

