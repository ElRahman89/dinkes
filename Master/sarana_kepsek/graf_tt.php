
<?php 
include 'config.php';
if($_POST['th'] == '0'){

}else{
$th = $_POST['th'];
$bln = array('01','02','03','04','05','06','07','08','09','10','11','12');
for($i=0; $i<12; $i++){
$sql = mysqli_query($conn, "SELECT IFNULL(COUNT(id_tindakan_mt),'0') as ttl FROM tindakan_masa_tenggang WHERE YEAR(tgl_tindakan_mt) = '$th' AND MONTH(tgl_tindakan_mt) = '$bln[$i]'");
$qwr = mysqli_fetch_array($sql);
$em[] = $qwr['ttl'];
} ?>
<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
<?php
}
?>
<script type="text/javascript">

Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Tindaka Klinik Masa Tenggang'
    },
    subtitle: {
        text: 'Tahun <?php echo $th;?>'
    },
    xAxis: {
        categories: [
            'Jan',
            'Feb',
            'Mar',
            'Apr',
            'Mei',
            'Jun',
            'Jul',
            'Agu',
            'Sep',
            'Okt',
            'Nov',
            'Des'
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah Tindakan'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.0f} Tindakan</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Tindakan Masa Tenggang',
        data: [
                <?php for($a=0; $a<12; $a++){ ?>
                    <?php echo $em[$a];?>,
                <?php }?>
                ]

    }]
});
        </script>