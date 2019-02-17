<script>
    var listSp = <?= $listSp ?>;
    var listMd = <?= $listMd ?>;
    var listPr = <?= $listPr ?>;
</script>
<div id="app" class="card">
    <transition name="fade" appear>
        <div class="card-body">

            <form class="p-2 text-left">

                <p class="h5 mb-4">Выберите специальность, модуль и вид практики</p>

                <label>Специальность</label>
                <select v-model="selectSp" class="browser-default custom-select mb-4">
                    <option value="" selected>--</option>
                    <option :value="item.id"  v-for="item in sp">{{item.name}}</option>
                </select>

                <label>Профессиональный модуль</label>
                <select v-model="selectMd" class="browser-default custom-select mb-4" :disabled="selectSp == '' ">
                    <option value="" selected>--</option>
                    <option :value="item.id" v-for="item in md">{{item.name}}</option>
                </select>

                <label>Вид практики</label>
                <select v-model="selectPr"  class="browser-default custom-select mb-4" :disabled="selectMd == '' ">
                    <option value="" selected>--</option>
                    <option :value="item.id" v-for="item in pr">{{item.name}}</option>
                </select>


                <button @click.prevent="start" class="btn btn-light-green btn-block" :disabled="selectSp == '' || selectMd == '' || selectPr == ''" type="submit">Пройти тест</button>
                <button @click.prevent="report" class="btn mt-1 btn-info btn-block" :disabled="selectSp == '' || selectMd == '' || selectPr == ''" type="submit">Получить отчет</button>

            </form>


        </div>
    </transition>

</div>

<script src="/public/js/selectTest.js"></script>