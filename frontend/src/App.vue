<template>
    <router-view></router-view>
</template>
<script>
import {mapState} from "vuex";

export default {
    computed: {
        ...mapState(['user'])
    },
    components: {}
}
</script>
<style scoped>

</style>
