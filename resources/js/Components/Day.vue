<template>
    <div class="day-wrap">
        <div class="day">
            <h3 class="title">{{ dateFormat }}</h3>

            <div class="subs">
                <p class="sub">구성상품수 : {{countKind}}</p>
                <p class="sub">전체상품수 : {{countTotal}}</p>
            </div>
            <!--
            <div class="m-input-checkboxes type02">
                <div class="m-input-checkbox">
                    <input type="checkbox">
                    <label for="">수령불가일</label>
                </div>
            </div>
            -->

            <div class="products">
                <day-product @updated="update" v-for="(product, index) in day.products" :diet_product_id="diet_product_id" :index="index" :key="index" :product="product" />
            </div>
        </div>
    </div>
</template>
<script>
import InputNumber from './Form/InputNumber';
import DayProduct from "./DayProduct";

export default {
    props: ["day", "diet_product_id"],

    components: {InputNumber, DayProduct},

    data(){
        return {

        }
    },

    methods: {
        update(page){
            console.log("Day", page);

            this.$emit("updated", page);
        }
    },

    computed:{
        dateFormat(){
            let date = moment(this.day.assignment_at);

            return date.format('MM월 DD일 ' + `(${window.dayOfWeeks[date.day()]})`);
        },

        countKind(){
            return this.day.products.length;
        },

        countTotal(){
            let total = 0;

            this.day.products.map(product => total += parseInt(product.count));

            return total;
        },


    }

}
</script>
