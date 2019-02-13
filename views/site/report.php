<div class="card mt-3">
    <div class="card-body">
        <p class="h5 text-black">Отчеты в разрезе специальностей</p>
        <div id="app" class="mt-3 mb-3">
            <ol class="text-left">
                <li><label>Удовлетворили ли Вас сроки практики? Достаточны ли они?</label>
                    <pie-chart style="max-height: 300px" :data="dataset" :labels="labels" :background-color="color"></pie-chart>
                </li>
                <li> <label>Предоставляется ли Вам на предприятии необходимая информация (документация, материалы, чертежи)?</label>
                    <pie-chart :data="dataset" :labels="labels" :background-color="color"></pie-chart>
                </li>
            </ol>
            <!--<chartjs-pie :labels="labels" :data="dataset" :bind="true"></chartjs-pie>-->

            <bar-chart></bar-chart>
        </div>
        <button class="btn primary-color btn-block" type="submit">Печать</button>
    </div>
</div>

<script src="/public/js/Chart.js"></script>
<script src="/public/js/vue-chartjs.min.js"></script>
<script src="/public/js/script.js"></script>