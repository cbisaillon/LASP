<template>
    <div class="d-inline">
        <span v-for="n in maxStars">
            <i v-if="n <= numberOfStars" class="fas fa-star"></i>
            <i v-else class="far fa-star"></i>
        </span>
    </div>
</template>

<script>
    export default {
        name: "StarSystem",
        props:{
            numberOfStars: {
                type: Number,
                required: true,
            },
            maxStars: {
                type: Number,
                default: 5,
            },
            canEdit: {
                type: Boolean,
                default: false,
            }
        }
    }
</script>

<style scoped>

</style>