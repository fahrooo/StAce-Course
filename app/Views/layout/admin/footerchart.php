<div class="footer-wrap pd-20 mb-20 card-box">
StAce - Course © 2021
</div>
</div>
</div>
<!-- js -->
<script src="<?= base_url('vendors/scripts/core.js') ?>"></script>
<script src="<?= base_url('vendors/scripts/script.min.js') ?>"></script>
<script src="<?= base_url('vendors/scripts/process.js') ?>"></script>
<script src="<?= base_url('vendors/scripts/layout-settings.js') ?>"></script>
<script src="<?= base_url('src/plugins/apexcharts/apexcharts.min.js') ?>"></script>
<script src="<?= base_url('src/plugins/datatables/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('src/plugins/datatables/js/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?= base_url('src/plugins/datatables/js/dataTables.responsive.min.js') ?>"></script>
<script src="<?= base_url('src/plugins/datatables/js/responsive.bootstrap4.min.js') ?>"></script>
<script src="<?= base_url('vendors/scripts/dashboard.js') ?>"></script>
<script>
    $('#example').dataTable({
        destroy: true,
    });
</script>
<script src="<?= base_url('src/plugins/jQuery-Knob-master/jquery.knob.min.js') ?>"></script>
<script>
    $(".dial1").knob();
    $({
        animatedVal: 0
    }).animate({
        animatedVal: <?= $teacher ?>
    }, {
        duration: 2000,
        easing: "swing",
        step: function() {
            $(".dial1").val(Math.ceil(this.animatedVal)).trigger("change");
        }
    });
    $(".dial2").knob();
    $({
        animatedVal: 0
    }).animate({
        animatedVal: <?= $student ?>
    }, {
        duration: 2000,
        easing: "swing",
        step: function() {
            $(".dial2").val(Math.ceil(this.animatedVal)).trigger("change");
        }
    });
    $(".dial3").knob();
    $({
        animatedVal: 0
    }).animate({
        animatedVal: <?= $subject ?>
    }, {
        duration: 2000,
        easing: "swing",
        step: function() {
            $(".dial3").val(Math.ceil(this.animatedVal)).trigger("change");
        }
    });
    $(".dial4").knob();
    $({
        animatedVal: 0
    }).animate({
        animatedVal: <?= $transaction ?>
    }, {
        duration: 2000,
        easing: "swing",
        step: function() {
            $(".dial4").val(Math.ceil(this.animatedVal)).trigger("change");
        }
    });
    $(".dial5").knob();
</script>
<script>
    var options8 = {
        labels: ["Teachers", "Students", "Courses", "Transactions"],
        series: [<?= $teacher ?>, <?= $student ?>, <?= $subject ?>, <?= $transaction ?>],
        chart: {
            type: 'donut',
        },
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: 200
                },
                legend: {
                    position: 'bottom'
                }
            }
        }]
    };
    var chart = new ApexCharts(document.querySelector("#chart8"), options8);
    chart.render();
</script>
</body>

</html>