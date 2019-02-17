<script>
    var reportAnswer = <?= $reportAnswer ?>
</script>
<div id="app" class="card mt-3">
    <div class="card-body">
        <div class="d-flex justify-content-end">
            <button class="btn primary-color mb-3 noprint " @click.prevent="printDoc" type="submit">Печать</button>
        </div>

        <p class="h5 text-black">Отчеты в разрезе специальностей</p>
        <p class="h5 text-black">Специальность: <?= $pract->module->specialty->name ?></p>
        <p class="h5 text-black">Проф. модуль: <?= $pract->module->name ?></p>
        <p class="h5 text-black">Вид практики: <?= $pract->name ?></p>

            <p>Количество прошедших опрос по практике: <?= count($pract->participants) ?></p>
            <?php if($reportAnswer == '[]'):?>
                <p class="text-center">Нет данных по выбранной практике</p>
            <?php endif;?>
            <print-list :report="report"></print-list>
<!--        <div id="lol"  class="mt-3 mb-3">-->
<!--            <ol class="text-left">-->
<!--                <li class="mb-2"><label>Удовлетворили ли Вас сроки практики? Достаточны ли они?</label>-->
<!--                    <pie-chart style="max-height: 300px" :data="dataset" :labels="labels" :background-color="color"></pie-chart>-->
<!--                </li>-->
<!--            </ol>-->
<!--            <!--<chartjs-pie :labels="labels" :data="dataset" :bind="true"></chartjs-pie>-->
<!---->
<!--<!--            <bar-chart></bar-chart>-->
<!--        </div>-->

    </div>
</div>

<script src="/public/js/Chart.js"></script>
<script src="/public/js/vue-chartjs.min.js"></script>
<script src="/public/js/Chart.PieceLabel.js"></script>
<script src="/public/js/script.js"></script>