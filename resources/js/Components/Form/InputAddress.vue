<template>
    <div class="m-input-wrap type01">
        <div class="m-input-text type01">
            <input type="text" placeholder="주소" v-model="address" id="address" @change="change" @click="openAddressPop" @focus="openAddressPop">

            <input type="text" placeholder="상세주소" v-model="address_detail" id="address_detail" style="margin-top:10px;" @change="change">
        </div>

        <p class="m-input-error" v-if="form.errors.address">{{form.errors.address}}</p>
        <p class="m-input-error" v-if="form.errors.address_detail">{{form.errors.address_detail}}</p>
    </div>
</template>
<script>


export default {
    props: {
        form: {
            default : {
                errors: {}
            }
        },
        address: {
            default: ""
        },
        address_detail: {
            default: ""
        },
        activated: false,
    },
    data(){
        return {
            input_address: this.address,
            input_address_detail: this.address_detail
        }
    },

    methods: {
        openAddressPop(){


        },

        change(){
            this.$emit("change", {
                address: this.input_address,
                address_detail: this.input_address_detail
            })
        }
    },

    mounted() {
        let self = this;

        document.getElementById("address").addEventListener("click", function(){ //주소입력칸을 클릭하면
            //카카오 지도 발생
            new daum.Postcode({
                oncomplete: function(data) { //선택시 입력값 세팅
                    self.form.input_address = data.address;
                    document.getElementById("address_detail").focus(); // 주소 넣기
                }
            }).open();
        });
    }
}
</script>
