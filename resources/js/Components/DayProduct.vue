<template>
    <div class="product">
        <div class="content">
            <h3 class="title"><span class="bold" style="font-weight:600; margin-right:4px; font-size:12px;">{{`[${index + 1}]`}}</span>{{ product.title }}</h3>

            <input-number :default="product.count" @change="(data) => {form.count = data; update()}" />
        </div>

        <button type="button" class="btn-remove" @click="detach">
            <img src="/img/trash-white.png" alt="">
        </button>
    </div>
</template>
<script>
import InputNumber from './Form/InputNumber';

export default {
    props: ["product", "index", "diet_product_id"],

    components: {InputNumber},

    data(){
        return {
            form: this.$inertia.form({
                product_id: this.product.id,
                diet_product_id: this.diet_product_id,
                assignment_at: this.product.assignment_at,

                // 개수 업데이트용
                count: this.product.count
            })
        }
    },

    methods:{
        detach(){
            this.form.patch("/dietProducts/detach", {
                preserveState: false,
                preserveScroll: true,
                onSuccess: (page) => {
                    this.$emit("updated", page);
                }
            });
        },

        update(){
            this.form.patch("/dietIncludeProducts", {
                preserveState: true,
                preserveScroll: true,
                onSuccess: (page) => {
                    this.$emit("updated", page);
                }
            });
        }
    },

    computed:{

    }

}
</script>
