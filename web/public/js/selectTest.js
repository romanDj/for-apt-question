
var app = new Vue({
    el: '#app',
    data: {
        sp: listSp,
        selectSp: '',
        selectMd: '',
        selectPr: ''
    },
    computed:{
        md(){
            if(this.selectSp !== ''){
                return listMd.filter((a)=> {return a.id_specialty === this.selectSp });
            }else{
                return [];
            }
        },
        pr(){
            if(this.selectMd !== ''){
                return listPr.filter((a)=> {return a.id_module === this.selectMd });
            }else{
                return [];
            }
        }
    },
    methods:{
        start(){
            location.replace('/site/question?id='+this.selectPr);
        },
        report(){
            location.replace('/site/report?id='+this.selectPr);
        }
    },
    watch:{
        md(){
            if(this.md.length == 0){
                this.selectMd = '';
            }
        },
        pr(){
            if(this.pr.length == 0){
                this.selectPr = '';
            }
        }
    }
});