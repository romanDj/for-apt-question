Vue.component('pie-chart', {
    extends: VueChartJs.Pie,
    props: ['labels', 'background-color', 'data'],
    mounted() {
        this.renderChart({
            labels: this.labels,
            datasets: [
                {
                    backgroundColor: this.backgroundColor,
                    data: this.data
                }
            ]
        }, {
            responsive: true,
            maintainAspectRatio: false,
            pieceLabel: {
                render: 'percentage',
                precision: 1,
                fontColor: 'white',
                fontSize: 15
            },
            showAllTooltips: true,

        })
    }
});

Vue.component('bar-chart', {
    extends: VueChartJs.Bar,
    mounted() {
        this.renderChart({
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            datasets: [
                {
                    label: 'Data One',
                    backgroundColor: ['red', 'yellow'],
                    data: [40, 39, 10, 40, 39, 80, 40]
                }
            ]
        }, {responsive: true, maintainAspectRatio: false})
    }
});


Vue.component('print-list', {
    props: ['report'],
    data(){
        return {
            color: ['#ffbb33', '#00C851', '#ff4444', '#33b5e5', '#aa66cc', '#2BBBAD', '#d32f2f'],
        }
    },
    template: `<div id="lol"  class="mt-3 mb-3">
                    <ol class="text-left">
                        <li class="mb-2" v-for="item in report"><label>{{item.content}}</label>
                            <template v-if="item.answer">
                             <pie-chart style="max-height: 250px" :data="item.answer.procent" :labels="item.answer.labels" :background-color="color"></pie-chart>
                            </template>   
                            <template v-else>
                                <p>Топ 5 последних:</p>
                               <div class="alert alert-info" v-for="ds in item.description" role="alert">
                                  {{ds}}
                               </div>
                            </template>                        
                           
                        </li>
                    </ol>
               </div>`
});

var app = new Vue({
    el: '#app',
    data: function data() {
        return {
            dataentry: null,
            datalabel: null,
            labels: ['Да', 'Нет'],
            dataset: [45, 55],
            report: reportAnswer
        };
    },

    methods: {
        addData: function addData() {
            this.dataset.push(this.dataentry);
            this.labels.push(this.datalabel);
            this.datalabel = '';
            this.dataentry = '';
        },
        printDoc() {
            window.print();
        }
    },
    created() {
        let inp = "aaaAAcDDrR";
        let curSymbol = '';
        let count = 0;
        let outp = '';

        while (inp.length !== 0) {


            if (curSymbol === '') {
                //в начале выбирается первый символ
                curSymbol = inp[0];
                count++;
            } else {
                if (curSymbol === inp[0]) {
                    count++;
                } else {
                    console.log('В массиве - ' + inp[0] + ' Выбранный ' + curSymbol);
                    if (count === 1) {
                        outp += curSymbol;
                    } else {
                        outp += curSymbol + count;
                    }
                    count = 1;
                    curSymbol = inp[0];
                }
            }

            inp = inp.slice(1);


        }
        console.log(outp);

    }
});