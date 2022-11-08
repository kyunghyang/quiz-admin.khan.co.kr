<template>
    <div>
        <flash />

        <div class="main">
            <slot />
        </div>

    </div>

</template>
<script>
import Flash from "../Components/Flash";
export default {
    components: {Flash},
}
</script>
