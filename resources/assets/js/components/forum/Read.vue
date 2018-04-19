<template>
    <show-question :data=question></show-question>
</template>

<script>
import ShowQuestion from './ShowQuestion'

export default {
    components: {
        ShowQuestion
    },
    data() {
        return {
            question: {}
        }
    },
    created() {
        axios.get(`/api/question/${this.$route.params.slug}`)
        .then(res => this.question = res.data.data)
        .catch(error => console.log(error.response.data));
    }
}
</script>

<style>

</style>
