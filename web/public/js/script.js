Vue.component('pie-chart', {
    extends: VueChartJs.Pie,
    props: ['labels', 'background-color', 'data'],
    mounted () {
        this.renderChart({
            labels: this.labels,
            datasets: [
                {
                    backgroundColor: this.backgroundColor,
                    data: this.data
                }
            ]
        }, {responsive: true, maintainAspectRatio: false})
    }
});

Vue.component('bar-chart', {
    extends: VueChartJs.Bar,
    mounted () {
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

var app = new Vue({
    el: '#app',
    data: function data() {
        return {
            dataentry: null,
            datalabel: null,
            labels: ['Да', 'Нет'],
            dataset: [ 45, 55],
            color: [ '#ffbb33', '#00C851', '#ff4444', '#33b5e5', '#aa66cc', '#2BBBAD', '#d32f2f']
        };
    },

    methods: {
        addData: function addData() {
            this.dataset.push(this.dataentry);
            this.labels.push(this.datalabel);
            this.datalabel = '';
            this.dataentry = '';
        }
    }
});